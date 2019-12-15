@extends('layout.template')
@section('title', 'Edit Master Barang')
@section('css')
    <link href="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('title-content', 'Edit Master Barang')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-2"  style="max-width:50rem">
        <div class="card-body p-4">
            <form class="" action="/masterBarang/save" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="IdBarang" value="{{$data->IdMBrg}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="KodeBarang" id="KodeBarang"
                        class="form-control form-control-user KodeBarang" placeholder="Kode Barang. ex: KRS. Max 5 Char" required value="{{$data->KdMBrg}}" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="NamaBarang" id="NamaBarang"
                        class="form-control form-control-user" placeholder="Nama Barang. ex: Kursi" required value="{{$data->NmMBrg}}">
                </div>
                <div class="form-group row">
                    <div class="col" style="max-width:5rem"></div>
                    <div class="col text-center">
                        <b>P</b>
                    </div>
                    <div class="col text-center">
                        <b>L</b>
                    </div>
                    <div class="col text-center">
                        <b>T</b>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" style="max-width:5rem">Kecil</div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="PKecil" id="PKecil" class="form-control form-control-user PKecil" placeholder="Panjang (Kecil)" required value="{{number_format($data->PKecil)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="LKecil" id="LKecil" class="form-control form-control-user LKecil" placeholder="Lebar (Kecil)" required value="{{number_format($data->LKecil)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="TKecil" id="TKecil" class="form-control form-control-user TKecil" placeholder="Tinggi (Kecil)" required value="{{number_format($data->TKecil)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" style="max-width:5rem">Sedang</div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="PSedang" id="PSedang" class="form-control form-control-user PSedang" placeholder="Panjang (Sedang)" required value="{{number_format($data->PSedang)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="LSedang" id="LSedang" class="form-control form-control-user LSedang" placeholder="Lebar (Sedang)" required value="{{number_format($data->LSedang)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="TSedang" id="TSedang" class="form-control form-control-user TSedang" placeholder="Tinggi (Sedang)" required value="{{number_format($data->TSedang)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" style="max-width:5rem">Besar</div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="PBesar" id="PBesar" class="form-control form-control-user PBesar" placeholder="Panjang (Besar)" required value="{{number_format($data->PBesar)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="LBesar" id="LBesar" class="form-control form-control-user LBesar" placeholder="Lebar (Besar)" required value="{{number_format($data->LBesar)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="TBesar" id="TBesar" class="form-control form-control-user TBesar" placeholder="Tinggi (Besar)" required value="{{number_format($data->TBesar)}}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <a href="/masterBarang" class="btn btn-secondary btn-block">Batal</a>
                    </div>
                    <div class="col">
                        <button type="submit" name="sumbit" class="btn btn-warning btn-user btn-block text-dark">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="/sb_admin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/cleaveJS/cleave.min.js"></script>
    <script type="text/javascript">
        var cleave = new Cleave('.KodeBarang', {
            blocks: [5],
            uppercase: true
        });

        var cleavePKecil = new Cleave('.PKecil', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
        var cleaveLKecil = new Cleave('.LKecil', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
        var cleaveTKecil = new Cleave('.TKecil', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });

        var cleavePSedang = new Cleave('.PSedang', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
        var cleaveLSedang = new Cleave('.LSedang', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
        var cleaveTSedang = new Cleave('.TSedang', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });

        var cleavePBesar = new Cleave('.PBesar', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
        var cleaveLBesar = new Cleave('.LBesar', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
        var cleaveTBesar = new Cleave('.TBesar', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });
    </script>
@endsection
