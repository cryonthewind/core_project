<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;

class MailController extends Controller
{
    //Create function send basic Email
    public function basic_email(){
        $data = ['name'=>'Uchiha itachi'];
        try{
            Mail::send('mail.html_mail',$data,function($message){
                $message->to('tranquoctoan31892@gmail.com','Test Email')->subject('DeathNote');
                $message->from('tokyo@watermelon.vn','Kakashi');
            });
            echo 'Success sent Basic mail';
        }catch (\Exception $e){
            dd($e);
        }

    }
//    Create function to send HTML email
    public function html_email(){
        $data = ['name'=>'Uchiha itachi'];
        try{
            Mail::send('mail.html_mail',$data,function($message){
                $message->to('tranquoctoan31892@gmail.com','Test Email')->subject('DeathNote');
                $message->from('tokyo@watermelon.vn','Kakashi');
            });
        }catch (Exception $e){
            dd($e);
        }

        echo 'Success sent HTML mail';
    }
//    Create function to send mail with Attachment Mail
    public function attachment_email(){
        $data = ['name'=>'Uchiha itachi'];
        try{
            Mail::send('mail.html_mail',$data,function($message){
                $message->to('tranquoctoan31892@gmail.com','Test Email')->subject('DeathNote');
//            add attach file here
                $message->attach(asset('public/image/mail.jpg'));
                $message->from('tokyo@watermelon.vn','Kakashi');
                echo 'Success sent Attachment mail';
            });
        }catch (\Exception $e){
            dd($e);
        }


    }

    public function login_api(Request $request){
        $group_id = $request->group_id;
        $password = $request->password;
        $data = ['grounp_id'=>$group_id,'password'=>$password];
        $url = 'https://baccass.mbtn.sbmgs.info/api/x/push_admin/group/auth.json';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        dd(json_decode($result));

    }
}
