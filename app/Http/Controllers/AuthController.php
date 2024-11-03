<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function submitRegistration(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }

    function submitLogin(Request $request){
        $userdata = $request->only('email','password');

        if (Auth::attempt($userdata)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('failed','Who are you?');
        }

    }

    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
