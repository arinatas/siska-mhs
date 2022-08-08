<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class KemahasiswaanController extends Controller
{
    public function tak() {

        // set nim mahasiswa
        $nim = auth()->user()->username;

        // set variable for number formating
        $takNumbers = 1;

        // get all kegiatan & poin
        $takLists = DB::select("
        SELECT tak_kegiatan.str_nm_kegiatan, tak_peserta.int_nilai_tak FROM tak_peserta LEFT JOIN tak_kegiatan on tak_kegiatan.str_kd_kegiatan = tak_peserta.str_kd_kegiatan WHERE tak_peserta.str_id_nim = '".$nim."'");

        $totalPoint = [];

        foreach ($takLists as $value)
        {
            $totalPoint[] = $value->int_nilai_tak;
        }

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

        // dd($takLists);

        return view('kemahasiswaan.tak.index',
        [
            'title' => 'TAK',
            'active' => 'Kemahasiswaan',
            'takNumbers' => $takNumbers,
            'totalPoint' => array_sum($totalPoint),
            'takLists' => $takLists,
            'mahasiswa' => $mhsBio
        ]);
    }
}
