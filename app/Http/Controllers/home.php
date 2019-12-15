<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class home extends Controller
{
    public function index()
    {
        $masterBarang = DB::table('tblmasterbarangs')->get();
        return view('home', ['masterBarang' => $masterBarang]);
    }
}
