@extends('layouts.app')
@section('title', 'Raports')
@section('content')
    <!-- Header -->
    <div class="header bg-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Raports</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Raports</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('home')}}" class="btn btn-sm btn-neutral">Home</a>
                        <a href="{{route('add-raport')}}" class="btn btn-sm btn-neutral">New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-list-for">
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
        <div class="card">
            <table class="table align-items-center">
                <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Start date</th>
                    <th scope="col" class="sort" data-sort="name">End date</th>
                    <th scope="col" class="sort" data-sort="budget">User</th>
                    <th scope="col" class="sort" data-sort="name">Customer</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody class="list">
                @foreach($raports as $raport)
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <span class="name mb-0 text-sm">{{$raport->sample_name}}</span>
                                </div>
                            </div>
                        </th>
                        <td class="budget">
                            {{$raport->test_start_date}}
                        </td>
                        <td class="budget">
                            {{$raport->test_end_date}}
                        </td>
                        <td class="budget">
                            @foreach($users as $user)
                                @if($user->id == $raport->id_user)
                                    {{$user->name}}
                                @endif
                            @endforeach
                        </td>
                        <td class="budget">
                            @foreach($customers as $customer)
                                @if($customer->id == $raport->id_customer)
                                    {{$customer->regCode}},
                                    {{$customer->lastName}}
                                @endif
                            @endforeach
                        </td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item open-modal" href="#delete" data-toggle="modal" data-id="{{$raport->id}}">PDF</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" id="action_form" action="new-pdf/">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Download PDF file</h5>
                        <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure, what you want to download the raport ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
