<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Hobby;
use App\Http\Requests\CreateHobbyRequest;
use App\Http\Requests\UpdateHobbyRequest;
use Illuminate\Http\Request;

use App\User;


class HobbyController extends Controller {

	/**
	 * Display a listing of hobby
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $hobby = Hobby::with("user")->get();

		return view('admin.hobby.index', compact('hobby'));
	}

	/**
	 * Show the form for creating a new hobby
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.hobby.create', compact("user"));
	}

	/**
	 * Store a newly created hobby in storage.
	 *
     * @param CreateHobbyRequest|Request $request
	 */
	public function store(CreateHobbyRequest $request)
	{
	    
		Hobby::create($request->all());

		return redirect()->route(config('quickadmin.route').'.hobby.index');
	}

	/**
	 * Show the form for editing the specified hobby.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$hobby = Hobby::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.hobby.edit', compact('hobby', "user"));
	}

	/**
	 * Update the specified hobby in storage.
     * @param UpdateHobbyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateHobbyRequest $request)
	{
		$hobby = Hobby::findOrFail($id);

        

		$hobby->update($request->all());

		return redirect()->route(config('quickadmin.route').'.hobby.index');
	}

	/**
	 * Remove the specified hobby from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Hobby::destroy($id);

		return redirect()->route(config('quickadmin.route').'.hobby.index');
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
            Hobby::destroy($toDelete);
        } else {
            Hobby::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.hobby.index');
    }

}
