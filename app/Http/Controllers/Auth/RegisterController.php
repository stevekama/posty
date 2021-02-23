<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        //validateion
        $this->validate($request, array(
                'name' => 'required|max:255',
                'username' => 'required',
                'email'=> 'required|email|unique:users|max:255',
                'password' => 'required|confirmed'
            )
        );

        //store user
        $user = new User;
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;

        // save user info
        $user->save();

        // login user
        Auth::attempt($request->only('email', 'password'));

        return redirect('/dashboard');
        
    }
}