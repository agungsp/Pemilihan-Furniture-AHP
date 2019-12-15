<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lib\AHP;

class HasilAnalisa extends Controller
{
    public function index(Request $request)
    {
        $matrix = array();
        if ($request->session()->has('login_state')) {
            if ($request->session()->has('admin_matrix')) {
                $standar = DB::table('getViewNilaiStandar')->where('IdMBrg', $request->session()->get('admin_IdMBrg'))
                                                        //    ->where('n_Ukuran', $request->session()->get('admin_Ukuran'))
                                                           ->get(['KdMVarian', 'n_harga', 'n_warna', 'n_design', 'n_bahan']);
                $matrix = $request->session()->get('admin_matrix');
                $ahp = new AHP($matrix);
                foreach ($standar as $key => $value) {
                    $ahp->set_nilaiStandar(
                        $value->KdMVarian,[
                            $value->n_Harga,
                            $value->n_warna,
                            $value->n_design,
                            $value->n_bahan
                        ]
                    );
                }

                $ahp->run();
                $StatusKonsisten = $ahp->get_ci() > 1 ? 'Tidak Konsisten' : 'Konsisten';
                return view('hasilAnalisa', ['matrix' => $ahp->get_matrix(),
                                             'sumColumn' => $ahp->get_sumColumns(),
                                             'normalizeMatrix' => $ahp->get_normalizeMatrix(),
                                             'rowAverage' => $ahp->get_rowAverage(),
                                             'consistencyMatrix' => $ahp->get_consistencyMatrix(),
                                             'consistencyCheck' => $ahp->get_consistencyCheck(),
                                             'multipleScore' => $ahp->get_multipleScore(),
                                             'nilaiStandar' => $ahp->get_nilaiStandar(),
                                             'ranking' => $ahp->get_rank(),
                                             'msgType' => 'info',
                                             'msgStr' => 'Cek Konsistensi: ' . $StatusKonsisten]);
            }
            else {
                return view('hasilAnalisa', ['matrix' => [],
                                             'sumColumn' => [],
                                             'normalizeMatrix' => [],
                                             'rowAverage' => [],
                                             'consistencyMatrix' => [],
                                             'consistencyCheck' => [],
                                             'multipleScore' => [],
                                             'nilaiStandar' => [],
                                             'ranking' => [],
                                             'ci' => 0,
                                             'msgType' => 'warning',
                                             'msgStr' => 'Data ranking tidak ada. Silahkan melakukan penilaian kriteria.']);
            }
        } else {
            if ($request->session()->has('user_matrix')) {
                $standar = DB::table('getViewNilaiStandar')->where('IdMBrg', $request->session()->get('user_IdMBrg'))
                                                        //    ->where('n_Ukuran', $request->session()->get('user_Ukuran'))
                                                           ->get(['KdMVarian', 'n_harga', 'n_warna', 'n_design', 'n_bahan']);

                $matrix = $request->session()->get('user_matrix');
                $ahp = new AHP($matrix);
                foreach ($standar as $key => $value) {
                    $ahp->set_nilaiStandar(
                        $value->KdMVarian,[
                            $value->n_Harga,
                            $value->n_warna,
                            $value->n_design,
                            $value->n_bahan
                        ]
                    );
                }

                $ahp->run();
                $StatusKonsisten = $ahp->get_ci() > 1 ? 'Tidak Konsisten' : 'Konsisten';
                return view('hasilAnalisa', ['matrix' => [],
                                             'sumColumn' => [],
                                             'normalizeMatrix' => [],
                                             'rowAverage' => [],
                                             'consistencyMatrix' => [],
                                             'consistencyCheck' => [],
                                             'multipleScore' => [],
                                             'nilaiStandar' => [],
                                             'ranking' => $ahp->get_rank(),
                                             'msgType' => 'info',
                                             'msgStr' => 'Cek Konsistensi: ' . $StatusKonsisten]);
            }
            else {
                return view('hasilAnalisa', ['matrix' => [],
                                             'sumColumn' => [],
                                             'normalizeMatrix' => [],
                                             'rowAverage' => [],
                                             'consistencyMatrix' => [],
                                             'consistencyCheck' => [],
                                             'multipleScore' => [],
                                             'nilaiStandar' => [],
                                             'ranking' => [],
                                             'ci' => 0,
                                             'msgType' => 'warning',
                                             'msgStr' => 'Data ranking tidak ada. Silahkan melakukan penilaian kriteria.']);
            }
        }
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
