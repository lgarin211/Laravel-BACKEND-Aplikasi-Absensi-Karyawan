<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogAbsenController extends Controller
{

    public function __construct()
    {
        // parent::__construct();
        $par = DB::table('generalsettings')->get();
        $this->danss = [];
        foreach ($par as $key => $value) {
            $this->danss[$value->setting_name] = $value;
        }
        // dd($danss);
    }

    public function read()
    {
        $id = Auth::user()->id;
        // $id = 1;
        $dam = DB::table('log_absens')->where('id_user', '=', $id)->orderBy('id', 'desc')->get();
        $user = DB::table('users')->where('id', '=', $id)->orderBy('id', 'desc')->first();
        $data['dam'] = $dam;
        $data['user'] = $user;
        $data['setting'] = $this->danss;
        $data['ct1'] = $this->presb2();
        // dd($data);
        return view('absen/index',['data'=>$data]);
    }
    public function read2()
    {
        if (!empty($_GET['tgl'])) {
            $bok='%'.$_GET['tgl'].'%';
        }else{
            $bok='%'.date('-Y').'%';
        }
        $id = Auth::user()->id;
        // $id = 1;
        $dam = DB::table('log_absens')->where('id_user', '=', $id)->where('jam_masuk', 'like', $bok)->orderBy('id', 'desc')->get();
        $user = DB::table('users')->where('id', '=', $id)->orderBy('id', 'desc')->first();
        $data['dam'] = $dam;
        $data['user'] = $user;
        $data['setting'] = $this->danss;
        // dd($data);
        return view('absen/galery',['data'=>$data]);
    }
    public function keluar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $info = Auth::user();
        // dd($info->id);
        $date = date('m-d-Y H:i:s');
        $in=DB::table('log_absens')
            ->where('id_user', $info->id)
            ->where('jam_masuk', 'like', '%' . date('m-d-Y'). '%')
            ->update(['jam_keluar' => $date]);
        $dam = DB::table('log_absens')->where('id_user', '=', $info->id)->orderBy('id', 'desc')
        ->where('jam_keluar', 'like', '%' . date('m-d-Y'). '%')->first();
        $val = strtotime($date) - strtotime($dam->jam_masuk);
        // dd($val,$date ,$dam->jam_masuk);



        $time_masuk = $dam->jam_masuk;
        $time_keluar = $dam->jam_keluar;
        $time_masuk =explode(" ",$time_masuk);
        $time_keluar =explode(" ",$time_keluar);
        $time_masuk = strtotime($time_masuk[1]);
        $time_keluar =strtotime($time_keluar[1]);
        
        $diff=$time_keluar-$time_masuk;
                $jam    =floor($diff / (60 * 60));
                $menit    =$diff - $jam * (60 * 60);
                $mi=90;
                $mi=$mi+floor($menit/60);
                $mi;
        // dd($mi);
        DB::table('users')
            ->where('id', $info->id)
            ->update(['jumlah_jam_kerja' => $mi]);

        return \response(['status' => $info->name . ' Telah Melakukan Absensi Keluar']);
    }
    public function cekon()
    {
        $la = false;
        $ban = DB::table('log_absens')
            ->where('id_user', '=', Auth::user()->id)
            ->where('jam_masuk', 'like', '%' . $_GET['vas'] . '%')
            ->get();
        // dd($ban);
        if (\count($ban) > 0) {
            $la = true;
        } else {
            $la = false;
        }
        return response(['status' => $la, 'data' => $ban]);
    }
    public function presb()
    {
        $data=DB::table('log_absens')
        ->where('id_user', '=', Auth::user()->id)
        ->where('jam_masuk', 'like', '%' .date('m-'). '%')
        ->where('jam_masuk', 'like', '%' .date('-Y'). '%')
        ->get();

        $bas=[];
        $mas=[];
        foreach ($data as $key => $value) {
            if (empty($bas[$value->keterangan])) {
                $bas[$value->keterangan]['label']=$value->keterangan;
                $bas[$value->keterangan]['data']=1;
            }else{
                $bas[$value->keterangan]['data']+=1;
            }
        }

        foreach ($bas as $key => $value) {    
            $blim[]=array('x'=>$value['label'],'y'=>$value['data']);
        }

        // dd(Auth::user()->id,$bas);

        if (empty($_GET['pin'])) {
            return view('absen/chart',['data'=>$bas]);
        }else{
        // dd($clin);
        return response()->json($blim, 200);
        // dd($bas);
        // dd($data);
        }

    }

    public function presb2()
    {
        $data=DB::table('log_absens')
        ->where('id_user', '=', Auth::user()->id)
        ->where('jam_masuk', 'like', '%' .date('m-'). '%')
        ->where('jam_masuk', 'like', '%' .date('-Y'). '%')
        ->get();

        $bas=[];
        $mas=[];
        foreach ($data as $key => $value) {
            if (empty($bas[$value->keterangan])) {
                $bas[$value->keterangan]['label']=$value->keterangan;
                $bas[$value->keterangan]['data']=1;
            }else{
                $bas[$value->keterangan]['data']+=1;
            }
        }

        foreach ($bas as $key => $value) {    
            $blim[]=array('x'=>$value['label'],'y'=>$value['data']);
        }
        // dd(Auth::user()->id,$bas);
            return $bas;
    }

    public function cekupuser()
    {
        $masuk=DB::table('log_absens')->
        where('jam_masuk','like','%'.date('m-d-Y').'%')
        ->join('users', 'users.id', '=', 'log_absens.id_user')
        ->get('users.id');
        // dd($masuk);
        $hadir=[];
        foreach ($masuk as $key => $value) {
            // dd($value->id);
            $hadir[]=$value->id;
        }
        $masuk=DB::table('users')->whereNotIn('id',$hadir)->get();
        

        foreach ($masuk as $key => $value) {
            // dd($value->id);
            $cres[]=array('id_user'=>$value->id,'jam_masuk' => date('m-d-Y'),'jam_keluar' => date('m-d-Y'),'bukti_masuk'=>'https://kaltimtuntas.id/wp-content/uploads/2021/11/foto-profil-wa-retak.jpg','keterangan'=>'Absen');
        }

        DB::table('log_absens')->insert($cres);
        
    }
    
    public function retable()
    {
        $ban = DB::table('log_absens')
            ->where('id_user', '=', Auth::user()->id)
            ->get();
        $pas = [];
        foreach ($ban as $key => $value) {
            $wx1 = explode(' ', $value->jam_masuk);
            if ($value->jam_keluar == 0) {
                $wx2[1] = $wx1[1];
            } else {
                $wx2 = explode(' ', $value->jam_keluar);
            }
            $vas = (strtotime($wx2[1]) - strtotime($wx1[1])) / 60 / 60;
            $pas[$key] = ([
                "jam_masuk" => $wx1[1],
                "tgl_masuk" => $wx1[0],
                "jam_keluar" => $wx2[1],
                "status" => $value->keterangan,
                "akumu" => $vas,
            ]);
        }
        // dd($pas);
        return view('absen/table', ['data' => $pas]);
    }
    public function cekon2()
    {
        $la = false;
        // dd($_GET['vas']);
        $ban = DB::table('log_absens')
            ->where('id_user', '=', Auth::user()->id)
            ->where('jam_keluar', 'like', '%' . $_GET['vas'] . '%')
            ->get();
        //     die;
        // dd($ban);
        if (\count($ban) > 0) {
            $la = true;
        } else {
            $la = false;
        }
        return response(['status' => $la, 'data' => $ban]);
    }
    public function create(Request $request)
    {
        $info = Auth::user();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('m-d-Y H:i:s');
        $date2 = md5(uniqid($date, true));
        // dd($date2);
        if (date('H')>15) {
            $_POST['keterangan']=$_POST['keterangan'].' Terlambat';
        }

        if (!empty($_POST)) {
            $bukti = '';
            if ($bukti == '') {
                $request->file('foto');
                $imageName = $date2. '.png';
                $request->foto->move(public_path('img/' . Auth::user()->nip . '/'), $imageName);
                $bukti = 'img/' . Auth::user()->nip . '/' . $imageName;
            }
            $as=DB::table('wfh')->where('id_user', $info->id)->where('cren',$_POST['keterangan'])->first();
            if (!empty($as)) {
                $data=[
                    'keterangan' => $as->cren,
                    'pengajuan' => $as->deskripsi,
                ];
            }else{
                $data=[
                    'keterangan' => $_POST['keterangan'],
                    'pengajuan' => "none",
                ];   
            }
            $data += [
                'id_user' => $info->id,
                'jam_masuk' => $date,
                'jam_keluar' => 0,
                'bukti_masuk' => $bukti,
            ];
            // dd($data);
            DB::table('log_absens')->insert($data);
            return \redirect('/absen');
        }
    }
    
    public function cekpengajuan()
    {
        // dump(Auth::user()->id);
        // dump(date('Y-m-d'));
        $dataPegawai=DB::table('wfh')->where('id_user',Auth::user()->id)
        ->where('mulai','<=',date('Y-m-d'))
        ->where('akhir','>=',date('Y-m-d'))
        ->first();
        // dump($dataPegawai);
        // dd();
        return $dataPegawai;
    }
    public function capture()
    {
        $pengajuan=$this->cekpengajuan();
        // dd($pengajuan);
        $id = Auth::user()->id;
        $dam = DB::table('log_absens')->where('id_user', '=', $id)->orderBy('id', 'desc')->get();
        $user = DB::table('users')->where('id', '=', $id)->orderBy('id', 'desc')->first();
        $data['dam'] = $dam;
        $data['user'] = $user;
        $data['setting'] = $this->danss;
        return view('absen/capture',['data'=>$data,'pengajuan'=>$pengajuan]);
    }
    public function capture2()
    {
        $id = Auth::user()->id;
        $dam = DB::table('log_absens')->where('id_user', '=', $id)->orderBy('id', 'desc')->get();
        $user = DB::table('users')->where('id', '=', $id)->orderBy('id', 'desc')->first();
        $data['dam'] = $dam;
        $data['user'] = $user;
        $data['setting'] = $this->danss;
        return view('absen/pcapture',['data'=>$data]);
    }

    public function capturePost(Request $request)
    {
        $thumb = $request->file('foto');
        $thumb->move(public_path() . "/capture" . '/', $thumb->getClientOriginalName());
    }
}
