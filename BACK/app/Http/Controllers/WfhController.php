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

        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $keterangan = $request->input('keterangan');
        $date1_conv = date('m/d/Y', strtotime($date1));
        $date2_conv = date('m/d/Y', strtotime($date2));

        if($date2 == $date1){
            $data=array('id_user'=>$id,'mulai'=>$date1_conv,"akhir"=>$date2_conv,"deskripsi"=>$keterangan);
            DB::table('wfh')->insert($data);
            return redirect(route('dashboard'));
        }else{
            $d1 = strtotime($date1);
            $d2 = strtotime($date2);
            $datediff = $d2 - $d1;

            $hasils = round($datediff / (60 * 60 * 24)); 
            $converted = intval($hasils);
            $bencongs = range(0, $converted);
            // var_dump($bencongs);
            // die();

                foreach($bencongs as $hasil){
                    $start_date = $date1;  
                    $date = strtotime($start_date);
                    $date = strtotime("+". $hasil ." day", $date);
                    $res = date('m/d/Y', $date);

                    $data=array('id_user'=>$id,'mulai'=>$res,"akhir"=>$date2_conv,"deskripsi"=>$keterangan);
                     DB::table('wfh')->insert($data);

            }
            return redirect(route('dashboard'));

        }
       
    }

    public function show()
    {
        // $wfh = DB::table('wfh')->select('id_user','mulai','akhir','deskripsi','appv')->get();

        // return view('kepsex.approve')->with('wfh', $wfh);

        $users = DB::table('users')->select('name','email')->get();

        return view('kepsex.approve')->with('users', $users);
    }


}
