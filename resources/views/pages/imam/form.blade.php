@extends('template')  
@section('header', 'Imam Masjid')
@push('script')
   <script type="text/javascript" src="{{ asset("source/dist/js/demo/date-time-picker.js") }}"></script>
@endpush
@section('subheader', 'Data Imam Masjid') 
@section('pages')
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-title">
                        <span class="panel-title-text">Data Imam Masjid</span>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{$datas!=FALSE?$action_url.'/'.Crypt::encryptString($datas->id):$action_url}}" method="POST">
                        <input type="hidden" value="{{ $datas!=FALSE?$datas->id:'' }}" name="id">
                        @csrf
                        {{ $datas!=FALSE?method_field('PUT'):'' }}
                        <div class="form-group row">
                            <label class="col-12 col-form-label">Nama Imam</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Nama Imam" value="{{$datas!=FALSE?$datas->nama_imam:old('nama_imam')}}" name="nama_imam">
                                @if($errors->has('nama_imam'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('nama_imam')}}
                                </div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Usia Imam</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Hanya Angka" name="usia_imam" value="{{$datas!=FALSE?$datas->usia_imam:old('usia_imam')}}">
                                @if($errors->has('usia_imam'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('usia_imam')}}
                                </div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Tempat Lahir</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Tempat Lahir" value="{{$datas!=FALSE?$datas->tempat_lahir:old('tempat_lahir')}}" name="tempat_lahir">
                                @if($errors->has('tempat_lahir'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('tempat_lahir')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control pickadate-accessibility-labels" placeholder="Pilih Tanggal" name="tgl_lahir" value="{{$datas==FALSE?date('Y-m-d'):$datas->tgl_lahir}}">
                                    </div>
                                    @if($errors->has('tgl_lahir'))
                                    <div class="form-text" style="color: red">
                                        {{$errors->first('tgl_lahir')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <label class="col-12 col-form-label">Nomor Kontak</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Nomor Kontak" value="{{$datas!=FALSE?$datas->no_hp:old('no_hp')}}" name="no_hp">
                                @if($errors->has('no_hp'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('no_hp')}}
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
                        <a class="btn btn-outline btn-secondary btn-outline-1x" href="{{ url('imam') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>             
    </div>
</div>
@endsection