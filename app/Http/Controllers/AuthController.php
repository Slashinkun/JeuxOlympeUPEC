<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.admin_login');
    }

    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4']);
        $crendentials = ['email' => $request->input('email'),
        'password' => $request ->input('password')];

        if(Auth::attempt($crendentials)){
            $request->session()->regenerate();
            return redirect()->route('auth.compte');
        }

        return to_route('auth.login')->withErrors([
            'email'=> "Mail invalide"
        ])->onlyInput('email');}


    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return to_route('auth.login');}
}
