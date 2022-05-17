<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all() ; 
        return view("listepatients",['patients'=>$patients]) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("addpatient") ; 
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
        $patient = new Patient ; 
        $patient->nom = $request->nom ;  
        $patient->prenom = $request->prenom ;  
        $patient->date_naissance = $request->date_naissance ;  
        $patient->lieu_naissance = $request->lieu_naissance ;  
        $patient->situation_familiale = $request->situation_familiale ;  
        $patient->email = $request->email ;  
        $patient->profession = $request->profession ;  
        $patient->telephone = $request->telephone ;  
        $patient->tel_fixe = $request->tel_fixe ;  
        $patient->adresse = $request->adresse ;  
        $patient->cni = $request->cni ;  
        $patient->id_pays = $request->id_pays ;  
        $patient->id_ville = $request->id_ville ;  
        $patient->save() ; 
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
        $patient = Patient::findOrFail($id) ;  
        $patient->nom = $request->nom ;  
        $patient->prenom = $request->prenom ;  
        $patient->date_naissance = $request->date_naissance ;  
        $patient->lieu_naissance = $request->lieu_naissance ;  
        $patient->situation_familiale = $request->situation_familiale ;  
        $patient->email = $request->email ;  
        $patient->profession = $request->profession ;  
        $patient->telephone = $request->telephone ;  
        $patient->tel_fixe = $request->tel_fixe ;  
        $patient->adresse = $request->adresse ;  
        $patient->cni = $request->cni ;  
        $patient->id_pays = $request->id_pays ;  
        $patient->id_ville = $request->id_ville ;  
        $patient->save() ; 
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
        $patient = Patient::findOrFail($id) ; 
        $patient->delete() ; 
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}