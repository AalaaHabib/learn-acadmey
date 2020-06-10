<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class ContactController extends Controller
{
    public function show()
    {
        $setting = Setting::first();
        return view('user.contact' , compact('setting'));
    }
}
