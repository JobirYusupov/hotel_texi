@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 nocanvas">
                <div class="card">
                    <div class="card-header">{{ __('Mashina') }}</div>

                    <div class="card-body" id="card-body">
                        <form method="POST" action="{{ route('car.store') }}"  enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="images" class="col-sm-4 col-form-label text-md-right">{{ __('images') }}</label>

                                <div class="col-md-6">
                                    <input id="images" multiple type="file" class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" name="images[]" value="{{ old('images') }}" required>

                                    @if ($errors->has('images'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('images') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-sm-4 col-form-label text-md-right">{{ __('brand') }}</label>

                                <div class="col-md-6">
                                    <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('brand') }}" required>

                                    @if ($errors->has('brand'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('brand') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-sm-4 col-form-label text-md-right">{{ __('model') }}</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required>

                                    @if ($errors->has('model'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('model') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="release_date" class="col-sm-4 col-form-label text-md-right">{{ __('release_date') }}</label>

                                <div class="col-md-6">
                                    <input id="release_date" type="text" class="form-control{{ $errors->has('release_date') ? ' is-invalid' : '' }}" name="release_date" value="{{ old('release_date') }}" required>

                                    @if ($errors->has('release_date'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('release_date') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-sm-4 col-form-label text-md-right">{{ __('color') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color') }}" required>

                                    @if ($errors->has('color'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('color') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_number" class="col-sm-4 col-form-label text-md-right">{{ __('car_number') }}</label>

                                <div class="col-md-6">
                                    <input id="car_number" type="text" class="form-control{{ $errors->has('car_number') ? ' is-invalid' : '' }}" name="car_number" value="{{ old('car_number') }}" required>

                                    @if ($errors->has('car_number'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('car_number') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_type" class="col-sm-4 col-form-label text-md-right">{{ __('order_type') }}</label>

                                <div class="col-md-6">
                                    <input id="order_type" type="text" class="form-control{{ $errors->has('order_type') ? ' is-invalid' : '' }}" name="order_type" value="{{ old('order_type') }}" required>

                                    @if ($errors->has('order_type'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('order_type') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insurance_company_name" class="col-sm-4 col-form-label text-md-right">{{ __('insurance_company_name') }}</label>

                                <div class="col-md-6">
                                    <input id="insurance_company_name" type="text" class="form-control{{ $errors->has('insurance_company_name') ? ' is-invalid' : '' }}" name="insurance_company_name" value="{{ old('insurance_company_name') }}" required>

                                    @if ($errors->has('insurance_company_name'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('insurance_company_name') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="insurance_expiration_date" class="col-sm-4 col-form-label text-md-right">{{ __('insurance_expiration_date') }}</label>

                                <div class="col-md-6">
                                    <input id="insurance_expiration_date" type="text" class="form-control{{ $errors->has('insurance_expiration_date') ? ' is-invalid' : '' }}" name="insurance_expiration_date" value="{{ old('insurance_expiration_date') }}" required>

                                    @if ($errors->has('insurance_expiration_date'))
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('insurance_expiration_date') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Tayyor') }}
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