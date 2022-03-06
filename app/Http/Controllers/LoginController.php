<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewLogin()
    {
       return view('login');
    }

    /**
     * @param Request $request
     */
    public function postLogin(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

        }


    }



}
