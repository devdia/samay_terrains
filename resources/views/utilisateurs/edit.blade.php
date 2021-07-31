@extends('layouts.master-preloader')
@section('title')
    Edit Utilisateur
@endsection
<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('assets/libs/bootstrap-editable/bootstrap-editable.min.css')}}" rel="stylesheet" type="text/css" />

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h2 class="card-title">Modification Utilisateur</h2>
                    <form action="{{route('utilisateur.modifier')}}" method="POST">
                        @csrf

                        <input type="hidden" name="user" value="{{$user->id}}">
                        <div class="form-group row">
                            <label for="prenom" class="col-md-2 col-form-label">Prenom</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text"  id="prenom"
                                       name="prenom" value="{{$user->prenom}}">
                                @error('prenom')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom" class="col-md-2 col-form-label">Nom</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text"  id="nom"
                                       name="nom" value="{{$user->nom}}">
                                @error('nom')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password"  id="password"
                                       name="password" value="{{old('password')}}">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-2 col-form-label">Confirmer Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password"  id="password_confirmation"
                                       name="password_confirmation" value="{{old('password_confirmation')}}">
                                @error('password_confirmation')
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
