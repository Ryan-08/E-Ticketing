<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function halamanLogin() {
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('login');
    }
    public function login(Request $request) {                
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        // dd($remember);
            
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::id());
            if ($remember == "on") {
                if (Auth::attempt(['email' => $email, 'password' => $password], $remember=true)) {                
                    $request->session()->regenerate();                
                    return redirect()->intended('dashboard');
                }                        
            }        
            $request->session()->regenerate();                    
            return redirect()->intended('dashboard');
        }           
        return redirect('login');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
