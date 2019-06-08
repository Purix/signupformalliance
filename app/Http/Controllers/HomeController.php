<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

use App\User;

class HomeController extends Controller
{
    public function mail(Request $request)
    {
        $firstName=$request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;

        Mail::to('test@developers-alliance.com')->send(new SendMailable($firstName,$lastName,$email));

        return 'Email was sent';
    }
}
