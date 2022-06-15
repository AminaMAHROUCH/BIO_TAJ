<?php

namespace App\Http\Controllers;

use App\Models\Todayp;
use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Consultation;
use App\Models\Produit;
use App\Models\Maladie;
use App\Models\MaladiePatient;
use App\Models\Traitement;
use App\Models\TraitementHistorique;
use App\Models\Vente;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;

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
      $consultationsp= Consultation::where('payed',0)->get();
      $traitement_historiques = TraitementHistorique::get();//id user connecetr
      //
      $traitemnt_total = TraitementHistorique::whereMonth('created_at', '=', Carbon::today()->month)->count();
      return view('dashboard', compact('rendezvous_consultation','consultationsp','traitemnt_total','rendezvous_soins','traitement_historiques', 'today_patients', 'patients'));
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
      $traitements = Traitement::all() ; 
      $traitements_hit = TraitementHistorique::where("patient_id", $patient_id)->paginate(5); 
      $produits_ = Vente::where("patient_id", $patient_id)->get(); 
      $produits = Produit::all() ; 
      $maladiepatients = MaladiePatient::where("patient_id", $patient_id)->get();
      $consultations = Consultation::where("patient_id", $patient_id)->orderBy('id', 'DESC')->get();
      return view('dossier_medical', compact('patient','patients', 'consultations', 'maladies','traitements_hit', 'produits_','maladiepatients', 'traitements','produits'));
    }

    public function add_consult(Request $request){
      $consultation = new Consultation() ; 
      $consultation->remarque = $request->remarque ;  
      $consultation->patient_id = $request->patient_id; 
      $consultation->save() ; 
      return back();
    }

    public function add_maladie(Request $request){

      //order_ need insert
      $mald = new MaladiePatient() ; 
      $mald->maladie_id = $request->maladie_id ;  
      $mald->patient_id = $request->patient; 
      // $mald->order_ = $i; 
      $mald->save() ; 
      
      return back();
    }


    public function add_dossier_medical(Request $request){


      //consultation
      $consult = new Consultation();
      $consult->remarque = $request->consultation_remarque;
      $consult->prix = $request->prix;
      $consult->date = date('Y-m-d H:i:s');
      $consult->patient_id = $request->patient_id;
      $consult->patient_id = $request->maladie_id;
      $consult->save();

      //traitmentHistorique
      
      $data = implode(',' , $request->soins);
      $myArray = explode(',', $data);
      for($i=0;$i<count($myArray); $i++){
        $traitement_h = new TraitementHistorique();
        $traitement_h->patient_id = $request->patient_id;
        $traitement_h->traitement_id = $myArray[$i];
        $traitement_h->save();
      }

      // produits 
      $datap = implode(',' , $request->produits);
      $myArrayp = explode(',', $datap);
      for($i=0; $i<count($myArrayp); $i++){
        $produit = new Vente();
        $produit->patient_id = $request->patient_id;
        $produit->produit_id = $myArrayp[$i];
        $produit->date_vente = date('Y-m-d H:i:s');;
        $produit->save();
      }

      //maladie
      $maladie = MaladiePatient::where('id', $request->maladie_id)->where('order_', $request->order_)->first();
      $maladie->remarque= $request->maladie_remarque;
      $maladie->save();

      return back();
    }

    public function consult_payer(Request $request){
      $consult = Consultation::where('id', $request->consult_id)->first();
      $consult->payed= 1;
      $consult->save();
      return response()->json(201);
    }
    public function traitement_payer(Request $request, $id){
      $consult = TraitementHistorique::where('id', $id)->first();
      $consult->prix= $request->prix_;
      $consult->isEffected= 1;
      $consult->user_id= Auth::user()->id;
      $consult->remarque= $request->remarque;
      $consult->save();
      return back();
    }
  
}