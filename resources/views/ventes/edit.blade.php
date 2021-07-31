@extends('layouts.master-preloader')
@section('title')
    Edition Vente de terrain
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

                    <h2 class="card-title">Edition Vente de terrain</h2>
                    <form action="{{route('ventes.update')}}" method="POST" class="custom-validation">
                        @csrf

                        <input type="hidden" name="vente" value="{{$vente->id}}">

                        <div class="form-group row">
                            <label for="acquereur" class="col-md-2 col-form-label">Acquereur</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="acquereur"
                                       name="acquereur" value="{{$vente->acquereur}}" autocomplete="off" required>
                                @error('acquereur')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vendeur" class="col-md-2 col-form-label">Vendeur</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" id="vendeur"
                                       name="vendeur" value="{{ $vente->vendeur }}" autocomplete="off" required>
                                @error('vendeur')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-2 col-form-label">Date de Vente</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" id="date"
                                       name="date" value="{{ $vente->date }}" autocomplete="off" required>
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prix" class="col-md-2 col-form-label">Prix de vente</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" id="prix"
                                       name="prix" value="{{ $vente->prix }}" autocomplete="off" required>
                                <div class="alert alert-warning">Ce terrain a été acheté à {{$terrain->cout}} FCFA</div>
                                @error('prix')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="commission" class="col-md-3 col-form-label">Comission</label>
                            <div class="col-md-8">
                                <select class="form-control" name="commission" id="commission">
                                    <option value="0.01">1%</option>
                                    <option value="0.02">2%</option>
                                    <option value="0.03">3%</option>
                                    <option value="0.04">4%</option>
                                    <option value="0.05">5%</option>
                                </select>

                            </div>
                        </div>



                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Vendre</button>
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
