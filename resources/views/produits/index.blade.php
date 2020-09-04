@extends('layouts.admin')



@section('content')

                    <div class="container-fluid">
                             <div class="card mb-4">
                                <div class="card-header card-header-primary">
                                <h4 class="card-title ">Table des produits</h4>
                                </div>
                                <div class="card-header">
                                    <a class="btn btn-primary" href="{{route('produit.create')}}">Ajouter produit</a>
                                </div>


                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                            <tr>

                                                <th>ID produit</th>

                                                <th>Nom produit </th>

                                                <th>catégorie </th>
                                                <th>quantite </th>

                                                <th>prix vente </th>

                                                <th>prix achat </th>

                                                <th>actions</th>

                                                

                                            </tr>

                                        </thead>

                                        <tbody>

                                            @foreach($produits as $produit)                                            

                                            <tr>

                                                <td>{{$produit->id ?? ''}}</td>

                                                <td>{{$produit->nom ?? ''}}</td>

                                                <td>{{$produit->categorie ?? ''}}</td>

                                                <td>{{$produit->quantite ?? ''}}</td>
                                                <td>{{$produit->prix_vente ?? ''}}</td>

                                                <td>{{$produit->prix_achat ?? ''}}</td>

                                                <td >

                                                    <div class="table-action">  

                                                    <a  

                                                    href="{{route('produit.destroy',['id_produit'=>$produit->id])}}"

                                                    onclick="return confirm('etes vous sure  ?')"

                                                    class="text-white btn btn-danger">
 Supprimer 

                                                    </a>

                                                    <a 

                                                    href="{{route('produit.edit',['id_produit'=>$produit->id])}}"

                                                     class="text-white btn btn-info">
 Modifer 

                                                    </a>

                                                    <a 

                                                    href="{{route('produit.show',['id_produit'=>$produit->id])}}"

                                                     class="text-white btn btn-primary">
 Consulter 

                                                    </a>

                                                    </div>

                                                </td>



                                            </tr>

           

                                            @endforeach





                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>





@endsection

