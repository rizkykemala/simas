@extends('template')  
@section('header', 'Inventaris')
@push('script')
<script>
    $(document).ready(function() {
      $('body').on('click', '.sweetalert-4', function (e) {
        e.preventDefault();
        var idLink = '#'+$(this).attr('id'),
        url = $(idLink).attr('href'),
        csrf_token = $('input[name="_token"]').attr('value');
        
        swal({   
            title: "Apakah anda ingin menghapus data ini?",   
            text: "Data yang telah dihapus tidak dapat dikembalikan!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ya, Hapus!",   
            closeOnConfirm: false 
        }, function(){ 
            $.ajax(
            {
                url:url,
                method: 'POST',
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success:function(data) 
                {
                 swal({
                    "title": "Terhapus!", 
                    "text": "Data Berhasil Dihapus", 
                    "type": "success"
                }, function(){
                    location.reload()
                });                
             }
         });  
        });
    });
  });
</script>
@endpush
@section('pages')
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-title">
                        <span class="panel-title-text">Inventaris</span>    
                    </div>
                    <div class="page-hdr-right"> <a href="{{$tambah}}" class="btn btn-light text-dark btn-pill m-1">Tambah Data</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if($messages = Session::get('success'))
                    <div class="alert alert-icon alert-success alert-dismissible fade show">
                        <div class="alert--icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="alert-text">
                            <strong>Berhasil!</strong> {{$messages}}
                        </div>
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="table-responsive"></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah barang</th>
                                <th scope="col">Tanggal barang</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1?>
                            @if(count($datas)>0)
                            @foreach($datas as $r)
                            @php
                                $saldo=0
                            @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$r->jenis_barang}}</td>
                                <td>{{$r->nama_barang}}</td>
                                <td>{{$r->jumlah_barang}}</td>
                                <td>{{$r->tgl_barang}}</td>
                                <td>{{$r->keterangan}}</td>
                                <td nowrap><form method="POST"><a href="{{ url('inventaris/'.Crypt::encryptString($r->id).'/edit') }}" class="btn btn-default btn-circle btn-shadow m-1" title="Edit Data"><i class="far fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('inventaris/'.Crypt::encryptString($r->id)) }}"  id="delete_{{ $i }}" class="btn btn-danger btn-circle btn-shadow m-1 sweetalert-4" title="Hapus Data">
                                        <i class="far fa-trash-alt"></i>
                                    </a>    
                                </form></td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" align="center"> Data Tidak Ditemukan </td>
                            </tr>  
                            @endif
                        </tbody>
                    </table>
                    {{--  {{ $datas->links() }} --}}
                </div>
            </div>
        </div>             
    </div>
</div>
@endsection