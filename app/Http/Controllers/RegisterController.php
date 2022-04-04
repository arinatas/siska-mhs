<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        // Mengambil nim user yang login
        $nim = auth()->user()->username;

        // $getTahunAjaran = DB::select("select str_thn_ajaran from pablic_reset");
        $getDataTime = DB::select("select * from pablic_reset");

        $tahunAjar = $getDataTime[0]->str_thn_ajaran;
        $semester = $getDataTime[0]->bol_semester;

        // Query jadwal mhs
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
        INNER JOIN uni_prodi z on a.str_kd_prodi = z.str_kd_prodi WHERE a.str_thn_ajaran='".$tahunAjar."' AND a.bol_semester='".$semester."' AND h.str_id_nim='".$nim."'
        ");

        return $schedules;
        // return view('register.index', [
        //     'title' => 'Register',
        //     'active' => 'register',
        //     // get jadwal
        //     'schedules' =>  $schedules
        // ]);
         
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // using bcrypt
        $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);
        
        // hash using sha512
        // $validatedData['password'] = hash('sha512', $validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Successfully!');

        return redirect('/login')->with('success', 'Registration Successfully!');
    }
}
