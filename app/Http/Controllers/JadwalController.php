<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index() 
    {
        $krsApiKey = config('app.krs_api_key');

        // Mengambil nim user yang login
        $nim = auth()->user()->username;

        $getDataTime = DB::select("select * from pablic_reset");

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

        // ambil seluruh presensi mahasiswa by nim
            $presences = DB::select("
            SELECT 
                int_kd_perkuliahan_d, 
                str_nm_mk,
                sum( if( a.num_pertemuan_ke = '1', a.num_stat_pertemuan, 0 ) ) AS p1,
                sum( if( a.num_pertemuan_ke = '2', a.num_stat_pertemuan, 0 ) ) AS p2,
                sum( if( a.num_pertemuan_ke = '3', a.num_stat_pertemuan, 0 ) ) AS p3,
                sum( if( a.num_pertemuan_ke = '4', a.num_stat_pertemuan, 0 ) ) AS p4,
                sum( if( a.num_pertemuan_ke = '5', a.num_stat_pertemuan, 0 ) ) AS p5,
                sum( if( a.num_pertemuan_ke = '6', a.num_stat_pertemuan, 0 ) ) AS p6,
                sum( if( a.num_pertemuan_ke = '7', a.num_stat_pertemuan, 0 ) ) AS p7,
                sum( if( a.num_pertemuan_ke = '8', a.num_stat_pertemuan, 0 ) ) AS p8,
                sum( if( a.num_pertemuan_ke = '9', a.num_stat_pertemuan, 0 ) ) AS p9,
                sum( if( a.num_pertemuan_ke = '10', a.num_stat_pertemuan, 0 ) ) AS p10,
                sum( if( a.num_pertemuan_ke = '11', a.num_stat_pertemuan, 0 ) ) AS p11,
                sum( if( a.num_pertemuan_ke = '12', a.num_stat_pertemuan, 0 ) ) AS p12,  
                sum( if( a.num_pertemuan_ke = '13', a.num_stat_pertemuan, 0 ) ) AS p13,
                sum( if( a.num_pertemuan_ke = '14', a.num_stat_pertemuan, 0 ) ) AS p14,
                sum( if( a.num_pertemuan_ke = '15', a.num_stat_pertemuan, 0 ) ) AS p15,
                sum( if( a.num_pertemuan_ke = '16', a.num_stat_pertemuan, 0 ) ) AS p16
            FROM 
                tabel_presensi a
            where 
                a.str_thn_ajaran='".$tahunAjar."' and a.bol_semester='".$semester."' and a.str_id_nim='".$nim."'
            GROUP BY 
                a.int_kd_perkuliahan_d");


        // presensi wrong
            // $presensis = DB::select("
            // SELECT * FROM presensi_row_coloumn WHERE str_thn_ajaran='".$tahunAjar."' AND bol_semester='".$semester."' AND str_id_nim='".$nim."'");
            
            // $presensiArray = [];
            // $mhsPresensi  = [];

            // //maping presensi per matakuliah
            // foreach ($schedules as $schedule)
            // {
            //     $currentPresensi = collect($presensis)->where('int_kd_perkuliahan_d', $schedule->int_kd_perkuliahan_d)->all();

            //     $tempPresensi = [];
            //     foreach ($currentPresensi as $presensi)
            //     {
            //         $tempPresensi[] = $presensi;
            //     }
            //     $presensiArray[$schedule->int_kd_perkuliahan_d] = $tempPresensi;
            // }

            // //maping ke tampilan
            // foreach ($schedules as $schedule)
            // {
            //     $mhsPresensi[] = (object)[
            //         'str_nm_mk' => $schedule->str_nm_mk,
            //         'kehadiran' => $presensiArray[$schedule->int_kd_perkuliahan_d],
            //     ];
            // }
        //presensis wrong end    

        // cek status finalisasi IRS(array 0) dan Pembayaran (array 1)
        // cek jika tidak dpt data bakal error
        $url = $krsApiKey."/cek_awal.php?str_id_nim=".$nim."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($response);

        $statusIrs = $status[0]->status;

        // dd($statusIrs);

        //mengembalikan nilai ke tampilan
        return view('kelas.index', [
            'title' => 'Kelas',
            'active' => 'Kelas',
            'tahunAjar' => $tahunAjar,
            'semester' => $semester,
            'schedules' =>  $schedules,
            'presences' => $presences,
            'statusFinal' => $statusIrs,

        ]);    
    }


}
