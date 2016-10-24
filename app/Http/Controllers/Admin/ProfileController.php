<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Profile;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\User;


class ProfileController extends Controller {

	/**
	 * Display a listing of profile
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $profile = Profile::with("user")->get();

		return view('admin.profile.index', compact('profile'));
	}

	/**
	 * Show the form for creating a new profile
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.profile.create', compact("user"));
	}

	/**
	 * Store a newly created profile in storage.
	 *
     * @param CreateProfileRequest|Request $request
	 */
	public function store(CreateProfileRequest $request)
	{
	    $request = $this->saveFiles($request);
		Profile::create($request->all());

		return redirect()->route(config('quickadmin.route').'.profile.index');
	}

	/**
	 * Show the form for editing the specified profile.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$profile = Profile::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.profile.edit', compact('profile', "user"));
	}

	/**
	 * Update the specified profile in storage.
     * @param UpdateProfileRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateProfileRequest $request)
	{
		$profile = Profile::findOrFail($id);

        $request = $this->saveFiles($request);

		$profile->update($request->all());

		return redirect()->route(config('quickadmin.route').'.profile.index');
	}

	/**
	 * Remove the specified profile from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Profile::destroy($id);

		return redirect()->route(config('quickadmin.route').'.profile.index');
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
            Profile::destroy($toDelete);
        } else {
            Profile::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.profile.index');
    }

}
