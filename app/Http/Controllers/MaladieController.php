<?php

namespace App\Http\Controllers;

use App\Models\Maladie;
use App\Models\Traitement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $traitemetns = Traitement::all() ;   
        return view("listemaladies",['maladies'=>$maladies,'traitements'=>$traitemetns]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $traitemetns = Traitement::all() ; 
        return view("addmaladie",['traitements'=>$traitemetns]) ; 
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
        $maladie->soin = implode(",",$request->soin) ;   
        $maladie->maladie = $request->maladie ; 
        $maladie->description = $request->description ;  
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
        $maladie->soin = implode(",",$request->soin) ;  
        $maladie->maladie = $request->maladie ; 
        $maladie->description = $request->description ; 
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