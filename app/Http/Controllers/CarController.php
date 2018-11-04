<?php

namespace App\Http\Controllers;

use App\Car;
use App\Carimage;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderBy('id', 'desc')->get();
        $n = count($cars);
        return view('car.index', ['cars'=>$cars, 'n'=>$n]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
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

        return redirect()->route('car.index')
            ->with('success',"Mashina muvaffaqiyatli qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.edit', ['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
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

        $car->update($request->all());

        return redirect()->route('car.index')
            ->with('success',"Mashina ma'lumotlari muvaffaqiyatli o'zgartirildi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        if($car->profile == NULL)
        {
            $car->delete();
            return redirect()->back()->with(['success'=>"Mashina muvaffaqiyatli o'chirildi"]);
        }else{
            return redirect()->back()->with(['error'=>"Mashina haydovchiga biriktirilgani sababli o'chirishning iloji yo'q"]);
        }
    }
}
