@extends('layout.template')
@section('title', 'Master Ukuran')
@section('css')
    <link href="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('title-content', 'Master Ukuran')
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
                            <th>Barang</th>
                            <th>Ukuran</th>
                            <th>Nilai</th>
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
                                <td>{{$value->NmMBrg}}</td>
                                <td>{{number_format($value->Panjang)}} x {{number_format($value->Lebar)}} x {{number_format($value->Tinggi)}}</td>
                                <td>{{$value->Nilai}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/masterUkuran/eid{{$value->IdMUkuran}}" class="btn btn-sm btn-warning text-dark"><i class="far fa-edit"></i> Ubah</a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" onclick="DoDeleteVarian({{$value->IdMUkuran}});" class="btn btn-sm btn-danger">
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Input Ukuran</h5>
                </div>
                <div class="modal-body" id="addModalBody">
                    <form class="" action="/masterUkuran" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group form-inline">
                            <label for="masterBarang">Barang: </label>
                            <select name="masterBarang" id="masterBarang" class="form-control ml-2" required>
                                <option value="">.:: Pilih Barang ::.</option>
                                @foreach ($masterBarang as $key => $value)
                                    <option value="{{$value->IdMBrg}}">{{$value->KdMBrg}} - {{$value->NmMBrg}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <input type="text" name="Panjang" id="Panjang"
                                    class="form-control form-control-user input-panjang"
                                    placeholder="Panjang..." required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="Lebar" id="Lebar"
                                    class="form-control form-control-user input-lebar"
                                    placeholder="Lebar..." required>
                            </div>
                            <div class="col-4">
                                <input type="text" name="Tinggi" id="Tinggi"
                                    class="form-control form-control-user input-tinggi"
                                    placeholder="Tinggi..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Nilai" id="Nilai"
                                class="form-control form-control-user input-nilai"
                                placeholder="Nilai..." required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="addModalBtn">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
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
                    <a class="btn btn-danger" id="deleteModalBtn" href="/masterUkuran/did">
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
        var cleavePanjang = new Cleave('.input-panjang', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });

        var cleaveLebar = new Cleave('.input-lebar', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });

        var cleaveTinggi = new Cleave('.input-tinggi', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });

        var cleaveNilai = new Cleave('.input-nilai', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 0,
            numeralDecimalMark: '.',
        });

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function DoDeleteVarian(IdMUkuran) {
            var delLink = document.getElementById("deleteModalBtn");
            document.getElementById("deleteModalBody").innerHTML = "Ukuran akan dihapus?";
            delLink.href = "/masterUkuran/did"+IdMUkuran;
        }
    </script>
@endsection
