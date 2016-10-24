<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Social;
use App\Http\Requests\CreateSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use Illuminate\Http\Request;

use App\User;


class SocialController extends Controller {

	/**
	 * Display a listing of social
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $social = Social::with("user")->get();

		return view('admin.social.index', compact('social'));
	}

	/**
	 * Show the form for creating a new social
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.social.create', compact("user"));
	}

	/**
	 * Store a newly created social in storage.
	 *
     * @param CreateSocialRequest|Request $request
	 */
	public function store(CreateSocialRequest $request)
	{
	    
		Social::create($request->all());

		return redirect()->route(config('quickadmin.route').'.social.index');
	}

	/**
	 * Show the form for editing the specified social.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$social = Social::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.social.edit', compact('social', "user"));
	}

	/**
	 * Update the specified social in storage.
     * @param UpdateSocialRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSocialRequest $request)
	{
		$social = Social::findOrFail($id);

        

		$social->update($request->all());

		return redirect()->route(config('quickadmin.route').'.social.index');
	}

	/**
	 * Remove the specified social from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Social::destroy($id);

		return redirect()->route(config('quickadmin.route').'.social.index');
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
            Social::destroy($toDelete);
        } else {
            Social::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.social.index');
    }

}
