<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Users;
use App\Model\Instansi;
use App\Model\Guru;
use App\Model\Siswa;
use App\Model\Pelajaran;
use App\Model\Kelas;
use App\Model\Produk;

class AdminController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
        $xnama = "red";
        // $instansi = Instansi::all(); 
        // $flights = App\Flight::where('active', 1)
    }

    public function index()
    {
        return view('/admin/admin_dasboard');
    }
    ////////////// User
        protected function tambah_user($username, $password, $kode_identitas, $role)
        {            
            //input user
            $data = new Users;
            $data->username=$username;
            $data->password= Hash::make($password);
            $data->kode_identitas=$kode_identitas;
            $data->role=$role;
            $data->save();
        }
        public function hapus_user($id)
        {
            $data=Users::find($id);
            $data->delete();
        }
        // public function edit_user($kode_user)
        // {
        //     $data=Users::find($kode_user);
        //     $data->kode_identitas=$kode_user;
        //     $data->save();
        // }

    ////////////// Instansi
        public function index_instansi()
        {
            $instansi = Instansi::all();     
            return view('admin/instansi', ['instansi' => $instansi]);
        }
        public function tambah_instansi(Request $request)
        {
            $validator = $request->validate([
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
            // $data->kode=$request->get('kode');
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
            $instansi = Instansi::all();      
            return view('admin/guru', ['guru' => $guru], ['instansi' => $instansi] );
        }
        public function tambah_guru(Request $request)
        {
            $validator = $request->validate([
                'no_identitas' => 'required|unique:gurus|unique:users,kode_identitas',
                'username' => 'required|min:3|max:12|alpha_dash|unique:users',
                'password' => ['required', 'string', 'min:8']
            ]);
            $data = new Guru;
            $data->no_identitas=$request->get('no_identitas');
            $data->nama_depan=$request->get('nama_depan');
            $data->nama_belakang=$request->get('nama_belakang');
            $data->tanggal_lahir=$request->get('tanggal_lahir');
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
            
            $this->tambah_user($request->get('username'), $request->get('password'), $request->get('no_identitas'), 'Guru');

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_guru($id)
        {
            $data=Guru::find($id);
            $data->delete();
            $this->hapus_user($id);
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_guru(Request $request, $id)
        {
            $data=Guru::find($id);
            // $data->no_identitas=$request->get('no_identitas');
            $data->nama_depan=$request->get('nama_depan');
            $data->nama_belakang=$request->get('nama_belakang');
            $data->tanggal_lahir=$request->get('tanggal_lahir');
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

    ////////////// siswa
        public function index_siswa()
        {
            $siswa = Siswa::all();
            $instansi = Instansi::all();          
            return view('admin/siswa', ['siswa' => $siswa], ['instansi' => $instansi]);
        }
        public function tambah_siswa(Request $request)
        {
            $validatedData = $request->validate([
                'no_daftar' => 'required|unique:siswas|unique:users,kode_identitas',
                'username' => 'required|min:3|max:12|alpha_dash|unique:users',
                'password' => ['required', 'string', 'min:8']
            ]);

            $data = new Siswa;
            $data->no_daftar=$request->get('no_daftar');
            $data->nama_depan=$request->get('nama_depan');
            $data->nama_belakang=$request->get('nama_belakang');
            $data->tanggal_lahir=$request->get('tanggal_lahir');
            $data->tempat_lahir=$request->get('tempat_lahir');
            $data->jenis_kelamin=$request->get('jenis_kelamin');
            $data->agama=$request->get('agama');
            $data->alamat=$request->get('alamat');
            $data->no_telp=$request->get('no_telp');
            $data->email=$request->get('email');
            $data->tanggal_masuk=$request->get('tanggal_masuk');
            $data->tanggal_lulus=$request->get('tanggal_lulus');
            $data->status_aktif=$request->get('status_aktif');
            $data->status_bayar=$request->get('status_bayar');
            $data->jumlah_bayar=$request->get('jumlah_bayar');
            $data->tanggal_bayar=$request->get('tanggal_bayar');
            $data->kode_instansi=$request->get('kode_instansi');//17
            $data->save();
            
            $this->tambah_user($request->get('username'), $request->get('password'), $request->get('no_daftar'), 'Siswa');

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_siswa($id)
        {
            $data=Siswa::find($id);
            $data->delete();
            $this->hapus_user($id);
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_siswa(Request $request, $id)
        {
            $data=Siswa::find($id);
            // $data->no_daftar=$request->get('no_daftar');
            $data->nama_depan=$request->get('nama_depan');
            $data->nama_belakang=$request->get('nama_belakang');
            $data->tanggal_lahir=$request->get('tanggal_lahir');
            $data->tempat_lahir=$request->get('tempat_lahir');
            $data->jenis_kelamin=$request->get('jenis_kelamin');
            $data->agama=$request->get('agama');
            $data->alamat=$request->get('alamat');
            $data->no_telp=$request->get('no_telp');
            $data->email=$request->get('email');
            $data->tanggal_masuk=$request->get('tanggal_masuk');
            $data->tanggal_lulus=$request->get('tanggal_lulus');
            $data->status_aktif=$request->get('status_aktif');
            $data->status_bayar=$request->get('status_bayar');
            $data->jumlah_bayar=$request->get('jumlah_bayar');
            $data->tanggal_bayar=$request->get('tanggal_bayar');
            $data->kode_instansi=$request->get('kode_instansi');//17
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }
    ////////////// pelajaran
        public function index_pelajaran()
        {
            $pelajaran = Pelajaran::all();     
            return view('admin/pelajaran', ['pelajaran' => $pelajaran]);
        }
        public function tambah_pelajaran(Request $request)
        {
            $validator = $request->validate([
                'kode' => 'required|unique:pelajarans,kode',
            ]);
            
            $data = new Pelajaran;
            $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->save();

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_pelajaran($id)
        {
            $data=Pelajaran::find($id);
            $data->delete();
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_pelajaran(Request $request, $id)
        {
            $data=Pelajaran::find($id);
            // $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }
    ////////////// kelas
        public function index_kelas()
        {
            $kelas = Kelas::all();
            $pelajaran = Pelajaran::all();          
            return view('admin/kelas', ['kelas' => $kelas], ['pelajaran' => $pelajaran]);
        }
        public function tambah_kelas(Request $request)
        {
            $validator = $request->validate([
                'kode' => 'required|unique:kelas,kode',
            ]);

            $data = new Kelas;
            $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->kode_pelajaran=$request->get('kode_pelajaran');
            $data->save();

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_kelas($id)
        {
            $data=Kelas::find($id);
            $data->delete();
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_kelas(Request $request, $id)
        {
            $data=Kelas::find($id);
            // $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->kode_pelajaran=$request->get('kode_pelajaran');
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }
    ////////////// produk
        public function index_produk()
        {
            $produk = Produk::all();     
            return view('admin/produk', ['produk' => $produk]);
        }
        public function tambah_produk(Request $request)
        {
            $validator = $request->validate([
                'kode' => 'required|unique:produks,kode',
            ]);
            $data = new Produk;
            $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->harga=$request->get('harga');
            $data->kategori=$request->get('kategori');
            $data->stok_awal=$request->get('stok_awal');
            $data->save();

            return redirect()->back()->with('successadd', true);
        }
        public function hapus_produk($id)
        {
            $data=Produk::find($id);
            $data->delete();
            return redirect()->back()->with('successdelete', true);
        }
        public function edit_produk(Request $request, $id)
        {
            $data=Produk::find($id);
            // $data->kode=$request->get('kode');
            $data->nama=$request->get('nama');
            $data->harga=$request->get('harga');
            $data->kategori=$request->get('kategori');
            $data->stok_awal=$request->get('stok_awal');
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }



}
