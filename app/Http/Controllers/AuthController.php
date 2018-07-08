<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->username != "admin") {
            session()->flash('error_message', 'Username atau Password salah');
            return redirect()->route('login-view');
        }
        
    	$user = User::where(['username' => $request->username, 'password' => $request->password])->first();

    	if ($user !== null) {
    		session(['user' => $user]);
    	}else {
    		session()->flash('error_message', 'Username atau Password salah');
    		return redirect()->route('login-view');
    	}

    	return redirect()->route('articles');
    }

    public function login_view()
    {
    	if(session()->has('user')) {
            return redirect()->route('articles');
        }
        return view('login');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
