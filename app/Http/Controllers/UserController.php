<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->password == NULL or $request->password_confirmation == NULL)
        {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'patronymic' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            ]);

            if($validator->fails()){
                return redirect()->back()->with(['errors'=>$validator->errors()]);
            }

            $user->update([
                $user->role_id = $request->role_id,
                $user->name = $request->name,
                $user->patronymic = $request->patronymic,
                $user->last_name = $request->last_name,
                $user->email = $request->email
            ]);
        } else {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'patronymic' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'password' => 'required|string|min:6|confirmed',
                //'c_password' => 'required|same:password',
            ]);

            if($validator->fails()){
                return redirect()->back()->with(['errors'=>$validator->errors()]);
            }

            $user->update([
                $user->role_id = $request->role_id,
                $user->name = $request->name,
                $user->patronymic = $request->patronymic,
                $user->last_name = $request->last_name,
                $user->email = $request->email,
                $user->password = bcrypt($request->password),
            ]);

        }
        return redirect()->route('role.show', ['id'=>$request->role_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $full_name = $user->name." ".$user->last_name;

        $user->profile()->delete();
        $user->delete();
        return redirect()->back()->with(['success'=>$full_name." muvaffaqiyatli o'chirildi"]);
    }
}
