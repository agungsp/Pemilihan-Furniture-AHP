@extends('layout.template')
@section('title', 'Edit Master Ukuran')
@section('css')
<link href="/sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('title-content', 'Edit Master Ukuran')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-2 col-lg-7">
    <div class="card-body p-4">
        <form class="" action="/masterUkuran/save" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="IdMUkuran" value="{{$data->IdMUkuran}}">
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
                        placeholder="Panjang..." value="{{$data->Panjang}}" required>
                </div>
                <div class="col-4">
                    <input type="text" name="Lebar" id="Lebar"
                        class="form-control form-control-user input-lebar"
                        placeholder="Lebar..." value="{{$data->Lebar}}" required>
                </div>
                <div class="col-4">
                    <input type="text" name="Tinggi" id="Tinggi"
                        class="form-control form-control-user input-tinggi"
                        placeholder="Tinggi..." value="{{$data->Tinggi}}" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="Nilai" id="Nilai"
                    class="form-control form-control-user input-nilai"
                    placeholder="Nilai..." value="{{$data->Nilai}}" required>
            </div>
            <div class="modal-footer">
                <a href="/masterUkuran" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-warning text-dark" id="addModalBtn">
                    <i class="far fa-edit"></i> Ubah
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
    var combo = "{{$data->IdMBarang}}";
    document.getElementById('masterBarang').value = combo;

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
</script>
@endsection
