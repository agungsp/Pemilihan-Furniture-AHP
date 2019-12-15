<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\tblMasterUser;
use Illuminate\Support\Facades\DB;

class register extends Controller
{
    public function index()
    {
        return view('/register', ['msgType' => '', 'msgStr' => '']);
    }

    public function insert(Request $request)
    {
        $username = $request->username;
        $nama = $request->nama;
        $password = md5($request->password);

        $cekUser = DB::table('tblMasterUsers')->selectRaw(DB::raw('COUNT(Username) as `Count`'))
                                              ->where('Username', "$username")
                                              ->get();

        if ($cekUser[0]->Count == 0) {
            tblMasterUser::create([
                'Username' => $username,
                'NmMUser' => $nama,
                'Password' => $password
            ]);
            return view('/login', ['msgType' => 'success', 'msgStr' => 'User baru berhasil dibuat.']);
        }
        else {
            return view('/register', ['msgType' => 'warning', 'msgStr' => 'User yang dibuat sudah ada!']);
        }
    }
}
