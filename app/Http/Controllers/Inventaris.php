<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Inventaris_m;
class Inventaris extends Controller
{
    private $_path_pages = 'pages.inventaris';

    public function index()
    {
        $datas = Inventaris_m::all();
        $data = [
            'datas' =>$datas,
            'tambah' => url('inventaris/create')
        ];
        return view($this->_path_pages.'.index',$data);
    }

   
    public function create()
    {
         $data = [
            'action_url' => url('inventaris'),
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
                'keterangan'         => 'required',
                'jenis_barang'       => 'required',
                'tgl_barang'         => 'required',
                'nama_barang'        => 'required',
                'jumlah_barang'      => 'required|numeric'
                
            ],$messages
        );
        $param = [
            'jumlah_barang'       => $request->jumlah_barang,
            'nama_barang'         => $request->nama_barang,
            'jenis_barang'        => $request->jenis_barang,
            'tgl_barang'          => $request->tgl_barang,
            'keterangan'          => $request->keterangan
        ];
        Inventaris_m::create($param);
        return redirect('/inventaris')->with(['success' => 'Data Berhasil Disimpan']);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $datas = Inventaris_m::find(Crypt::decryptString($id));

        $data = [
            'datas' =>  $datas,
            'action_url' => url('inventaris')
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
                'keterangan'         => 'required',
                'jenis_barang'       => 'required',
                'tgl_barang'         => 'required',
                'nama_barang'        => 'required',
                'jumlah_barang'      => 'required|numeric'
                
            ],$messages
        );
        $datas = Inventaris_m::find(Crypt::decryptString($id));

        $datas->keterangan      = $request->keterangan;
        $datas->jenis_barang    = $request->jenis_barang;
        $datas->tgl_barang      = $request->tgl_barang;
        $datas->jumlah_barang   = $request->jumlah_barang;
        $datas->nama_barang     = $request->nama_barang;
        $datas->save();

        return redirect('/inventaris')->with(['success' => 'Data Berhasil Diubah']);
    }

    
    public function destroy($id)
    {
        $datas = Inventaris_m::find(Crypt::decryptString($id));
        $datas->delete();
        return redirect('/inventaris')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
