<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectTo()
    {
        $role = Auth::user()->role;
        
        switch($role){
            case 'admin':
                return '/admin';
            break;
            case 'penyedia':
                return '/';
            break;
            case 'penyewa':
                return '/';
            break;
        }
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
            'nama_user' => ['required', 'string', 'max:255', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'numeric', 'min:8', 'unique:users'],
            'gender' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string'],
            'img_ktp' => 'image|mimes:jpg,png,jpeg|max:2048'
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
        if(isset($data['img_ktp'])){
            $file = $data['img_ktp'];
            $nama_file = time()."_KTP_".$file->getClientOriginalName();
    
            $tujuan_upload = 'img/res/users/';
            $file->move($tujuan_upload,$nama_file);
        } else{
            $nama_file = '';
        }
        

        return User::create([
            'nama_user' => $data['nama_user'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'img_ktp' => $nama_file,
            'status_user' => 'not_ver',
        ]);
    }
}
