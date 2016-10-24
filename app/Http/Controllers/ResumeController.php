<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Work;

use App\Education;

use App\Skillpro;

use App\Skilladd;

use App\Skilllang;

use App\Knowledge;

use App\Hobby;

use App\Experience;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exp = Experience::find(1);
        $hobi = Hobby::All();
        $know = Knowledge::All();
        $skl = Skilllang::All();
        $ska = Skilladd::All();
        $skp = Skillpro::All();
        $edu = Education::All()->sortByDesc("id");
        $work = Work::All()->sortByDesc("id");
        $title = "Resume";

        return view('front-end.resume',compact('work','edu','skp','ska','skl','know','hobi'))->with('title',$title)->with('exp',$exp);
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
