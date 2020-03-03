<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pegawai;

use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();     
        return view('admin/tabel_pegawai', ['pegawai' => $pegawai]);
    }

    public function hapus($id)
    {
        $data=Pegawai::find($id);
        $data->delete();
        return redirect()->back()->with('successdelete', true);
    }


    public function tambah(Request $request)
    {

        $data = new Pegawai;
        $data->nama=$request->get('nama');
        $data->alamat=$request->get('alamat');
        $data->email=$request->get('email');
        $data->nomor_telepon=$request->get('telepon');
        $data->save();

        return redirect()->back()->with('successadd', true);
    }

    public function edit(Request $request, $id)
    {

        $data=Pegawai::find($id);
        $data->nama=$request->get('nama');
        $data->alamat=$request->get('alamat');
        $data->email=$request->get('email');
        $data->nomor_telepon=$request->get('telepon');
        $data->save();

        return redirect()->back()->with('successedit', true);
    
    }
}
