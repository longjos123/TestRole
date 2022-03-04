<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function postLogin(LoginFormRequest $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' =>Hash::make($request->password),
        ];

        if(Auth::attempt($credentials)){
            var_dump('aaa');die();
        }

    }



}
