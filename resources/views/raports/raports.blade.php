@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('status') }}
                        </div>
                    @elseif(session('failed'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="card-header">{{ __('Raports') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">User</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($raports as $raport)
                                <tr>
                                    <td>{{$raport->sample_name}}</td>
                                    <td>{{$raport->test_start_date}}</td>
                                    <td>{{$raport->test_end_date}}</td>
                                    <td>{{$raport->id_user}}</td>
                                    <td>{{$raport->id_customer}}</td>
                                    <td>
                                        <a href="delete-raport/{{$raport->id}}">Delete</a>
                                        <a href="new-pdf/{{$raport->id}}">PDF</a>
                                    </td>
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
