@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete raport') }}</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <h3>Do you want to delete the raport ?</h3>
                                    <h3>Title: {{$raport->sample_name}}</h3>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{route('raports')}}" class="btn btn-primary">I don't want to</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Yes, I want to') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
