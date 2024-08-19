<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Jobs\welcomeMailSender;
use Exception;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function create(Request $request) {
        $userName = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            User::create([
                'name' => $userName,
                'email' => $email,
                'password' => $password
            ]);
            welcomeMailSender::dispatch($email, $userName);
            return redirect('login');
        } catch (Exception $e) {
            logger('error occured ' .$e->getMessage());
            return back();
        }
    }

}
