<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Catportfolio;
use App\Http\Requests\CreateCatportfolioRequest;
use App\Http\Requests\UpdateCatportfolioRequest;
use Illuminate\Http\Request;



class CatportfolioController extends Controller {

	/**
	 * Display a listing of catportfolio
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $catportfolio = Catportfolio::all();

		return view('admin.catportfolio.index', compact('catportfolio'));
	}

	/**
	 * Show the form for creating a new catportfolio
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.catportfolio.create');
	}

	/**
	 * Store a newly created catportfolio in storage.
	 *
     * @param CreateCatportfolioRequest|Request $request
	 */
	public function store(CreateCatportfolioRequest $request)
	{
	    
		Catportfolio::create($request->all());

		return redirect()->route(config('quickadmin.route').'.catportfolio.index');
	}

	/**
	 * Show the form for editing the specified catportfolio.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$catportfolio = Catportfolio::find($id);
	    
	    
		return view('admin.catportfolio.edit', compact('catportfolio'));
	}

	/**
	 * Update the specified catportfolio in storage.
     * @param UpdateCatportfolioRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCatportfolioRequest $request)
	{
		$catportfolio = Catportfolio::findOrFail($id);

        

		$catportfolio->update($request->all());

		return redirect()->route(config('quickadmin.route').'.catportfolio.index');
	}

	/**
	 * Remove the specified catportfolio from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Catportfolio::destroy($id);

		return redirect()->route(config('quickadmin.route').'.catportfolio.index');
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
            Catportfolio::destroy($toDelete);
        } else {
            Catportfolio::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.catportfolio.index');
    }

}
