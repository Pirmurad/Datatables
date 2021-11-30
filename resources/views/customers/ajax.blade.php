@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Customers') }}</div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered" id="ajax_datatable">
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready( function () {
            $.noConflict();

            $('#ajax_datatable').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax": "{{ route('api.customers.index') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "surname" },
                    { "data": "email" },
                    { "data": "" },
                ],
                buttons: ['colvis'],
                // dom: "lfrttipB",
                // "columnDefs": [
                //     {
                //         "render": (data,type,row)=>data+' '+row['surname'], //name+surname=Fullname, surname is hidden, chnage name to fullname
                //         "targets":1,
                //     },
                //     {
                //         "visible": false,
                //         "targets": 2
                //     }
                // ],
                "order": [[0,'desc'], [3,'desc'] ],  // ordering
                columnDefs: [{
                    targets: -1,
                    render: function (data, type, row){
                        return '<a class="btn btn-info mr-1" href="/{{ request()->segment(1)  }}/' + row['id'] + '/edit">Edit</a>' +
                            '<form action="/{{ request()->segment(1) }}/' + row['id']+ '/delete" method="post" class="d-inline">' +
                            '<input type="hidden" name="_method" value="DELETE" />' +
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}" />' +
                            '<input type="submit" class="btn btn-danger ml-1" value="DELETE" />' +
                            '</form>';
                    }
                }],
                "pageLength": 100,
                "lengthMenu": [10, 50, 100],
                dom: "frtip", //  lengthMenu-nu disable edir

            });
        } );
    </script>
@endsection
