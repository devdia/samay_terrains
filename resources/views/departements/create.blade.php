@extends('layouts.master-preloader')
@section('title')
    Ajout de titre de bail
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

                    <h2 class="card-title">Ajout Departement</h2>
                    <form action="{{route('departements.store')}}" method="POST" class="custom-validation">
                        @csrf


                        <div class="form-group row">
                            <label for="region" class="col-md-2 col-form-label">Region :</label>
                            <select class="form-control col-md-6" name="region" id="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->libelle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="departementLibelle" class="col-md-2 col-form-label">Libelle</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" id="departementLibelle"
                                       name="departementLibelle" value="{{ old('departementLibelle') }}" autocomplete="off" required>
                                @error('departementLibelle')
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
        </div> <!-- end col -->
    </div>
    <!-- end row -->


@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection
