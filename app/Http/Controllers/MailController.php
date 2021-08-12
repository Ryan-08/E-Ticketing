<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\WelcomeMail;
use App\Mail\ResetPassMail;

use App\Models\User;

class MailController extends Controller
{
    // public function reset_pass_mail($email) {
    //     $data = [
    //        'email' => "maskuri.opo8@gmail.com",
    //        'password' => "123456"
    //     ];
    //     Mail::to('maskuri.opo8@gmail.com')->send(new ResetPassMail($data));
    //     // return new ResetPassMail();
    // }

    public function new_user_mail($id, $pass) { 
        $user = User::find($id);
        $data = [
           'email' => $user->email,
           'password' => $pass
        ];
        Mail::to($user->email)->send(new WelcomeMail($data));

        return redirect("/daftar-pengguna")->with('message', 'Akun telah berhasil ditambahkan');
    }  
}
