@extends('layouts.admin')



@section('content')

<div class="container-fluid">

                        <h1 class="mt-4">Esapce Livreur</h1>

                       <div class="card mb-4">

                            <div class="card-header">

                                List de tout les vos commandes , clicker sur annuler pour annule la livraison 

                                                        </div>

                           <div class="card-body">

                                <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                              <th>id commande</th>
                                              <th>client</th>

                                                <th>livreur</th>
                                                <th>produit</th>
                                                <th>crédit livreur </th>
                                                
                                                <th>retour au dépot </th>
                                                <th>retour au produit</th>
                                                <th>payment clicntic </th>
                                                <th>timelines</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commandes as $commande)                                            

                                            <tr>
                                                <td>
                                                <i class="far fa-bell"></i>
                                                    {{$commande->id ?? ''}}
                                                </td>
                                                <td>                                                 
                                                    <i class="fa fa-user"></i>: {{$commande->nom_client ?? 'non définie'}}<br>
                                                    <i class="fa fa-phone"></i>: {{$commande->telephone ?? 'non définie'}}<br>
                                                    {{$commande->wilaya ?? 'non définie'}}<br>
                                                    {{$commande->commune ?? 'non définie'}}<br>

                                                 </td>

                                                <td> 
                                                <?php
                                                    $livreur = json_decode($commande->livreur); 
                                                ?>

                                                <i class="fa fa-user"></i>: {{$livreur->name ?? ''}}<br>
                                                {{$livreur->prenom ?? 'non définie'}}
                                                <br>
                                                <i class="fa fa-phone"></i>: {{$livreur->telephone ?? 'non définie'}}<br>
                                                {{$livreur->adress ?? ''}}<br>
                                                type de livraison : {{$commande->command_express ?? ''}}
                                                
                                                </td>
                                                <?php
                                                    $produit = json_decode($commande->produit); 
                                                ?>


                                                <td>                                                 
                                                    <i class="fa fa-box"></i>: {{$produit->nom ?? 'non définie'}}
                                                    <br>
                                                    <i class="fa fa-money"></i>quantité :   {{$commande->quantite ?? 'non définie'}}
                                                    <br>
                                                    prix :{{$commande->prix}} <i class=" fas fa-money-bill	"></i><br>
                                                    prix livraison:{{$commande->prix_livraison}} <i class=" fas fa-money-bill	"></i><br>
                                                    prix total: {{$commande->prix + $commande->prix_livraison}}  <i class=" fas fa-money-bill	"></i><br>
                                                 </td>

                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>

                                                <td>
                                                crée le :  {{$commande->created_at ?? 'non définie'}}<br>
                                                @if($commande->state == 'en attente')
                                                    <i class="fa fa-volume-up" style="color:green"></i> en attente <br>
                                                @endif
                                                @if($commande->state == 'accepte')
                                                <i class="fa fa-walking" style="color:red"></i> accepté <br>
                                                @endif
                                                @if($commande->state == 'expedier')
                                                <i class="fa fa-fa-motorcycle" style="color:green"></i> expédier<br>
                                                @endif
                                                @if($commande->state == 'en attente paiement')
                                                <i class="fa fa-hourglass-start" style="color:blue"></i><i class="fa fa-money-bill-alt" style="color:green"></i> en attente de paiement<br>  
                                                @endif
                                                @if($commande->state == 'livree')
                                                <i class="fa fa-thumbs-up" style="color:green"></i> Livré
                                                @endif

                                                </td>
                                                 
                                                <td >

                                                <div class="table-action">

                                                        <a  

                                                        href="{{route('commande.relancer',['id_commande'=>$commande->id ?? ''])}}"

                                                        onclick="return confirm('etes vous sure  ?')"

                                                        class="btn btn-warning text-white">

                                                                <i class="fas fa-plus"></i>

                                                                annuler 

                                                        </a>

                                                    </div>



                                                </td>

                                            </tr>

                                            @endforeach


                                        </tbody>
                                    </table>
                                        </tbody>

                                        </tbody>

                                    </table>

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



</script>

@endsection