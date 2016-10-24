<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Blog;

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
        $blogs = Blog::all();

        return view('blog.index',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
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
        $this->validate($request,[
        'title'=> 'required',
        'description' => 'required',
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        // save all data
        $blog->save();
        //redirect page after save data
        return redirect('blog')->with('message','data hasbeen updated!');
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
        $blog = Blog::find($id);
        // return to 404 page
        if(!$blog){
        abort(404);
        }
        return view('blog.detail')->with('blog',$blog);
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
        $blog = Blog::find($id);
        // return to 404 page
        if(!$blog){
        abort(404);
        }
        // display the article to single page
        return view('blog.edit')->with('blog',$blog);
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
        $this->validate($request,[
        'title'=> 'required','description' => 'required',
        ]);
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        // save all data
        $blog->save();
        //redirect page after save data
        return redirect('blog')->with('message','data hasbeen edited!');
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
