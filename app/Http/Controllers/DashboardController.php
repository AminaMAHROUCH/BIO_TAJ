<?php

namespace App\Http\Controllers;

use App\Models\Todayp;
use App\Models\RendezVous;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rendezvous = RendezVous::where('date',date('Y-m-d'))->get();
      $today_patients = Todayp::get();
      $patients = Patient::get();
      return view('dashboard', compact('rendezvous', 'today_patients', 'patients'));
    }

    public function storeToday(Request $request){

      $today = new Todayp();
      $today->patient_id = $request->input('patient');
      $today->isFirstTime= $request->input('firstTime');
      $today->save();
      return back();

    }

  
}