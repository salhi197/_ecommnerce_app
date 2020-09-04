@extends('layouts.admin')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">

                                    <div class="card-header"><h3 class="font-weight-light my-4">modifier produit :  </h3></div>

                                    <div class="card-body">

                                        <form method="post" action="{{route('produit.update')}}">

                                        @csrf

                                            <div class="form-row">

                                                    <div class="form-group">

                                                        <input type="hidden" value="{{ $produit->id ?? '' }}" name="id"  class="form-control"/>

                                                    </div>



                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputFirstName">nom de produit: </label>

                                                        <input type="text" value="{{ $produit->nom ?? '' }}" name="nom"  class="form-control"/>

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">catégorie de produit :</label>

                                                        

                                                        <select class="form-control" name="categorie">

                                                                <option value="{{$produit->categorie ?? ''}}" selected> {{$produit->categorie ?? ''}} </option>                    

                                                                <option value="general" selected> général </option>                    

                                                        </select>

                                                        <i class="fa fa-plus">ajouter</i>

                                                    </div>

                                                </div>


                                            </div>

                                            <div class="form-row">

                                            <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" >quantite  acteuelle :  :</label>

                                                        <input  class="form-control py-4" value="{{ $produit->quantite ?? ''  }}" name="quantite" id="email" type="number" placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix initiale : </label>

                                                        <input  class="form-control py-4" value="{{ $produit->prix_vente ?? ''  }}" name="prix_vente" id="email" type="text" placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix d'achet ( fournisseur )  : </label>

                                                        <input  class="form-control py-4" value="{{ $produit->prix_achat ?? ''  }}" name="prix_achat" type="text" placeholder="" />

                                                    </div>

                                                </div>

                                            </div>





                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">ajouter </button></div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>





@endsection





