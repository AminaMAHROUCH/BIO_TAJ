<?php

namespace App\Http\Controllers;

use App\Models\Traitement;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $traitements = Traitement::all() ; 
        return view("listetraitements",['traitements'=>$traitements]) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("addtraitement") ; 
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
        $traitement = new Traitement() ; 
        $traitement->nom = $request->nom ;   
        $traitement->prix = $request->prix ;
        $traitement->description = $request->description ;   
        $traitement->save() ; 
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
        $traitement = Traitement::findOrFail($id) ;  
        $traitement->nom = $request->nom ; 
        $traitement->prix = $request->prix ; 
        $traitement->description = $request->description ;  
        $traitement->save() ; 
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
        $traitement = Traitement::findOrFail($id) ; 
        $traitement->delete() ; 
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}