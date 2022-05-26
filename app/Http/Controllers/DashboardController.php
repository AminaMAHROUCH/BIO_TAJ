<?php

namespace App\Http\Controllers;

use App\Models\Todayp;
use App\Models\RendezVous;
use App\Models\Patient;
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
      $rendezvous_consultation = RendezVous::whereDate('date', '=',date('Y-m-d'))->where('type',"consultation")->get();
      $today_patients = Todayp::get();
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

  
}