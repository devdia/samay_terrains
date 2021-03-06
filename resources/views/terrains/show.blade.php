@extends('layouts.master-preloader')
@section('title')
    Details
@endsection

<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

@section('content')

    <!-- <div class="col-xl-4 col-sm-6"> -->
    <div class="card">
        <div class="card-body">
            <div class="media">
                <div class="avatar-sm mr-4">
                            <span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle">
                                T
                            </span>
                </div>
                <div class="media-body align-self-center">
                    <div class="border-bottom pb-1">
                        <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">
                                {{$terrain->numero}} </a></h5>

                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Titre</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->titre->libelle }}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Superficie</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->superficie }}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Date Achat</p>
                                <h5 class="font-size-16 mb-0">{{ \Carbon\Carbon::make($terrain->date_achat)->format('d-m-Y') }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">R??gion</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->departement->region->libelle }}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">D??partement</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->departement->libelle }}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Commune</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->commune }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Adresse</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->adresse }}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Longitude</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->coordonate->longitude }}</h5>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Latitude</p>
                                <h5 class="font-size-16 mb-0">{{ $terrain->coordonate->latitude }}</h5>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="mt-3">
                                <p class="text-muted mb-2">Observation</p>
                                <p class="font-size-16 mb-0"> {{$terrain->observation}} </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>






@endsection







