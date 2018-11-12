@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if(Session::get('success'))
            <div class="alert alert-primary container" role="alert">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        @if(Session::get('error'))
            <div class="alert alert-danger container" role="alert">
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
            <div class="row">
                <div class="col-sm">
                    <div class="form-inline">
                        <div class="form-group mx-sm-2">
                            <input type="text" class="form-control" id="number" placeholder="davlat raqami ...">
                        </div>
                        <button type="submit" class="btn btn-primary" id="searchbutton"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-inline float-right">
                        <div class="form-group mx-sm-2">
                            <a class="btn btn-warning float-right m-2" href="{{ route('car.create') }}">Yangi yaratish</a>
                        </div>
                    </div>
                </div>
            </div>

        <div class="table-responsive-md">
            <table class="table table-hover">
                <thead class="table-dark">
                <tr>
                    <th>TR</th>
                    <th>Brend</th>
                    <th>Model</th>
                    <th>Chiqarilgan payt</th>
                    <th>Rangi</th>
                    <th>Davlat raqami</th>
                    <th>Xizmat turi</th>
                    <th>Sug'urta kompaniyasi nomi</th>
                    <th>Sug'urta muddati</th>
                    <th>Haydovchisi</th>
                    <th>Boshqarish</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr class="all" title="{{ $car->car_number }}">
                        <td>{{ $n-- }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->release_date }}</td>
                        <td>{{ $car->color }}</td>
                        <td>{{ $car->car_number }}</td>
                        <td>{{ $car->order_type }}</td>
                        <td>{{ $car->insurance_company_name }}</td>
                        <td>{{ $car->insurance_expiration_date }}</td>
                        <td>{{ ($car->profile != NULL) ? $car->profile->user->name.' '.$car->profile->user->last_name : "" }}</td>
                        <td>
                            <a href="{{ route('car.edit', ['id'=>$car->id]) }}" class="btn btn-primary btn-sm">O'zgartirish</a>
                            <form class="d-inline" method="post" action="{{ route('car.destroy', ['id'=>$car->id]) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">O'chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#searchbutton").click(function () {
                $('.all').hide();

                $('tbody > tr').each(function(  ) {
                    if (this['title'].indexOf($('#number').val()) != -1){
                        $(this).show();
                    }
                });
            });
        });
    </script>
@endsection