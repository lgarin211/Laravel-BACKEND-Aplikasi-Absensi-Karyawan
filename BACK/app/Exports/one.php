<?php

namespace App\Exports;

// use App\Models\data_anggota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class one implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $user=DB::table('users')->get();

        // foreach ($user as $key => $value) {
        //     $lin= DB::table('log_absens')
        //     ->where('id_user',$value->id)
        //     ->where('jam_masuk','like','%'.date('m-').'%')->where('jam_masuk','like','%'.date('-Y').'%')
        //     ->orderBy('jam_masuk');
        //     // dd($lin);
        //     if ($lin->count()==0) {
        //         // dd($lin->get());
        //     }else{
        //         $data[$key]['data']=$lin->get();
        //         $data[$key]['user']=$value;
        //     }
        // }
        // dd($lin);
        
        // dd($data);
        return view('keluar/log', [
            'data' => $user
        ]);

    }
}