@extends('layout.template')
@section('title', 'Master Barang')
@section('css')
    <link href="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('title-content', 'Master Barang')
@section('right-of-title-content')
    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal" data-backdrop="static" data-keyboard="false">
        <i class="fas fa-plus"></i> Tambah
    </button>
@endsection
@section('content')
    @if ($msgType != '')
        <div class="col-8 mx-auto mt-3">
            <div class="alert alert-{{$msgType}} alert-dismissible fade show" role="alert">
                <strong>{{ucwords($msgType)}}</strong> {{$msgStr}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kecil (cm)</th>
                            <th>Sedang (cm)</th>
                            <th>Besar (cm)</th>
                            <th style="width: 18%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $key => $value)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$value->KdMBrg}}</td>
                                <td>{{$value->NmMBrg}}</td>
                                <td>{{number_format($value->PKecil)}} x {{number_format($value->LKecil)}} x {{number_format($value->TKecil)}}</td>
                                <td>{{number_format($value->PSedang)}} x {{number_format($value->LSedang)}} x {{number_format($value->TSedang)}}</td>
                                <td>{{number_format($value->PBesar)}} x {{number_format($value->LBesar)}} x {{number_format($value->TBesar)}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/masterBarang/eid{{$value->IdMBrg}}" class="btn btn-sm btn-warning text-dark"><i class="far fa-edit"></i> Ubah</a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" onclick="DoDeleteBrg({{$value->IdMBrg}}, '{{$value->KdMBrg}}', '{{$value->NmMBrg}}');" class="btn btn-sm btn-danger">
                                            <i class="far fa-trash-alt"></i> Hapus
                                        </a>
                                    </div>
                                </td>
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
@endsection
@section('modal')
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:50rem">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Input Barang</h5>
                </div>
                <div class="modal-body" id="addModalBody">
                    <form class="" action="/masterBarang" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="KodeBarang" id="KodeBarang"
                                class="form-control form-control-user KodeBarang" placeholder="Kode Barang. ex: KRS. Max 5 Char" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="NamaBarang" id="NamaBarang"
                                class="form-control form-control-user" placeholder="Nama Barang. ex: Kursi" required>
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
                                    <input type="text" name="PKecil" id="PKecil" class="form-control form-control-user PKecil" placeholder="Panjang (Kecil)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" name="LKecil" id="LKecil" class="form-control form-control-user LKecil" placeholder="Lebar (Kecil)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" name="TKecil" id="TKecil" class="form-control form-control-user TKecil" placeholder="Tinggi (Kecil)" required>
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
                                    <input type="text" name="PSedang" id="PSedang" class="form-control form-control-user PSedang" placeholder="Panjang (Sedang)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" name="LSedang" id="LSedang" class="form-control form-control-user LSedang" placeholder="Lebar (Sedang)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" name="TSedang" id="TSedang" class="form-control form-control-user TSedang" placeholder="Tinggi (Sedang)" required>
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
                                    <input type="text" name="PBesar" id="PBesar" class="form-control form-control-user PBesar" placeholder="Panjang (Besar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" name="LBesar" id="LBesar" class="form-control form-control-user LBesar" placeholder="Lebar (Besar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" name="TBesar" id="TBesar" class="form-control form-control-user TBesar" placeholder="Tinggi (Besar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <button class="btn btn-secondary btn-block" type="button" data-dismiss="modal">Batal</button>
                            </div>
                            <div class="col">
                                <button type="submit" name="sumbit" class="btn btn-primary btn-user btn-block">
                                    <i class="fas fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hapus Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Yakin ingin menghapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="deleteModalBody"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" id="deleteModalBtn" href="/masterBarang/did">
                        <i class="far fa-trash-alt"></i> Hapus
                    </a>
                </div>
            </div>
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


        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function DoDeleteBrg(IdMBrg, KdMBrg, NmMBrg) {
            var delLink = document.getElementById("deleteModalBtn");
            console.log(KdMBrg);
            document.getElementById("deleteModalBody").innerHTML = "Barang <strong>" + KdMBrg + " - " + NmMBrg + "</strong> akan dihapus?";
            delLink.href = "/masterBarang/did"+IdMBrg;
        }
    </script>
@endsection
