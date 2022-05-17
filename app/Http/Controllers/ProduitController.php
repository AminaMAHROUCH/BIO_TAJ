<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produits = Produit::all() ; 
        return view("listeproduits",['produits'=>$produits]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("addproduit") ; 
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
        $produit = new Produit() ; 
        $produit->titre = $request->titre ; 
        $produit->description = $request->description ; 
        $produit->quantite = $request->quantite ; 
        $produit->prix_vente = $request->prix_vente ; 
        $produit->prix_minimal = $request->prix_minimal ; 
        $produit->type = $request->type ; 
        $produit->save() ; 
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
        $produit = Produit::findOrFail($id) ; 
        $produit->titre = $request->titre ; 
        $produit->description = $request->description ; 
        $produit->quantite = $request->quantite ; 
        $produit->prix_vente = $request->prix_vente ; 
        $produit->prix_minimal = $request->prix_minimal ; 
        $produit->type = $request->type ;
        $produit->save() ; 
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
        $produit = Produit::findOrFail($id) ; 
        $produit->delete() ; 
        return redirect()->back()->with('message', 'تمت العملية بنجاح');
    }
}