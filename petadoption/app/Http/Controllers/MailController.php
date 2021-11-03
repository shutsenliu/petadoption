<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $req) {

        $details = [
            'title' => $req->input("feedbackSubject"),
            'body' => $req->input("feedbackContent"),
            'from' => $req->input("feedbackName")

        ];

        Mail::to("petadopttestmail@gmail.com")->send(new SendMail($details));
        return redirect("/home/index");
    }
}
