<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function login(){
        $data['title'] = 'Sell In Product';
        $data['title'] = "Login";
        
        return view('login')->with($data);
    }
    public function doLogin(Request $req){
        $email = $req->email;
        $password = $req->password;

        $data = User::where('email', $email)->first();
        if(count($data) > 0){
            if(Hash::check($password, $data->password)){
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('login', TRUE);

                return redirect('/');
            } else {
                return redirect('login')->with('alert', 'Email atau Password Salah!');
            }
        } else {
            return redirect('login')->with('alert', 'Email atau Password Salah!');
        }
    }

    public function logout(){
        Auth::logout();;
        return redirect('login')->with('Anda sudah logout!');
    }
}
