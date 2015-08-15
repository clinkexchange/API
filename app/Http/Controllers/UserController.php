<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Response;
use Input;
use Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function register()
    {
        User::create(array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ));

        return response()->json(['success' => 'User creted successfully.'], 200);
    }

   
    

}
