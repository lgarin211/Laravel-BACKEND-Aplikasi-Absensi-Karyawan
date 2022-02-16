<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WfhController extends Controller
{
    public function index(){
        return view('wfh');
    }

    public function add(Request $request){
        $id = Auth::user()->id;
        // dd($id);
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $keterangan = $request->input('keterangan');
        $date1_conv = date('Y-m-d', strtotime($date1));
        $date2_conv = date('Y-m-d', strtotime($date2));
        
        // Setelah We Perhatiin lagi $cren itu harusnya isinya request bukan last data 
        // $cren = DB::table('wfh')->select('cren')->where('id_user', '=', $id)->first();
        $cren = $request->input('to');

        if($date2 == $date1){
            $data=array('id_user'=>$id,'mulai'=>$date1_conv,"akhir"=>$date2_conv,"deskripsi"=>$keterangan,'cren'=>$cren);
            DB::table('wfh')->insert($data);
            return redirect(route('dashboard'));
        }else{
            $d1 = strtotime($date1);
            $d2 = strtotime($date2);
            $datediff = $d2 - $d1;

            $hasils = round($datediff / (60 * 60 * 24)); 
            $converted = intval($hasils);
            $bencongs = range(0, $converted);
            // dd($bencongs);
            // die();

                // foreach($bencongs as $hasil){
                    // $start_date = $date1;  
                    // $date = strtotime($start_date);
                    // $date = strtotime("+". $hasil ." day", $date);
                    // $res = date('m/d/Y', $date);

            $data=array('id_user'=>$id,'mulai'=>$date1_conv,"akhir"=>$date2_conv,"deskripsi"=>'Untuk Melakukan '.$cren.' terkait '.$keterangan,'cren'=>$cren);
            DB::table('wfh')->insert($data);
        }


            //Apabila sakit dan izin
        //    $seleksi = DB::table('wfh')->where('cren', '=', 'SAKIT')->get();
        // to leo but ku rasa harusnya bukan pas dia nyajuin WFH datanya di insert ke log, tapi pas kepala sekolah approval
        // dd($cren);
        // foreach($cren as $c){
        //     // dd($c == "IZIN");
        
        //    if($c == "SAKIT" or "IZIN"){
        //     $d1 = strtotime($date1);
        //     $d2 = strtotime($date2);
        //     $datediff = $d2 - $d1;

        //     $hasils = round($datediff / (60 * 60 * 24)); 
        //     $converted = intval($hasils);
        //     $bencongs = range(0, $converted);

        //       foreach($bencongs as $hasil){
        //             $start_date = $date1;  
        //             $date = strtotime($start_date);
        //             $date = strtotime("+". $hasil ." day", $date);
        //             $res = date('m/d/Y', $date);

        //             dd($res);
        //             //to leo syntaxnya udah bener cuman core errornya ada di bagian jam masuk dan 
        //             // jam keluar karena lu ga setting tanggal nya,why itu akan berpengaruh pada bagian funtion lainnya 
        //             // solvingnya masukin datanya sesuai kayak contoh dari dari tabel log absen  
        //             // $data=array('id_user'=>$id,'jam_masuk'=>'000',"jam_keluar"=>'000',
        //             // "bukti_masuk" => '000', "keterangan"=>$keterangan, "pengajuan" => $c);

        //             $data=array('id_user'=>$id,'jam_masuk'=>'000',"jam_keluar"=>'000',
        //             "bukti_masuk" => '000', "keterangan"=>$keterangan, "pengajuan" => $c);
        //             DB::table('log_absens')->insert($data);
        //         }
        //     }else{
                
        //     }
        // }

            
            return redirect('/absen');

        
       
    }


}
