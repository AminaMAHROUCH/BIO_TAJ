<?php

namespace App\Http\Controllers;

use App\Models\Maladie;
use Illuminate\Http\Request;

class MaladieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maladies = Maladie::all() ; 
        return view("listemaladies",['maladies'=>$maladies]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("addmaladie") ; 
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
        $maladie = new Maladie() ; 
        $maladie->soin = $request->soin ; 
        $maladie->maladie = $request->soin ; 
        $maladie->description = $request->soin ; 
        $maladie->save() ; 
        return redirect()->back()->with('message', 'تمت الاضافة بنجاح');
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
        $maladie = Maladie::findOrFail($id) ; 
        $maladie->soin = $request->soin ; 
        $maladie->maladie = $request->soin ; 
        $maladie->description = $request->soin ; 
        $maladie->save() ; 
        return redirect()->back()->with('message', 'تمت التعديل بنجاح');
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
        $maladie = Maladie::findOrFail($id) ; 
        $maladie->delete() ; 
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}