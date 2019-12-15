@extends('layout.template')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Master Varian')
@section('css')
    <link href="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('title-content', 'Master Varian')
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Ukuran (cm)</th>
                            <th>Warna</th>
                            <th>Desain</th>
                            <th>Bahan</th>
                            <th>Harga</th>
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
                                <td>{{$value->KdMVarian}}</td>
                                <td>{{$value->NmMVarian}}</td>
                                <td>{{$value->Panjang}} x {{$value->Lebar}} x {{$value->Tinggi}}</td>
                                <td>{{$value->NmMWarna}}</td>
                                <td>{{$value->JenisDesign}}</td>
                                <td>{{$value->NmMBahan}}</td>
                                <td>{{number_format($value->Harga,2)}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/masterVarian/eid{{$value->IdMVarian}}" class="btn btn-sm btn-warning text-dark"><i class="far fa-edit"></i> Ubah</a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" onclick="DoDeleteVarian({{$value->IdMVarian}}, '{{$value->KdMVarian}}');" class="btn btn-sm btn-danger">
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
        <div class="modal-dialog" role="document" style="max-width: 50rem">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Input Varian</h5>
                </div>
                <div class="modal-body" id="addModalBody">
                    <form class="" action="/masterVarian" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group form-inline">
                            <label for="masterBarang">Barang: </label>
                            <select name="masterBarang" id="masterBarang" field="KdMBrg" onchange="setPrefix(this)" class="form-control ml-2 dynamic" data-dependent="ukuran" required>
                                <option value="">.:: Pilih Barang ::.</option>
                                @foreach ($masterBarang as $key => $value)
                                    <option value="{{$value->IdMBrg}}-{{$value->KdMBrg}}-{{$value->NomorVarian+1}}">{{$value->KdMBrg}} - {{$value->NmMBrg}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <input type="text" name="KodeBarang" id="KodeBarang"
                                    class="form-control form-control-user KodeBarang" readonly value="-">
                            </div>
                            <div class="col-4">
                                <input type="text" name="KodeVarian" id="KodeVarian"
                                    class="form-control form-control-user KodeVarian"
                                    placeholder="Kode Varian" readonly>
                            </div>
                            <div class="col-5">
                                <input type="text" name="NamaVarian" id="NamaVarian"
                                    class="form-control form-control-user NamaVarian"
                                    placeholder="Nama Varian" required>
                            </div>
                        </div>
                        {{-- <div class="form-group form-inline">
                            <label for="Ukuran">Ukuran: </label>
                            <select name="Ukuran" id="Ukuran" class="form-control ml-2" required>
                                <option value="">.:: Pilih Ukuran ::.</option>
                                <option value="Kecil">Kecil</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Besar">Besar</option>
                            </select>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="text" name="Panjang" id="Panjang" class="form-control form-control-user input-panjang" placeholder="Panjang..." required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="text" name="Lebar" id="Lebar" class="form-control form-control-user input-lebar" placeholder="Lebar..." required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="text" name="Tinggi" id="Tinggi" class="form-control form-control-user input-tinggi" placeholder="Tinggi..." required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="text" name="TinggiDudukan" id="TinggiDudukan" class="form-control form-control-user input-tinggi-dudukan" placeholder="Tinggi Dudukan (Optional)">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
                                <small class="float-right text-muted"><i>Optional</i></small>
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <label for="Warna">Warna: </label>
                            <select name="Warna" id="Warna" class="form-control ml-2" required>
                                <option value="">.:: Pilih Warna ::.</option>
                                @foreach ($masterWarna as $key => $value)
                                    <option value="{{$value->IdMWarnaDs}}">{{$value->NmMWarna}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  form-inline">
                            <label for="Desain">Desain: </label>
                            <select name="Desain" id="Desain" class="form-control ml-2" required>
                                <option value="">.:: Pilih Desain ::.</option>
                                @foreach ($masterDesign as $key => $value)
                                    <option value="{{$value->IdMDesign}}">{{$value->JenisDesign}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  form-inline">
                            <label for="Bahan">Bahan: </label>
                            <select name="Bahan" id="Bahan" class="form-control ml-2" required>
                                <option value="">.:: Pilih Bahan ::.</option>
                                @foreach ($masterBahan as $key => $value)
                                    <option value="{{$value->IdMBahanD}}">{{$value->NmMBahan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-inline">
                            <label for="Harga">Harga: </label>
                            <input type="text" name="Harga" id="Harga"
                                class="form-control form-control-user input-harga ml-2"
                                placeholder="Harga..." required>
                        </div>
                        <div class="form-group form-inline">
                            <label for="Gambar">Gambar: </label>
                            <input type="file" name="Gambar" id="Gambar"
                                class="form-control ml-2" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" id="addModalBtn" href="/masterBarang/did">
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
                    <a class="btn btn-danger" id="deleteModalBtn" href="/masterVarian/did">
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
        var cleaveHarga = new Cleave('.input-harga', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand',
            numeralDecimalScale: 2,
            numeralDecimalMark: '.'
        });

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

        var cleaveTinggiDudukan = new Cleave('.input-tinggi-dudukan', {
            numeral: true,
            numeralPositiveOnly: true,
            numeralDecimalScale: 2,
            numeralDecimalMark: '.',
        });

        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function DoDeleteVarian(IdMVarian, KdMVarian) {
            var delLink = document.getElementById("deleteModalBtn");
            document.getElementById("deleteModalBody").innerHTML = "Varian <strong>" + KdMVarian + "</strong> akan dihapus?";
            delLink.href = "/masterVarian/did"+IdMVarian;
        }

        function setPrefix(combo) {
            var val = combo.value;
            var temp = []
            var prefix = 0;
            var LenCode = 3;
            var KodeVarian = '';

            if (val == "") {
                prefix = "-";
            } else {
                temp = val.split('-');
                prefix = temp[1];
            }

            for (let i = 0; i < (LenCode - temp[2].length); i++) {
                KodeVarian = KodeVarian + '0';
            }
            KodeVarian = KodeVarian + temp[2];

            document.getElementById('KodeBarang').value = prefix;
            document.getElementById('KodeVarian').value = KodeVarian;
        }


        /*
         * Fungsi Untuk Dropdown ukuran sesuai barang
        */
        // $(document).ready(function(){
        //     $('.dynamic').change(function(){
        //         if($(this).val() != '') {
        //             var select = $(this).attr("field");
        //             var temp = $(this).val().split('-');
        //             var value = temp[1];
        //             var dependent = $(this).data('dependent');
        //             var _token = $('input[name="_token"]').val();
        //             $.ajax({
        //                 url:"{{ route('MasterVarian.fetch') }}",
        //                 method:"POST",
        //                 beforeSend: function (xhr) {
        //                     var token = $('meta[name="csrf_token"]').attr('content');
        //                     if (token) {
        //                         return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        //                     }
        //                 },
        //                 data:{select:select, value:value, _token:_token, dependent:dependent},
        //                 success: function(result) {
        //                     $('#'+dependent).html(result);
        //                 }
        //             });
        //         }
        //     });

        //     $('#masterBarang').change(function(){
        //         $('#ukuran').val('');
        //     });
        // });
    </script>
@endsection
