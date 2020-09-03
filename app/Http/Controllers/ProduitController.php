<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Wilaya;
use App\Produit;
use App\Fournisseur;
use App\Http\Requests\StoreProduit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produits.create');//,compact('fournisseurs','communes','wilayas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduit $request)
    {
        $validated = $request->validated();
        $produit = new Produit();
        $produit->nom= $request->get('nom');
        $produit->prix_vente= $request->get('prix_vente');
        $produit->quantite= $request->get('quantite');
        $produit->categorie= $request->get('categorie');
        $produit->prix_fournisseur= $request->get('prix_fournisseur');
        $produit->prix_livraison= $request->get('prix_livraison');
        $produit->description = $request->get('description');
        $produit->fournisseur = $request->get('fournisseur');
        $produit->budget = $request->get('budget');
        $produit->prix_freelance = $request->get('prix_freelance');
        $produit->prix_clicntic = $request->get('prix_clicntic');
        $stack = array();
        if(request('image')){
            foreach($request->file('image') as $image){
                $image = $image->store(
                    'produits/images',
                    'public'
                );
                array_push($stack,$image);
            }    
        }

        $stack = json_encode($stack);
        $produit->image = $stack; 
        $produit->save();
        return redirect()->route('produit.index')->with('success', 'Produit inséré avec succés ');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id_produit)
    {
        $produit = Produit::find($id_produit);

        return view('produits.view',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produit)
    {
        $produit = Produit::find($id_produit);
        return view('produits.edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduit $request, Produit $produit)
    {
        $produit = Produit::find($request['id']);
        $produit->nom= $request->get('nom');
        $produit->prix_vente= $request->get('prix_vente');
        $produit->quantite= $request->get('quantite');
        $produit->categorie= $request->get('categorie');
        $produit->prix_fournisseur= $request->get('prix_fournisseur');
        $produit->prix_livraison= $request->get('prix_livraison');
        $produit->description = $request->get('description');

        if ($request->hasFile('image')) {
            
            $produit->image = $request->file('image')->store(
                'produits/images',
                'public'
            );
        }
        $produit->save();
        $produits = Produit::all();
        return redirect()->route('produit.index')->with('success', 'Produit modifé avec succés ');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produit)
    {
        $produit = Produit::find($id_produit);
        $produit->delete();
        return redirect()->route('produit.index')->with('success', 'le Produit a été supprimé ');        
    }
}
