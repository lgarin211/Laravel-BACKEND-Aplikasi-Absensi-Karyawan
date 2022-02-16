<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KepsekController extends Controller
{

    public function __construct()
    {
        // parent::__construct();
        $par = DB::table('generalsettings')->get();
        $this->danss = [];
        foreach ($par as $key => $value) {
            $this->danss[$value->setting_name] = $value;
        }
    }

    private function valKepsek()
    {
        $user=DB::table('users')->where('id',Auth::user()->id)->first();
        if ($user->jabatan!="KELAPA SEKOLAH") {
            return redirect()->back();
        }
    }
    
    public function pen()
    {
        $this->valKepsek();
        $data=DB::table('log_absens')->where('jam_masuk','like','%'.date('m-d-Y').'%')
        ->join('users', 'users.id', '=', 'log_absens.id_user')->get();
        return view('kepsek/blas',['data'=>$data,'listener'=>'Telah Absen']);
    }
    public function ten()
    {
        $masuk=DB::table('log_absens')->
        where('jam_masuk','like','%'.date('m-d-Y').'%')
        ->join('users', 'users.id', '=', 'log_absens.id_user')
        ->get('users.id');

        $hadir=[];
        foreach ($masuk as $key => $value) {
            // dd($value->id);
            $hadir[]=$value->id;
        }
        $data=DB::table('users')->whereNotIn('id',$hadir)->get(); 
        return view('kepsek/blas',['data'=>$data,'listener'=>'Belum Absen']);
    }

    public function show()
    {
        $wfh = DB::table('wfh')->join('users', 'wfh.id_user', '=', 'users.id')
        ->where("appv",0)
        ->select('users.name', 'users.nip', 'users.jabatan', 'users.notel', 'users.profile_photo_path', 'wfh.*')
        ->get();
        // dd($wfh);

        return view('kepsex.approve')->with('wfh', $wfh);
    }


    //Firewall here
    public function actionKepsexApprove(Request $request){

        $val = $_GET['id'];
        $tren=DB::table('wfh')->where('id', $val)->first();
        // dd($tren);
        if ($tren->cren=="IZIN" or $tren->cren=="SAKIT") {
                // Apabila sakit dan izin
                // $seleksi = DB::table('wfh')->where('cren', '=', 'SAKIT')->get();
                // to leo but ku rasa harusnya bukan pas dia nyajuin WFH datanya di insert ke log, tapi pas kepala sekolah approval
                $cren=$tren->cren;
                // dd($cren);
                // foreach($cren as $c){
                   $c=$cren;
                   $date1=$tren->mulai;
                   $date2=$tren->akhir;
                
                   if($$tren->cren=="IZIN" or $tren->cren=="SAKIT"){
                    $d1 = strtotime($tren->mulai);
                    $d2 = strtotime($tren->akhir);
                    $datediff = $d2 - $d1;

                    $hasils = round($datediff / (60 * 60 * 24)); 
                    $converted = intval($hasils);
                    $bencongs = range(0, $converted);
                    // dump($bencongs);

                      foreach($bencongs as $hasil){
                            $start_date = $date1;  
                            $date = strtotime($start_date);
                            $date = strtotime("+". $hasil ." day", $date);
                            $res = date('m-d-Y', $date);
                            // 01-30-2022 00:00:00
                            // dd($res,$date);
                            //to leo syntaxnya udah bener cuman core errornya ada di bagian jam masuk dan 
                            // jam keluar karena lu ga setting tanggal nya,why itu akan berpengaruh pada bagian funtion lainnya 
                            // solvingnya masukin datanya sesuai kayak contoh dari dari tabel log absen  
                            // $data=array('id_user'=>$id,'jam_masuk'=>'000',"jam_keluar"=>'000',
                            // "bukti_masuk" => '000', "keterangan"=>$keterangan, "pengajuan" => $c);

                            $data=array(
                                'id_user'=>$tren->id_user,
                                'jam_masuk'=>$res.' 07:00:00',
                                "jam_keluar"=>$res.' 15:00:00',
                                "bukti_masuk" => '/',
                                "keterangan"=>$tren->cren,
                                "pengajuan" => $tren->deskripsi
                            );
                            DB::table('log_absens')->insert($data);
                        }
                    }
                    $response = DB::table('wfh')
                    ->where('id', $val)
                    ->update(array('appv' => 1));
        }else{
            $response = DB::table('wfh')
            ->where('id', $val)
            ->update(array('appv' => 1));
        }

        // dd($tren);
        return redirect(route('dashboard'));
        
    }
    
    public function actionKepsexDelete(Request $request){
        $val = $_GET['id'];

        $response = DB::table('wfh')
        ->where('id', $val)
        ->update(array('appv' => 2));
        return redirect(route('dashboard'));
        
    }

}
