<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function login(Request $request){
        $user = User::where(['email' => $request->email])->first();
        if($user || Hash::check($request->password, $user->password)){
            $request->session()->put('user', $user);
            return redirect('/');
        }else{
            return "username or password not matched";
        }
    }

    public function logout(){
        if(Session::has('user')){
            Session::forget('user');
            Session::flush();
        }
        return redirect('/');
    }

    public function pay(Request $request){
        return $request->input();
    }
}
