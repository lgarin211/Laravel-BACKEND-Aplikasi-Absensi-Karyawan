<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeneralsettingController extends Controller
{
    //
    public function notifv1()
    {
        $bas=DB::table('users')
        ->whereNotNull('FCB')->get();
        
        foreach ($bas as $key => $value) {
        $judul='Notifikasi Presensi NonPNS SMKN 4 Bogor';
        $isi='Melalui Pesan Ini Kami Mengingatkan Anda Yth '.$value->name.' untuk Melakukan Presensi Masuk Pada Aplikasi Presensi SMKN 4 Bogor Tanggal'.date('d-M-y');
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n \"to\" : \"$value->FCB\",\n \"notification\" : {\n     \"body\" : \"Body of Your Notification\",\n     \"title\": \"Title of Your Notification\"\n },\n \"data\" : {\n     \"body\" : \"Notification Body\",\n     \"title\": \"Notification Title\",\n     \"key_1\" : \"Value for key_1\",\n     \"key_2\" : \"Value for key_2\"\n }\n}",
          CURLOPT_HTTPHEADER => array(
            "authorization: key=AAAAGmUitgk:APA91bFxcAVe0kXqjGkdUwn2n8X8UcJ5pTcRhuLnJyy4yzl_FMexJZEyofN3YmEoNx39L_yMELVRbm-mG-ALrhaxqTaEzOhUnXPI63aY0aQBuCUmR3lKTynbE9SccNUyAOd9VNjsB6cJ",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 49b28b58-8030-13dd-cd95-1f8aa093d149"
          ),
          CURLOPT_POSTFIELDS => "{\"to\" : \"$value->FCB\",\"notification\" : {\"body\" : \"$isi\",\"title\": \"$judul\"},\"data\" : {\"body\" : \"Notification Body\",\"title\": \"Notification Title\"}}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          $response=json_decode($response);
          $asaa[]=[$response,$value];
          
        }
        }
            return response()->json($asaa, 200);
        
    }

    public function nofifv2()
    {
        $bas=DB::table('users')
        ->whereNotNull('FCB')->get();
        foreach ($bas as $key => $value) {
            $judul='Notifikasi Presensi NonPNS SMKN 4 Bogor';
            $isi='Melalui Pesan Ini Kami Mengingatkan Anda Yth '.$value->name.' untuk Melakukan Presensi Masuk Pada Aplikasi Presensi SMKN 4 Bogor Tanggal'.date('d-M-y');
            $logo='https://www.smkn4bogor.sch.id/wp-content/uploads/2020/07/logoSMKN4.jpg';
            $asaa[$key]['re']=$this->sendPush($value->FCB, $judul,$isi, $logo, 'https://absensi.smkn4bogor.sch.id');  
            $asaa[$key]['mas']=$value;
        }
        $cres=array('log'=>json_encode($asaa));
           DB::table('Runtime')->insert($cres);
        return response()->json($asaa, 200);
    }

    private function sendPush($to, $title, $body, $icon, $url) {
        $tokenFCM='AAAAGmUitgk:APA91bFxcAVe0kXqjGkdUwn2n8X8UcJ5pTcRhuLnJyy4yzl_FMexJZEyofN3YmEoNx39L_yMELVRbm-mG-ALrhaxqTaEzOhUnXPI63aY0aQBuCUmR3lKTynbE9SccNUyAOd9VNjsB6cJ';
        $postdata = json_encode(
            [
                'notification' => 
                    [
                        'title' => $title,
                        'body' => $body,
                        'icon' => $icon,
                        'click_action' => $url,
                        'image' => $icon,
                        'style' => 'picture',
                        'picture' => '$icon',
                        // 'ongoing' => true,
                        'vibrate'   => 1,
                        'sound'     => 1
                    ]
                ,
                'to' => $to
            ]
        );
    
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/json'."\r\n"
                            .'Authorization: key='.$tokenFCM."\r\n",
                'content' => $postdata
            )
        );
    
        $context  = stream_context_create($opts);    
        $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);
        if($result) {
            return json_decode($result);
        } else return false;
    }
    
}
