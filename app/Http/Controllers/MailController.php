<?php


namespace App\Http\Controllers;
use Mail;
use App\Http\Requests;


class MailController extends Controller {
    public function basic_email(){
        $data = array('name'=>"حوله ارس");

//        Mail::send(['text'=>'mailt'], $data, function($message) {
//            $message->to('aliaharian@yahoo.com', 'Tutorials Point')->subject
//            ('Laravel Basic Testing Mail');
//            $message->from('info@arastowel.com','حوله ارس');
//        });
        echo "Basic Email Sent. Check your inbox.";
    }


    public function html_email(){
        $data = array('name'=>"Aras towel");
        $emails = ['aliaharian5@gmail.com','ha.nasirzadeh@gmail.com','sekinehmoslemzadeh@gmail.com','ahrari.maxim2008@gmail.com','Kambiz.sasanirad@gmail.com','Mmm.ajn@gmail.com','Shima_jame@yahoo.com','mbokharaei@yahoo.com','maryambokharaei22@gmail.com','a.tabibi@outlook.com','fereshteh.jalili@gmail.com','h.kavkani@gmail.com','s.alisalmabadi@yahoo.com','abb.math84@gmail.com','khodaie.milad@gmail.com','h0940057042@gmail.com','sekinehmoslemzadeh@gmail.com'];

//        Mail::send('mailt', $data, function($message) use($emails) {
//            $message->to($emails)->subject
//            ('نوروز مبارک! با حوله ارس عزیزان خود را سورپرایز کنید');
//            $message->from('newsletter@arastowel.com','حوله ارس');
//        });
        echo "HTML Email Sent. Check your inbox.";
    }


    public function attachment_email(){
        $data = array('name'=>"Virat Gandhi");
//        Mail::send('mail', $data, function($message) {
//            $message->to('aliaharian@yahoo.com', 'Tutorials Point')->subject
//            ('Laravel Testing Mail with Attachment');
//            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
//            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
//            $message->from('info@arastowel.com','حوله ارس');
//        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
