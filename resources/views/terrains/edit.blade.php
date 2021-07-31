@extends('layouts.master-preloader')
@section('title')
    Modification terrain
@endsection

<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="card-title">Modification Terrain</h2>
                    <form action="{{route('terrain.update')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="terrain" value="{{$terrain->id}}" >


                        <div class="form-group row">
                            <label for="titre" class="col-md-3 col-form-label">Titre</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="titre">
                                    @foreach($titres as $titre)
                                        <option value="{{$titre->id}}">{{$titre->libelle}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="numero" class="col-md-3 col-form-label">Numero Titre</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="numero"
                                       name="numero"  autocomplete="off" value="{{$terrain->numero}}" >
                                @error('numero')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="superficie" class="col-md-3 col-form-label">Superficie</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" id="superficie"
                                       name="superficie"  autocomplete="off" value="{{$terrain->superficie}}">
                                @error('superficie')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departement" class="col-md-3 col-form-label">Département</label>
                            <div class="col-md-9">
                                <select class="form-control select2" name="departement">
                                    @foreach($regions as $region)
                                        <optgroup label="{{$region->libelle}}">
                                            @foreach($region->departements as $departement)
                                                <option value="{{$departement->id}}">{{$departement->libelle}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="commune" class="col-md-3 col-form-label">Commune</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="commune"
                                       name="commune"  autocomplete="off" value="{{$terrain->commune}}">
                                @error('commune')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresse" class="col-md-3 col-form-label">Adresse</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="adresse"
                                       name="adresse"  autocomplete="off" value="{{$terrain->adresse}}">
                                @error('adresse')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="latitude" class="col-md-2 col-form-label">Latitude</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="latitude"
                                       name="latitude" value="{{ $terrain->coordonate->longitude }}" autocomplete="off" required>
                                @error('latitude')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="longitude" class="col-md-2 col-form-label">Longitude</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="longitude"
                                       name="longitude" value="{{ $terrain->coordonate->longitude }}" autocomplete="off" required>
                                @error('longitude')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-md-3 col-form-label">Date Achat</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" id="date"
                                       name="date"  autocomplete="off" value="{{$terrain->date_achat}}">
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cout" class="col-md-3 col-form-label">Cout</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" id="cout"
                                       name="cout"  autocomplete="off" value="{{$terrain->cout}}">
                                @error('cout')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observation" class="col-md-3 col-form-label">Observation</label>
                            <div class="col-md-9">
                                <textarea name="observation" id="observation" cols="45" rows="5">
                                    {{$terrain->observation}}
                                </textarea>
                                @error('observation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->


@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection

