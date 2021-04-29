
@extends('layouts.master-without-nav')
@section('title')
    Login
@endsection



@section('content')

    <div class="account-pages my-5 pt-sm-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="{{url('login')}}" class="mb-5 d-block auth-logo">
                            <img src="{{ URL::asset('assets/images/logo-light.png')}}" alt="" height="30" class="logo logo-dark">

                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Bienvenue !</h5>
                                <p class="text-muted">Connectez-vous.</p>
                            </div>
                            <div class="p-2 mt-4">

                                <x-jet-validation-errors class="mb-4" />
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login')  }}">
                                    @csrf

                                    <div class="form-group">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required autofocus placeholder="Saisissez votre adresse email" />
                                        @error('email')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                        <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Saisissez votre mot de passe"/>
                                        @error('password')
                                        <div class="error">{{ $password }}</div>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="auth-remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="auth-remember-check">{{ __('Se souvenir de moi') }}</label>
                                    </div>
                                    <div class="mt-3 text-right">
                                        <x-jet-button class="btn btn-primary w-sm waves-effect waves-light">
                                            {{ __('Connexion') }}
                                        </x-jet-button>
                                    </div>


                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Vous n'avez pas de compte ? <a href="{{url('register')}}" class="font-weight-medium text-primary"> Inscrivez-vous maintenant! </a> </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© 2021 Copyright. SETER INTRANET <i class="mdi mdi-heart text-danger"></i> by DES</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>

    @if(Session::has('message'))
        <script type="text/javascript">
            toastr.options =
                {
                    "closeButton" : true,
                }
            toastr.warning("{{ Session::get('message') }}");
        </script>
    @elseif(Session::has('verification'))
        <script type="text/javascript">
            toastr.options =
                {
                    "closeButton" : true,
                }
            toastr.success("{{ Session::get('verification') }}");
        </script>
    @endif

@endsection


