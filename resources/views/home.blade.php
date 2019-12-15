@extends('layout.template')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Home')
@section('css')
    <style>
        .card-hover:hover {
            background-color: #e3e3e3;
        }
        a.card-hover:hover {
            text-decoration: none;
        }
    </style>
@endsection
@section('title-content', 'Home')
@section('content')
<div class="row">
    @foreach ($masterBarang as $key => $value)
    <div class="col-lg-4 mb-4 bg-light">
        <a href="/barang/{{$value->IdMBrg}}" class="card-hover text-dark">
            <div class="card shadow card-hover">
                <div class="card-body">
                    <b>{{$value->KdMBrg}} - {{$value->NmMBrg}}</b>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
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

            // $('#masterBarang').change(function(){
            //     $('#ukuran').val('');
            // });
        });
    </script>
@endsection
