<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consultations =  DB::table('consultations') 
                    ->join('patients', 'patients.id', '=', 'consultations.patient_id')
                    ->select("*")
                    ->get(); 
            dd($consultations);
        $patients = Patient::all() ; 
        return view("listeconsultations",['consultations'=>$consultations,'patients'=>$patients]) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patients = Patient::all() ; 
        return view("addconsultation" , ['patients'=>$patients]);  
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
        $consultation = new Consultation() ;
        $consultation->remarque = $request->remarque ; 
        $patient_id = Patient::where('id','=',$request->nom_patient)->first()->id;
        $consultation->patient_id = $patient_id ; 
        $consultation->save() ; 
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
        $consultation = Consultation::findOrFail($id) ; 
        $consultation->remarque = $request->remarque ;  
        $consultation->patient_id = Patient::find($request->nom_patient)->id ; 
        $consultation->save() ; 
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
        $consultation = Consultation::findOrFail($id) ; 
        $consultation->delete() ; 
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}