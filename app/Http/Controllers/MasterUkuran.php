<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\tblmasterukuran;
use Illuminate\Support\Facades\DB;

class MasterUkuran extends Controller
{
    public function index()
    {
        $data = DB::table('getViewUkuran')->get();
        $masterBarang = DB::table('tblmasterbarangs')->get();
        return view('masterUkuran', ['data' => $data, 'masterBarang' => $masterBarang, 'msgType' => '', 'msgStr' => '']);
    }

    public function insert(Request $request)
    {
        $IdMBrg = $request->masterBarang;
        $Panjang = $request->Panjang;
        $Lebar = $request->Lebar;
        $Tinggi = $request->Tinggi;
        $Nilai = $request->Nilai;


        $user = $request->session()->get('login_state');
        $IdMUserCreate = $user->IdMUser;
        $IdMUserUpdate = $user->IdMUser;

        $cekUkuran = DB::table('getViewUkuran')->where('Panjang', $Panjang)
                                               ->where('Lebar', $Lebar)
                                               ->where('Tinggi', $Tinggi)
                                               ->where('IdMBarang', $IdMBrg)
                                               ->count();
        if ($cekUkuran > 0) {
            $data = DB::table('getViewUkuran')->get();
            $masterBarang = DB::table('tblmasterbarangs')->get();
            return view('masterUkuran', ['data' => $data, 'masterBarang' => $masterBarang, 'msgType' => 'warning', 'msgStr' => 'Kombinasi panjang, lebar dan tinggi pada barang yang sama sudah ada!']);
        }
        else {

            tblmasterukuran::create([
                'IdMBarang' => $IdMBrg,
                'Panjang' => $Panjang,
                'Lebar' => $Lebar,
                'Tinggi' => $Tinggi,
                'Nilai' => $Nilai,
                'IdMUserCreate' => $IdMUserCreate,
                'IdMUserUpdate' => $IdMUserUpdate
            ]);

            $data = DB::table('getViewUkuran')->get();
            $masterBarang = DB::table('tblmasterbarangs')->get();
            return view('masterUkuran', ['data' => $data, 'masterBarang' => $masterBarang, 'msgType' => 'success', 'msgStr' => 'Data ukuran berhasil ditambah.']);
        }
    }

    public function edit($IdMUkuran)
    {
        $data = DB::table('getViewUkuran')->where('IdMUkuran', $IdMUkuran)->get()[0];
        $masterBarang = DB::table('tblmasterbarangs')->get();
        return view('masterUkuranEdit', ['data' => $data, 'masterBarang' => $masterBarang]);
    }

    public function save(Request $request)
    {
        $IdMUkuran = $request->IdMUkuran;
        $IdMBrg = $request->masterBarang;
        $Panjang = $request->Panjang;
        $Lebar = $request->Lebar;
        $Tinggi = $request->Tinggi;
        $Nilai = $request->Nilai;


        $user = $request->session()->get('login_state');
        $IdMUserUpdate = $user->IdMUser;

        tblmasterukuran::where('IdMUkuran', $IdMUkuran)->update([
            'IdMBarang' => $IdMBrg,
            'Panjang' => $Panjang,
            'Lebar' => $Lebar,
            'Tinggi' => $Tinggi,
            'Nilai' => $Nilai,
            'IdMUserUpdate' => $IdMUserUpdate
        ]);

        $data = DB::table('getViewUkuran')->get();
        $masterBarang = DB::table('tblmasterbarangs')->get();
        return view('masterUkuran', ['data' => $data, 'masterBarang' => $masterBarang, 'msgType' => 'success', 'msgStr' => 'Data ukuran berhasil diubah.']);
    }

    public function delete($IdMUkuran)
    {
        tblmasterukuran::where('IdMUkuran', $IdMUkuran)->delete();

        $data = DB::table('getViewUkuran')->get();
        $masterBarang = DB::table('tblmasterbarangs')->get();
        return view('masterUkuran', ['data' => $data, 'masterBarang' => $masterBarang, 'msgType' => 'success', 'msgStr' => 'Data ukuran berhasil dihapus.']);
    }
}
