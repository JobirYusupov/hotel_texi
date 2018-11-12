<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Users;
use App\Medicalinfo;
use App\Texinfo;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends BaseController
{
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]) and (request('role_id') == Auth::user()->role_id)){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
//            if ($user->role_id == 1)
//            {
//                $user->profile = $user->profile;
//            }
            $success['user'] = $user;
            return $this->sendResponse($success, "Shaxsingiz tasdiqlandi.");
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function showForSelf($id)
    {
        $user = User::find($id);
        $success['user'] = new Users($user);
        return $this->sendResponse($success, "Ma'lumotlaringiz yangilandi");
    }

    public function show($id)
    {
        $user = User::find($id);
        $user->profile = $user->profile;

        $requester = Auth::user();
        if ($requester->role_id == 2)
        {
            $user->medicalinfos = $user->medicalinfo()->orderBy('created_at', 'desc')->take(7)->get();
        }
        if ($requester->role_id == 3)
        {
            $car = $user->profile->car;
            $car_images = $user->profile->car->images;
            $user->texinfos = $user->texinfo()->orderBy('created_at', 'desc')->take(7)->get();
        }

        $success['user'] = $user;
        return $this->sendResponse($success, "Haydovchi ma'lumotlari yuborildi");
    }

    public function storemedicalinfo(Request $request)
    {
        $medicalinfo = Medicalinfo::create($request->all());
        $success["medicalinfo"] = $medicalinfo;
        return $this->sendResponse($success, "Haydovchi tibbiy ma'lumotlari qo'shildi");
    }

    public function storetexinfo(Request $request)
    {
        $texinfo = Texinfo::create($request->all());
        $success["texinfo"] = $texinfo;
        return $this->sendResponse($success, "Haydovchi automobili texnik ma'lumotlari qo'shildi");
    }

    public function index()
    {
        $users = User::all()->where('role_id', 1);
        foreach ($users as $key => $user)
        {
            $success[$key] = new Users($user);
        }

        return $this->sendResponse($success, "Haydovchilarning ma'lumotlari yuborildi");
    }
}
