<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Portfolio1;
use App\Http\Requests\CreatePortfolio1Request;
use App\Http\Requests\UpdatePortfolio1Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Catportfolio;


class Portfolio1Controller extends Controller {

	/**
	 * Display a listing of portfolio1
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $portfolio1 = Portfolio1::with("catportfolio")->get();

		return view('admin.portfolio1.index', compact('portfolio1'));
	}

	/**
	 * Show the form for creating a new portfolio1
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $catportfolio = Catportfolio::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.portfolio1.create', compact("catportfolio"));
	}

	/**
	 * Store a newly created portfolio1 in storage.
	 *
     * @param CreatePortfolio1Request|Request $request
	 */
	public function store(CreatePortfolio1Request $request)
	{
	    $request = $this->saveFiles($request);
		Portfolio1::create($request->all());

		return redirect()->route(config('quickadmin.route').'.portfolio1.index');
	}

	/**
	 * Show the form for editing the specified portfolio1.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$portfolio1 = Portfolio1::find($id);
	    $catportfolio = Catportfolio::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.portfolio1.edit', compact('portfolio1', "catportfolio"));
	}

	/**
	 * Update the specified portfolio1 in storage.
     * @param UpdatePortfolio1Request|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePortfolio1Request $request)
	{
		$portfolio1 = Portfolio1::findOrFail($id);

        $request = $this->saveFiles($request);

		$portfolio1->update($request->all());

		return redirect()->route(config('quickadmin.route').'.portfolio1.index');
	}

	/**
	 * Remove the specified portfolio1 from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Portfolio1::destroy($id);

		return redirect()->route(config('quickadmin.route').'.portfolio1.index');
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
            Portfolio1::destroy($toDelete);
        } else {
            Portfolio1::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.portfolio1.index');
    }

}
