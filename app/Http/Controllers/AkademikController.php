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

        return view('akademik.transkrip.index', [
            'title' => 'Transkrip',
            'active' => 'Akademik',
            'transkrips' => $transkrips
        ]); 
    }

    public function khs(Request $request)
    {
        $nim = auth()->user()->username;

        $transkrips = DB::select("
        SELECT *
        FROM `v_transkrip`
        WHERE (`nim` = '".$nim."')");

        $tahunAjar = [];
        $semester = [];

        foreach ($transkrips as $transkrip)
        {
            $tahunAjar[] = $transkrip->str_thn_ajaran;
            $semester[] = $transkrip->bol_semester;
        }

        $tahunAjarUniq = array_unique($tahunAjar);
        $semesterUniq = array_unique($semester);

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

        return view('akademik.khs.index', [
            'title' => 'Kartu Hasil Studi',
            'active' => 'Akademik',
            'tahunAjar' => $tahunAjarUniq,
            'semesters' => $semesterUniq,
            'khs' => $khs,
        ]); 
    }
}
