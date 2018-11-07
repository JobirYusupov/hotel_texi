<?php

namespace App\Http\Controllers\Auth;

use App\Car;
use App\Carimage;
use App\Http\Middleware\admin;
use App\Http\Middleware\Authenticate;
use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(Authenticate::class);
        $this->middleware(admin::class);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
        ]);
        if (isset($data['image']))
        {
            if ($data['car_id'] == 'yangi')
            {
                $car = Car::create([
                    'insurance_company_name' => $data['insurance_company_name'],
                    'insurance_expiration_date' => $data['insurance_expiration_date'],
                    'brand' => $data['brand'],
                    'model' => $data['model'],
                    'release_date' => $data['release_date'],
                    'color' => $data['color'],
                    'car_number' => $data['car_number'],
                    'order_type' => $data['order_type'],
                ]);

                foreach ($data['images'] as $image) {
                    $imagename = time().$image->getClientOriginalName();
                    $image->storeAs('images/car_images', $imagename);
                    Carimage::create([
                        'car_id' => $car->id,
                        'image' => 'images/car_images/'.$imagename,
                    ]);
                }

                $car_id = $car->id;
            } else{
                $car_id = $data['car_id'];
            }

            $imageName = time().$data['image']->getClientOriginalName();
            $data['image']->storeAs('images', $imageName);
            $profile = Profile::create([
                'user_id' => $user->id,
                'image'=>'images/'.$imageName,
                'phone_number' => $data['phone_number'],
                'inn' => $data['inn'],
                'bank_name' => $data['bank_name'],
                'card_number' => $data['card_number'],
                'card_expiration_date' => $data['card_expiration_date'],
                'bank_account_number' => $data['bank_account_number'],
                'certificate_serial_number' => $data['certificate_serial_number'],
                'certified_date' => $data['certified_date'],
                'certificate_expiration_date' => $data['certificate_expiration_date'],
                'License_ownership_information' => $data['License_ownership_information'],
                'Validity_of_the_license' => $data['Validity_of_the_license'],
                'car_id' => $car_id
            ]);
        }
        return $user;
    }
}
