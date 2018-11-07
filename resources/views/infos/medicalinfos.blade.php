@extends('layouts.app')
@section('content')
    <h3 class="text-center">{{ $user->name }}</h3>
    <div class="table-responsive-lg">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">doktor</th>
                <th scope="col">General_state</th>
                <th scope="col">temperature</th>
                <th scope="col">blood_pressure</th>
                <th scope="col">Pulse</th>
                <th scope="col">Alcohol_test</th>
                <th scope="col">result</th>
            </tr>
            </thead>
            <tbody>
            @foreach($medicalinfos as $medicalinfo)
                <tr>
                    <th scope="row">{{ $n-- }}</th>
                    <td>{{ $medicalinfo->doctor->name }}</td>
                    <td>{{ $medicalinfo->General_state }}</td>
                    <td>{{ $medicalinfo->temperature }}</td>
                    <td>{{ $medicalinfo->blood_pressure }}</td>
                    <td>{{ $medicalinfo->Pulse }}</td>
                    <td>{{ $medicalinfo->Alcohol_test }}</td>
                    <td>
                        @if($medicalinfo->result == '1')
                            <i class="fas fa-check-circle"></i>
                        @else
                            <i class="fas fa-ban"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $medicalinfos->links() }}
@endsection