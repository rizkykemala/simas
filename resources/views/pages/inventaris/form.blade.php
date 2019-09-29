@extends('template')  
@section('header', 'Inventaris')
@push('script')
   <script type="text/javascript" src="{{ asset("source/dist/js/demo/date-time-picker.js") }}"></script>
@endpush
@section('subheader', 'Data Inventaris') 
@section('pages')
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-title">
                        <span class="panel-title-text">Data Inventaris</span>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{$datas!=FALSE?$action_url.'/'.Crypt::encryptString($datas->id):$action_url}}" method="POST">
                        <input type="hidden" value="{{ $datas!=FALSE?$datas->id:'' }}" name="id">
                        @csrf
                        {{ $datas!=FALSE?method_field('PUT'):'' }}
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label mr-sm-2">Jenis Barang</label>
                                <select class="custom-select" name="jenis_barang">
                                    <option selected="">Pilih</option>
                                    <option value="SS" {{ $datas!=FALSE?($datas->jenis_barang == 'SS'?'selected':''):(old('jenis_barang')== 'SS'?'selected':'') }}>Sound System</option>
                                    <option value="AI" {{ $datas!=FALSE?($datas->jenis_barang == 'AI'?'selected':''):(old('jenis_barang')== 'AI'?'selected':'') }}>Alat Ibadah</option>
                                    <option value="AK" {{ $datas!=FALSE?($datas->jenis_barang == 'AK'?'selected':''):(old('jenis_barang')== 'AK'?'selected':'') }}>Alat Kebersihan</option>
                                    <option value="AE" {{ $datas!=FALSE?($datas->jenis_barang == 'AE'?'selected':''):(old('jenis_barang')== 'AE'?'selected':'') }}>Alat Elektronik</option>
                                    <option value="LL" {{ $datas!=FALSE?($datas->jenis_barang == 'LL'?'selected':''):(old('jenis_barang')== 'LL'?'selected':'') }}>Lainnya</option>
                                    <option value="BK" {{ $datas!=FALSE?($datas->jenis_barang == 'BK'?'selected':''):(old('jenis_barang')== 'BK'?'selected':'') }}>Kitab</option>
                                </select>
                                @if($errors->has('jenis_barang'))
                                <div class="form-text" style="color: red;">{{$errors->first('jenis_barang')}}</div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Nama Barang</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Nama Barang" value="{{$datas!=FALSE?$datas->nama_barang:old('nama_barang')}}" name="nama_barang">
                                @if($errors->has('nama_barang'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('nama_barang')}}
                                </div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Jumlah Barang</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Hanya Angka" name="jumlah_barang" value="{{$datas!=FALSE?$datas->jumlah_barang:old('jumlah_barang')}}">
                                @if($errors->has('jumlah_barang'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('jumlah_barang')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Barang</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control pickadate-accessibility-labels" placeholder="Pilih Tanggal" name="tgl_barang" value="{{$datas==FALSE?date('Y-m-d'):$datas->tgl_barang}}">
                                    </div>
                                    @if($errors->has('tgl_barang'))
                                    <div class="form-text" style="color: red">
                                        {{$errors->first('tgl_barang')}}
                                    </div>
                                    @endif
                                </div>
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
                        <a class="btn btn-outline btn-secondary btn-outline-1x" href="{{ url('inventaris') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>             
    </div>
</div>
@endsection