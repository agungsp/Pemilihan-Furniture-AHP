@extends('layout.template')
@section('title', 'Penilaian Kriteria')
@section('title-content', 'Penilaian Kriteria')
@section('right-of-title-content')

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
<form action="/penilaianKriteria" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-4">
            <div class="form-group form-inline">
                <label for="masterBarang">Barang: </label>
                <select name="masterBarang" id="masterBarang" field="KdMBrg" onchange="setPrefix(this)" class="form-control ml-2 dynamic" data-dependent="ukuran" required>
                    <option value="">.:: Pilih Barang ::.</option>
                    @foreach ($masterBarang as $key => $value)
                        @if (Session::has('login_state'))
                            @if (Session::has('admin_IdMBrg') && $value->IdMBrg == Session::get('admin_IdMBrg'))
                                <option value="{{$value->IdMBrg}}" selected>{{$value->KdMBrg}} - {{$value->NmMBrg}}</option>
                            @else
                                <option value="{{$value->IdMBrg}}">{{$value->KdMBrg}} - {{$value->NmMBrg}}</option>
                            @endif
                        @else
                            @if (Session::has('user_IdMBrg') && $value->IdMBrg == Session::get('user_IdMBrg'))
                                <option value="{{$value->IdMBrg}}" selected>{{$value->KdMBrg}} - {{$value->NmMBrg}}</option>
                            @else
                                <option value="{{$value->IdMBrg}}">{{$value->KdMBrg}} - {{$value->NmMBrg}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>

                {{-- <label for="Ukuran" class="ml-4">Ukuran: </label>
                <select name="Ukuran" id="Ukuran" class="form-control ml-2" required>
                    <option value="">.:: Pilih Ukuran ::.</option>
                    @if (Session::has('login_state'))
                        @if (Session::has('admin_Ukuran'))
                            <option value="Kecil" {{Session::get('admin_Ukuran') == 'Kecil' ? 'selected':''}}>Kecil</option>
                            <option value="Sedang" {{Session::get('admin_Ukuran') == 'Sedang' ? 'selected':''}}>Sedang</option>
                            <option value="Besar" {{Session::get('admin_Ukuran') == 'Besar' ? 'selected':''}}>Besar</option>
                        @else
                            <option value="Kecil">Kecil</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Besar">Besar</option>
                        @endif
                    @else
                        @if (Session::has('user_Ukuran'))
                            <option value="Kecil" {{Session::get('user_Ukuran') == 'Kecil' ? 'selected':''}}>Kecil</option>
                            <option value="Sedang" {{Session::get('user_Ukuran') == 'Sedang' ? 'selected':''}}>Sedang</option>
                            <option value="Besar" {{Session::get('user_Ukuran') == 'Besar' ? 'selected':''}}>Besar</option>
                        @else
                            <option value="Kecil">Kecil</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Besar">Besar</option>
                        @endif
                    @endif
                </select> --}}
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Kriteria</th>
                            <th class="text-center">Nilai Perbandingan</th>
                            <th class="text-center">Nama Kriteria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($data); $i++)
                            @for ($j = 0; $j < count($data); $j++)
                                @if ($i < $j)
                                    <tr>
                                        <td>{{$data[$i]->KdMKriteria}} - {{$data[$i]->NmMKriteria}}</td>
                                        <td>
                                            <select class="form-control" name="{{$data[$i]->IdMKriteria}}_{{$data[$j]->IdMKriteria}}">
                                                @if (Session::has('login_state'))
                                                    @if (Session::has('admin_request') && (count(Session::get('admin_request')) > 0))
                                                    <option value="1" {{[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 1 ? "selected" : "" }}>1. Sama penting dengan</option>
                                                    <option value="2" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 2 ? "selected" : "" }}>2. Mendekati sedikit lebih penting dari</option>
                                                    <option value="3" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 3 ? "selected" : "" }}>3. Sedikit lebih penting dari</option>
                                                    <option value="4" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 4 ? "selected" : "" }}>4. Mendekati lebih penting dari</option>
                                                    <option value="5" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 5 ? "selected" : "" }}>5. Lebih penting dari</option>
                                                    <option value="6" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 6 ? "selected" : "" }}>6. Mendekati sangat penting dari</option>
                                                    <option value="7" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 7 ? "selected" : "" }}>7. Sangat penting dari</option>
                                                    <option value="8" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 8 ? "selected" : "" }}>8. Mendekati mutlak dari</option>
                                                    <option value="9" {{Session::get('admin_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 9 ? "selected" : "" }}>9. Mutlak sangat penting dari</option>
                                                    @else
                                                    <option value="1">1. Sama penting dengan</option>
                                                    <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                    <option value="3">3. Sedikit lebih penting dari</option>
                                                    <option value="4">4. Mendekati lebih penting dari</option>
                                                    <option value="5">5. Lebih penting dari</option>
                                                    <option value="6">6. Mendekati sangat penting dari</option>
                                                    <option value="7">7. Sangat penting dari</option>
                                                    <option value="8">8. Mendekati mutlak dari</option>
                                                    <option value="9">9. Mutlak sangat penting dari</option>
                                                    @endif
                                                @else
                                                    @if (Session::has('user_request'))
                                                    <option value="1" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 1 ? "selected" : "" }}>1. Sama penting dengan</option>
                                                    <option value="2" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 2 ? "selected" : "" }}>2. Mendekati sedikit lebih penting dari</option>
                                                    <option value="3" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 3 ? "selected" : "" }}>3. Sedikit lebih penting dari</option>
                                                    <option value="4" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 4 ? "selected" : "" }}>4. Mendekati lebih penting dari</option>
                                                    <option value="5" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 5 ? "selected" : "" }}>5. Lebih penting dari</option>
                                                    <option value="6" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 6 ? "selected" : "" }}>6. Mendekati sangat penting dari</option>
                                                    <option value="7" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 7 ? "selected" : "" }}>7. Sangat penting dari</option>
                                                    <option value="8" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 8 ? "selected" : "" }}>8. Mendekati mutlak dari</option>
                                                    <option value="9" {{Session::get('user_request')[$data[$i]->IdMKriteria.'_'.$data[$j]->IdMKriteria] == 9 ? "selected" : "" }}>9. Mutlak sangat penting dari</option>
                                                    @else
                                                    <option value="1">1. Sama penting dengan</option>
                                                    <option value="2">2. Mendekati sedikit lebih penting dari</option>
                                                    <option value="3">3. Sedikit lebih penting dari</option>
                                                    <option value="4">4. Mendekati lebih penting dari</option>
                                                    <option value="5">5. Lebih penting dari</option>
                                                    <option value="6">6. Mendekati sangat penting dari</option>
                                                    <option value="7">7. Sangat penting dari</option>
                                                    <option value="8">8. Mendekati mutlak dari</option>
                                                    <option value="9">9. Mutlak sangat penting dari</option>
                                                    @endif
                                                @endif
                                            </select>
                                        </td>
                                        <td>{{$data[$j]->KdMKriteria}} - {{$data[$j]->NmMKriteria}}</td>
                                    </tr>
                                @endif
                            @endfor
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="form-group float-right">
                <input type="reset" class="btn btn-secondary" value="Reset">
                <button type="submit" class="btn btn-primary" name="submit">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
