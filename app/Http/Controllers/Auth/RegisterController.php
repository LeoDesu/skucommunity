<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'gender' => ['required'],
            'dob' => ['required'],
            'address' => ['required'],
            'role' => ['required'],
            'major_id' => ['required'],
            'tel' => ['required', 'integer', 'digits:8', 'unique:users'],
            'email' => ['email', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed']
        ],[
            'name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'surname.required' => 'ທ່ານຕ້ອງປ້ອນນາມສະກຸນກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'gender.required' => 'ທ່ານຕ້ອງເລືອກເພດກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'dob.required' => 'ທ່ານຕ້ອງເລືອກວັນເດືອນປີເກີດກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'address.required' => 'ທ່ານຕ້ອງປ້ອນທີ່ຢູ່ກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'role.required' => 'ທ່ານຕ້ອງເລືອກບົດບາດກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'major.required' => 'ທ່ານຕ້ອງເລືອກສາຂາກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'tel.required' => 'ທ່ານຕ້ອງປ້ອນເບີໂທກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'tel.digits' => 'ໂບໂທຕ້ອງເປັນຕົວເລກ 8 ຕົວ',
            'email.email' => 'ທ່ານຕ້ອງປ້ອນທີ່ຢູ່ອີເມລ',
            'password.required' => 'ທ່ານຕ້ອງປ້ອນລະຫັດຜ່ານກ່ອນຈຶ່ງສາມາດດໍາເນີນການຕໍ່ໄດ້',
            'password.min' => 'ລະຫັດຜ່ານຕ້ອງມີຢ່າງໜ້ອຍ 8 ຕົວ',
        ]
    );}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['dob'],
            'address' => $data['address'],
            'role' => $data['role'],
            'major_id' => $data['major_id'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
