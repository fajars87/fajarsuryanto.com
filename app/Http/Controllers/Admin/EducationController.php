<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Education;
use App\Http\Requests\CreateEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use Illuminate\Http\Request;

use App\User;


class EducationController extends Controller {

	/**
	 * Display a listing of education
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $education = Education::with("user")->get();

		return view('admin.education.index', compact('education'));
	}

	/**
	 * Show the form for creating a new education
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.education.create', compact("user"));
	}

	/**
	 * Store a newly created education in storage.
	 *
     * @param CreateEducationRequest|Request $request
	 */
	public function store(CreateEducationRequest $request)
	{
	    
		Education::create($request->all());

		return redirect()->route(config('quickadmin.route').'.education.index');
	}

	/**
	 * Show the form for editing the specified education.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$education = Education::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.education.edit', compact('education', "user"));
	}

	/**
	 * Update the specified education in storage.
     * @param UpdateEducationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateEducationRequest $request)
	{
		$education = Education::findOrFail($id);

        

		$education->update($request->all());

		return redirect()->route(config('quickadmin.route').'.education.index');
	}

	/**
	 * Remove the specified education from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Education::destroy($id);

		return redirect()->route(config('quickadmin.route').'.education.index');
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
            Education::destroy($toDelete);
        } else {
            Education::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.education.index');
    }

}
