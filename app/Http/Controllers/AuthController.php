<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function submitRegistration(Request $request) {
        $user = User::select('*')->where('email',$request->email)->first();
        if($user) return redirect()->route('register')->with('failed','email sudah terdaftar!');
        
        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->email = $request->email;
        if($request->email == 'firmansyahfirli93@gmail.com'){
            $user->role = 'gm';
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->view('login')->with('registered','Akun berhasil di tambahkan!');
    }

    function submitLogin(Request $request){
        $userdata = $request->only('email','password');

        if (Auth::attempt($userdata)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('failed','Email atau kata sandi salah');
        }

    }

    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function userProfile(){
        $user_id = Auth::user()->id;
        $user = User::select('*')->where('id', $user_id)->first();
        return view('user_profile', compact('user'));
    }

    public function userEditSave(Request $request,$id){
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' =>$request->address,
            'phone_number' => $request->phone_number
        ]);

        if($request->file()){
            User::where('id', $id)->update(['img' => $request->file('img')->store('users/profile_pictures', 'public')]);
        }
        return redirect()->route('userProfile');
    }

    public function manageUser(){
        $id = User::max('id') + 1;
        $users = User::all();

        return view('manage.user', compact('users','id'));
    }

    public function manageUserEdit(Request $request ,$id){
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        if($request->role) User::where('id',$id)->update(['role' => $request->role]);
        if($request->password) User::where('id', $id)->update(['password' => $request->password]);

        return redirect()->back();
    }
    public function manageUserDelete($id){
        User::where('id', $id)->delete();

        return redirect()->back();
    }

    public function manageUserDeleteSelected(Request $request){
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:users,id'
        ]);
        User::whereIn('id', $request->ids)->delete();

        return redirect()->back();
    }

    public function manageUserAdd(Request $request){
        $user = User::select('*')->where('email',$request->email)->first();
        if($user) return redirect()->route('manageUser')->with('exist','email sudah terdaftar!');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        
        return redirect()->back();
    }
}
