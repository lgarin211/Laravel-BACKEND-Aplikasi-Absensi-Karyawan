<?php

namespace App\Http\Controllers;
use App\Exports\one;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class Export extends Controller
{
    public function ex() 
    {
        return Excel::download(new one, 'invoices.xlsx');
    }
}
