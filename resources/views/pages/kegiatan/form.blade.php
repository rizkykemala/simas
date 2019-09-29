@extends('template')
@section('header', 'Kegiatan Masjid')
@push('script')
<script type="text/javascript" src="{{ asset("source/dist/js/demo/date-time-picker.js") }}"></script>
@endpush
@section('subheader', 'Data Kegiatan Masjid')
@section('pages')
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-head">
                    <div class="panel-title">
                        <span class="panel-title-text">Data Kegiatan Masjid</span>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{$datas!=FALSE?$action_url.'/'.Crypt::encryptString($datas->id):$action_url}}" method="POST">
                        <input type="hidden" value="{{ $datas!=FALSE?$datas->id:'' }}" name="id">
                        @csrf
                        {{ $datas!=FALSE?method_field('PUT'):'' }}
                        <div class="form-group row">
                            <div class="col-12">
                                <label class="col-form-label mr-sm-2">Jenis Kegiatan</label>
                                <input type="text" class="form-control" placeholder="Cth: Seminar, Kajian, Diskusi Publik,...." name="jenis_kegiatan" value="{{$datas!=FALSE?$datas->jenis_kegiatan:old('jenis_kegiatan')}}">
                                @if($errors->has('jenis_kegiatan'))
                                <div class="form-text" style="color: red;">{{$errors->first('jenis_kegiatan')}}</div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Nama Kegiatan</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Tulis Nama Kegiatan" value="{{$datas!=FALSE?$datas->nama_kegiatan:old('nama_kegiatan')}}" name="nama_kegiatan">
                                @if($errors->has('nama_kegiatan'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('nama_kegiatan')}}
                                </div>
                                @endif
                            </div>
                            <label class="col-12 col-form-label">Narasumber</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Siapa Narasumbernya?" value="{{$datas!=FALSE?$datas->narasumber:old('narasumber')}}" name="narasumber">
                                @if($errors->has('narasumber'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('narasumber')}}
                                </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Kegiatan</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control pickadate-accessibility-labels" placeholder="Pilih Tanggal" name="tgl_kegiatan" value="{{$datas==FALSE?date('Y-m-d'):$datas->tgl_kegiatan}}">
                                    </div>
                                    @if($errors->has('tgl_kegiatan'))
                                    <div class="form-text" style="color: red">
                                        {{$errors->first('tgl_kegiatan')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-time-input" class="col-form-label">Waktu</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-stopwatch"></i></span>
                                        </div>
                                        <input class="form-control example-time-input" type="time" value="{{$datas==FALSE?date('h:i'):$datas->jam}}" name="jam">
                                    </div>
                                    @if($errors->has('jam'))
                                    <div class="form-text" style="color: red">
                                        {{$errors->first('jam')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <label class="col-12 col-form-label">Harga Tiket</label>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Hanya Angka" name="harga_tiket" value="{{$datas!=FALSE?$datas->harga_tiket:old('harga_tiket')}}">
                                @if($errors->has('harga_tiket'))
                                <div class="form-text" style="color: red;">
                                    {{$errors->first('harga_tiket')}}
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
                    <a class="btn btn-outline btn-secondary btn-outline-1x" href="{{ url('kegiatan') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection