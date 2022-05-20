<?php

namespace App\Http\Controllers;

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
        $ventes =  DB::table('ventes')
                    ->join('produits', 'produits.id', '=', 'ventes.produit_id')
                    ->join('patients', 'patients.id', '=', 'ventes.patient_id')
                    ->select("*")
                    ->get();  
        //$ventes = Vente::all() ; 
        return view("listeventes",['ventes'=>$ventes]) ; 
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
        return view("addvente",['produits'=>$produits]) ; 
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
        $vente->produit_id = $request->nom_produit ; 
        if(Patient::where('cni',$request->cni )->first()) {
            $vente->patient_id = Patient::where('cni',$request->cni )->first()->id ;  
            $vente->save() ; 
            return redirect()->back()->with('message','تمت الاضافة بنجاح');
        }
        else 
            return redirect()->back()->with('error', 'المرجو التأكد من ر.ب.و الشاري أو من تواجده من لائحة المرضى' )->withInput(); 
        
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
        $produit = Produit::where('id','=',$request->prd)->first ; 
        return response()->json($produit);
    }
}