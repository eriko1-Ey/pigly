<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //*register/step1に遷移*//
    public function showRegister()
    {
        return view('register');
    }
}
