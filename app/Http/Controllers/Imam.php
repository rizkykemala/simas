<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Imam_m;
class Imam extends Controller
{
    private $_path_pages = 'pages.imam';

    public function index()
    {
        $datas = Imam_m::all();
        $data = [
            'datas' =>$datas,
            'tambah' => url('imam/create')
        ];
        return view($this->_path_pages.'.index',$data);
    }

   
    public function create()
    {
        $data = [
            'action_url' => url('imam'),
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
                'keterangan'      => 'required',
                'nama_imam'       => 'required',
                'usia_imam'       => 'required|numeric',
                'tempat_lahir'    => 'required',
                'no_hp'           => 'required',
                'tgl_lahir'       => 'required'
                
            ],$messages
        );
        $param = [
                'nama_imam'       => $request->nama_imam,
                'usia_imam'       => $request->usia_imam,
                'tempat_lahir'    => $request->tempat_lahir,
                'no_hp'           => $request->no_hp,
                'tgl_lahir'       => $request->tgl_lahir,
                'keterangan'      => $request->keterangan
        ];
        Imam_m::create($param);
        return redirect('/imam')->with(['success' => 'Data Berhasil Disimpan']);
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $datas = Imam_m::find(Crypt::decryptString($id));

        $data = [
            'datas' =>  $datas,
            'action_url' => url('imam')
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
                'keterangan'      => 'required',
                'nama_imam'       => 'required',
                'usia_imam'       => 'required|numeric',
                'tempat_lahir'    => 'required',
                'no_hp'           => 'required',
                'tgl_lahir'       => 'required'
                
            ],$messages
        );
        $datas = Imam_m::find(Crypt::decryptString($id));

        $datas->nama_imam       = $request->nama_imam;
        $datas->usia_imam       = $request->usia_imam;
        $datas->tempat_lahir    = $request->tempat_lahir;
        $datas->no_hp           = $request->no_hp;
        $datas->tgl_lahir       = $request->tgl_lahir;
        $datas->keterangan      = $request->keterangan;
        $datas->save();

        return redirect('/imam')->with(['success' => 'Data Berhasil Diubah']);
    }

    
    public function destroy($id)
    {
        $datas = Imam_m::find(Crypt::decryptString($id));
        $datas->delete();
        return redirect('/imam')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
