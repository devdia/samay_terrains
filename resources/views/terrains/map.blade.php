<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Display a map on a webpage</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>

    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />

    <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 40px; bottom: 0; width: 100%; }

        .select2-container{
            width: 100%!important;
        }
        .select2-search--dropdown .select2-search__field {
            width: 98%;
        }

    </style>
</head>
<body>

<div id="backButton">
    <a href="{{route('dashboard')}}" class="btn btn-danger">Retour</a>
</div>
<div id="map"></div>

<div class="modal fade" id="addIncident" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout de Terrain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('terrains.store')}}" method="POST" >
                    @csrf
                    <input type="hidden" name="lng" id="lngIncident" >
                    <input type="hidden" name="lat" id="latIncident" >

                    <div class="form-group row">
                        <label for="titre" class="col-md-3 col-form-label">Titre</label>
                        <div class="col-md-9">
                            <select class="form-control select2" name="titre">
                                <option>Select</option>
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
                                   name="numero"  autocomplete="off" >
                            @error('numero')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="superficie" class="col-md-3 col-form-label">Superficie</label>
                        <div class="col-md-9">
                            <input class="form-control" type="number" id="superficie"
                                   name="superficie"  autocomplete="off" >
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
                                   name="commune"  autocomplete="off" >
                            @error('commune')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adresse" class="col-md-3 col-form-label">Adresse</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="adresse"
                                   name="adresse"  autocomplete="off" >
                            @error('adresse')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>





                    <div class="form-group row">
                        <label for="date" class="col-md-3 col-form-label">Date Achat</label>
                        <div class="col-md-9">
                            <input class="form-control" type="date" id="date"
                                   name="date"  autocomplete="off" >
                            @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cout" class="col-md-3 col-form-label">Cout</label>
                        <div class="col-md-9">
                            <input class="form-control" type="number" id="cout"
                                   name="cout"  autocomplete="off" >
                            @error('cout')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="observation" class="col-md-3 col-form-label">Observation</label>
                        <div class="col-md-9">
                            <textarea name="observation" id="observation" cols="45" rows="5"></textarea>
                            @error('observation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Ajouter</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>


<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>


<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2ZGlhIiwiYSI6ImNrbm9obGxydjFmMTUycXBua2JudmFudDYifQ.SxNmkB7c98DWXS4HV4C2OQ';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [-17.438413, 14.683916], // starting position [lng, lat]
        zoom: 10 // starting zoom
    });

    var terrains = {!! $terrains !!};
    var terrainsVendus = {!! $terrainsVendus !!};

    terrains.forEach((terrain) => {
        new mapboxgl.Marker()
            .setLngLat([terrain.coordonate.longitude, terrain.coordonate.latitude])
            .addTo(map);

    });

    terrainsVendus.forEach((terrain) => {
        new mapboxgl.Marker({color: 'red'})
            .setLngLat([terrain.coordonate.longitude, terrain.coordonate.latitude])
            .addTo(map);

    });

    map.on('dblclick', function (e) {

        var lngIncident = e.lngLat.lng;
        var latIncident = e.lngLat.lat;

        // Modal Content
        //$("#lngIncident").value(lngIncident);
        document.getElementById('lngIncident').value = lngIncident;

        //$("#latIncident").value(latIncident);
        document.getElementById('latIncident').value = latIncident;

        $('#addIncident').modal('show');


    });

</script>
