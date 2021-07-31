@extends('layouts.master-preloader')
@section('title')
    Ventes
@endsection

<!-- DataTables -->
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendeur</th>
                            <th>Acquereur</th>
                            <th>Numero Terrain</th>
                            <th scope="col" style="width: 150px;">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($ventes as $vente)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$vente->vendeur}}</td>
                                <td>{{$vente->acquereur}}</td>
                                <td>{{$vente->terrain->numero}}</td>
                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('ventes.show', [$vente->id])}}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Consulter"><i class="far fa-eye font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('vente.edit', [$vente->id])}}" class="px-2 text-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="uil uil-pen font-size-18"></i></a>
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
