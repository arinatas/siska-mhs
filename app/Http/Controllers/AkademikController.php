<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function transkrip()
    {

        $nim = auth()->user()->username;

        $transkrips = DB::select("
        SELECT *
        FROM `v_transkrip`
        WHERE (`nim` = '".$nim."')");

        // get data mahasiswa
        $mhsBio = DB::select("
        select 
        * 
        from 
        mhs_mahasiswa a, 
        uni_prodi b, 
        uni_karidos c 
        where 
        str_id_nim = '".$nim."' 
        AND a.str_kd_prodi = b.str_kd_prodi 
        AND b.str_id_kaprodi = c.str_id_kad ");

        $allSks = [];
        $totalBobot = [];
        $totalIpk = [];
        $sksLulus = [];

        foreach ($transkrips as $value)
        {
            $allSks[] = $value->num_sks;
            $totalBobot[] = $value->num_bobot * $value->num_sks;
            if ($value->totnilai >=55 AND $value->totnilai<=100) {
                $sksLulus[] = $value->num_sks;
            };
        }

        // cek ketika dapat bobot dan sks dari tahun ajaran dan smt
        if($totalBobot && $allSks)
        {
            if(array_sum($totalBobot) > 0 && array_sum($allSks) > 0)
            {
                $totalIpk = array_sum($totalBobot) / array_sum($allSks);
            }
            else
            {
                $totalIpk = 0;
            }
        }
        else
        {
            $totalIpk = 0;
        }

        return view('akademik.transkrip.index', [
            'title' => 'Transkrip',
            'active' => 'Akademik',
            'transkrips' => $transkrips,
            'totalIpk' => $totalIpk,
            'allSks' => $allSks,
            'sksLulus' => $sksLulus,
            'mahasiswa' => $mhsBio,
        ]); 
    }

    public function khs(Request $request)
    {
        $nim = auth()->user()->username;

        // get data mahasiswa
        $mhsBio = DB::select("
        select 
        * 
        from 
        mhs_mahasiswa a, 
        uni_prodi b, 
        uni_karidos c 
        where 
        str_id_nim = '".$nim."' 
        AND a.str_kd_prodi = b.str_kd_prodi 
        AND b.str_id_kaprodi = c.str_id_kad ");
        //end

        //get tahun ajaran & smt sekarang
        $getDataTime = DB::select("select * from pablic_reset");

        $tahunAjarNow = (int)substr($getDataTime[0]->str_thn_ajaran, -4);
        $tahunMasukMhs = $mhsBio[0]->str_angkatan;

        $loopTahun = $tahunAjarNow - $tahunMasukMhs;
        for($i=1; $i<=$loopTahun; $i++)
        {
            if($i<=14)
            {
                $tahunAjarUniq[] = $tahunMasukMhs ."/". ($tahunMasukMhs + 1);
            }
            $tahunMasukMhs++;
        }

        $semesterUniq = ["Ganjil", "Genap", "SP"];
        //end
        

        // //ambil tahun ajaran dan smt dari transkrip
        // $transkrips = DB::select("
        // SELECT *
        // FROM `v_transkrip`
        // WHERE (`nim` = '".$nim."')");

        // foreach ($transkrips as $transkrip)
        // {
        //     $tahunAjar[] = $transkrip->str_thn_ajaran;
        //     $semester[] = $transkrip->bol_semester;
        // }

        // $tahunAjarUniq = array_values(array_unique($tahunAjar));
        // $semesterUniq = array_values(array_unique($semester));


        //cek semester brp untuk teks
        $tahunSemester = substr($request->get('tahun'), -2);
        $tahunAngkatan = substr($mhsBio[0]->str_angkatan, -2);

        if ($request->get('semester') == "Ganjil")
        {
            $semesterText = ((int)$tahunSemester - (int)$tahunAngkatan) * 2 - 1;
        }
        elseif ($request->get('semester') == "Genap")
        {
            $semesterText = ((int)$tahunSemester - (int)$tahunAngkatan) * 2;
        }
        elseif ($request->get('semester') == "SP")
        {
            $smtNumber1 = ((int)$tahunSemester - (int)$tahunAngkatan) * 2;
            $smtNumber2 = ((int)$tahunSemester - (int)$tahunAngkatan) * 2 + 1;
            $semesterText = "Antara $smtNumber1 - $smtNumber2";
        }
        else
        {
            $semesterText = null;
        }
        //end

        $khs = DB::select("
        SELECT 
        d.str_kd_mk, 
        d.str_nm_mk, 
        e.num_sks, 
        if(f.str_na IS NOT NULL, f.str_na, 'F') as str_na, 
        if(
            f.num_bobot IS NOT NULL, f.num_bobot, 
            0.00
        ) AS num_bobot 
        FROM 
        aka_krs a 
        LEFT JOIN aka_perkuliahan_detail b ON a.int_kd_perkuliahan_d = b.int_kd_perkuliahan_d 
        LEFT JOIN aka_perkuliahan c ON b.str_kd_perkuliahan = c.str_kd_perkuliahan 
        LEFT JOIN aka_matakuliah d ON c.str_kd_mk = d.str_kd_mk 
        LEFT JOIN aka_matakuliah_detail e ON d.str_kd_mk = e.str_kd_mk 
        LEFT JOIN aka_nilai f ON a.int_kd_perkuliahan_d = f.int_kd_perkuliahan_d 
        AND a.str_id_nim = f.str_id_nim 
        WHERE 
        a.str_id_nim = '".$nim."' 
        AND a.str_thn_ajaran = '".$request->get('tahun')."' 
        AND a.bol_semester = '".$request->get('semester')."'
        GROUP BY 
        a.int_kd_perkuliahan_d");

        // untuk penomeran tabel
        $totalMatkul = 1;

        //ambil tahun ajaran & smt terpilih
        $selectedTahun = $request->get('tahun');
        $selectedSmt = $request->get('semester');

        $allSks = [];
        $totalBobot = [];

        foreach ($khs as $value)
        {
            $allSks[] = $value->num_sks;
            $totalBobot[] = $value->num_bobot * $value->num_sks;
        }

        // cek ketika dapat bobot dan sks dari tahun ajaran dan smt
        if($totalBobot || $allSks )
        {
            if(array_sum($totalBobot) > 0 && array_sum($allSks) > 0)
            {
                $totalIps = array_sum($totalBobot) / array_sum($allSks);
            }
            else
            {
                $totalIps = 0; 
            }
        }
        else
        {
            $totalIps = 0;
        }

        return view('akademik.khs.index', [
            'title' => 'Kartu Hasil Studi',
            'active' => 'Akademik',
            'tahunAjar' => $tahunAjarUniq,
            'selectedTahun' => $selectedTahun,
            'semesters' => $semesterUniq,
            'selectedSmt' => $selectedSmt,
            'khs' => $khs,
            'totalMatkul' => $totalMatkul,
            'allSks' => $allSks,
            'totalIps' => $totalIps,
            'semesterText' => $semesterText,
            'mahasiswa' => $mhsBio,
        ]); 
    }

    public function angketList()
    {
        // Mengambil nim user yang login
        $nim = auth()->user()->username;

        $getDataTime = DB::select("select * from pablic_reset");

        // untuk penomeran tabel
        $tableNumber = 1;

        $tahunAjar = $getDataTime[0]->str_thn_ajaran;
        $semester = $getDataTime[0]->bol_semester;

        // Ambil Jadwal Mahasiswa
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

        return view('akademik.angket.index', [
            'title' => 'Angket',
            'active' => 'Akademik',
            'schedules' => $schedules,
            'tableNumber' => $tableNumber,
        ]); 
    }
    
    public function isiAngket()
    {
        return view('akademik.angket.isi_angket', [
            'title' => 'Angket',
            'active' => 'Akademik',
        ]); 
    }
    
    public function krs()
    {
        $nim = auth()->user()->username;

        $transkrips = DB::select("
        SELECT *
        FROM `v_transkrip`
        WHERE (`nim` = '".$nim."')");

        return view('akademik.krs.index', [
            'title' => 'KRS',
            'active' => 'Akademik',
            'transkrips' => $transkrips
        ]); 
    }
}
