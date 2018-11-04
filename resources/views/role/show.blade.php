@extends('layouts.app')
@section('content')
   <div class="container">
       @if(Session::get('success'))
           <div class="alert alert-primary" role="alert">
               <strong>{{ Session::get('success') }}</strong>
           </div>
       @endif
       <div class="table-responsive-md">
           <table class="table table-hover">
               <thead class="table-dark">
               <tr>
                   <th>TR</th>
                   <th>Ismi</th>
                   <th>Familiyasi</th>
                   <th>Otasining ismi</th>
                   <th>Email</th>
                   <th>Qo'shilgan payt</th>
                   <th>Boshqarish</th>
               </tr>
               </thead>
               <tbody>
                @foreach($role->users()->Latest()->get() as $user)
               <tr>
                   <td>{{ $n-- }}</td>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->last_name }}</td>
                   <td>{{ $user->patronymic }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->created_at }}</td>
                   <td>
                       @if($user->role->id == 1)
                           <a href="{{ $user->profile== NULL ? route('profile.create', ['user_id'=>$user->id]): route('profile.edit', ['id'=>$user->profile->id ]) }}" class="btn {{ $user->profile== NULL ? " btn-warning ": " btn-success " }}btn-sm">Profil</a>
                       @endif
                       <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-primary btn-sm">O'zgartirish</a>
                           <form class="d-inline" method="post" action="{{ route('user.delete', ['id'=>$user->id]) }}">
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