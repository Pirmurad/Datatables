@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customers') }}</div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                  <tr>
                                      <td>{{ $customer->name }}</td>
                                      <td>{{ $customer->surname }}</td>
                                      <td>{{ $customer->email }}</td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>$(document).ready(function () {
            $.noConflict();
            var table = $('#example').DataTable();
        });
    </script>

@endsection
