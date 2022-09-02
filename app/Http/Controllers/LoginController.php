<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $getTahunAjaran = DB::select("select * from pablic_reset");

        $tahunNow = $getTahunAjaran[0]->str_thn_ajaran;
        $semesterNow = $getTahunAjaran[0]->bol_semester_krs;

        //1. cari nim tahun ajaran dan semester dari siska
        //2. cari di angket, apakah masa pengisian angket / tidak dengan mengirimkan semester dan tahun ajaran
        //   - dapat 1 baris (limit 1) data dari jadwal angket 
        //3. cari tanggal sekarang
        //4. bandingkan tanggal sekarang dengan data yang di dapat di step 2
        //5. jika iya -> check status 1 / 0 (kalau 1 masa pengisian angket) (jika 0 masa angket belum dibuka)

        // Panggil API untuk jadwal angket yang aktif
        $url = "http://27.112.79.162:18000/get_jadwal_by_request.php?semester=".$semesterNow."&tahun_ajaran=".$tahunNow."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        // dd($response->data[0]->tahun_ajaran);

        $angketAktif = $response->status;


        // using sha512
        $user = User::where([
                'username' => $credentials['username'], 
                'password' => hash('sha512', $credentials['password']),
        ])->first();

        // cek kalau ga ada redirect ke login
        if(!is_null($user)){

                // cek kalo angket aktif
                if($angketAktif == true){
                    // cek angket yg sudah terisi
                    $schedules = DB::select("
                    SELECT a.str_kd_prodi,a.int_kd_kls_buka,a.str_kd_mk,b.int_kd_kelas,a.str_thn_ajaran,a.bol_semester,z.str_nm_prodi,b.int_kd_perkuliahan_d,b.str_nm_kelas,c.str_kd_mk,c.str_nm_mk,e.str_nm_kad,d.str_nama_hari,f.str_nm_ruang,MID(b.time_jam_awal,1,5) as awal,MID(b.time_jam_akhir,1,5) as akhir,g.num_sks,g.num_kd_semester,b.num_jml_buka,b.num_jml_peserta,a.str_desc, l.link_spada, l.kode_spada,l.group_spada, m.link FROM aka_perkuliahan a 
                    INNER JOIN aka_perkuliahan_detail b ON a.str_kd_perkuliahan = b.str_kd_perkuliahan 
                    INNER JOIN aka_matakuliah c ON a.str_kd_mk = c.str_kd_mk 
                    INNER JOIN mst_hari d ON b.int_hari = d.str_kd_hari 
                    INNER JOIN uni_karidos e ON b.str_id_dosen = e.str_id_kad 
                    INNER JOIN aka_ruang f ON b.num_kd_ruang = f.num_kd_ruang 
                    INNER JOIN aka_krs h ON b.int_kd_perkuliahan_d =h.int_kd_perkuliahan_d
                    INNER JOIN aka_matakuliah_detail g ON a.str_kd_mk = g.str_kd_mk AND a.`str_kd_prodi` = g.`str_kd_prodi` 
                    LEFT JOIN link_spada l ON l.int_kd_perkuliahan_d = b.int_kd_perkuliahan_d
                    LEFT JOIN aka_perkuliahan_detail_link m ON m.id_perkuliahan_detail = b.int_kd_perkuliahan_d 
                    INNER JOIN uni_prodi z on a.str_kd_prodi = z.str_kd_prodi WHERE a.str_thn_ajaran='".$response->data[0]->tahun_ajaran."' AND a.bol_semester='".$response->data[0]->semester."' AND h.str_id_nim='".$user->username."'
                    ");

                    // API ambil angket yg telah ter~isi
                    $url = "http://27.112.79.162:18000/get_pertanyaan.php?id_jadwal_edom=".$response->data[0]->id_jadwal_edom."&nim=".$user->username."&tahun_ajaran=".$response->data[0]->tahun_ajaran."&semester=".$response->data[0]->semester."";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $response = json_decode($response);

                    // dd($response);

                    if ($response->status == true){

                        $angketTerisi = $response->data->data_pengisian_angket;

                        $kodeMkAngketDone = [];

                        foreach ($angketTerisi as $value)
                        {
                            $kodeMkAngketDone[] = $value->id_perkuliahan;
                        }

                        $angketLeft = [];

                        // cari matkul yg telah terisi angketnya dan di skip
                        foreach ($schedules as $value)
                        {
                            if (in_array($value->int_kd_perkuliahan_d, $kodeMkAngketDone)) {
                                continue;
                            }
                            $angketLeft[] = $value;
                        }

                        session(['angketLeft' => $angketLeft]);
                        // cek sisa angket, jika kosong
                        if($angketLeft){
                            Auth::login($user);
                            $request->session()->regenerate();
                            return redirect()->intended('/angket');
                        } else {
                            Auth::login($user);
                            $request->session()->regenerate();
                            return redirect()->intended('/kelas');
                        }
                    } else {
                        Auth::login($user);
                        $request->session()->regenerate();
                        return redirect()->intended('/kelas');
                    }
                }
                else{
                    Auth::login($user);
                    $request->session()->regenerate();
                    return redirect()->intended('/kelas');
                }
        } else {
            return back()->with('loginError', 'Login Failed.');
        }
        return back()->with('loginError', 'Login Failed.');

    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
