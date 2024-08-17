<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeUserMail;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function create(Request $request) {
        $userName = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            Mail::to($email, $userName)->send(new WelcomeUserMail($userName));
            User::create([
                'name' => $userName,
                'email' => $email,
                'password' => $password
            ]);
            
            return redirect('login');
        } catch (Exception $e) {
            logger('error occured ' .$e->getMessage());
            return back();
        }
    }

}
