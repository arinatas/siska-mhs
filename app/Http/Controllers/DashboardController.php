<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        // set nim mahasiswa
        $nim = auth()->user()->username;

        // get all kegiatan & poin
            $takLists = DB::select("
            SELECT tak_kegiatan.str_nm_kegiatan, tak_peserta.int_nilai_tak FROM tak_peserta LEFT JOIN tak_kegiatan on tak_kegiatan.str_kd_kegiatan = tak_peserta.str_kd_kegiatan WHERE tak_peserta.str_id_nim = '".$nim."'");

            $totalPoint = [];

            foreach ($takLists as $value)
            {
                $totalPoint[] = $value->int_nilai_tak;
            }

            $totalTAK = array_sum($totalPoint);

            $takPercentage = ($totalTAK/120)*100;
        // end get poin tak

        // get all sks and IPK from transkrip nilai
            $transkrips = DB::select("
            SELECT *
            FROM `v_transkrip`
            WHERE (`nim` = '".$nim."')");

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

            // percentage SKS & IPK
            $sksPercentage = (array_sum($sksLulus)/144)*100;
            $ipkPercentage = (number_format($totalIpk, 2)/4)*100;
            // end percentage SKS & IPK

        // end get all sks from transkrip nilai

        // get matkul and finalisasi
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
        // end get matkul

        // get status pepmbayaran dan irs
            // cek status finalisasi IRS(array 0) dan Pembayaran (array 1)
            // cek jika tidak dpt data bakal error
            $url = "http://27.112.79.162:8000/cek_awal.php?str_id_nim=".$nim."";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $infoStatus = json_decode($response);

            $statusIrs = $infoStatus[0]->status;
            $statusPembayaran = $infoStatus[1]->status;
            $invoiceInfo = $infoStatus[3];

        // end get status pepmbayaran dan irs

        // get data mhs and dosen pa
            // get dosen PA dan bio
            $mhsBio = DB::select("
            SELECT mm.str_id_nim, mm.str_nm_mhs, IF(mm.str_kd_prodi = '0001', 'Teknik Informatika', IF(mm.str_kd_prodi = '0002', 'Sistem Informasi Akuntansi', 'Sistem Informasi')) as prodi, IF(mm.int_kd_kelas = 1, 'Pagi', 'Malam') as kelas, mm.str_email, mm.str_hp, mm.str_angkatan, mm.status_aktif,
            (SELECT str_nm_kad FROM uni_karidos WHERE str_id_kad = (SELECT agw.str_kd_dosen_wali_d FROM aka_group_wali agw WHERE agw.int_id_group_wali = mm.int_id_group_wali)) as pembimbing_1,
            (SELECT str_nm_kad FROM uni_karidos WHERE str_id_kad = (SELECT agw.str_kd_dosen_wali_aktif FROM aka_group_wali agw WHERE agw.int_id_group_wali = mm.int_id_group_wali)) as pembimbing_2
            FROM mhs_mahasiswa mm
            WHERE (mm.str_id_nim = '".$nim."') ");
        // end get data mhs and dosen pa

        // data password wifi 
        $wifi = DB::select("
            SELECT *
            FROM `user_wifi`
            WHERE (`username` = '".$nim."')");
        
        if ($wifi)
        {
            $wifiPassword = $wifi[0]->password;
        } else {
            $wifiPassword = "";
        }


        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'totalSKS' => array_sum($sksLulus),
            'totalIPK' => number_format($totalIpk, 2),
            'totalTAK' => $totalTAK,
            'takPercentage' => $takPercentage,
            'sksPercentage' => $sksPercentage,
            'ipkPercentage' => $ipkPercentage,
            'schedules' =>  $schedules,
            'statusFinal' => $statusIrs,
            'statusPembayaran' => $statusPembayaran,
            'invoiceInfo' => $invoiceInfo,
            'wifiPassword' => $wifiPassword,
            'mahasiswa' => $mhsBio

            

        ]);
    }
}
