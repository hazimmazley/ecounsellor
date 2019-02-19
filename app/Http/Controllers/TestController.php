<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test.index');
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
        $opt=$request->get('optradio');
        $opt1=$request->get('optradio1');
        $opt2=$request->get('optradio2');
        $opt3=$request->get('optradio3');
        $opt4=$request->get('optradio4');
        $opt5=$request->get('optradio5');
        $opt6=$request->get('optradio6');
        $opt7=$request->get('optradio7');
        $opt8=$request->get('optradio8');
        $opt9=$request->get('optradio9');

        $sum=$opt+$opt1+$opt2+$opt3+$opt4+$opt5+$opt6+$opt7+$opt8+$opt9;

        
        return view('test.show',compact('sum'));
        

     

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
