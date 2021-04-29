@extends('layouts.master-without-nav')
@section('title')
    Register
@endsection
@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{url('index')}}" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="{{url('index')}}" class="mb-5 d-block auth-logo">
                            <img src="{{ URL::asset('assets/images/seterLogo.png')}}" alt="" height="30" class="logo logo-dark">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Inscription </h5>

                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="prenom">{{ __('Prenom') }}</label>
                                        <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                                               name="prenom" value="{{ old('prenom') }}" required autocomplete="name" placeholder="Ex : Fatou">

                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nom">{{ __('Nom') }}</label>
                                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                               name="nom" value="{{ old('nom') }}" required autocomplete="nom" placeholder="Ex : Ndiaye" >

                                        @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="email">{{ __('Adresse mail') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email address">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Mot de passe') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirmer mot de passe') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter password">
                                    </div>


                                    <div class="mt-3 text-right">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">{{ __('Inscrire') }}</button>
                                    </div>



                                    <div class="mt-4 text-center">
                                        <p class="text-muted mb-0">Vouz avez deja un compte ? <a href="{{url('login')}}" class="font-weight-medium text-primary"> Se connecter</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© 2021 Copyright. <i class="mdi mdi-heart text-danger"></i> by DES</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
@endsection

