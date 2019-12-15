@extends('layout.template')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Varian: '.$masterBarang[0]->KdMBrg.' - '.$masterBarang[0]->NmMBrg)
@section('title-content', $masterBarang[0]->KdMBrg.' - '.$masterBarang[0]->NmMBrg)
@section('content')
    @if (count($masterVarian) > 0)
        <div class="row mt-4">
            @foreach ($masterVarian as $key => $value)
            <div class="col-3 mb-2">
                <div class="card" style="width: 250px;">
                    <img src="{{$value->FotoTumb}}" class="card-img-top" alt="{{$value->KdMVarian}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$value->KdMVarian}}</h5>
                        <a href="#" data-toggle="modal" data-target="#lihatModal" IdMVarian="{{$value->IdMVarian}}" class="btn btn-primary btn-sm dynamic">
                            <i class="far fa-eye"></i> Lihat
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ csrf_field() }}
    @else
        <div class="col-8 mx-auto mt-3">
            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                Varian untuk barang ini belum tersedia.
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
                var field = 'IdMVarian';
                var value = $(this).attr("IdMVarian");
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{ route('MasterVarian.fetchView') }}",
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
