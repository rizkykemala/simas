@extends('template')  
@section('header', 'Uang Kas')
@push('script')
   <script type="text/javascript" src="{{ asset("source/dist/js/demo/date-time-picker.js") }}"></script>
@endpush
@section('subheader', 'Data Uang Kas') 
@section('pages')
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-title">
                        <span class="panel-title-text">Data Uang Kas</span>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{$datas!=FALSE?$action_url.'/'.Crypt::encryptString($datas->id):$action_url}}" method="POST">
                        <input type="hidden" value="{{ $datas!=FALSE?$datas->id:'' }}" name="id">
                        @csrf
                        {{ $datas!=FALSE?method_field('PUT'):'' }}
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label mr-sm-2">Jenis Transaksi</label>
                                <select class="custom-select" name="jenis_transaksi">
                                    <option selected="">Pilih</option>
                                    <option value="D" {{ $datas!=FALSE?($datas->jenis_transaksi == 'D'?'selected':''):(old('jenis_transaksi')== 'D'?'selected':'') }}>Uang Masuk</option>
                                    <option value="K" {{ $datas!=FALSE?($datas->jenis_transaksi == 'K'?'selected':''):(old('jenis_transaksi')== 'K'?'selected':'') }}>Uang Keluar</option>
                                </select>
                                @if($errors->has('jenis_transaksi'))
                                <div class="form-text" style="color: red;">{{$errors->first('jenis_transaksi')}}</div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Transaksi</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control pickadate-accessibility-labels" placeholder="Pilih Tanggal" name="tgl_transaksi" value="{{$datas==FALSE?date('Y-m-d'):$datas->tgl_transaksi}}">
                                    </div>
                                    @if($errors->has('tgl_transaksi'))
                                    <div class="form-text" style="color: red">
                                        {{$errors->first('tgl_transaksi')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <label class="col-12 col-form-label">Jumlah Uang</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Hanya Angka" name="jumlah_uang" value="{{$datas!=FALSE?$datas->jumlah_uang:old('jumlah_uang')}}">
                                @if($errors->has('jumlah_uang'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('jumlah_uang')}}
                                </div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Keterangan</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Keterangan" value="{{$datas!=FALSE?$datas->keterangan:old('keterangan')}}" name="keterangan">
                                @if($errors->has('keterangan'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('keterangan')}}
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer text-right">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a class="btn btn-outline btn-secondary btn-outline-1x" href="{{ url('uangkas') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>             
    </div>
</div>
@endsection