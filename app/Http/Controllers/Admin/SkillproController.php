<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Skillpro;
use App\Http\Requests\CreateSkillproRequest;
use App\Http\Requests\UpdateSkillproRequest;
use Illuminate\Http\Request;

use App\User;


class SkillproController extends Controller {

	/**
	 * Display a listing of skillpro
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $skillpro = Skillpro::with("user")->get();

		return view('admin.skillpro.index', compact('skillpro'));
	}

	/**
	 * Show the form for creating a new skillpro
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.skillpro.create', compact("user"));
	}

	/**
	 * Store a newly created skillpro in storage.
	 *
     * @param CreateSkillproRequest|Request $request
	 */
	public function store(CreateSkillproRequest $request)
	{
	    
		Skillpro::create($request->all());

		return redirect()->route(config('quickadmin.route').'.skillpro.index');
	}

	/**
	 * Show the form for editing the specified skillpro.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$skillpro = Skillpro::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.skillpro.edit', compact('skillpro', "user"));
	}

	/**
	 * Update the specified skillpro in storage.
     * @param UpdateSkillproRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSkillproRequest $request)
	{
		$skillpro = Skillpro::findOrFail($id);

        

		$skillpro->update($request->all());

		return redirect()->route(config('quickadmin.route').'.skillpro.index');
	}

	/**
	 * Remove the specified skillpro from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Skillpro::destroy($id);

		return redirect()->route(config('quickadmin.route').'.skillpro.index');
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
            Skillpro::destroy($toDelete);
        } else {
            Skillpro::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.skillpro.index');
    }

}
