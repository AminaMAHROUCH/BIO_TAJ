<?php

namespace App\Http\Controllers;

use App\Models\Todayp;
use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Consultation;
use App\Models\Maladie;
use App\Models\MaladiePatient;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rendezvous_soins = RendezVous::whereDate('date', '=',date('Y-m-d'))->where("type","soins")->get();
      $rendezvous_consultation = RendezVous::where('type',"consultation")->get();
      $today_patients = Todayp::whereDate('created_at', '=',date('Y-m-d'))->get();
      $patients = Patient::get();
      $traitement_historiques = DB::table('traitement_historiques')->get();//id user connecetr
      return view('dashboard', compact('rendezvous_consultation','rendezvous_soins','traitement_historiques', 'today_patients', 'patients'));
    }

    public function storeToday(Request $request){

      $today = new Todayp();
      $today->patient_id = $request->input('patient');
      $today->isFirstTime= $request->input('firstTime');
      $today->save();
      return back();

    }
    public function dossier_medical($patient_id){
      $patient = Patient::where("id", $patient_id)->first();
      $patients = Patient::all() ; 
      $maladies = Maladie::all() ; 
      $maladiepatients = MaladiePatient::where("patient_id", $patient_id)->get();
      $consultations = Consultation::where("patient_id", $patient_id)->orderBy('id', 'DESC')->get();
      return view('dossier_medical', compact('patient','patients', 'consultations', 'maladies', 'maladiepatients'));
    }

    public function add_consult(Request $request){
      $consultation = new Consultation() ; 
      $consultation->remarque = $request->remarque ;  
      $consultation->patient_id = $request->patient_id; 
      $consultation->save() ; 
      return back();
    }

    public function add_maladie(Request $request){
      $mald = new MaladiePatient() ; 
      $mald->maladie_id = $request->maladie_id ;  
      $mald->patient_id = $request->patient; 
      $mald->save() ; 
      return back();
    }

  
}