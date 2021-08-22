<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homepage extends Controller
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
    public function index()
    {
        return \view('homepage.index',['data'=>$this->danss]);
    }

}
