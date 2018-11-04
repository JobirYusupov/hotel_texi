@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 nocanvas">
                <div class="card">
                    <div class="card-header">{{ __('Profil') }}</div>

                    <div class="card-body" id="card-body">
                        <form method="post" action="{{ route('profile.update', ['id'=>$profile->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" id="user_id" value="{{ $profile->user->id }}">

                            <div class="form-group row">
                                <label for="image" class="col-sm-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" autofocus>

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
                                    <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number', $profile->phone_number) }}" required>

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
                                    <input id="inn" type="text" class="form-control{{ $errors->has('inn') ? ' is-invalid' : '' }}" name="inn" value="{{ old('inn', $profile->inn) }}" required>

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
                                    <input id="bank_name" type="text" class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" name="bank_name" value="{{ old('bank_name', $profile->bank_name) }}" required>

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
                                    <input id="card_number" type="text" class="form-control{{ $errors->has('card_number') ? ' is-invalid' : '' }}" name="card_number" value="{{ old('card_number', $profile->card_number) }}" required>

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
                                    <input id="card_expiration_date" type="text" class="form-control{{ $errors->has('card_expiration_date') ? ' is-invalid' : '' }}" name="card_expiration_date" value="{{ old('card_expiration_date', $profile->card_expiration_date) }}" required>

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
                                    <input id="bank_account_number" type="text" class="form-control{{ $errors->has('bank_account_number') ? ' is-invalid' : '' }}" name="bank_account_number" value="{{ old('bank_account_number', $profile->bank_account_number) }}" required>

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
                                    <input id="certificate_serial_number" type="text" class="form-control{{ $errors->has('certificate_serial_number') ? ' is-invalid' : '' }}" name="certificate_serial_number" value="{{ old('certificate_serial_number', $profile->certificate_serial_number) }}" required>

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
                                    <input id="certified_date" type="text" class="form-control{{ $errors->has('certified_date') ? ' is-invalid' : '' }}" name="certified_date" value="{{ old('certified_date', $profile->certified_date) }}" required>

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
                                    <input id="certificate_expiration_date" type="text" class="form-control{{ $errors->has('certificate_expiration_date') ? ' is-invalid' : '' }}" name="certificate_expiration_date" value="{{ old('certificate_expiration_date', $profile->certificate_expiration_date) }}" required>

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
                                    <input id="License_ownership_information" type="text" class="form-control{{ $errors->has('License_ownership_information') ? ' is-invalid' : '' }}" name="License_ownership_information" value="{{ old('License_ownership_information', $profile->License_ownership_information) }}" required>

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
                                    <input id="Validity_of_the_license" type="text" class="form-control{{ $errors->has('Validity_of_the_license') ? ' is-invalid' : '' }}" name="Validity_of_the_license" value="{{ old('Validity_of_the_license', $profile->Validity_of_the_license) }}" required>

                                    @if ($errors->has('Validity_of_the_license'))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('Validity_of_the_license') }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="car_id" class="col-sm-4 col-form-label text-md-right">{{ __('car_id') }}</label>

                                <div class="col-md-6">
                                    <select name="car_id" id="car_id" class="form-control">
                                        @foreach(\App\Car::all() as $car)
                                            @if($car->profile == NULL or $profile->car_id == $car->id)
                                                <option value="{{ $car->id }}" {{ ($profile->car_id == $car->id) ? "selected" : "" }}>{{ $car->car_number }}</option>
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
            <div class="col-md-4" >

                <div class="card nocanvas mb-4" >
                    <img class="card-img-top" src="{{ asset('storage/'.$profile->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">
                            {{ $profile->user->last_name." ".$profile->user->name." ".$profile->user->patronymic }}
                            <br>
                            {{ $profile->user->email }}
                        </p>
                    </div>
                </div>

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


        // $('#print-link').on('click', function() {
        //     $.print("#salom");
        // });
    </script>
@endsection