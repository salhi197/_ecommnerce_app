@extends('layouts.admin')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="card mt-2">

                                    <div class="card-header"><h3 class="font-weight-light my-4">nouveau produit :  </h3></div>

                                    <div class="card-body">

                                        <form method="post" action="{{route('produit.store')}}" enctype="multipart/form-data">

                                        @csrf

                                            <div class="form-row">

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputFirstName">nom de produit: </label>

                                                        <input type="text" value="{{ old('nom') }}" name="nom"  class="form-control"/>

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label class="small mb-1">catégorie de produit :</label>

                                                        <select class="form-control" name="categorie" id="categories">

                                                        <option value="general" selected>

                                                                    elctrotechnique

                                                                </option>                    

                                                                <option value="general" selected>

                                                                    electoménager

                                                                </option>                    

                                                                <option value="general" selected>

                                                                    téléphonie  & accesssoires

                                                                </option>                    

                                                                <option value="general" selected>

                                                                    Maison & Bureau 

                                                                </option>                    

                                                                <option value="general" selected>

                                                                    Santé & Beauté

                                                                </option>                    

                                                                <option value="general" selected>

                                                                    Articles & sport

                                                                </option>                    

                                                                

                                                                <option value="general" selected>

                                                                    Jouets & Jeux

                                                                </option>                    

                                                                <option value="general" selected>

                                                                    Formations

                                                                </option>                    

                                                        </select>

                                                    <a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModal">

                                                    ajouter catégorie

                                                    </a>

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label class="small mb-1">choisir fournisseur :</label>

                                                        <select class="form-control" name="fournisseur" id="fournisseurs">

                                                      

                                                        </select>

                                                        <a type="button" class="" data-toggle="modal" data-target="#example">

                                                           ajouter fournisseur

                                                        </a>



                                                    </div>

                                                </div>



                                            </div>

                                            <div class="form-row">

                                            <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" >quantite initiale :</label>

                                                        <input  class="form-control py-4" value="{{ old('quantite') ?? 1 }}" name="quantite" id="" type="number" placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix initiale : </label>

                                                        <input  class="form-control py-4" value="{{ old('prix_vente') }}" name="prix_vente" id="email" type="text" placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix d'achet ( fournisseur )  : </label>

                                                        <input  class="form-control py-4" value="{{ old('prix_fournisseur') }}" name="prix_fournisseur" type="text" placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">budget   : </label>

                                                        <input  class="form-control py-4" value="{{ old('budget') }}" name="budget" type="text" placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix livraison : </label>

                                                        <input  class="form-control py-4" value="{{ old('prix_livraison') }}" name="prix_livraison" type="text" 

                                                        placeholder="" />

                                                    </div>

                                                </div>

                                                

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix freelance : </label>

                                                        <input  class="form-control py-4" value="{{ old('prix_freelance') }}" name="prix_freelance" type="text" 

                                                        placeholder="" />

                                                    </div>

                                                </div>

                                                <div class="col-md-3">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">prix clicntic : </label>

                                                        <input  class="form-control py-4" value="{{ old('prix_clicntic') }}" name="prix_clicntic" type="text" 

                                                        placeholder="" />

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-row">

                                                <div class="col-md-6">

                                                <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">description de produit </label>

                                                        <textarea name="description" class="form-control"></textarea>  

                                                    </div>

                                                </div>

                                                <div class="col-md-4">

                                                    <label class="small mb-1" for="inputEmailAddress">image: </label>

                                                    <input  class="form-control-file" name="image[]" multiple type="file" placeholder="telephone" />

                                                </div>



                                            </div>



                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">ajouter </button></div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">

                        <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                                    <form id="form_fournisseur">

                                    <div class="form-row">

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputFirstName">nom et prenom: </label>

                                                        <input type="text" name="nom_prenom"  class="form-control"/>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <label class="small mb-1" for="inputEmailAddress">N°Téléphone : </label>

                                                    <input  class="form-control" value="" name="telephone" type="text" placeholder="telephone" />

                                                </div>

                                            </div>

                                            <div class="form-row">

                                            <div class="col-md-4">

                                                    <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">email</label>

                                                        <input  class="form-control py-4" name="email" id="email" type="email" placeholder="" />

                                                    </div>

                                                </div>

                                                    <div class="col-md-4">

                                                        <div class="form-group">

                                                            <label class="control-label">{{ __('Wilaya') }}: </label>

                                                            <select class="form-control" id="wilaya_select" name="wilaya_id">

                                                                <option value="">{{ __('Please choose...') }}</option>

                                                            
                                                            </select>

                                                            @if ($errors->has('wilaya_id'))

                                                                <p class="help-block">{{ $errors->first('wilaya_id') }}</p>

                                                            @endif

                                                        </div>

                                                    </div>

                                                    <div class="col-md-4">

                                                        <div class="form-group">

                                                            <label class="control-label">{{ __('Commune') }}: </label>

                                                            <select class="form-control" name="commune_id" id="commune_select">

                                                                <option value="">{{ __('Please choose...') }}</option>


                                                            </select>

                                                            <input class="form-control valid" id="commune_select_loading" value="{{ __('Loading...') }}"

                                                                readonly style="display: none;"/>

                                                            @if ($errors->has('commune_id'))

                                                                <p class="help-block">{{ $errors->first('commune_id') }}</p>

                                                            @endif

                                                        </div>

                                                    </div>

                                                    <div class="col-md-4">

                                                        <div class="form-group">

                                                        <label class="small mb-1" for="inputConfirmPassword">adress</label>

                                                        <input  class="form-control py-4" name="adress" id="adress" type="text" placeholder="" />

                                                        </div>

                                                    </div>



                                            </div>

                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="button" id="ajax_fournisseur">ajouter fournisseur</button></div>

                                    </form>

                        </div>

                        </div>

                    </div>

                    </div>









@endsection





@section('scripts')


@endsection

