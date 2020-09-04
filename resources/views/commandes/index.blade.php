@extends('layouts.admin')

@section('content')
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Table des Commandes</h4>
                </div>
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('commande.show.create')}}">Ajouter commande</a>
                </div>                
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>id</th>
                        <th>client</th>
                        <th>livreur / livraison</th>
                        <th>produit</th>                        
                        <th>Etat</th>
                        <th>actions</th>
                      </thead>
                      <tbody>
                          @foreach($commandes as $commande)                                            

                          <tr>
                              <td>
                                  {{$commande->id ?? ''}}
                              </td>
                              <td width="10%">                                                 
                                  <i class="fa fa-user"></i>: {{$commande->nom_client ?? 'non définie'}}<br>
                                  <i class="fa fa-phone"></i>: {{$commande->telephone ?? 'non définie'}}<br>
                                  {{$commande->wilaya ?? 'non définie'}}<br>
                                  {{$commande->commune ?? 'non définie'}}<br>

                               </td>

                               <td width="20%">                                                 
                              <?php
                                  $livreur = json_decode($commande->livreur); 

                              ?>

                              <?php  if(isset($livreur->name)){echo '<i class="fa fa-user"></i> : '.$livreur->name;}else{echo '<i class="fa fa-user"></i> ';}?>
                              <?php  if(isset($livreur->prenom)){echo $livreur->prenom.'<br>';}?>
                              <?php  if(isset($livreur->telephone)){echo '<i class="fa fa-phone"></i> '.$livreur->telephone.'<br>';}?>
                              <hr>

                               - adress de livraison : {{$commande->adress ?? ''}}<br>
                               - type de livraison : {{$commande->command_express ?? ''}}

                              
                              </td>
                              <?php
                                  $produit = json_decode($commande->produit); 
                              ?>


                              <td width="20%">                                                 
                                  produit : {{$produit->nom ?? 'non définie'}}
                                  <br>
                                  quantité :   {{$commande->quantite ?? 'non définie'}}
                                  <br>
                                  prix :{{$commande->prix}} <i class=" fas fa-money-bill  "></i><br>
                                  prix livraison:{{$commande->prix_livraison}} <i class=" fas fa-money-bill "></i><br>
                                  prix total: <strong style="color:green;">{{$commande->prix + $commande->prix_livraison}}</strong>  <i class=" fas fa-money-bill "></i><br>
                               </td>


                               <td width="20%">                                                 

                              crée le :  {{$commande->created_at ?? 'non définie'}}<br>
                              @if($commande->state == "en attente")
                                <i class="fa fa-volume-up" style="color:green"></i> en attente   {{$commande->en_attente ?? '--/--/--' }}<br>
                              @endif
                              @if($commande->state == "acceptee")
                              <i class="fa fa-walking" style="color:red"></i> accepté le :   {{$commande->accepte ?? '--/--/--' }}<br>
                              @endif
                              @if($commande->state == "expedier")
                              <i class="fa fa-fa-motorcycle" style="color:green"></i> expédier le :  {{$commande->expedier ?? '--/--/--' }}<br>
                              @endif
                              @if($commande->state == "livree")
                              <i class="fa fa-thumbs-up" style="color:green"></i> Livrée le : {{$commande->livree ?? '--/--/--' }}<br>
                              @endif
                              @if($commande->state == "en attente paiement")
                              <i class="fa fa-hourglass-start" style="color:blue"></i><i class="fa fa-money-bill-alt" style="color:green"></i>
                               en attente de paiement le :  {{$commande->en_attente_paiement ?? '--/--/--' }}<br>
                              @endif

                              </td>
                               
                              <td >
                                  <div class="table-action">  
                              <a  
                                  onclick="return confirm('etes vous sure  ?')"
                                  href="{{route('commande.destroy',['id_commande'=>$commande->id])}}"
                                  class="btn btn-danger"> <i class="fa fa-trash"></i> supprimer </a>
                                  <a data-toggle="modal" data-target="#exampleModal" class="text-white btn btn-info open-AddBookDialog"  
                                  id="{{$commande->id}}">
                                  <i class=""></i>etat
                                  </a>
                                  <a data-toggle="modal" data-target="#exampleModal" class="text-white btn btn-success open-AddBookDialog"  
                                  id="{{$commande->id}}">
                                  <i class=""></i>Retour
                                  </a>

                                  </div>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      {{ $commandes->links() }}


                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier l'etat de la commande :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_type" action=" {{route('commande.update.state')}}" method="post">
        @csrf
            <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                <input type="hidden" value="" name="commande" id="commande_id"/>
                </div>
                    <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">type: </label>
                        <select class='form-control produits' name='state' >
                            <option>veuillez séélctionner </option>
                            <option value="en attente">en attente</option>
                            <option value="accepte">accepte</option>
                            <option value="expedier">expedier</option>
                            <option value="en attente paiement">en attente paiement</option>
                            <option value="livree">livree</option>
                        </select>

                </div>
            </div>
            <br>
            <button class="btn btn-primary btn-block" type="submit" >modifer type</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')
<script>
function watchWilayaChanges() {
            $('#wilaya_select').on('change', function (e) {
                e.preventDefault();
                var $communes = $('#commune_select');
                var $communesLoader = $('#commune_select_loading');
                var $iconLoader = $communes.parents('.input-group').find('.loader-spinner');
                var $iconDefault = $communes.parents('.input-group').find('.material-icons');
                $communes.hide().prop('disabled', 'disabled').find('option').not(':first').remove();
                $communesLoader.show();
                $iconDefault.hide();
                $iconLoader.show();
                $.ajax({
                    dataType: "json",
                    method: "GET",
                    url: "/api/static/communes/ " + $(this).val()
                })
                    .done(function (response) {
                        $.each(response, function (key, commune) {
                            $communes.append($('<option>', {value: commune.id}).text(commune.name));
                        });
                        $communes.prop('disabled', '').show();
                        $communesLoader.hide();
                        $iconLoader.hide();
                        $iconDefault.show();
                    });
            });
        }

        $(document).ready(function () {
            watchWilayaChanges();
        });
$(document).on("click", ".open-AddBookDialog", function () {
     var myCommandeId = $(this).attr('id');
     console.log(myCommandeId)
     $("#commande_id").val(myCommandeId);
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});


</script>

@endsection