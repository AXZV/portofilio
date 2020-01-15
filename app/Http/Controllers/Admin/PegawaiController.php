<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai;

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
        DB::table('pegawai')->where('id',$id)->delete();
        return redirect()->back()->with('successdelete', true);
    }


    public function tambah(Request $request)
    {
        DB::table('pegawai')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telepon' => $request->telepon
        ]);
        return redirect()->back()->with('successadd', true);
    }

    public function edit(Request $request)
    {
        DB::table('pegawai')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telepon' => $request->telepon
        ]);
        return redirect()->back()->with('successedit', true);
    
    }
}
