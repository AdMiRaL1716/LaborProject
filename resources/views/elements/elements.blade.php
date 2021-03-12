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
                    <div class="card-header">{{ __('Elements') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Symbol</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($elements as $element)
                                <tr>
                                    <td>{{$element->title}}</td>
                                    <td>{{$element->symbol}}</td>
                                    <td><a href="edit-element/{{$element->id}}">Edit</a>
                                        <a href="delete-element/{{$element->id}}">Delete</a>
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
