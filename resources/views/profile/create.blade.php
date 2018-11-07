@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 nocanvas">
                <div class="card">
                    <div class="card-header">{{ __('Profil') }}</div>

                    <div class="card-body" id="card-body">
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">

                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-sm-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required>

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inn" class="col-sm-4 col-form-label text-md-right">{{ __('INN') }}</label>

                                <div class="col-md-6">
                                    <input id="inn" type="text" class="form-control{{ $errors->has('inn') ? ' is-invalid' : '' }}" name="inn" value="{{ old('inn') }}" required>

                                    @if ($errors->has('inn'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('inn') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_name" class="col-sm-4 col-form-label text-md-right">{{ __('bank_name') }}</label>

                                <div class="col-md-6">
                                    <input id="bank_name" type="text" class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" value="{{ old('bank_name') }}" required>

                                    @if ($errors->has('bank_name'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bank_name') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_number" class="col-sm-4 col-form-label text-md-right">{{ __('card_number') }}</label>

                                <div class="col-md-6">
                                    <input id="card_number" type="text" class="form-control{{ $errors->has('card_number') ? ' is-invalid' : '' }}" name="card_number" value="{{ old('card_number') }}" required>

                                    @if ($errors->has('card_number'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('card_number') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card_expiration_date" class="col-sm-4 col-form-label text-md-right">{{ __('card_expiration_date') }}</label>

                                <div class="col-md-6">
                                    <input id="card_expiration_date" type="text" class="form-control{{ $errors->has('card_expiration_date') ? ' is-invalid' : '' }}" name="card_expiration_date" value="{{ old('card_expiration_date') }}" required>

                                    @if ($errors->has('card_expiration_date'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('card_expiration_date') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_account_number" class="col-sm-4 col-form-label text-md-right">{{ __('bank_account_number') }}</label>

                                <div class="col-md-6">
                                    <input id="bank_account_number" type="text" class="form-control{{ $errors->has('bank_account_number') ? ' is-invalid' : '' }}" name="bank_account_number" value="{{ old('bank_account_number') }}" required>

                                    @if ($errors->has('bank_account_number'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bank_account_number') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="certificate_serial_number" class="col-sm-4 col-form-label text-md-right">{{ __('certificate_serial_number') }}</label>

                                <div class="col-md-6">
                                    <input id="certificate_serial_number" type="text" class="form-control{{ $errors->has('certificate_serial_number') ? ' is-invalid' : '' }}" name="certificate_serial_number" value="{{ old('certificate_serial_number') }}" required>

                                    @if ($errors->has('certificate_serial_number'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('certificate_serial_number') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="certified_date" class="col-sm-4 col-form-label text-md-right">{{ __('certified_date') }}</label>

                                <div class="col-md-6">
                                    <input id="certified_date" type="text" class="form-control{{ $errors->has('certified_date') ? ' is-invalid' : '' }}" name="certified_date" value="{{ old('certified_date') }}" required>

                                    @if ($errors->has('certified_date'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('certified_date') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="certificate_expiration_date" class="col-sm-4 col-form-label text-md-right">{{ __('certificate_expiration_date') }}</label>

                                <div class="col-md-6">
                                    <input id="certificate_expiration_date" type="text" class="form-control{{ $errors->has('certificate_expiration_date') ? ' is-invalid' : '' }}" name="certificate_expiration_date" value="{{ old('certificate_expiration_date') }}" required>

                                    @if ($errors->has('certificate_expiration_date'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('certificate_expiration_date') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="License_ownership_information" class="col-sm-4 col-form-label text-md-right">{{ __('License_ownership_information') }}</label>

                                <div class="col-md-6">
                                    <input id="License_ownership_information" type="text" class="form-control{{ $errors->has('License_ownership_information') ? ' is-invalid' : '' }}" name="License_ownership_information" value="{{ old('License_ownership_information') }}" required>

                                    @if ($errors->has('License_ownership_information'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('License_ownership_information') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Validity_of_the_license" class="col-sm-4 col-form-label text-md-right">{{ __('Validity_of_the_license') }}</label>

                                <div class="col-md-6">
                                    <input id="Validity_of_the_license" type="text" class="form-control{{ $errors->has('Validity_of_the_license') ? ' is-invalid' : '' }}" name="Validity_of_the_license" value="{{ old('Validity_of_the_license') }}" required>

                                    @if ($errors->has('Validity_of_the_license'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Validity_of_the_license') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" id="car_id_raw">
                                <label for="car_id" class="col-sm-4 col-form-label text-md-right">{{ __('car_id') }}</label>

                                <div class="col-md-6">
                                    <select name="car_id" id="car_id" class="form-control">
                                        <option value="yangi">yangi qo'shish</option>
                                        @foreach(\App\Car::all() as $car)
                                            @if($car->profile == NULL)
                                            <option value="{{ $car->id }}">{{ $car->car_number }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @if ($errors->has('car_id'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('car_id') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            {{--mashinani formasi--}}
                            <div id="mashina">
                                <div class="form-group row">
                                    <label for="images" class="col-sm-4 col-form-label text-md-right">{{ __('images') }}</label>

                                    <div class="col-md-6">
                                        <input id="images" multiple type="file" class="form-control{{ $errors->has('images') ? ' is-invalid' : '' }}" name="images[]" value="{{ old('images') }}" required>

                                        {{--@if ($errors->has('images'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('images') }}</strong>--}}
                                        {{--</span>--}}
                                        {{--@endif--}}
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

                            </div>
                            {{--mashinani formasi tugashi--}}

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
            <div class="col-md-4" id="salom">
                    <div id="qrcode"></div>

                <button class="btn btn-success nocanvas" id="print-link">print</button>



            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        var id = $('#user_id').val();
        $('#qrcode').qrcode({
            text: id
        });

        $('#print-link').on('click', function() {
            $('.nocanvas').hide();
            window.print();
            window.location.reload();
        });


        var mashina = $("[id=mashina]");

        $("#car_id").change(function(){
            if ($("#car_id").val() != "yangi"){
                $(mashina).detach();
            }
            else{
                $($("#car_id_raw")).after(mashina);
            }
        });

        // $('#print-link').on('click', function() {
        //     $.print("#salom");
        // });
    </script>
@endsection