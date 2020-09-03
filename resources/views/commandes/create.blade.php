@extends('layouts.admin')

@section('content')
<div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4">nouveau commande : </h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('commande.create')}}" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Produit: </label>
                                                        <select class='form-control produits' name='produit' >
                                                            <option>veuillez séélctionner </option>
                                                            @foreach($produits as $produit)
                                                            <option value="{{$produit}}">
                                                                {{$produit->nom}} - quantite : {{$produit->quantite}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="inputEmailAddress">Quantité commandé : </label>
                                                    <input  class="form-control" id="quantite" value="{{$comamnde->quantite ?? 1}}" name="quantite" type="number" placeholder="" />
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputEmailAddress">Prix total sans livraison: </label>
                                                            <input  class="form-control py-4 total" id="prix" value="{{$comamnde->prix ?? ''}}" name="prix" type="text" placeholder=" da" />
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Type de Livraison  : </label>
                                                        <select class="form-control types" name="comand_express" id="type_livraison">
                                                                <option value="">{{ __('Choisisez ...') }}</option>
                                                                    @foreach($types as $type)
                                                                        <option value="{{$type->label}}" id="{{$type}}" >
                                                                        {{$type->label}}
                                                                        </option>
                                                                    @endforeach
                                                            </select>
                                                            <a data-toggle="modal" data-target="#exampleModal">
                                                               ajouter type
                                                            </a>


                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                        <div class="form-group">    
                                                            <label class="small mb-1" for="temp">Temps de livraison: </label>
                                                            <input  class="form-control py-4" id="temps" value="{{$comamnde->temp ?? ''}}" name="temp" type="text" placeholder="temps de livraison " />
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputEmailAddress">prix de livraison  : </label>
                                                            <input  class="form-control py-4 total" id="prix_livraison" value="{{$comamnde->prix_livraison ?? ''}}" name="prix_livraison" type="text" placeholder=" da" />
                                                        </div>
                                                </div>


                                            </div>
                                            <div class="form-row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">date livraison : </label>
                                                        <input  class="form-control py-4" id="telephpone" 
                                                         name="date_livraison" type="date" />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">nom et prenom</label>
                                                        <input  class="form-control py-4" name="nom_client" id="nom" type="text" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Téléphone Client : </label>
                                                        <input  class="form-control py-4" id="telephpone" value="{{$comamnde->telephone ?? ''}}" name="telephone" type="text" placeholder="" />
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">adress de livraison : </label>
                                                        <input  class="form-control py-4" name="adress" id="adress" type="text" placeholder="entrer l'adress complete  : " />
                                                    </div>
                                                </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Wilaya') }}: </label>
                                                            <select class="form-control" id="wilaya_select" name="wilaya_id">
                                                                <option value="">{{ __('Please choose...') }}</option>
                                                                @foreach ($wilayas as $wilaya)
                                                                    <option value="{{$wilaya->id}}" {{$wilaya->id == (old('wilaya_id') ?? ($member->wilaya_id ?? '')) ? 'selected' : ''}}>
                                                                        {{$wilaya->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('wilaya_id'))
                                                                <p class="help-block">{{ $errors->first('wilaya_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Commune') }}: </label>
                                                            <select class=" form-control" name="commune_id" id="commune_select">
                                                                <option value="">{{ __('Please choose...') }}</option>
                                                                @foreach ($communes as $commune)
                                                                    <option value="{{$commune->id}}" {{$commune->id == (old('commune_id') ?? ($member->commune_id ?? '')) ? 'selected' : ''}}>
                                                                        {{$commune->name}}
                                                                    </option>
                                                                @endforeach
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
                                                        <label class="small mb-1">choisir livreur:</label>
                                                        <select class="form-control" name="livreur" id="livreurs">
                                                        <option value="">
                                                            ------------------------------
                                                        </option>                    

                                                        @foreach($livreurs as $livreur)
                                                                <option value="{{$livreur}}" >
                                                                {{$livreur->nom}} {{$livreur->prenom}}
                                                                </option>                    
                                                        @endforeach
                                                        </select>
                                                        <a target="_blank" href="{{route('livreur.index')}}"   >
                                                                ajouter livreur
                                                                </a>
                                                                <a href="#"  id="reload" >
                                                                    rafraîchir
                                                                </a>

                                                        </div>
                                                    </div>

                                               
                                                    <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">note au livreur </label>
                                                        <textarea name="note" class="form-control">

                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card" style="">
                                                    <div class="card-body">
                                                            <p class="card-text">
                                                                <br>
                                                                    Produit : 
                                                                <br>

                                                                <strong id="_produit">

                                                                </strong>
                                                                <br>
                                                                    Quantité : 
                                                                <br>
                                                                
                                                                <strong id="_quantite">

                                                                </strong>
                                                                <br>
                                                                    Livraison : 
                                                                <br>
                                                                
                                                                <strong id="_livraison">

                                                                </strong>
                                                                                                                                
                                                             </p>
                                                        <a href="#" class="btn btn-primary">Total <strong id="total"> 1800 </strong> DA </a>
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">ajouter commande</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter type livraison</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_type">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">type: </label>
                        <input type="text" name="type"  class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">temps de livraison: </label>
                        <input type="text" name="temps"  class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">prix : </label>
                        <input type="text" name="prix" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Commission: </label>
                        <input type="text" name="commission" class="form-control"/>
                    </div>
    
            <button class="btn btn-primary btn-block" type="button" id="ajax_type">ajouter type</button>
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
function onChangeProduit()
{
    $('.produits').on('change', function (e) {
        var valueSelected = this.value;

        var obj = JSON.parse(valueSelected);
        $('#quantite').attr('max',obj.quantite)
        $('#quantite').val(obj.quantite)
        $('#_produit').html(obj.nom)
        
        if(obj.quantite == 1){
            $(function(){
                toastr.error('Alerte de Stock .. ..')
            })            
        }
        $('#quantite').attr('min',0)        
        $('#prix').val(obj.prix_vente)        
        
    });

}
function onChangeQte()
{
    $('#quantite').on('keyup', function (e) {
        var val = $('#quantite').val()
        $('#_quantite').html(val)                
    });

}
function onChangeLivraison()
{
    $('#type_livraison').on('change', function (e) {
        var valueSelected =$('.types option:selected').attr('id');
        var obj = JSON.parse(valueSelected);

        $('#_livraison').html(obj.label)        
    });
  $(".total").on("change", function() {
    var ret = parseInt($("#prix").val()) + parseInt($("#prix_livraison").val() || '0')
    $("#total").html(ret);
  })
}

function onTypeLivraison()
{
    $('.types').on('change', function (e) {
        var valueSelected =$('.types option:selected').attr('id');
        console.log(valueSelected)
        var obj = JSON.parse(valueSelected);
        $('#temps').val(obj.temps)
        $('#prix_livraison').val(obj.prix)        
    });

}



        $(document).ready(function () {
            watchWilayaChanges();
            onChangeProduit();
            onChangeQte();
            onTypeLivraison();
            onChangeLivraison();
        });

</script>
<script>
$(document).ready(function(){
    $('#reload').click(function(){
        console.log('test')
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{route("livreur.index.ajax")}}',
            type: 'POST',
            dataType: 'JSON',
            success: function (data) { 
                $(function(){
                    console.log(data.livreurs)
                    toastr.success(data.msg)
            })

            },error: function(err){
                $(function(){
                    console.log(err)
                    toastr.error(err.message)
                })
            }
        }); 
    });


    })

    $("#ajax_type").click(function(){
        var data  = $('#form_type').serialize()
        console.log(data)
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{route("type.store.ajax")}}',
            type: 'POST',
            data: {_token: CSRF_TOKEN, data:data},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                $(function(){
                    console.log(data.type)
                    toastr.success(data.msg)
                        var obj = JSON.stringify(data.type)
                    $("#type_livraison").append(new Option(data.type.type,obj ));
                    $('#exampleModal').modal('toggle');
            })
            },error: function(err){
                $(function(){
                    console.log(err)
                    toastr.error(err.message)
                })
            }
        }); 
    });
});    



</script>
@endsection