<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userPP extends Controller
{
    public function Login()
    {
        $poin = $_GET;
        if (!empty($poin['NIP'])) {
            $data = DB::table('gurus')->where('NIP', $poin['NIP'])->first();
            if (!empty($poin['Password'])) {
                if ($poin['Password'] == $data->password) {
                    return \response()->json([
                        'Status' => 'Login Berhasil',
                        'Data' => $data,
                        'code' => 1
                    ]);
                } else {
                    return \response()->json([
                        'Status' => 'Password yang Anda Masukan Salah',
                        'code' => 0
                    ]);
                }
            } else {
                return \response()->json([
                    'Status' => 'Harap Masukan Password',
                    'code' => 0
                ]);
            }
        } else {
            return \response()->json([
                'Status' => 'NIP Tidak Terdaftar, Harap Pastiakan Anda Sudah Login atau Coba Hubungi Administrator ',
                'code' => 0
            ]);
        }
    }

    public function register(Request $request)
    {
        $poin = $_GET;
        if (!empty($poin['val1'])) {
            $data = DB::table('gurus')->where('NIP', $poin['NIP'])->first();
            if (!empty($data)) {
                return \response()->json([
                    'Status' => 'NIP SUDAH TERDAFTA, Harap Login dengan Akun Sebelumnya atau Coba Hubungi Administrator',
                    'code' => 0
                ]);
            } else {
                return \response()->json([
                    'Status' => 'NIP Dapat DI Daftarkan',
                    'code' => 1
                ]);
            }
        }

        $poin = $_POST;
        if(!empty($poin['reg'])){
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $Baseimg='http://localhost:8000/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg';
            // $fileName=$date."-UPP.jpg";
            // $path=$request->file('photo')->move(public_path("/storage/img"),$fileName);
            // $Baseimg=url('/storage/img/'.$fileName);
            // echo $Baseimg;
            $data=[
            'Jabatan'=>$poin['Jabatan'],
            'Jumlah_Jam_Kerja'=>0,
            'Kontak'=>$poin['Kontak'],
            'NIP'=>$poin['NIP'],
            'Nama_Guru'=>$poin['Nama'],
            'PP'=>$Baseimg,
            'Username'=>$poin['uname'],
            'password'=>$poin['pwd'],
            'created_at'=>"2021-08-08 01:20:10",
            'updated_at'=>"2021-08-08 01:20:10",

        ];
        DB::table('gurus')->insert($data);
        return \response()->json([
            'Status' => 'Data Selesai Di Simpan',
            'code' => 1
        ]);
        }



        // Jabatan: "Dewan Direksi"
        // Jumlah_Jam_Kerja: "0"
        // Kontak: "081221723861"
        // NIP: 39101372
        // Nama_Guru: "Agustinus Pardamean Lumban Tobing"
        // PP: "http://localhost:8000/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg"
        // Username: "lgarin211"
        // created_at: "2021-08-08 01:20:10"
        // password: "12345678"
        // updated_at: "2021-08-08 01:20:10"

    }

    public function UserRead()
    {
        if ((1 - 0) == 1) {
            # code...
        }
    }
}
