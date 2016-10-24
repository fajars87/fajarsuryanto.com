<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Experience;
use App\Http\Requests\CreateExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use Illuminate\Http\Request;

use App\User;


class ExperienceController extends Controller {

	/**
	 * Display a listing of experience
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $experience = Experience::with("user")->get();

		return view('admin.experience.index', compact('experience'));
	}

	/**
	 * Show the form for creating a new experience
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.experience.create', compact("user"));
	}

	/**
	 * Store a newly created experience in storage.
	 *
     * @param CreateExperienceRequest|Request $request
	 */
	public function store(CreateExperienceRequest $request)
	{
	    
		Experience::create($request->all());

		return redirect()->route(config('quickadmin.route').'.experience.index');
	}

	/**
	 * Show the form for editing the specified experience.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$experience = Experience::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.experience.edit', compact('experience', "user"));
	}

	/**
	 * Update the specified experience in storage.
     * @param UpdateExperienceRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateExperienceRequest $request)
	{
		$experience = Experience::findOrFail($id);

        

		$experience->update($request->all());

		return redirect()->route(config('quickadmin.route').'.experience.index');
	}

	/**
	 * Remove the specified experience from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Experience::destroy($id);

		return redirect()->route(config('quickadmin.route').'.experience.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Experience::destroy($toDelete);
        } else {
            Experience::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.experience.index');
    }

}
