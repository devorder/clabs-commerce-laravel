<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

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
}
