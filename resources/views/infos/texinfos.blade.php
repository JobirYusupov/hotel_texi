@extends('layouts.app')
@section('content')
    <h3 class="text-center">{{ $user->name }}</h3>
   <div class="table-responsive-lg">
       <table class="table">
           <thead class="thead-dark">
           <tr>
               <th scope="col">#</th>
               <th scope="col">texnik</th>
               <th scope="col">g'ildirak</th>
               <th scope="col">yoritish</th>
               <th scope="col">kuzov</th>
               <th scope="col">tozalik</th>
               <th scope="col">driver_license</th>
               <th scope="col">technical_coupon</th>
               <th scope="col">emergency_equipment</th>
               <th scope="col">braking_path</th>
               <th scope="col">result</th>
           </tr>
           </thead>
           <tbody>
           @foreach($texinfos as $texinfo)
               <tr>
                   <th scope="row">{{ $n-- }}</th>
                   <td>{{ $texinfo->technician->name }}</td>
                   <td>{{ $texinfo->wheel_pressure_and_position }}</td>
                   <td>{{ $texinfo->lighting_and_limensions }}</td>
                   <td>{{ $texinfo->car_body_condition }}</td>
                   <td>{{ $texinfo->cleanliness_of_salon }}</td>
                   <td>{{ $texinfo->driver_license }}</td>
                   <td>{{ $texinfo->technical_coupon }}</td>
                   <td>{{ $texinfo->emergency_equipment }}</td>
                   <td>{{ $texinfo->braking_path }}</td>
                   <td>
                       @if($texinfo->result == '1')
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
    {{ $texinfos->links() }}
@endsection