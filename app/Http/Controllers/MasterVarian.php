<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\tblmastervarian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;

class MasterVarian extends Controller
{
    public function index()
    {
        $data = DB::table('getviewvarian')->get();
        $masterBarang = DB::table('getNomorVarianPerBarang')->get();
        $masterDesign = DB::table('tblmasterdesigns')->get();
        // $masterUkuran = DB::table('getViewUkuran')->groupBy('IdMBarang')->get();
        $masterWarna = DB::table('tblmasterwarnads')->orderBy('NmMWarna')->get();
        $masterBahan = DB::table('tblmasterbahands')->orderBy('NmMBahan')->get();
        return view('masterVarian', ['data' => $data,
                                     'masterBarang' => $masterBarang,
                                    //  'masterUkuran' => $masterUkuran,
                                     'masterDesign' => $masterDesign,
                                     'masterBahan' => $masterBahan,
                                     'masterWarna' => $masterWarna,
                                     'msgType' => '', 'msgStr' => '']);
    }

    public function insert(Request $request)
    {
        // dd($request);
        $tempIdBrg = explode('-', $request->masterBarang);
        $IdMBrg = $tempIdBrg[0];
        $KodeVarian = $request->KodeBarang.'-'.$request->KodeVarian;
        $NamaVarian = $request->NamaVarian;
        $Ukuran = '';
        $Panjang = str_replace(',', '', $request->Panjang);
        $Lebar = str_replace(',', '', $request->Lebar);
        $Tinggi = str_replace(',', '', $request->Tinggi);
        $TinggiDudukan = $request->TinggiDudukan != null ? str_replace(',', '', $request->TinggiDudukan) : 0;
        $Warna = $request->Warna;
        $Desain = $request->Desain;
        $Bahan = $request->Bahan;
        $Harga = str_replace(',', '', $request->Harga);
        $Gambar = Input::file('Gambar');


        $user = $request->session()->get('login_state');
        $IdMUserCreate = $user->IdMUser;
        $IdMUserUpdate = $user->IdMUser;

        $cekVarian = DB::table('tblmastervarians')->where('KdMVarian', $KodeVarian)
                                                  ->count();
        if ($cekVarian > 0) {
            $data = DB::table('getviewvarian')->get();
            $masterBarang = DB::table('getNomorVarianPerBarang')->get();
            $masterDesign = DB::table('tblmasterdesigns')->get();
            // $masterUkuran = DB::table('getViewUkuran')->groupBy('IdMBarang')->get();
            $masterWarna = DB::table('tblmasterwarnads')->orderBy('NmMWarna')->get();
            $masterBahan = DB::table('tblmasterbahands')->orderBy('NmMBahan')->get();
            return view('masterVarian', ['data' => $data,
                                        'masterBarang' => $masterBarang,
                                        // 'masterUkuran' => $masterUkuran,
                                        'masterDesign' => $masterDesign,
                                        'masterBahan' => $masterBahan,
                                        'masterWarna' => $masterWarna,
                                        'msgType' => 'warning', 'msgStr' => 'Kode Varian Tidak Boleh Sama!']);
        }
        else {
            $nameFoto = $KodeVarian.'.'.$Gambar->getClientOriginalExtension();
            $nameFotoTumb = $KodeVarian.'_tumb.'.$Gambar->getClientOriginalExtension();

            tblmastervarian::create([
                'IdMBrg' => $IdMBrg,
                'KdMVarian' => $KodeVarian,
                'NmMVarian' => $NamaVarian,
                'Ukuran' => $Ukuran,
                'Panjang' => $Panjang,
                'Lebar' => $Lebar,
                'Tinggi' => $Tinggi,
                'TinggiDudukan' => $TinggiDudukan,
                'Harga' => $Harga,
                'IdMWarnaD' => $Warna,
                'IdMDesign' => $Desain,
                'IdMBahan' => $Bahan,
                'Foto' => asset('storage/'.$nameFoto),
                'FotoTumb' => asset('storage/'.$nameFotoTumb),
                'IdMUserCreate' => $IdMUserCreate,
                'IdMUserUpdate' => $IdMUserUpdate
            ]);

            $Gambar->move('storage', $nameFoto); //Upload Gambar Asli

            $GambarTumb = Image::make('storage/'.$nameFoto); // Load Gambar;
            $GambarTumb->resize(100,100)->save('storage/'.$nameFotoTumb); // resize untuk tumbnail dan save

            $data = DB::table('getviewvarian')->get();
            $masterBarang = DB::table('getNomorVarianPerBarang')->get();
            $masterDesign = DB::table('tblmasterdesigns')->get();
            // $masterUkuran = DB::table('getViewUkuran')->groupBy('IdMBarang')->get();
            $masterWarna = DB::table('tblmasterwarnads')->orderBy('NmMWarna')->get();
            $masterBahan = DB::table('tblmasterbahands')->orderBy('NmMBahan')->get();
            return view('masterVarian', ['data' => $data,
                                        'masterBarang' => $masterBarang,
                                        // 'masterUkuran' => $masterUkuran,
                                        'masterDesign' => $masterDesign,
                                        'masterBahan' => $masterBahan,
                                        'masterWarna' => $masterWarna,
                                        'msgType' => 'success', 'msgStr' => 'Data varian berhasil ditambah.']);
        }
    }

