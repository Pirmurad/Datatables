@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Simple table for suctomers') }}</div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
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

