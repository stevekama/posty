<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        # code...
        // validate
        $this->validate($request, array(
                'email'=> 'required|email',
                'password' => 'required'
            )
        );

        // login user
        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid login details');
        }
        
        return redirect('/dashboard');
    }

}