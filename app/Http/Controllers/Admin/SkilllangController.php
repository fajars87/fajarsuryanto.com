<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Skilllang;
use App\Http\Requests\CreateSkilllangRequest;
use App\Http\Requests\UpdateSkilllangRequest;
use Illuminate\Http\Request;

use App\User;


class SkilllangController extends Controller {

	/**
	 * Display a listing of skilllang
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $skilllang = Skilllang::with("user")->get();

		return view('admin.skilllang.index', compact('skilllang'));
	}

	/**
	 * Show the form for creating a new skilllang
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
        $skill_range = Skilllang::$skill_range;

	    return view('admin.skilllang.create', compact("user", "skill_range"));
	}

	/**
	 * Store a newly created skilllang in storage.
	 *
     * @param CreateSkilllangRequest|Request $request
	 */
	public function store(CreateSkilllangRequest $request)
	{
	    
		Skilllang::create($request->all());

		return redirect()->route(config('quickadmin.route').'.skilllang.index');
	}

	/**
	 * Show the form for editing the specified skilllang.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$skilllang = Skilllang::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
        $skill_range = Skilllang::$skill_range;

		return view('admin.skilllang.edit', compact('skilllang', "user", "skill_range"));
	}

	/**
	 * Update the specified skilllang in storage.
     * @param UpdateSkilllangRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSkilllangRequest $request)
	{
		$skilllang = Skilllang::findOrFail($id);

        

		$skilllang->update($request->all());

		return redirect()->route(config('quickadmin.route').'.skilllang.index');
	}

	/**
	 * Remove the specified skilllang from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Skilllang::destroy($id);

		return redirect()->route(config('quickadmin.route').'.skilllang.index');
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
            Skilllang::destroy($toDelete);
        } else {
            Skilllang::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.skilllang.index');
    }

}
