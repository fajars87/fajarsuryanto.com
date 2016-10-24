<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Blog1;
use App\Http\Requests\CreateBlog1Request;
use App\Http\Requests\UpdateBlog1Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Bcat;
use App\User;


class Blog1Controller extends Controller {

	/**
	 * Display a listing of blog1
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $blog1 = Blog1::with("bcat")->with("user")->get();

		return view('admin.blog1.index', compact('blog1'));
	}

	/**
	 * Show the form for creating a new blog1
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $bcat = Bcat::pluck("id", "id")->prepend('Please select', null);
$user = User::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.blog1.create', compact("bcat", "user"));
	}

	/**
	 * Store a newly created blog1 in storage.
	 *
     * @param CreateBlog1Request|Request $request
	 */
	public function store(CreateBlog1Request $request)
	{
	    $request = $this->saveFiles($request);
		Blog1::create($request->all());

		return redirect()->route(config('quickadmin.route').'.blog1.index');
	}

	/**
	 * Show the form for editing the specified blog1.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$blog1 = Blog1::find($id);
	    $bcat = Bcat::pluck("id", "id")->prepend('Please select', null);
$user = User::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.blog1.edit', compact('blog1', "bcat", "user"));
	}

	/**
	 * Update the specified blog1 in storage.
     * @param UpdateBlog1Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBlog1Request $request)
	{
		$blog1 = Blog1::findOrFail($id);

        $request = $this->saveFiles($request);

		$blog1->update($request->all());

		return redirect()->route(config('quickadmin.route').'.blog1.index');
	}

	/**
	 * Remove the specified blog1 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Blog1::destroy($id);

		return redirect()->route(config('quickadmin.route').'.blog1.index');
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
            Blog1::destroy($toDelete);
        } else {
            Blog1::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.blog1.index');
    }

}
