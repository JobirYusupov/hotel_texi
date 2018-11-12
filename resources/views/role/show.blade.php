@extends('layouts.app')
@section('css')
    <style>
        .bg-table-success{
            background-color: rgba(0, 255, 0, 0.7);
        }
        .bg-table-danger{
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
        }
        a {
            color: inherit;
        }
    </style>
@endsection
@section('content')
   <div class="container">
       @if(Session::get('success'))
           <div class="alert alert-primary" role="alert">
               <strong>{{ Session::get('success') }}</strong>
           </div>
       @endif
       @if($role->id == 1)
       <div class="row">
           <div class="col-sm">
               <div class="form-group">
                   <select name="tur" id="tur" class="form-control">
                       <option value="1">Hammasi</option>
                       <option value="2">O'tganlar</option>
                       <option value="3">O'tmaganlar</option>
                       <option value="4">Shifokordan o'tmaganlar</option>
                       <option value="5">Texnikdan o'tmaganlar</option>
                   </select>
               </div>
           </div>
           <div class="col-sm">
               <div class="form-inline float-right">
                   <div class="form-group mx-sm-2 mb-2">
                       <input type="text" class="form-control" id="username" placeholder="qidiring...">
                   </div>
                   <button type="submit" class="btn btn-primary mb-2" id="searchbutton"><i class="fas fa-search"></i></button>
               </div>
           </div>
       </div>
       @endif
       <div class="table-responsive-md">
           <table class="table">
               <thead class="table-dark">
               <tr>
                   <th>TR</th>
                   <th>Ismi</th>
                   <th>Familiyasi</th>
                   <th>Otasining ismi</th>
                   <th>Email</th>
                   <th>Qo'shilgan payt</th>
                   @if($role->id == 1)
                       <th style="font-size: 150%;"><i class="fas fa-briefcase-medical"></i></th>
                       <th style="font-size: 150%;"><i class="fas fa-cogs"></i></th>
                   @endif
                   <th>Boshqarish</th>
               </tr>
               </thead>
               <tbody>
                @foreach($role->users()->Latest()->get() as $user)
               <tr class="all
               @if ($role->id == 1 and count($user->medicalinfo) and count($user->texinfo) and $user->medicalinfo->last()->result == '1' and $user->texinfo->last()->result == '1')
                       bg-table-success not-error
               @elseif($role->id == 1 and count($user->medicalinfo) and count($user->texinfo) and !($user->medicalinfo->last()->result == '1' and $user->texinfo->last()->result == '1'))
                        bg-table-danger
               @endif
               @if($role->id == 1 and count($user->medicalinfo) and $user->medicalinfo->last()->result == '0')
                    med-error
               @endif
               @if($role->id == 1 and count($user->texinfo) and $user->texinfo->last()->result == '0')
                       tex-error
               @endif
                       " title="{{ $user->name.' '.$user->last_name.' '.$user->patronymic}}">
                   <td>{{ $n-- }}</td>
                   <td>{{ $user->name }}</td>
                   <td>{{ $user->last_name }}</td>
                   <td>{{ $user->patronymic }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->created_at }}</td>
                   @if($role->id == 1)
                       <td style="font-size: 150%;">
                       @if(count($user->medicalinfo))
                           @if($user->medicalinfo->last()->result == '1')
                                   <a href="{{ route('user.medicalinfos', ['id'=>$user->id]) }}"><i class="fas fa-check-circle"></i></a>
                           @else
                                   <a href="{{ route('user.medicalinfos', ['id'=>$user->id]) }}"><i class="fas fa-ban"></i></a>
                           @endif
                       @endif
                       </td>
                       <td style="font-size: 150%;">
                           @if(count($user->texinfo))
                               @if($user->texinfo->last()->result == '1')
                                   <a href="{{ route('user.texinfos', ['id'=>$user->id]) }}"><i class="fas fa-check-circle"></i></a>
                               @else
                                   <a href="{{ route('user.texinfos', ['id'=>$user->id]) }}"><i class="fas fa-ban"></i></a>
                               @endif
                           @endif
                       </td>
                   @endif
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
@section('script')
    <script>
        $(document).ready(function () {
            $("#tur").change(function () {
                if ($("#tur").val() == "1"){
                    $('.all').show();
                }
                if ($("#tur").val() == "2"){
                    $('.all').hide();
                    $('.not-error').show();
                }
                if ($("#tur").val() == "3"){
                    $('.all').hide();
                    $('.med-error').show();
                    $('.tex-error').show();
                }
                if ($("#tur").val() == "4"){
                    $('.all').hide();
                    $('.med-error').show();
                }
                if ($("#tur").val() == "5"){
                    $('.all').hide();
                    $('.tex-error').show();
                }
            });
            $("#searchbutton").click(function () {
                $('.all').hide();
                var username = $("#username").val();

                $('tbody > tr').each(function(  ) {
                    //alert(this['title']);
                   if (this['title'].indexOf($('#username').val()) != -1){
                       $(this).show();
                   }
                });
            });
        });
    </script>
@endsection