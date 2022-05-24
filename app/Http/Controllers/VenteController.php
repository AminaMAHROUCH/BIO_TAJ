<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Patient;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $clients =  DB::select('select * from clients c , ventes v , produits p  where c.id = v.client_id and v.produit_id = p.id or c.id = v.nvclient_id  ');
        $patients =  DB::select('select * from patients p , ventes v , produits pr where p.id = v.patient_id and v.produit_id = pr.id') ; 
        return view("listeventes",['clients'=>$clients,'patients'=>$patients]) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $produits = Produit::all() ; 
        $patients = Patient::all() ;
        $clients = Client::all() ;  
        return view("addvente",['produits'=>$produits,'patients'=>$patients, 'clients'=>$clients]) ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // si l'ajout est echouée , je dois retourner les anciennes valeurs et vidé juste le cni 
        $vente = new Vente() ; 
        $vente->quantite_v = $request->quantite ; 
        // soustraire cette quantite de la quantite totale + vérifier si la quantité dans le stock
        $vente->prix_total = $request->quantite * $request->prix ; 
        $vente->avance = $request->avance ; 
        $vente->reste = $vente->prix_total - $vente->avance ;  
        $vente->produit_id = $request->id_produit  ; 
        if($request->patient_id != null)
            $vente->patient_id = $request->patient_id ;
        else {
            $vente->patient_id = -1 ;
            $vente->nvclient_id = -1 ;  
        }
        if($request->client_id != null)
            $vente->client_id = $request->client_id ; 
        else {
            $vente->client_id = -1 ; 
            $vente->nvclient_id = -1 ; 
        }
        
        if($vente->patient_id == -1 &&  $vente->client_id == -1)
        {
            $client = new Client() ; 
            $client->fullname = $request->fullname ; 
            $client->telephone = $request->telephone ; 
            $client->adresse = $request->adresse ; 
            $client->save() ; 
            $clt =  DB::select('select * from clients where fullname like ? and telephone like ? and adresse like ?', [$request->fullname,$request->telephone,$request->adresse]) ; 
            $vente->nvclient_id = $clt[0]->id ; 
        } 
        $vente->save() ; 
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
    }


    public function getProduitData(Request $request)
    {
        $produit = Produit::where('id','=',$request->prd)->first() ; 
        return response()->json($produit);
    }
}