@extends('layouts.app')
@section('css')
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel/owl.theme.default.min.css') }}">
    <style>
        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }
    </style>
@endsection
@section('content')
    {{--carusel--}}
    <section id="demos" style="overflow: hidden">
        <div class="row">
            <div class="large-12 columns" >
                <div class="owl-carousel owl-theme">
                    @foreach($car->images as $image)
                        <div class="item">
                            <img src="{{ asset('/storage/'.$image->image) }}" alt="rasm" class="img img-fluid"   style="height: 200px;">
                            <div class="bottom-left">
                                <form action="{{ route('carimage.destroy', ['id'=>$image->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{--end carusel--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 nocanvas">
                <form class="my-3" action="{{ route('carimage.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="hidden" value="{{ $car->id }}" name="car_id">
                            <input type="file" multiple name="images[]" required>
                            <button class="btn btn-primary"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                </form>
                <div class="card">
                    <div class="card-header">{{ __("Mashina ma'lumotlarini o'zgartirish") }}</div>

                    <div class="card-body" id="card-body">
                        <form method="POST" action="{{ route('car.update', ['id'=>$car->id]) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="brand" class="col-sm-4 col-form-label text-md-right">{{ __('brand') }}</label>

                                <div class="col-md-6">
                                    <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('brand', $car->brand) }}" required>

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
                                    <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model', $car->model) }}" required>

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
                                    <input id="release_date" type="text" class="form-control{{ $errors->has('release_date') ? ' is-invalid' : '' }}" name="release_date" value="{{ old('release_date', $car->release_date) }}" required>

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
                                    <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ old('color', $car->color) }}" required>

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
                                    <input id="car_number" type="text" class="form-control{{ $errors->has('car_number') ? ' is-invalid' : '' }}" name="car_number" value="{{ old('car_number', $car->car_number) }}" required>

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
                                    <input id="order_type" type="text" class="form-control{{ $errors->has('order_type') ? ' is-invalid' : '' }}" name="order_type" value="{{ old('order_type', $car->order_type) }}" required>

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
                                    <input id="insurance_company_name" type="text" class="form-control{{ $errors->has('insurance_company_name') ? ' is-invalid' : '' }}" name="insurance_company_name" value="{{ old('insurance_company_name', $car->insurance_company_name) }}" required>

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
                                    <input id="insurance_expiration_date" type="text" class="form-control{{ $errors->has('insurance_expiration_date') ? ' is-invalid' : '' }}" name="insurance_expiration_date" value="{{ old('insurance_expiration_date', $car->insurance_expiration_date) }}" required>

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
@section('script')
    <script src="{{ asset('js/carousel/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        })
    </script>
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('.owl-carousel').owlCarousel({--}}
                {{--margin: 10,--}}
                {{--loop: true,--}}
                {{--autoWidth: false,--}}
                {{--items: 4--}}
            {{--})--}}
        {{--})--}}
    {{--</script>--}}

@endsection