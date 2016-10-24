<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Skilladd;
use App\Http\Requests\CreateSkilladdRequest;
use App\Http\Requests\UpdateSkilladdRequest;
use Illuminate\Http\Request;

use App\User;


class SkilladdController extends Controller {

	/**
	 * Display a listing of skilladd
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $skilladd = Skilladd::with("user")->get();

		return view('admin.skilladd.index', compact('skilladd'));
	}

	/**
	 * Show the form for creating a new skilladd
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.skilladd.create', compact("user"));
	}

	/**
	 * Store a newly created skilladd in storage.
	 *
     * @param CreateSkilladdRequest|Request $request
	 */
	public function store(CreateSkilladdRequest $request)
	{
	    
		Skilladd::create($request->all());

		return redirect()->route(config('quickadmin.route').'.skilladd.index');
	}

	/**
	 * Show the form for editing the specified skilladd.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$skilladd = Skilladd::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.skilladd.edit', compact('skilladd', "user"));
	}

	/**
	 * Update the specified skilladd in storage.
     * @param UpdateSkilladdRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSkilladdRequest $request)
	{
		$skilladd = Skilladd::findOrFail($id);

        

		$skilladd->update($request->all());

		return redirect()->route(config('quickadmin.route').'.skilladd.index');
	}

	/**
	 * Remove the specified skilladd from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Skilladd::destroy($id);

		return redirect()->route(config('quickadmin.route').'.skilladd.index');
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
            Skilladd::destroy($toDelete);
        } else {
            Skilladd::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.skilladd.index');
    }

}
