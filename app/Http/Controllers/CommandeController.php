<?php

namespace App\Http\Controllers;

use App\Type;
use App\Commande;
use App\Commune;
use App\Wilaya;
use App\Livreur;
use App\Produit;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CommandeController extends Controller
{


    
    public function index()
    {
        $commandes = DB::table('commandes')->orderBy('id', 'DESC')->paginate(5);
        return view('commandes.index',compact('commandes'));
    }


    public function show($id_commande){
        $commande =  Commande::find($id_commande);
        return view('commandes.view',compact('commande'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livreurs =Livreur::all();
        $communes = Commune::all();
        $wilayas =Wilaya::all();
        $produits = Produit::all();
        $types = Type::all();
        
        return view('commandes.create',compact('wilayas','communes','produits','livreurs','types'));
    }

    public function search(Request $request)
    {
        $query = Commande::query();
        if ($request['id_commande'] != null) {
          $query = $query->where('id', $request['id_commande']);
        }    
        if ($request['telephone'] != null) {
            $query = $query->where('telephone', $request['telephone']);
        }
        if ($request['wilaya'] != null) {
            $query = $query->where('wilaya', $request['wilaya']);
        }
        if ($request['commune'] != null) {
            $query = $query->where('commune', $request['commune']);
        }
        $results = $query->get();
        return view('commandes.results',compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode($request->get('produit'), true);
        $commande = new Commande([
            'produit'=>$request->get('produit'),
            'quantite'=>$request->get('quantite'),
            'prix'=>$request->get('prix'),
            'prix_livraison'=>$request->get('prix_livraison'),
            'command_express'=>$request->get('comand_express'),
            'nom_client'=>$request->get('nom_client'),
            'telephone'=>$request->get('telephone'),
            'wilaya'=>$request->get('wilaya'),
            'commune'=>$request->get('commune'),
            'note'=>$request->get('note'),
            'adress'=>$request->get('adress') ?? '',
            'state'=>'en attente',
            'livreur'=>$request->get('livreur'),
            'remise'=>$request->get('remise'),
            
        ]);
        $stack = array();
        if(request('images')){
            foreach($request->file('images') as $image){
                $image = $image->store(
                    'commandes/images',
                    'public'
                );
                array_push($stack,$image);
            }    
        }
        $stack = json_encode($stack);
        $commande->images = $stack; 
        $commande->save();
        return redirect()->route('commande.index')->with('success', 'commande inséré avec succés inserted successfuly ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function prendre($id_commande)
    {
        if(Auth::guard('livreur')->user()){
            $livreur = Auth::guard('livreur')->user();
            //$livreurs = Livreur::all();
            $commande = Commande::find($id_commande);
            $commande->state = 'accepte';
            $commande->accepte = Carbon::now();
            $commande->livreur_id = $livreur->id;
            $commande->save();
            return redirect()->route('livreur.index')->with('success', 'la commande vous a été accordée ');           
            }        
    }

    public function consulter($id_commande)
    {
            $livreur = Auth::guard('livreur')->user();
            $commande = Commande::find($id_commande);
            return view('commandes.consulter',compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit($id_commande)
    {
        $livreurs =Livreur::all();
        $communes = Commune::all();
        $wilayas =Wilaya::all();
        $produits = Produit::all();
        $types = Type::all();
        $commande = Commande::find($id_commande);
        return view('commandes.edit',compact('commande','wilayas','communes','produits','livreurs','types'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $commande)
    {
        $data = json_decode($request->get('produit'), true);
        
        $commande = new Commande([
            'produit'=>$request->get('produit'),
            'quantite'=>$request->get('quantite'),
            'prix'=>$request->get('prix'),
            'prix_livraison'=>$request->get('prix_livraison'),
            'command_express'=>$request->get('commande_express'),
            'nom_client'=>$request->get('nom_client'),
            'telephone'=>$request->get('telephone'),
            'wilaya'=>$request->get('wilaya'),
            'commune'=>$request->get('commune'),
            'note'=>$request->get('note'),
            'adress'=>$request->get('adress') ?? '',
            'state'=>'en attente',
            'livreur'=>$request->get('livreur'),
            'remise'=>$request->get('remise'),
            
        ]);
        $stack = array();
        if(request('images')){
            foreach($request->file('images') as $image){
                $image = $image->store(
                    'commandes/images',
                    'public'
                );
                array_push($stack,$image);
            }    
        }
        $stack = json_encode($stack);
        $commande->images = $stack; 
        $commande->save();
        return redirect()->route('commande.index')->with('success', 'commande inséré avec succés inserted successfuly ');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_commande)
    {
            $c = Commande::find($id_commande);
            $c->delete();
            return redirect()->route('commande.index')->with('success', 'la commande a été supprimé ');     
    }

    public function relancer($id_commande)
    {
            $c = Commande::find($id_commande);
            $c->state = 'en attente';
            $c->save();
            return redirect()->route('livreur.index')->with('success', 'la commande vous a été accordée ');           
    }
    public function updateState(Request $request)
    {
            $c = Commande::find($request['commande']);
            $c->state = $request['state'];
                switch ($request['state']) {
                    case 'en attente':
                        $c->en_attente = Carbon::now();
                        break;
                    case 'accepte':
                        $c->accepte = Carbon::now();
                        break;
                    case 'expedier':
                        $c->expedier = Carbon::now();
                        break;
                    case 'en attente paiement':
                        $c->en_attente_paiement = Carbon::now();
                        break;
                    case 'livree':
                        $c->livree = Carbon::now();
                        break;
                    }
            $c->state = $request['state'];
            
            $c->save();
            return redirect()->route('commande.index')->with('success', 'la commande a été modifié ');     
    }
}
