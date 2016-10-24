<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

Use App\Bcat;

Use App\Blog1;

Use App\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog = Blog1::with("bcat")->with("user")->get()->sortByDesc("id");
        $blogsb = Blog1::with("bcat")->with("user")->get()->sortByDesc("id");
        $bcat = Bcat::ALL();
        $title = "Blog";

        return view('front-end.blog',compact('bcat','blog','blogsb'))->with('title',$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog1::with("bcat")->with("user")->get()->sortByDesc("id");
        $bcat = Bcat::ALL();
        $blog1 = Blog1::with("bcat")->with("user")->find($id);
        // return to 404 page
        $title = $blog1->title;
        if(!$blog1){
        abort(404);
        }
        return view('front-end.post-img',compact('bcat','blog'))->with('blog1',$blog1)->with('title',$title);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
