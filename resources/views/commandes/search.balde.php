<div class="card-body">
                                        <form method="post" action="{{route('commande.search')}}">
                                        @csrf
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">id commande : </label>
                                                        <input  class="form-control" id="quantite" 
                                                        name="id_commande" type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">nom et prenom</label>
                                                        <input  class="form-control py-4" name="nom" id="nom" type="text" placeholder="enter surname : " />
                                                    </div>
 
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Commande express : </label>
                                                        <input  class="form-control py-4" id="telephpone" value="{{$comamnde->telephone ?? ''}}" name="telephone" type="text" placeholder="Enter phone number e.g : (+213) 659-43-96-77" />
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Téléphone : </label>
                                                        <input  class="form-control py-4" id="telephpone" value="{{$comamnde->telephone ?? ''}}" name="telephone" type="text" placeholder="Enter phone number e.g : (+213) 659-43-96-77" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">date livraison : </label>
                                                        <input  class="form-control py-4" id="telephpone" 
                                                         name="date_livraison" type="date" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('Wilaya') }}: </label>
                                                        <select class="form-control" id="register_wilaya" name="wilaya_id">
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
                                                        <select class="form-control" name="commune_id" id="register_commune">
                                                            <option value="">{{ __('Please choose...') }}</option>
                                                            @foreach ($communes as $commune)
                                                                <option value="{{$commune->id}}" {{$commune->id == (old('commune_id') ?? ($member->commune_id ?? '')) ? 'selected' : ''}}>
                                                                    {{$commune->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input class="form-control valid" id="register_commune_loading" value="{{ __('Loading...') }}" readonly style="display: none;" />
                                                        @if ($errors->has('commune_id'))
                                                            <p class="help-block">{{ $errors->first('commune_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-md-2">
                                                     <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">checher</button></div>
                                                </div>
                                        </form>
                                    </div>

                        
 