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
use App\Models\Visite;
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
      $role= Auth::user()->roles('titre')->first();
      // dd($role->titre);
      if($role->titre == 'magasinier'){
        return redirect('/vente');
      }else{
        $rendezvous_soins = RendezVous::whereDate('date', '=',date('Y-m-d'))->where("type","soins")->get();
        $rendezvous_consultation = RendezVous::whereDate('date', '=',date('Y-m-d'))->where('type',"consultation")->get();
        $today_patients = Todayp::whereDate('created_at', '=',date('Y-m-d'))->get();
        $patients = Patient::get();
        $consultationsp= Consultation::where('payed',0)->get();
        $traitement_historiques = TraitementHistorique::whereDate('created_at', '=',date('Y-m-d'))->get();//id user connecetr
        //
        $traitemnt_total = TraitementHistorique::whereMonth('created_at', '=', Carbon::today()->month)->count();
        return view('dashboard', compact('rendezvous_consultation','consultationsp','traitemnt_total','rendezvous_soins','traitement_historiques', 'today_patients', 'patients'));
      }
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
      $visite = Visite::where("id_patient", $patient_id)->first();
      return view('dossier_medical', compact('patient','patients','visite', 'consultations', 'maladies','traitements_hit', 'produits_','maladiepatients', 'traitements','produits'));
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
      $consult->maladie_id = $request->maladie_id;
      $consult->payed = 0;
      $consult->save();

      //traitmentHistorique
      if($request->soins){
          $data = implode(',' , $request->soins);
          $myArray = explode(',', $data);
          for($i=0;$i<count($myArray); $i++){
            $traitement_h = new TraitementHistorique();
            $traitement_h->patient_id = $request->patient_id;
            $traitement_h->traitement_id = $myArray[$i];
            $traitement_h->maladie_id = $request->maladie_id;
            $traitement_h->save();
          }
      }

      // produits 
      if($request->produits){
          $datap = implode(',' , $request->produits);
          $myArrayp = explode(',', $datap);
          for($i=0; $i<count($myArrayp); $i++){
            $produit = new Vente();
            $produit->patient_id = $request->patient_id;
            $produit->produit_id = $myArrayp[$i];
            $produit->id_maladie = $request->maladie_id;
            $produit->date_vente = date('Y-m-d H:i:s');
            $produit->save();
          }
      }

      //maladie
      $maladie = MaladiePatient::where('id', $request->maladie)->where('order_', $request->order_)->first();
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

    public function traitement_payerr(Request $request){
      $consult = TraitementHistorique::where('id', $request->tr_id)->first();
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

    public function addvisite(Request $req){

      $visite = new Visite();
      $visite->date_visite = date('Y-m-d');
      $visite->poid = $req->poid;
      $visite->tension = $req->tension;
      $visite->battement_coeur = $req->battement_coeur;
      $visite->niveau_diabete = $req->niveau_diabete;
      $visite->medicaments_utilises = $req->medicaments_utilises;
      $visite->sympthomes = $req->sympthomes;
      $visite->maladies_actuelles = $req->maladies_actuelles;
      $visite->remede = $req->remede;
      $visite->id_passion = $req->id_passion;
      $visite->save();
      return back();
    }
    public function updateVisite(Request $req, $id){

        $visite = Visite::findOrFail($id);
        // $visite->date_visite = $req->date_visite;
        $visite->poid = $req->poid;
        $visite->tension = $req->tension;
        $visite->battement_coeur = $req->battement_coeur;
        $visite->niveau_diabete = $req->niveau_diabete;
        $visite->medicaments_utilises = $req->medicaments_utilises;
        $visite->sympthomes = $req->sympthomes;
        $visite->maladies_actuelles = $req->maladies_actuelles;
        $visite->remede = $req->remede;
        $visite->id_passion = $req->id_passion;
        $visite->save();
        return back();
    }

    public function details_dossier($maladie_id){

      $consultation = Consultation::where('maladie_id', $maladie_id)->latest()->first();
      $maladie = MaladiePatient::where('maladie_id', $maladie_id)->latest()->first();
      $traitement_historiques = TraitementHistorique::where('maladie_id', $maladie_id)->get();
      $produits = Vente::where('id_maladie', $maladie_id)->get();
      return view('details_dossier', compact('consultation','maladie','traitement_historiques','produits'));
    }

    public function addToTrh(Request $req){
      $rdv = RendezVous::findOrFail($req->rdvid);
      // dd($rdv);
      // $data = implode(',' , $rdv->traitement);
      $myArray = explode(',', $rdv->traitement);
      // dd($myArray);
      for($i=0;$i<count($myArray)-1; $i++){
        $traitement_h = new TraitementHistorique();
        $traitement_h->patient_id = $rdv->id_patient;
        $traitement_h->traitement_id = $myArray[$i];
        $traitement_h->save();
        
        //
        $rdv->present = 1;
        $rdv->save();
        return back();
      }

    }
  
}