<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.loginForm');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string',
        ]);


        if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
        {
            return redirect('admin');
        }
        return back();
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/loginform');

    }

} 
