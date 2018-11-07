<?php

namespace App\Http\Controllers;

use App\Car;
use App\Carimage;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
    public function create($user_id)
    {
        return view('profile.create', ['user_id'=>$user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().request()->image->getClientOriginalName();

        request()->image->storeAs('images', $imageName);

        if ($request->car_id == "yangi")
        {
            request()->validate([
                'insurance_company_name' => 'required',
                'insurance_expiration_date' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'release_date' => 'required',
                'color' => 'required',
                'car_number' => 'required',
                'order_type' => 'required',
            ]);


            $car = Car::create($request->all());

            foreach ($request->images as $image) {
                $imagename = time().$image->getClientOriginalName();
                $image->storeAs('images/car_images', $imagename);
                Carimage::create([
                    'car_id' => $car->id,
                    'image' => 'images/car_images/'.$imagename,
                ]);
            }

            $requestData = $request->all();
            $requestData['car_id'] = $car->id;

        }else{
            $requestData = $request->all();
        }

        $profile = Profile::create($requestData);
        $profile->update(['image'=>'images/'.$imageName]);

        $profile_id = User::find($request->user_id)->role->id;
        return redirect()->route('role.show', ['id'=>$profile_id]);
//        return back()
//            ->with('success','You have successfully upload image.')
//            ->with('image',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', ['profile'=>$profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        if ($request->car_id == "yangi")
        {
            request()->validate([
                'insurance_company_name' => 'required',
                'insurance_expiration_date' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'release_date' => 'required',
                'color' => 'required',
                'car_number' => 'required',
                'order_type' => 'required',
            ]);


            $car = Car::create($request->all());

            foreach ($request->images as $image) {
                $imagename = time().$image->getClientOriginalName();
                $image->storeAs('images/car_images', $imagename);
                Carimage::create([
                    'car_id' => $car->id,
                    'image' => 'images/car_images/'.$imagename,
                ]);
            }

            $requestData = $request->all();
            $requestData['car_id'] = $car->id;

        } else{
            $requestData = $request->all();
        }

        if ($request->image != NULL)
        {
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().request()->image->getClientOriginalName();

            request()->image->storeAs('images', $imageName);

            $profile->update($requestData);
            $profile->update(['image'=>'images/'.$imageName]);

            return redirect()->route('role.show', ['id'=>1]);
        } else{
            $imageName = $profile->image;
            $profile->update($requestData);
            $profile->update(['image' => $imageName]);

            return redirect()->route('role.show', ['id'=>1]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
