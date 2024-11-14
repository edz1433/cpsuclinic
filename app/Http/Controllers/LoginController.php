<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function loginAuthenticate(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $validated=auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password,
        ],$request->password);

        if($validated){
            return redirect()->route('dash')->with('success','Login Successfully');
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }
}
