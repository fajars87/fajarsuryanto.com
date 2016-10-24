<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Bcat;
use App\Http\Requests\CreateBcatRequest;
use App\Http\Requests\UpdateBcatRequest;
use Illuminate\Http\Request;



class BcatController extends Controller {

	/**
	 * Display a listing of bcat
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $bcat = Bcat::all();

		return view('admin.bcat.index', compact('bcat'));
	}

	/**
	 * Show the form for creating a new bcat
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.bcat.create');
	}

	/**
	 * Store a newly created bcat in storage.
	 *
     * @param CreateBcatRequest|Request $request
	 */
	public function store(CreateBcatRequest $request)
	{
	    
		Bcat::create($request->all());

		return redirect()->route(config('quickadmin.route').'.bcat.index');
	}

	/**
	 * Show the form for editing the specified bcat.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$bcat = Bcat::find($id);
	    
	    
		return view('admin.bcat.edit', compact('bcat'));
	}

	/**
	 * Update the specified bcat in storage.
     * @param UpdateBcatRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateBcatRequest $request)
	{
		$bcat = Bcat::findOrFail($id);

        

		$bcat->update($request->all());

		return redirect()->route(config('quickadmin.route').'.bcat.index');
	}

	/**
	 * Remove the specified bcat from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Bcat::destroy($id);

		return redirect()->route(config('quickadmin.route').'.bcat.index');
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
            Bcat::destroy($toDelete);
        } else {
            Bcat::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.bcat.index');
    }

}
