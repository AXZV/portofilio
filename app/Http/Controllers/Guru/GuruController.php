<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Guru_Kelas;
use App\Model\Pengajaran;
use App\Model\Presensi;
use App\Model\Presensi_Siswa;
use App\Model\Siswa;


class GuruController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
    }
    public function index()
    {   
        return view('/guru/guru_dasboard');
    }
    ////////////// PRESENSI
        public function index_presensi()
        {
            $guru_kelas = Guru_Kelas::where('kode_guru', '=', Auth::user()->kode_identitas)->get();
            $pengajaran = Pengajaran::all();
            return view('guru/presensi/presensi')->with('guru_kelas', $guru_kelas)->with('pengajaran', $pengajaran);                
        }
        public function index_log_presensi($kode_pengajaran)
        {
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first();       
            $presensi = Presensi::where('kode_pengajaran', '=', $kode_pengajaran)->get();
            return view('guru/presensi/log_presensi')->with('presensi', $presensi)->with('pengajaran', $pengajaran);     
        }
        public function detail_presensi($kode_pengajaran)
        {       
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first(); 
            $presensi = Presensi::where('kode_pengajaran', '=', $kode_pengajaran)->get();
            $presensisiswa = Presensi_Siswa::all();
            return view('guru/presensi/detail_presensi')->with('presensi', $presensi)->with('presensisiswa', $presensisiswa)->with('pengajaran', $pengajaran);     
        }
        public function detail_presensi_harian($id_presensi)
        {       
            $presensi = Presensi::where('id', '=', $id_presensi)->get();
            return view('guru/presensi/detail_presensi_harian')->with('presensi', $presensi);      
        }
        public function tambah_presensi($id)
        {
            $pengajaran = Pengajaran::where('id', '=', $id)->get();
            return view('guru/presensi/tambah_presensi')->with('pengajaran', $pengajaran); 
        }
        public function proses_presensi(Request $request)
        { 
            $data = new Presensi;
            $data->kode_pengajaran=$request->get('kode_pengajaran');
            $data->waktu=$request->get('waktu');
            $data->pembahasan=$request->get('pembahasan');
            $data->jumlah_bahasan=$request->get('jumlah_bahasan');
            $data->save();

            foreach($request->get('presensi') as $valx){
                $presensi[]   = $valx;
            }
            foreach($request->get('catatan') as $valy){
                $catatan[] = $valy;
            }
            foreach($request->get('kode_siswa') as $valy){
                $kode_siswa[] = $valy;
            }
            for($i=0 ; $i<count($request->get('kode_siswa')) ; $i++){
                $data->Siswa()->attach($kode_siswa[$i], ['status' => $presensi[$i], 'catatan' => $catatan[$i]]);
            }
            return redirect('/guru/presensi')->with('successadd', true);
        }
    ////////////// PRESENSI
    public function index_level_pengajaran()
    {
        $guru_kelas = Guru_Kelas::where('kode_guru', '=', Auth::user()->kode_identitas)->get();
        $pengajaran = Pengajaran::all();
        return view('guru/level_pengajaran/level_pengajaran')->with('guru_kelas', $guru_kelas)->with('pengajaran', $pengajaran);                
    }
    public function index_log_level_pengajaran($kode_pengajaran)
    {       
        $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first(); 
        return view('guru/level_pengajaran/log_level_pengajaran')->with('pengajaran', $pengajaran);     
    }
}
