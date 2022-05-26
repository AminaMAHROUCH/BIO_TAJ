<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rendezvouss = RendezVous::all() ; 
        $patients = Patient::all() ; 
        return view("listerendezvous",['rendezvouss'=>$rendezvouss, 'patients'=>$patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("addclient") ; 
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
        $rendezvous = new RendezVous() ; 
        $rendezvous->date = $request->input('date'); 
        $rendezvous->time = $request->input('time'); 
        $rendezvous->nom_malade = $request->input('nom_malade'); 
        $rendezvous->description = $request->input('description'); 
        $rendezvous->isFirstTime = $request->input('isFirstTime'); 
        $rendezvous->id_patient = $request->input('id_patient'); 
        $rendezvous->type = $request->input('type'); 
        $rendezvous->save() ; 
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
        $rendezvous = RendezVous::findOrFail($id) ; 
        $rendezvous->date = $request->input('date'); 
        $rendezvous->time = $request->input('time'); 
        $rendezvous->nom_malade = $request->input('nom_malade'); 
        $rendezvous->description = $request->input('description'); 
        $rendezvous->isFirstTime = $request->input('isFirstTime'); 
        $rendezvous->id_patient = $request->input('id_patient'); 
        $rendezvous->type = $request->input('type'); 
        $rendezvous->save() ; 
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
        $client = RendezVous::findOrFail($id) ; 
        $client->delete() ; 
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}