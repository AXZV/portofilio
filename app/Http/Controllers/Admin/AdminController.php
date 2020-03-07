<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Users;
use App\Model\Instansi;
use App\Model\Guru;

class AdminController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('/admin/admin_dasboard');
    }
    ////////////// User
        protected function adduser(Request $request)
        {
            $validatedData = $request->validate([
                'username' => 'required|min:3|max:12|alpha_dash|unique:users',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            
            //input user
            $data = new Users;
            $data->username=$request->get('username');
            $data->password= Hash::make($request->get('password'));
            $data->kode_identitas=$request->get('jenis_user');
            $data->save();

            return redirect()->back()->with('successadd', true);

        }

    ////////////// Instansi
        public function index_instansi()
        {
            $instansi = Instansi::all();     
            return view('admin/instansi', ['instansi' => $instansi]);
        }
        public function tambah_instansi(Request $request)
        {
            $validatedData = $request->validate([
                'kode' => 'required|unique:Instansis',
            ]);

            $data = new Instansi;
            $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->alamat=$request->get('alamat');
            $data->no_telp=$request->get('telepon');
            $data->email=$request->get('email');
            $data->status_pusat=$request->get('status');
            $data->save();

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_instansi($id)
        {
            $data=Instansi::find($id);
            $data->delete();
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_instansi(Request $request, $id)
        {
            $data=Instansi::find($id);
            $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->alamat=$request->get('alamat');
            $data->no_telp=$request->get('telepon');
            $data->email=$request->get('email');
            $data->status_pusat=$request->get('status');
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }
    ////////////// Guru
        public function index_guru()
        {
            $guru = Guru::all();     
            return view('admin/guru', ['guru' => $guru]);
        }
        public function tambah_guru(Request $request)
        {
            $validatedData = $request->validate([
                'no_identitas' => 'required|unique:gurus',
            ]);

            $data = new Guru;
            $data->no_identitas=$request->get('no_identitas');
            $data->nama_depan=$request->get('nama_depan');
            $data->nama_belakang=$request->get('nama_belakang');
            $data->tempat_lahir=$request->get('tempat_lahir');
            $data->jenis_kelamin=$request->get('jenis_kelamin');
            $data->agama=$request->get('agama');
            $data->alamat=$request->get('alamat');
            $data->alamat_domisili=$request->get('alamat_domisili');
            $data->no_telp=$request->get('no_telp');
            $data->email=$request->get('email');
            $data->tanggal_masuk=$request->get('tanggal_masuk');
            $data->tanggal_keluar=$request->get('tanggal_keluar');
            $data->status_aktif=$request->get('status_aktif');
            $data->kode_instansi=$request->get('kode_instansi');
            $data->save();

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_guru($id)
        {
            $data=Guru::find($id);
            $data->delete();
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_guru(Request $request, $id)
        {
            $data=Guru::find($id);
            $data->no_identitas=$request->get('no_identitas');
            $data->nama_depan=$request->get('nama_depan');
            $data->nama_belakang=$request->get('nama_belakang');
            $data->tempat_lahir=$request->get('tempat_lahir');
            $data->jenis_kelamin=$request->get('jenis_kelamin');
            $data->agama=$request->get('agama');
            $data->alamat=$request->get('alamat');
            $data->alamat_domisili=$request->get('alamat_domisili');
            $data->no_telp=$request->get('no_telp');
            $data->email=$request->get('email');
            $data->tanggal_masuk=$request->get('tanggal_masuk');
            $data->tanggal_keluar=$request->get('tanggal_keluar');
            $data->status_aktif=$request->get('status_aktif');
            $data->kode_instansi=$request->get('kode_instansi');
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }







}
