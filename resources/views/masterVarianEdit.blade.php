{{-- {{dd($data)}} --}}
@extends('layout.template')
@section('title', 'Edit Master Varian')
@section('css')
<link href="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('title-content', 'Edit Master Varian')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-2 col-lg-9">
    <div class="card-body p-4">
        <form class="" action="/masterVarian/save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <input type="hidden" name="IdVarian" value="{{$data->IdMVarian}}">
            <div class="form-group form-inline">
                <label for="KodeVarian">Kode: </label>
                <input type="text" class="form-control ml-2" name="KodeVarian" id="KodeVarian" value="{{$data->KdMVarian}}" readonly>
            </div>
            <div class="form-group form-inline">
                <label for="NamaVarian">Nama: </label>
                <input type="text" class="form-control ml-2" name="NamaVarian" id="NamaVarian" value="{{$data->NmMVarian}}">
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
                        <input value="{{$data->Panjang}}" type="text" name="Panjang" id="Panjang" class="form-control form-control-user input-panjang" placeholder="Panjang..." required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <input value="{{$data->Lebar}}" type="text" name="Lebar" id="Lebar" class="form-control form-control-user input-lebar" placeholder="Lebar..." required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <input value="{{$data->Tinggi}}" type="text" name="Tinggi" id="Tinggi" class="form-control form-control-user input-tinggi" placeholder="Tinggi..." required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="input-group">
                        <input value="{{$data->TinggiDudukan}}" type="text" name="TinggiDudukan" id="TinggiDudukan" class="form-control form-control-user input-tinggi-dudukan" placeholder="Tinggi Dudukan (Optional)">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                    <small class="float-right text-muted"><i>Optional</i></small>
                </div>
            </div>
            <div class="form-group form-inline">
                <label for="Warna">Warna: </label>
                <select name="Warna" id="Warna" class="form-control ml-2">
                    <option value="">.:: Pilih Warna ::.</option>
                    @foreach ($masterWarna as $key => $value)
                        <option value="{{$value->IdMWarnaDs}}">{{$value->NmMWarna}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group  form-inline">
                <label for="Desain">Desain: </label>
                <select name="Desain" id="Desain" class="form-control ml-2">
                    <option value="">.:: Pilih Desain ::.</option>
                    @foreach ($masterDesign as $key => $value)
                        <option value="{{$value->IdMDesign}}">{{$value->JenisDesign}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group  form-inline">
                <label for="Bahan">Bahan: </label>
                <select name="Bahan" id="Bahan" class="form-control ml-2">
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
                    placeholder="Harga..." value="{{number_format($data->Harga)}}" required>
            </div>
            <div class="form-group form-inline">
                <label for="Gambar">Gambar: </label>
                <input type="file" name="Gambar" id="Gambar"
                    class="form-control ml-2">
                <small>(Optional)</small>
            </div>
            <div class="modal-footer">
                    <a href="/masterVarian"  class="btn btn-secondary btn-user">Batal</a>
                <button type="submit" name="sumbit" class="btn btn-warning btn-user text-dark">
                    <i class="far fa-edit"></i> Edit
                </button>
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
    // var tmp = "{{$data->KdMVarian}}";
    // var res = tmp.split("-");
    // var combo = "{{$data->IdMBrg}}".concat('-').concat(res[0]);
    // document.getElementById('masterBarang').value = combo;
    // document.getElementById('KodeBarang').value = res[0];
    // document.getElementById('KodeVarian').value = res[1];

    document.getElementById('Desain').value = {{$data->IdMDesign}};
    document.getElementById('Warna').value = {{$data->IdMWarnaD}};
    document.getElementById('Bahan').value = {{$data->IdMBahan}};
    document.getElementById('Ukuran').value = "{{$data->Ukuran}}";

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

    // function setPrefix(combo) {
    //     var val = combo.value;
    //     var temp = []
    //     var prefix = 0;
    //     if (val == "") {
    //         prefix = "-";
    //     } else {
    //         temp = val.split('-');
    //         prefix = temp[1];
    //     }
    //     document.getElementById('KodeBarang').value = prefix;
    // }
</script>
@endsection
