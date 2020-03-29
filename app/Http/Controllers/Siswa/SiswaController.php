<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Siswa;
use App\Model\User;
use App\Model\Pengajaran;
use App\Model\Pengajaran_Siswa;
use App\Model\Pengajaran_Level;
use App\Model\Presensi;
use App\Model\Jumlah_Presensi;
use App\Model\Pengajaran_Level_Siswa;

class SiswaController extends Controller
{
    public function __construct()
    {   
        $this->middleware(['auth']);
    }
    public function index()
    {   
        $siswa = Siswa::where('no_daftar', '=', Auth::user()->kode_identitas)->first();
        $pengguna = User::where('kode_identitas', '=', Auth::user()->kode_identitas)->first();
        $pengajaran_siswa = Pengajaran_Siswa::where('kode_siswa', '=', $siswa->id)->get();
        $pengajaran = Pengajaran::all(); 
        $pengajaran_level = Pengajaran_Level::all();
        $jumlah_presensi =  Jumlah_Presensi::where('id_siswa', '=', $siswa->id)->get();
        return view('/siswa/siswa_dasboard')
                ->with('siswa', $siswa)
                ->with('pengguna', $pengguna)
                ->with('pengajaran_siswa', $pengajaran_siswa)
                ->with('pengajaran', $pengajaran)
                ->with('pengajaran_level', $pengajaran_level)
                ->with('jumlah_presensi', $jumlah_presensi); 
    }

    ////////////// PRESENSI
        public function index_presensi()
        {
            $siswa = Siswa::where('no_daftar', '=', Auth::user()->kode_identitas)->first();
            $pengajaran_siswa = Pengajaran_Siswa::where('kode_siswa', '=', $siswa->id)->get();
            $pengajaran = Pengajaran::all();
            return view('siswa/presensi/presensi')->with('pengajaran_siswa', $pengajaran_siswa)->with('pengajaran', $pengajaran);                
        }
        public function index_log_presensi($kode_pengajaran)
        {
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first();       
            $presensi = Presensi::where('kode_pengajaran', '=', $kode_pengajaran)->get();
            return view('siswa/presensi/log_presensi')->with('presensi', $presensi)->with('pengajaran', $pengajaran);     
        }
        public function detail_presensi($kode_pengajaran)
        {       
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first(); 
            $jumlah_presensi = Jumlah_Presensi::all();
            return view('siswa/presensi/detail_presensi')->with('jumlah_presensi', $jumlah_presensi)->with('pengajaran', $pengajaran);     
        }
        public function detail_presensi_harian($id_presensi)
        {       
            $presensi = Presensi::where('id', '=', $id_presensi)->get();
            return view('siswa/presensi/detail_presensi_harian')->with('presensi', $presensi);      
        }
    ////////////// LEVEL PENGAJARAN
        public function index_level_pengajaran()
        {
            $siswa = Siswa::where('no_daftar', '=', Auth::user()->kode_identitas)->first();
            $pengajaran_siswa = Pengajaran_Siswa::where('kode_siswa', '=', $siswa->id)->get();
            $pengajaran = Pengajaran::all();
            return view('siswa/level_pengajaran/level_pengajaran')->with('pengajaran_siswa', $pengajaran_siswa)->with('pengajaran', $pengajaran)->with('siswa', $siswa);                
        }
        public function index_log_level_pengajaran($kode_pengajaran)
        {       
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first();
            $pengajaran_level = Pengajaran_Level::where('kode_pengajaran', '=', $kode_pengajaran)->get(); 
            return view('guru/level_pengajaran/log_level_pengajaran')->with('pengajaran', $pengajaran)->with('pengajaran_level', $pengajaran_level);     
        }
        public function detail_level_pengajaran($kode_pengajaran, $id_siswa)
        {       
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first();
            $pengajaran_level = Pengajaran_Level::where('kode_pengajaran', '=', $kode_pengajaran)->where('id_siswa', '=', $id_siswa)->first();
            if($pengajaran_level != null)
            {
                $pengajaran_level_id = $pengajaran_level->id;
            }
            else
            {
                $pengajaran_level_id = null;
            }
            $pengajaran_level_siswa =  Pengajaran_Level_Siswa::where('kode_pengajaran_level', '=', $pengajaran_level_id)->where('id_siswa', '=', $id_siswa)->get();
            return view('siswa/level_pengajaran/detail_level_pengajaran')->with('pengajaran', $pengajaran)->with('pengajaran_level_siswa', $pengajaran_level_siswa);     
        }
    ////////////// SESI
        public function index_sesi()
        {
            $siswa = Siswa::where('no_daftar', '=', Auth::user()->kode_identitas)->first();
            $pengajaran_siswa = Pengajaran_Siswa::where('kode_siswa', '=', $siswa->id)->get();
            $pengajaran = Pengajaran::all();
            return view('siswa/sesi/sesi')->with('pengajaran_siswa', $pengajaran_siswa)->with('pengajaran', $pengajaran);                
        }
    ////////////// PENGATURAN
        public function index_pengaturan()
        {
            $pengaturan = User::where('role','=','Siswa')->where('kode_identitas','=',Auth::user()->kode_identitas)->get();     
            return view('siswa/pengaturan/pengaturan', ['pengaturan' => $pengaturan]);
        }
        public function edit_pengaturan(Request $request)
        {
            $validator = $request->validate([
                'username' => 'required|min:3|max:12|alpha_dash|unique:users,username,'.$request->get('id').',id',
                'password' => 'string|min:8|nullable'
            ]);

            $pengaturan = User::where('id','=', $request->get('id'))->first();

            if ( Hash::check($request->get('password1'), $pengaturan->password))
            {
                $data=User::find($request->get('id'));
                $data->username=$request->get('username');
                if($request->get('password') != null)
                {
                    $data->password=Hash::make($request->get('password'));
                }
                $data->save();
                return redirect()->back()->with('successedit', true);
            }
            else
            {
                return redirect()->back()->with('passwordnotmatch', true);
            }
        }
}
