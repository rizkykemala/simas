<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Kegiatan_m;

class Kegiatan extends Controller
{
    private $_path_pages = 'pages.kegiatan';
    public function index()
    {
        $datas = Kegiatan_m::all();
        $data = [
            'datas' =>$datas,
            'tambah' => url('kegiatan/create')
        ];
        return view($this->_path_pages.'.index',$data);
    }

  
    public function create()
    {
        $data = [
            'action_url' => url('kegiatan'),
            'datas' => FALSE
        ];
        return view($this->_path_pages.'.form', $data);
    }

   
    public function store(Request $request)
    {
        $messages = [
            'numeric' => 'Data harus berupa angka',
            'required'=> 'Data Harus Diisi'
        ];
        $this->validate($request,
            [
                'jenis_kegiatan'   => 'required',
                'nama_kegiatan'    => 'required',
                'narasumber'       => 'required',
                'tgl_kegiatan'     => 'required',
                'jam'              => 'required',
                'harga_tiket'      => 'required|numeric',
                'keterangan'       => 'required'
                
                
            ],$messages
        );
        $param = [
                'jenis_kegiatan'   => $request->jenis_kegiatan,
                'nama_kegiatan'    => $request->nama_kegiatan,
                'narasumber'       => $request->narasumber,
                'tgl_kegiatan'     => $request->tgl_kegiatan,
                'jam'              => $request->jam,
                'harga_tiket'      => $request->harga_tiket,
                'keterangan'       => $request->keterangan
                
        ];
        Kegiatan_m::create($param);
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Disimpan']);
        
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $datas = Kegiatan_m::find(Crypt::decryptString($id));

        $data = [
            'datas' =>  $datas,
            'action_url' => url('kegiatan')
        ];

        return view($this->_path_pages.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'numeric' => 'Data harus berupa angka',
            'required'=> 'Data Harus Diisi'
        ];
        $this->validate($request,
            [
                'jenis_kegiatan'   => 'required',
                'nama_kegiatan'    => 'required',
                'narasumber'       => 'required',
                'tgl_kegiatan'     => 'required',
                'jam'              => 'required',
                'harga_tiket'      => 'required|numeric',
                'keterangan'       => 'required'
                
                
            ],$messages
        );
        $datas = Kegiatan_m::find(Crypt::decryptString($id));

        $datas->jenis_kegiatan   = $request->jenis_kegiatan;
        $datas->nama_kegiatan    = $request->nama_kegiatan;
        $datas->narasumber       = $request->narasumber;
        $datas->tgl_kegiatan     = $request->tgl_kegiatan;
        $datas->jam              = $request->jam;
        $datas->harga_tiket      = $request->harga_tiket;
        $datas->keterangan       = $request->keterangan;
        $datas->save();

        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Diubah']);
    }

 
    public function destroy($id)
    {
        $datas = Kegiatan_m::find(Crypt::decryptString($id));
        $datas->delete();
        return redirect('/kegiatan')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
