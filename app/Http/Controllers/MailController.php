<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        Visitor::create(
            [
                'nama_pengunjung' => $request->namavisitor,
                
            ]);
        
        $details =[
            'title'=>'Kedatangan Tamu',
            'body'=>'Selamat Pagi/Siang Pa/Bu Anda kedatangan tamu yang bernama '. $request->nama_visitor
        ];

        Mail::to("fazakahfi4@gmail.com")->send(new Email($details));
        return "Email Sent";
    }
}
