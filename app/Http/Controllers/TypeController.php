<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Commune;
use App\Type;
use App\Wilaya;
use Response;
use Illuminate\Http\Request;

class TypeController extends Controller
{
 
    public function index()
    {
        $types = Type::all();
        return view('types.index',compact('types'));
    }

    public function storeAjax(Request $request)
    {
        if($request->ajax()){
            $array = $request['data'];        
            $data=  array();
            parse_str($array, $data);        
            $type = new Type([
                'label' => $data['type'],
                'temps' => $data['temps'],
                'commission' => $data['commission'],
                'prix' => $data['prix'],
            ]);
            $type->save();    
            $response = array(
                'type' => $data,
                'msg' => 'type livraison ajouté',
            );
        
            return Response::json($response);  // <<<<<<<<< see this line    
        }
    }
    public function destroy($id_type)
    {
        $type = Type::find($id_type);
        $type->delete();
        return redirect()->route('type.index')
            ->with('success', 'supprimé avec succé !');
    }

}
