{{-- {{dd($ranking)}} --}}
@extends('layout.template')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Hasil Analisa')
@section('title-content', 'Hasil Analisa')
@section('content')
    @if ($msgType != '')
        <div class="col-8 mx-auto mt-3">
            <div class="alert alert-{{$msgType}} alert-dismissible fade show" role="alert">
                <strong>{{ucwords($msgType)}}</strong> {{$msgStr}}
            </div>
        </div>
    @endif

    @if ($msgType == 'info')
        @if (Session::has('login_state'))
            <div class="container-fluid">
                {{-- <div class="row"> --}}
                    <div class="card o-hidden border-0 shadow-lg my-2">
                        <div class="card-header">
                            <b>Matrix Perbandingan</b>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Harga</th>
                                            <th>Warna</th>
                                            <th>Design</th>
                                            <th>Bahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Harga</b></td>
                                            <td>{{number_format($matrix[0][0], 2)}}</td>
                                            <td>{{number_format($matrix[0][1], 2)}}</td>
                                            <td>{{number_format($matrix[0][2], 2)}}</td>
                                            <td>{{number_format($matrix[0][3], 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Warna</b></td>
                                            <td>{{number_format($matrix[1][0], 2)}}</td>
                                            <td>{{number_format($matrix[1][1], 2)}}</td>
                                            <td>{{number_format($matrix[1][2], 2)}}</td>
                                            <td>{{number_format($matrix[1][3], 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Design</b></td>
                                            <td>{{number_format($matrix[2][0], 2)}}</td>
                                            <td>{{number_format($matrix[2][1], 2)}}</td>
                                            <td>{{number_format($matrix[2][2], 2)}}</td>
                                            <td>{{number_format($matrix[2][3], 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Bahan</b></td>
                                            <td>{{number_format($matrix[3][0], 2)}}</td>
                                            <td>{{number_format($matrix[3][1], 2)}}</td>
                                            <td>{{number_format($matrix[3][2], 2)}}</td>
                                            <td>{{number_format($matrix[3][3], 2)}}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td><b>Ukuran</b></td>
                                            <td>{{number_format($matrix[4][0], 2)}}</td>
                                            <td>{{number_format($matrix[4][1], 2)}}</td>
                                            <td>{{number_format($matrix[4][2], 2)}}</td>
                                            <td>{{number_format($matrix[4][3], 2)}}</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
                {{-- <div class="row"> --}}
                    <div class="card o-hidden border-0 shadow-lg my-2">
                        <div class="card-header">
                            <b>Nomalisasi & Skoring</b>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            <th>Harga</th>
                                            <th>Warna</th>
                                            <th>Design</th>
                                            <th>Bahan</th>
                                            <th>Jumlah</th>
                                            <th>Skoring</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Harga</b></td>
                                            <td>{{number_format($normalizeMatrix[0][0], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[0][1], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[0][2], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[0][3], 2)}}</td>
                                            <td>{{number_format($sumColumn[0], 2)}}</td>
                                            <td>{{number_format($rowAverage[0], 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Warna</b></td>
                                            <td>{{number_format($normalizeMatrix[1][0], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[1][1], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[1][2], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[1][3], 2)}}</td>
                                            <td>{{number_format($sumColumn[1], 2)}}</td>
                                            <td>{{number_format($rowAverage[1], 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Design</b></td>
                                            <td>{{number_format($normalizeMatrix[2][0], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[2][1], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[2][2], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[2][3], 2)}}</td>
                                            <td>{{number_format($sumColumn[2], 2)}}</td>
                                            <td>{{number_format($rowAverage[2], 2)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Bahan</b></td>
                                            <td>{{number_format($normalizeMatrix[3][0], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[3][1], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[3][2], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[3][3], 2)}}</td>
                                            <td>{{number_format($sumColumn[3], 2)}}</td>
                                            <td>{{number_format($rowAverage[3], 2)}}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td><b>Ukuran</b></td>
                                            <td>{{number_format($normalizeMatrix[4][0], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[4][1], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[4][2], 2)}}</td>
                                            <td>{{number_format($normalizeMatrix[4][3], 2)}}</td>
                                            <td>{{number_format($sumColumn[4], 2)}}</td>
                                            <td>{{number_format($rowAverage[4], 2)}}</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
                <div class="row">
                    <div class="col-4">
                        <div class="card o-hidden border-0 shadow-lg my-2">
                            <div class="card-header">
                                <b>Pengecekan Konsistensi</b>
                            </div>
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td><b>P1</b></td>
                                                <td>{{number_format($consistencyMatrix[0], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>P2</b></td>
                                                <td>{{number_format($consistencyMatrix[1], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>P3</b></td>
                                                <td>{{number_format($consistencyMatrix[2], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>P4</b></td>
                                                <td>{{number_format($consistencyMatrix[3], 2)}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td><b>P5</b></td>
                                                <td>{{number_format($consistencyMatrix[4], 2)}}</td>
                                            </tr> --}}
                                            <tr>
                                                <td><b>Zmax</b></td>
                                                <td>{{number_format($consistencyCheck['zmax'], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>CI</b></td>
                                                <td>{{number_format($consistencyCheck['ci'], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>CR</b></td>
                                                <td>{{number_format($consistencyCheck['cr'], 2)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card o-hidden border-0 shadow-lg my-2">
                            <div class="card-header">
                                <b>Perkalian</b>
                            </div>
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td><b>P1</b></td>
                                                <td>{{number_format($multipleScore[0], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>P2</b></td>
                                                <td>{{number_format($multipleScore[1], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>P3</b></td>
                                                <td>{{number_format($multipleScore[2], 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td><b>P4</b></td>
                                                <td>{{number_format($multipleScore[3], 2)}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td><b>P5</b></td>
                                                <td>{{number_format($multipleScore[4], 2)}}</td>
                                            </tr> --}}
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td>{{number_format(array_sum($consistencyMatrix), 2)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card o-hidden border-0 shadow-lg my-2">
                    <div class="card-header">
                        <b>Nilai Standar</b>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Harga</th>
                                        <th>Warna</th>
                                        <th>Design</th>
                                        <th>Bahan</th>
                                        {{-- <th>Ukuran</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nilaiStandar as $key => $value)
                                        <tr>
                                            <td>{{$key}}</td>
                                            @foreach ($value as $k => $v)
                                                <td>{{$v}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="card o-hidden border-0 shadow-lg my-2">
            {{ csrf_field() }}
            <div class="card-header">
                <b>Perankingan</b>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No.</th>
                                <th>Kode</th>
                                <th>Nilai</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($ranking as $key => $value)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$key}}</td>
                                    <td>{{$value}}</td>
                                    <td><button class="btn btn-primary btn-sm dynamic" KdMVarian="{{$key}}" data-toggle="modal" data-target="#lihatModal">Lihat</button></td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('modal')
    {{-- View Modal --}}
    <div class="modal fade" id="lihatModal" tabindex="-1" role="dialog" aria-labelledby="lihatModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-4" id="modal-content">
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        /*
         * Fungsi Untuk mengisi modal view
        */
        $(document).ready(function(){
            $('.dynamic').click(function(){
                var field = 'KdMVarian';
                var value = $(this).attr("KdMVarian");
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{ route('HasilAnalisa.fetchView') }}",
                    method:"POST",
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');
                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    data:{field:field, value:value, _token:_token},
                    success: function(result) {
                        $('#modal-content').html(result);
                    }
                });
            });
        });
    </script>
@endsection