    public function edit($IdMVarian)
    {
        $data = DB::table('getviewvarian')->where('IdMVarian', "$IdMVarian")
                                             ->get()[0];
        $KodeBarang = explode('-', $data->KdMVarian);
        $masterBarang = DB::table('getNomorVarianPerBarang')->get();
        $masterDesign = DB::table('tblmasterdesigns')->get();
        // $masterUkuran = DB::table('getViewUkuran')->where('KdMBrg', $KodeBarang[0])->get();
        $masterWarna = DB::table('tblmasterwarnads')->orderBy('NmMWarna')->get();
        $masterBahan = DB::table('tblmasterbahands')->orderBy('NmMBahan')->get();
        return view('masterVarianEdit', ['data' => $data,
                                         'masterBarang' => $masterBarang,
                                        //  'masterUkuran' => $masterUkuran,
                                         'masterDesign' => $masterDesign,
                                         'masterBahan' => $masterBahan,
                                         'masterWarna' => $masterWarna]);
    }

    public function save(Request $request)
    {
        $IdVarian = $request->IdVarian;
        $KodeVarian = $request->KodeVarian;
        $NamaVarian = $request->NamaVarian;
        $Ukuran = '';
        $Panjang = str_replace(',', '', $request->Panjang);
        $Lebar = str_replace(',', '', $request->Lebar);
        $Tinggi = str_replace(',', '', $request->Tinggi);
        $TinggiDudukan = $request->TinggiDudukan != null ? str_replace(',', '', $request->TinggiDudukan) : 0;
        $Warna = $request->Warna;
        $Design = $request->Desain;
        $Bahan = $request->Bahan;
        $Harga = str_replace(',', '', $request->Harga);
        $Gambar = Input::file('Gambar');

        $user = $request->session()->get('login_state');
        $IdMUserUpdate = $user->IdMUser;

        if ($Gambar != null) {
            $nameFoto = $KodeVarian.'.'.$Gambar->getClientOriginalExtension();
            $nameFotoTumb = $KodeVarian.'_tumb.'.$Gambar->getClientOriginalExtension();
        }

        if ($Gambar != null){
            tblmastervarian::where('IdMVarian', $IdVarian)->update(['Panjang' => $Panjang,
                                                                'Lebar' => $Lebar,
                                                                'Tinggi' => $Tinggi,
                                                                'TinggiDudukan' => $TinggiDudukan,
                                                                'Ukuran' => $Ukuran,
                                                                'Harga' => $Harga,
                                                                'NmMVarian' => $NamaVarian,
                                                                'IdMWarnaD' => $Warna,
                                                                'IdMDesign' => $Design,
                                                                'IdMBahan' => $Bahan,
                                                                'Foto' => asset('storage/'.$nameFoto),
                                                                'FotoTumb' => asset('storage/'.$nameFotoTumb),
                                                                'IdMUserUpdate' => $IdMUserUpdate]);
        } else {
            tblmastervarian::where('IdMVarian', $IdVarian)->update(['Panjang' => $Panjang,
                                                                'Lebar' => $Lebar,
                                                                'Tinggi' => $Tinggi,
                                                                'TinggiDudukan' => $TinggiDudukan,
                                                                'Ukuran' => $Ukuran,
                                                                'Harga' => $Harga,
                                                                'NmMVarian' => $NamaVarian,
                                                                'IdMWarnaD' => $Warna,
                                                                'IdMDesign' => $Design,
                                                                'IdMBahan' => $Bahan,
                                                                'IdMUserUpdate' => $IdMUserUpdate]);
        }

        if ($Gambar != null) {
            $Gambar->move('storage', $nameFoto); //Upload Gambar Asli
            $GambarTumb = Image::make('storage/'.$nameFoto); // Load Gambar;
            $GambarTumb->resize(100,100)->save('storage/'.$nameFotoTumb); // resize untuk tumbnail dan save
        }

        $data = DB::table('getviewvarian')->get();
        $masterBarang = DB::table('getNomorVarianPerBarang')->get();
        $masterDesign = DB::table('tblmasterdesigns')->get();
        // $masterUkuran = DB::table('getViewUkuran')->groupBy('IdMBarang')->get();
        $masterWarna = DB::table('tblmasterwarnads')->orderBy('NmMWarna')->get();
        $masterBahan = DB::table('tblmasterbahands')->orderBy('NmMBahan')->get();
        return view('masterVarian', ['data' => $data,
                                    'masterBarang' => $masterBarang,
                                    // 'masterUkuran' => $masterUkuran,
                                    'masterDesign' => $masterDesign,
                                    'masterBahan' => $masterBahan,
                                    'masterWarna' => $masterWarna,
                                    'msgType' => 'success', 'msgStr' => 'Data varian berhasil diubah.']);
    }

