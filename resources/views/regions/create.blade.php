@extends('layouts.master-preloader')
@section('title')
    Ajouter une Region
@endsection
<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form class="outer-repeater custom-validation" action="{{route('regions.store')}}" method="POST">
                        @csrf
                        <div data-repeater-list="region" class="outer">
                            <div data-repeater-item class="outer">


                                <div class="form-group">
                                    <label for="libelle">Region :</label>
                                    <input type="text" class="form-control" name="libelle" value="{{old('libelle')}}"
                                           placeholder="Ex. Dakar">
                                    @error('region.*.libelle')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="departements" class="inner form-group">
                                        <label>Departement</label>
                                        <div data-repeater-item class="inner mb-3 row">
                                            <div class="col-md-8 col-8">
                                                <input type="text" class="inner form-control" name="departementLibelle"
                                                       value="{{old('departementLibelle')}}" placeholder="Libelle"/>
                                                @error('region.*.departements.*.departementLibelle')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="col-md-2 col-4">
                                                <input data-repeater-delete type="button" class="btn btn-primary btn-block inner" value="Supprimer"/>
                                            </div>

                                        </div>

                                    </div>

                                    <input data-repeater-create type="button" class="btn btn-success inner" value="Nouveau departement"/>
                                </div>


                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
@endsection
@section('script')
    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/jquery-repeater/jquery-repeater.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-repeater.int.js')}}"></script>
@endsection
