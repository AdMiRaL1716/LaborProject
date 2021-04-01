@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                    <div class="card-header">{{ __('Add raport') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('new-raport') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="sample_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="sample_name" type="text" class="form-control @error('sample_name') is-invalid @enderror" name="sample_name" required autocomplete="sample_name" autofocus>
                                    @error('sample_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="test_start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start date') }}</label>
                                <div class="col-md-6">
                                    <input id="test_start_date" type="date" class="form-control @error('test_start_date') is-invalid @enderror" name="test_start_date" required autocomplete="test_start_date">
                                    @error('test_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="test_end_date" class="col-md-4 col-form-label text-md-right">{{ __('End date') }}</label>
                                <div class="col-md-6">
                                    <input id="test_end_date" type="date" class="form-control @error('test_end_date') is-invalid @enderror" name="test_end_date"  required autocomplete="test_end_date">
                                    @error('test_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" style="display: none">
                                <label for="id_user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>
                                <div class="col-md-6">
                                    <input id="id_user" type="number" class="form-control @error('id_user') is-invalid @enderror" name="id_user" value="{{ Auth::user()->id }}" required autocomplete="id_user" readonly>
                                    @error('id_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_customer" class="col-md-4 col-form-label text-md-right">{{ __('Customer') }}</label>
                                <div class="col-md-6">
                                    <select id="id_customer" class="form-control @error('id_customer') is-invalid @enderror" name="id_customer" required autocomplete="id_customer">
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->firstName}} {{$customer->lastName}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add new raport') }}
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
