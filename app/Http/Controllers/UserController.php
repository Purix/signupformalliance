<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function store(Request $request)
    {


        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;


        $user->save();
        return response()->json(['success'=>'Data is successfully added']);
    }


}