    public function delete($IdMVarian)
    {
        $data = DB::table('tblmastervarians')->where('IdMVarian', $IdMVarian)->get()[0];

        // delete(['storage/'.$data->KdMVarian.'.jpg']);
        tblmastervarian::where('IdMVarian', $IdMVarian)
                       ->delete();


        $data = DB::table('getviewvarian')->get();
        $masterBarang = DB::table('getNomorVarianPerBarang')->get();
        $masterDesign = DB::table('tblmasterdesigns')->get();
        // $masterUkuran = DB::table('getViewUkuran')->groupBy('IdMBarang')->get();
        $masterWarna = DB::table('tblmasterwarnads')->orderBy('NmMWarna')->get();
        $masterBahan = DB::table('tblmasterbahands')->orderBy('NmMBahan')->get();
        return view('masterVarian', ['data' => $data,
                                    'masterBarang' => $masterBarang,
                                    // 'masterUkuran' => $masterUkuran,
                                    'masterDesign' => $masterDesign,
                                    'masterBahan' => $masterBahan,
                                    'masterWarna' => $masterWarna,
                                    'msgType' => 'success', 'msgStr' => 'Data varian berhasil dihapus.']);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('getViewUkuran')->where($select, $value)
                                          ->groupBy($dependent)
                                          ->get();
        $output = '<option value="">.:: Pilih Ukuran ::.</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->IdMUkuran.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

    public function fetchView(Request $request)
    {
        $field = $request->field;
        $value = $request->value;

        $data = DB::table('getViewVarian')->where($field, $value)
                                         ->get()[0];

        $output = '';
        $output .= '<div class="modal-body">';
        $output .= '<h3>'.$data->KdMVarian.' '.$data->NmMVarian.'</h3>';
        $output .= '<hr>';
        $output .= '<div class="row float-center">';
        $output .=     '<div class="col"><img src="'.$data->FotoTumb.'"></div>';
        $output .= '</div>';
        $output .= '<hr>';
        $output .= '<div class="row">';
        $output .=     '<table class="table table-borderless">';
        $output .=         '<tr>';
        $output .=             '<td>Kode</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td><b>'.$data->KdMVarian.'</b></td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Nama</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.$data->NmMVarian.'</td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Ukuran</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.number_format($data->Panjang).' x '.number_format($data->Lebar).' x '.number_format($data->Tinggi).'</td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Tinggi Dudukan</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.number_format($data->TinggiDudukan).'</td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Warna</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.$data->NmMWarna.'</td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Design</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.$data->JenisDesign.'</td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Bahan</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.$data->NmMBahan.'</td>';
        $output .=         '</tr>';
        $output .=         '<tr>';
        $output .=             '<td>Harga</td>';
        $output .=             '<td>:</td>';
        $output .=             '<td>'.number_format($data->Harga).'</td>';
        $output .=          '</tr>';
        $output .=     '</table>';
        $output .= '</div>';
        $output .= '</div>';
        echo $output;
    }
}
