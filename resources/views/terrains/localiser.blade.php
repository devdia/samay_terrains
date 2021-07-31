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



<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2ZGlhIiwiYSI6ImNrbm9obGxydjFmMTUycXBua2JudmFudDYifQ.SxNmkB7c98DWXS4HV4C2OQ';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [-17.438413, 14.683916], // starting position [lng, lat]
        zoom: 10 // starting zoom
    });

    var terrain = {!! $terrain !!};

    var marker1 = new mapboxgl.Marker()
        .setLngLat([terrain.coordonate.longitude, terrain.coordonate.latitude])
        .addTo(map);




</script>
