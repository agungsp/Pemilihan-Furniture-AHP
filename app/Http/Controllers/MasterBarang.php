<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\tblmasterbarang;
use Illuminate\Support\Facades\DB;

class MasterBarang extends Controller
{
    public function index()
    {
        $data = DB::table('tblmasterbarangs')->get();
        return view('masterBarang', ['data' => $data, 'msgType' => '', 'msgStr' => '']);
    }

    public function insert(Request $request)
    {
        $user = $request->session()->get('login_state');
        // dd($user->IdMUser);
        $KdMBrg = $request->KodeBarang;
        $NmMBrg = $request->NamaBarang;
        $PKecil = str_replace(',', '', $request->PKecil);
        $LKecil = str_replace(',', '', $request->LKecil);
        $TKecil = str_replace(',', '', $request->TKecil);
        $PSedang = str_replace(',', '', $request->PSedang);
        $LSedang = str_replace(',', '', $request->LSedang);
        $TSedang = str_replace(',', '', $request->TSedang);
        $PBesar = str_replace(',', '', $request->PBesar);
        $LBesar = str_replace(',', '', $request->LBesar);
        $TBesar = str_replace(',', '', $request->TBesar);
        $IdMUserCreate = $user->IdMUser;
        $IdMUserUpdate = $user->IdMUser;

        $cekData = DB::table('tblmasterbarangs')->where('KdMBrg', $KdMBrg)
                                                ->count();

        if ($cekData == 0) {
            tblmasterbarang::create([
                'KdMBrg' => $KdMBrg,
                'NmMBrg' => $NmMBrg,
                'PKecil' => $PKecil,
                'LKecil' => $LKecil,
                'TKecil' => $TKecil,
                'PSedang' => $PSedang,
                'LSedang' => $LSedang,
                'TSedang' => $TSedang,
                'PBesar' => $PBesar,
                'LBesar' => $LBesar,
                'TBesar' => $TBesar,
                'IdMUserCreate' => $IdMUserCreate,
                'IdMUserUpdate' => $IdMUserUpdate
            ]);

            $data = DB::table('tblmasterbarangs')->get();
            return view('masterBarang', ['data' => $data, 'msgType' => 'success', 'msgStr' => 'Data barang berhasil ditambah']);
        }
        else {
            $data = DB::table('tblmasterbarangs')->get();
            return view('masterBarang', ['data' => $data, 'msgType' => 'warning', 'msgStr' => 'Kode barang tidak boleh sama!']);
        }
    }

    public function edit($IdMBrg)
    {
        $data = DB::table('tblmasterbarangs')->where('IdMBrg', "$IdMBrg")
                                             ->get()[0];
        return view('masterBarangEdit', ['data' => $data]);
    }

    public function delete($IdMBrg)
    {
        tblmasterbarang::where('IdMBrg', $IdMBrg)
                       ->delete();
        $data = DB::table('tblmasterbarangs')->get();
        return view('masterBarang', ['data' => $data, 'msgType' => 'success', 'msgStr' => 'Data barang berhasil dihapus']);
    }

    public function save(Request $request)
    {

        $user = $request->session()->get('login_state');
        $IdMBrg = $request->IdBarang;
        $KdMBrg = $request->KodeBarang;
        $NmMBrg = $request->NamaBarang;
        $PKecil = str_replace(',', '', $request->PKecil);
        $LKecil = str_replace(',', '', $request->LKecil);
        $TKecil = str_replace(',', '', $request->TKecil);
        $PSedang = str_replace(',', '', $request->PSedang);
        $LSedang = str_replace(',', '', $request->LSedang);
        $TSedang = str_replace(',', '', $request->TSedang);
        $PBesar = str_replace(',', '', $request->PBesar);
        $LBesar = str_replace(',', '', $request->LBesar);
        $TBesar = str_replace(',', '', $request->TBesar);
        $IdMUserUpdate = $user->IdMUser;

        tblmasterbarang::where('IdMBrg', $IdMBrg)
                       ->update([
                            'KdMBrg' => $KdMBrg,
                            'NmMBrg' => $NmMBrg,
                            'PKecil' => $PKecil,
                            'LKecil' => $LKecil,
                            'TKecil' => $TKecil,
                            'PSedang' => $PSedang,
                            'LSedang' => $LSedang,
                            'TSedang' => $TSedang,
                            'PBesar' => $PBesar,
                            'LBesar' => $LBesar,
                            'TBesar' => $TBesar,
                            'IdMUserUpdate' => $IdMUserUpdate
                       ]);

        $data = DB::table('tblmasterbarangs')->get();
        return view('masterBarang', ['data' => $data, 'msgType' => 'success', 'msgStr' => 'Data barang berhasil diupdate']);
    }
}
