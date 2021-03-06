<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Commune;
use App\Http\Requests\StoreLivreur;
use App\Livreur;
use App\Wilaya;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Console\Command;

class LivreurController extends Controller
{
    public function indexAjax()
    {
        if($request->ajax()){
            $livreurs = Livreur::all();    
            $response = array(
                'livreurs' => $livreurs,
                'msg' => 'changement de la liste des livreurs',
            );
            return Response::json($response);  // <<<<<<<<< see this line    
        }
    }


    public function index()
    {
        $communes = Commune::all();
        $wilayas = Wilaya::all();
        $livreurs = Livreur::all();
        return view('livreurs.index',compact('livreurs','communes','wilayas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = Commune::all();
        $wilayas = Wilaya::all();
        return view('livreur.create',compact('wilayas','communes'));
    }

    public function maList()
    {
        if(Auth::guard('livreur')->user()){
            $livreur = Auth::guard('livreur')->user();
            $commandes = Commande::where(['livreur_id'=>$livreur->id,'state'=>'accepte'])->get(); 
            return view('livreurs.mes-livraisons',compact('commandes'));                
        }else{
            return redirect()->route('login');//->with('success', 'pub changé avec succés ');                   
        }

}
    public function store(Request $request)
    {
        $livreur = new Livreur();
        $livreur->name= $request->get('nom');
        $livreur->prenom= $request->get('prenom');
        $livreur->email= $request->get('email');
        $livreur->telephone= $request->get('telephone');
        $livreur->adress= $request->get('adress');
        $livreur->wilaya_id = $request->get('wilaya_id');
        $livreur->commune_id = $request->get('commune_id');

        $livreur->save();
        return redirect()->route('livreur.index')->with('success', 'livreur inséré avec succés ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_livreur)
    {
            $c = Livreur::find($id_livreur);
            $c->delete();
            return redirect()->route('livreur.index')->with('success', 'le livreur a été supprimé ');     
    }

    public function changeState($id_livreur)
    {
        $livreur = Livreur::find($id_livreur);
        $livreur->state = !$livreur->state;
        $livreur->save();
        return redirect()->back()->with(['success' => 'désactivé']);
    }


}
