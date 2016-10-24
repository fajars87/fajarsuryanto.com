<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Knowledge;
use App\Http\Requests\CreateKnowledgeRequest;
use App\Http\Requests\UpdateKnowledgeRequest;
use Illuminate\Http\Request;

use App\User;


class KnowledgeController extends Controller {

	/**
	 * Display a listing of knowledge
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $knowledge = Knowledge::with("user")->get();

		return view('admin.knowledge.index', compact('knowledge'));
	}

	/**
	 * Show the form for creating a new knowledge
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
	    return view('admin.knowledge.create', compact("user"));
	}

	/**
	 * Store a newly created knowledge in storage.
	 *
     * @param CreateKnowledgeRequest|Request $request
	 */
	public function store(CreateKnowledgeRequest $request)
	{
	    
		Knowledge::create($request->all());

		return redirect()->route(config('quickadmin.route').'.knowledge.index');
	}

	/**
	 * Show the form for editing the specified knowledge.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$knowledge = Knowledge::find($id);
	    $user = User::pluck("id", "id")->prepend('Please select', null);

	    
		return view('admin.knowledge.edit', compact('knowledge', "user"));
	}

	/**
	 * Update the specified knowledge in storage.
     * @param UpdateKnowledgeRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateKnowledgeRequest $request)
	{
		$knowledge = Knowledge::findOrFail($id);

        

		$knowledge->update($request->all());

		return redirect()->route(config('quickadmin.route').'.knowledge.index');
	}

	/**
	 * Remove the specified knowledge from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Knowledge::destroy($id);

		return redirect()->route(config('quickadmin.route').'.knowledge.index');
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
            Knowledge::destroy($toDelete);
        } else {
            Knowledge::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.knowledge.index');
    }

}
