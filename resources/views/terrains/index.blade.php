@extends('layouts.master-preloader')
@section('title')
    Terrains
@endsection

<!-- DataTables -->
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="col-md-6">

                        <div class="mb-3">
                            <a href="{{route('terrains.map')}}" class="btn btn-success waves-effect waves-light"> Carte</a>
                        </div>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Numero</th>
                            <th>Superficie</th>
                            <th>Departement</th>
                            <th>Adresse</th>
                            <th scope="col" style="width: 150px;">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($terrains as $terrain)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$terrain->numero}}</td>
                                <td>{{$terrain->superficie}}</td>
                                <td>{{$terrain->departement->libelle}}</td>
                                <td>{{$terrain->adresse}}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('terrains.show', [$terrain->id])}}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Consulter"><i class="far fa-eye font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('ventes.create', [$terrain->id])}}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Vendre"><i class="fas fa-comments-dollar font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('terrain.edit', [$terrain->id])}}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="px-2 text-danger" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="uil uil-trash-alt font-size-18"></i></a>
                                        </li>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>

                    </table>



                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection
