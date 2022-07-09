<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Todayp;
use App\Models\Traitement;
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
        // dd($rendezvouss->patient());
        $patients = Patient::paginate() ; 
        return view("listerendezvous",['rendezvouss'=>$rendezvouss, 'patients'=>$patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::paginate();
        $traitements = Traitement::paginate();
        return view("addrendez_vous", compact('patients', 'traitements')); 
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
        $rendezvous->isFirstTime = $request->input('isFirstTime') ? 1 : 0; 
        $rendezvous->id_patient = $request->input('id_patient'); 
        $rendezvous->type = $request->input('type'); 
        if($request->input('type') == 'soins'){
            $tr = $request->input('traitement', []);
            $test = '';
            for ($i=0; $i <count($tr) ; $i++) { 
                // dd($tr[$i]);
                $test .= $tr[$i]. ','; 
            }
            $rendezvous->traitement = $test;
            
        }else{
            $rendezvous->traitement = '';
        }
        $rendezvous->present = 0;
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

    public function add(Request $request)
    {
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
        return response()->json(['success'=>'Data is successfully added']);
    }

    public function add_today(Request $request){
        $idrdv= $request->rend_id;
        $rendezvou = RendezVous::where('id_patient', $idrdv)->first();
        $rendezvou->present = 1;
        $patient= Patient::where('id', $idrdv)->first();
        
        $today = new Todayp();
        $today->patient_id = $idrdv;
        $today->isFirstTime= $rendezvou->isFirstTime;
        $today->save();
        $rendezvou->save();
        return back();
    }
}