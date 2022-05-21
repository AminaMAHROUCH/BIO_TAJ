<?php

namespace App\Http\Controllers;

use App\Models\Todayp;
use App\Models\RendezVous;
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
      $today_patients = Todayp::where('created_at',date('Y-m-d'))->get();
      return view('dashboard', compact('rendezvous', 'today_patients'));
    }

  
}