@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Voir Commande</h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                       <?php $images = json_decode($commande->images);?>
                      <img id="item-display" 
                        src="{{($images[0] ?? '') ? asset('storage/'.$images[0]) : "#" }}"
                        alt="" width="200px"> 
                      </img>
                    </div>
                  </div>
                  <div class="row">
                  @foreach($images as $image)
                    <div class="col-md-4">
                      <img 
                        src="{{($image ?? '') ? asset('storage/'.$image) : "#" }}"
                         alt="" width="200px"></img>

                    </div>
                    @endforeach
                  </div>


                  <p>{{$commande->nom ?? ''}}</p>
                  <p> quantité :{{$commande->quantite ?? ''}}</p>
                  <p> prix :{{$commande->prix ?? ''}}</p>
                  <p> Le produit </p>
                  @foreach (json_decode($commande->produit) as $key=>$value)
                      {{ $key }}: {{str_limit($value, $limit = 20, $end = '...')}}  <br>
                  @endforeach
                  <p> prix de remise :{{$commande->remise ?? ''}}</p>
                  
                  <hr>
                  <p> Le livreur </p>
                  @foreach (json_decode($commande->livreur) as $key=>$value)
                      {{ $key }}: {{str_limit($value, $limit = 20, $end = '...')}}  <br>
                  @endforeach
                  
                  <a target="_blank" rel="nofollow" href="{{ URL::previous() }}">retour -></a>
                </div>
              </div>
              <!-- Approach -->
            </div>
          </div>
</div>
@endsection
