<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Model\Guru_Kelas;
use App\Model\Pengajaran;
use App\Model\Presensi;
use App\Model\Presensi_Siswa;
use App\Model\Siswa;
use App\Model\Pengajaran_Level;
use App\Model\Pengajaran_Level_Siswa;
use App\Model\Guru;
use App\Model\User;
use App\Model\Users;


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
             return redirect('/guru/presensi/log_presensi/'.$request->get('kode_pengajaran'))->with('successpresensi', true);
        }
    ////////////// LEVEL PENGAJARAN
        public function index_level_pengajaran()
        {
            $guru_kelas = Guru_Kelas::where('kode_guru', '=', Auth::user()->kode_identitas)->get();
            $pengajaran = Pengajaran::all();
            return view('guru/level_pengajaran/level_pengajaran')->with('guru_kelas', $guru_kelas)->with('pengajaran', $pengajaran);                
        }
        public function index_log_level_pengajaran($kode_pengajaran)
        {       
            $pengajaran = Pengajaran::where('kode', '=', $kode_pengajaran)->first();
            $pengajaran_level = Pengajaran_Level::where('kode_pengajaran', '=', $kode_pengajaran)->get(); 
            return view('guru/level_pengajaran/log_level_pengajaran')->with('pengajaran', $pengajaran)->with('pengajaran_level', $pengajaran_level);     
        }
        public function proses_level_pengajaran(Request $request)
        {
            $count = Pengajaran_Level::where('kode_pengajaran', '=' ,$request->get('kode_pengajaran'))->
            where('id_siswa', '=' ,$request->get('kode_siswa'))->count();
            if($count > 0 ) {

                $data=Pengajaran_Level::where('kode_pengajaran', '=' ,$request->get('kode_pengajaran'))->where('id_siswa', '=' ,$request->get('kode_siswa'))->first();
                $tingkat_baru=$data->tingkat+1;

                $data->tingkat=$tingkat_baru;
                $data->catatan=$request->get('catatan');
                $data->save();

                $data->Siswa()->attach($request->get('kode_siswa'), ['tingkat' => $tingkat_baru, 'catatan' => $request->get('catatan')]);
                
                return redirect()->back()->with('successleveling', true);
            }
            else
            {
                $kode_level_pengajaran = $request->get('kode_siswa')."_".$request->get('kode_pengajaran');
                
                $data = new Pengajaran_Level;
                $data->kode=$kode_level_pengajaran;
                $data->id_siswa=$request->get('kode_siswa');
                $data->tingkat=1;
                $data->catatan=$request->get('catatan');
                $data->kode_pengajaran=$request->get('kode_pengajaran');
                $data->save();

                $data->Siswa()->attach($request->get('kode_siswa'), ['tingkat' => 1, 'catatan' => $request->get('catatan')]);

        
                return redirect()->back()->with('successleveling', true);
            }        
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
            return view('guru/level_pengajaran/detail_level_pengajaran')->with('pengajaran', $pengajaran)->with('pengajaran_level_siswa', $pengajaran_level_siswa);     
        }
    ////////////// PENGATURAN
        public function index_pengaturan()
        {
            $guru = Guru::where('no_identitas', '=', Auth::user()->kode_identitas)->first();
            $pengguna = User::where('kode_identitas', '=', Auth::user()->kode_identitas)->first();
            return view('guru/pengaturan/pengaturan')->with('guru', $guru)->with('pengguna', $pengguna);                
        }
        public function edit_user(Request $request, $id)
        {
            $validator = $request->validate([
                'username' => 'required|min:3|max:12|alpha_dash|unique:users,username,'.$id.',id',
                'password' => 'string|min:8|nullable'
                ]);
            
            $account = Users::where('id','=', $request->get('id'))->first();

            if ( Hash::check($request->get('password1'), $account->password))
            {
                $data=Users::find($request->get('id'));
                $data->username=$request->get('username');
                if($request->get('password') != null)
                {
                    $data->password=Hash::make($request->get('password'));
                }
                $data->save();
                return redirect()->back()->with('successedituser', true);
            }
            else
            {
                return redirect()->back()->with('passwordnotmatch1', true);
            }

        }
        public function edit_guru(Request $request, $id)
        {
            $data=Guru::find($id);
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
            $data->save();
            return redirect()->back()->with('successedit', true);       
        }

}
