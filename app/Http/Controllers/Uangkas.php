<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Uangkas_m;

class Uangkas extends Controller
{
    private $_path_pages = 'pages.uangkas';

    public function index()
    {
        // $datas = Uangkas_m::all();
        $tes = new Uangkas_m();
        $tes = $tes->getAllTransaction();
        // echo "<pre>";
        // print_r ($tes);
        // echo "</pre>";exit;
        $data = [
            'datas' =>$tes,
            'tambah' => url('uangkas/create')
        ];
        return view($this->_path_pages.'.index',$data);
    }

   
    public function create()
    {
        $data = [
            'action_url' => url('uangkas'),
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
                'jenis_transaksi'    => 'required',
                'tgl_transaksi'  => 'required',
                'jumlah_uang'        => 'required|numeric'
                
            ],$messages
        );
        $param = [
            'jumlah_uang'       => $request->jumlah_uang,
            'jenis_transaksi'   => $request->jenis_transaksi,
            'tgl_transaksi'     => $request->tgl_transaksi,
            'keterangan'        => $request->keterangan
        ];
        Uangkas_m::create($param);
        return redirect('/uangkas')->with(['success' => 'Data Berhasil Disimpan']);
        
        
    }

 
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $datas = Uangkas_m::find(Crypt::decryptString($id));

        $data = [
            'datas' =>  $datas,
            'action_url' => url('uangkas')
        ];

        return view($this->_path_pages.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        // echo "<pre>";
        // print_r ($request->tgl_transaksi);
        // echo "</pre>"; exit;
        $messages = [
            'numeric' => 'Data harus berupa angka',
            'required'=> 'Data Harus Diisi'
        ];
        $this->validate($request,
            [
                'keterangan'         => 'required',
                'jenis_transaksi'    => 'required',
                'tgl_transaksi'      => 'required',
                'jumlah_uang'        => 'required|numeric'
                
            ],$messages
        );
        $datas = Uangkas_m::find(Crypt::decryptString($id));

        $datas->keterangan      = $request->keterangan;
        $datas->jenis_transaksi = $request->jenis_transaksi;
        $datas->tgl_transaksi   = $request->tgl_transaksi;
        $datas->jumlah_uang     = $request->jumlah_uang;
        $datas->save();

        return redirect('/uangkas')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id)
    {
        $datas = Uangkas_m::find(Crypt::decryptString($id));
        $datas->delete();
        return redirect('/uangkas')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
