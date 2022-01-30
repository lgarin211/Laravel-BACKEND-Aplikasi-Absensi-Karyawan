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
        ->select('users.name', 'users.nip', 'users.jabatan', 'users.notel', 'users.profile_photo_path', 'wfh.*')
        ->get();

        return view('kepsex.approve')->with('wfh', $wfh);
    }


    //Firewall here
    public function actionKepsexApprove(Request $request){
        // DB::table('wfh')->insert([
        //     'email' => 'kayla@example.com',
        //     'votes' => 0
        // ]); 

        $val = $_GET['id'];
        // DB::table('wfh')->insert([
        //     'appv' => '1',            
        // ])->where('id_user', $val);

        $response = DB::table('wfh')
->where('id_user', $val)
->update(array('appv' => 1));
return redirect(route('dashboard'));
        
    }
    public function actionKepsexDelete(Request $request){
        $val = $_GET['id'];

        $response = DB::table('wfh')
->where('id_user', $val)
->update(array('appv' => 2));
return redirect(route('dashboard'));
        
    }

}
