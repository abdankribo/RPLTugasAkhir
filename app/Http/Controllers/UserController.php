<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller
{
    public function login(){
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function login_action(request $request){

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors('password', 'Wrong email or passord !!!');
        
    }

    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
