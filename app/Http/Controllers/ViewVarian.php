<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewVarian extends Controller
{
    public function index($IdMBrg)
    {
        $masterVarian = DB::table('tblmastervarians')->where('IdMBrg', $IdMBrg)->get();
        $masterBarang = DB::table('tblmasterbarangs')->where('IdMBrg', $IdMBrg)->get(['KdMBrg', 'NmMBrg']);
        return view('viewVarian', ['masterVarian' => $masterVarian, 'masterBarang' => $masterBarang]);
    }
}
