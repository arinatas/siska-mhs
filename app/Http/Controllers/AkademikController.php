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
        b.int_kd_perkuliahan_d, 
        d.str_nm_mk, 
        e.num_sks, 
        f.dec_na, 
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

        //ambil nilai uts/uas/tugas/keaktifan
            // $nilaiEach = DB::select("
            // SELECT 
            // aka_nilai.str_id_nim, 
            // aka_nilai.str_kd_mk, 
            // aka_matakuliah.str_nm_mk, 
            // aka_nilai.str_na, 
            // aka_nilai.num_bobot, 
            // aka_nilai_detail.dec_nilai, 
            // uni_mtr_nilai.str_nm_mtr_nilai, 
            // aka_matakuliah_detail.num_sks 
            // FROM 
            // aka_nilai 
            // LEFT JOIN aka_nilai_detail ON aka_nilai.int_kd_nilai = aka_nilai_detail.int_kd_nilai 
            // LEFT join uni_mtr_nilai ON aka_nilai_detail.int_id_mtr_nilai = uni_mtr_nilai.int_id_mtr_nilai 
            // LEFT JOIN aka_matakuliah ON aka_nilai.str_kd_mk = aka_matakuliah.str_kd_mk 
            // LEFT JOIN aka_matakuliah_detail ON aka_matakuliah.str_kd_mk = aka_matakuliah_detail.str_kd_mk 
            // WHERE 
            // aka_nilai.str_id_nim ='".$nim."'
            // AND aka_nilai.str_thn_ajaran = '".$request->get('tahun')."' 
            // AND aka_nilai.bol_semester = '".$request->get('semester')."'
            // AND aka_matakuliah_detail.str_kd_prodi = '".$mhsBio[0]->str_kd_prodi."'
            // ");

            // $nilai=array();
            
            // // separate data uts/uas/tugas/keaktifan
            // foreach($nilaiEach as $value){
            //     $nilai[$value->str_kd_mk]['kode_mk']=$value->str_kd_mk;
            //     $nilai[$value->str_kd_mk]['matkul']=$value->str_nm_mk;
            //     $nilai[$value->str_kd_mk]['grade']=$value->str_na;
            //     $nilai[$value->str_kd_mk]['bobot']=$value->num_bobot;
            //     $nilai[$value->str_kd_mk]['sks']=$value->num_sks;
            //     $nilai[$value->str_kd_mk][$value->str_nm_mtr_nilai]=$value->dec_nilai;
            // }
            // // change index from text (kode perkuliahan) to index        
            // $nilai = array_values($nilai);

            // dd($nilai);

        // untuk penomeran tabel
        $totalMatkul = 1;

        //ambil tahun ajaran & smt terpilih
        $selectedTahun = $request->get('tahun');
        $selectedSmt = $request->get('semester');

        $allSks = [];
        $totalBobot = [];

        //by nilai
        // foreach ($nilai as $value)
        // {
        //     $allSks[] = $value["sks"];
        //     $totalBobot[] = $value["bobot"] * $value["sks"];
        // }
        

        // by khs
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

    public function nilaieach($kodemk, $kodeperkul, $smt, $thn){
        // Mengambil nim user yang login
        $nim = auth()->user()->username;

        // Ambil detail matakuliah dari tabel aka_nilai
        $getNilaiDataAkaNilai = DB::select("
        SELECT * from aka_nilai_detail left join uni_mtr_nilai on uni_mtr_nilai.int_id_mtr_nilai = aka_nilai_detail.int_id_mtr_nilai where int_kd_nilai in(SELECT int_kd_nilai
        FROM aka_nilai 
        where str_id_nim = '".$nim."' AND str_kd_mk = '".$kodemk."' 
        AND str_thn_ajaran = '".$thn."' AND bol_semester = '".$smt."')
        ORDER BY int_id_detail_nilai DESC
        ");

        if ($getNilaiDataAkaNilai) {
            // cek jika dpt nilainya return ke ajax (frontend)
            return array_slice($getNilaiDataAkaNilai, 0, 4);
        } else {
            // kalo tidak dpt cek di tabel sebelah
            
            // Ambil detail matakuliah dari tabel aka_nilai_kategori
            $getNilaiDataAkaNilaiKategori = DB::select("
            SELECT *
            FROM `aka_nilai_kategori`
            WHERE `str_id_nim` = '".$nim."' AND `int_kd_perkuliahan_d` = '".$kodeperkul."'
            ORDER BY `int_kd_perkuliahan_d`
            ");

            // cek jika dpt nilainya return ke ajax (frontend)
            return array_slice($getNilaiDataAkaNilaiKategori, 0, 4);
        }
    }

    public function angketList()
    {
        // untuk penomeran tabel
        $tableNumber = 1;

        // Mengambil nim user yang login
        $nim = auth()->user()->username;

        // Ambil tahun ajaran dan smt now
        $getTahunAjaran = DB::select("select * from pablic_reset");
        $tahunNow = $getTahunAjaran[0]->str_thn_ajaran;
        $semesterNow = $getTahunAjaran[0]->bol_semester_krs;

        // Panggil API untuk mendapatkan jadwal angket
        $url = "http://103.80.88.77:8000/get_jadwal_by_request.php?semester=".$semesterNow."&tahun_ajaran=".$tahunNow."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        $angketAktif = $response->status;

        if($angketAktif == true){
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
            INNER JOIN uni_prodi z on a.str_kd_prodi = z.str_kd_prodi WHERE a.str_thn_ajaran='".$response->data[0]->tahun_ajaran."' AND a.bol_semester='".$response->data[0]->semester."' AND h.str_id_nim='".$nim."'
            ");

            // API ambil angket yg telah ter~isi
            $url = "http://103.80.88.77:8000/get_pertanyaan.php?id_jadwal_edom=".$response->data[0]->id_jadwal_edom."&nim=".$nim."&tahun_ajaran=".$response->data[0]->tahun_ajaran."&semester=".$response->data[0]->semester."";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($response);

            if ($response->status == true){

                $angketTerisi = $response->data->data_pengisian_angket;

                $kodeMkAngketDone = [];

                foreach ($angketTerisi as $value)
                {
                    $kodeMkAngketDone[] = $value->id_perkuliahan;
                }

                $newAngketList = [];

                // cari matkul yg telah terisi angketnya dan di skip
                foreach ($schedules as $value)
                {
                    if (in_array($value->int_kd_perkuliahan_d, $kodeMkAngketDone)) {
                        continue;
                    }
                    $newAngketList[] = $value;
                }

                session(['angketLeft' => $newAngketList]);

                if ($newAngketList == null) {
                    session()->forget(['angketLeft']);
                    return redirect('/kelas')->with('angketDone', 'Angket Telah Terisi Semua!');
                }

                return view('akademik.angket.index', [
                    'title' => 'Angket',
                    'active' => 'Akademik',
                    'angketLists' => $schedules,
                    'angketLefts' => $newAngketList,
                    'angketDones' => $kodeMkAngketDone,
                    'tableNumber' => $tableNumber,
                ]);
            } else {
                session()->forget(['angketLeft']);
                return redirect('/kelas')->with('falseAngket', $response->message);
            }

            
        } else {
            session()->forget(['angketLeft']);
            return redirect('/kelas')->with('angketNotYet', 'No schedule found!');
        }

        
    }
    
    public function isiAngket($kelas)
    {
        // Mengambil nim user yang login
        $nim = auth()->user()->username;
        // untuk penomeran tabel
        $tableNumber = 1;

        // Ambil tahun ajaran dan smt now
        $getDataTime = DB::select("select * from pablic_reset");
        $tahunAjar = $getDataTime[0]->str_thn_ajaran;
        $semester = $getDataTime[0]->bol_semester;

        // Panggil API untuk mendapatkan jadwal angket
        $url = "http://103.80.88.77:8000/get_jadwal_by_request.php?semester=".$semester."&tahun_ajaran=".$tahunAjar."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        if ($response->status == true){
            // API ambil pertanyaan untuk edom
            $url = "http://103.80.88.77:8000/get_pertanyaan.php?id_jadwal_edom=".$response->data[0]->id_jadwal_edom."&nim=".$nim."&tahun_ajaran=".$tahunAjar."&semester=".$semester."";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($response);

            $pertanyaanLists = $response->data->pertanyaan;

            // Ambil detail matakuliah
            $getAngketData = DB::select("
            SELECT a.str_kd_prodi,a.int_kd_kls_buka,a.str_kd_mk,b.int_kd_kelas,a.str_thn_ajaran,a.bol_semester,z.str_nm_prodi,b.int_kd_perkuliahan_d,b.str_nm_kelas,c.str_kd_mk,c.str_nm_mk,e.str_nm_kad,e.str_id_kad,d.str_nama_hari,f.str_nm_ruang,MID(b.time_jam_awal,1,5) as awal,MID(b.time_jam_akhir,1,5) as akhir,g.num_sks,g.num_kd_semester,b.num_jml_buka,b.num_jml_peserta,a.str_desc, l.link_spada, l.kode_spada,l.group_spada, m.link FROM aka_perkuliahan a 
            INNER JOIN aka_perkuliahan_detail b ON a.str_kd_perkuliahan = b.str_kd_perkuliahan 
            INNER JOIN aka_matakuliah c ON a.str_kd_mk = c.str_kd_mk 
            INNER JOIN mst_hari d ON b.int_hari = d.str_kd_hari 
            INNER JOIN uni_karidos e ON b.str_id_dosen = e.str_id_kad 
            INNER JOIN aka_ruang f ON b.num_kd_ruang = f.num_kd_ruang 
            INNER JOIN aka_krs h ON b.int_kd_perkuliahan_d =h.int_kd_perkuliahan_d
            INNER JOIN aka_matakuliah_detail g ON a.str_kd_mk = g.str_kd_mk AND a.`str_kd_prodi` = g.`str_kd_prodi` 
            LEFT JOIN link_spada l ON l.int_kd_perkuliahan_d = b.int_kd_perkuliahan_d
            LEFT JOIN aka_perkuliahan_detail_link m ON m.id_perkuliahan_detail = b.int_kd_perkuliahan_d 
            INNER JOIN uni_prodi z on a.str_kd_prodi = z.str_kd_prodi WHERE a.str_thn_ajaran='".$tahunAjar."' AND a.bol_semester='".$semester."' AND h.str_id_nim='".$nim."' AND b.int_kd_perkuliahan_d='".$kelas."'
            ");

            if ($getAngketData)
            {
                return view('akademik.angket.isi_angket', [
                    'title' => 'Angket',
                    'active' => 'Akademik',
                    'tableNumber' => $tableNumber,
                    'pertanyaanLists' => $pertanyaanLists,
                    'dataAngket' => $getAngketData,
                ]); 
            } else {
                // redirect back
                // return redirect()->back()->with('angketNotfound', 'Angket tidak ditemukan');
                return redirect('/angket')->with('angketNotfound', 'Angket Tidak Ditemukan!');
            }
        } else {
            session()->forget(['angketLeft']);
            return redirect('/kelas')->with('falseAngket', $response->message);
        }
    }

    public function sendAngket(Request $request)
    {
        
            //ambil semua request yg dikirim
            $dataJawab = $request->all();

            //api post jawaban
            $urlJawab = 'http://103.80.88.77:8000/post_jawaban.php';
            $postdataJawab = http_build_query($dataJawab);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlJawab);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdataJawab);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($response);


        // balik ke angket
        return redirect('/angket')->with('angketSubmited', 'Angket Berhasil diinput!');
    }
    
    public function krs()
    {
        $nim = auth()->user()->username;

       // Panggil API untuk mendapatkan matkul yg di tawarkan (krs)
        $url = "http://103.80.88.77:8001/get_makul.php?nim=".$nim."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $irs = json_decode($response);

        return view('akademik.krs.index', [
            'title' => 'KRS',
            'active' => 'Akademik',
            'irsLists' => $irs,
            'nim' => $nim,
            // 'irsMhsLists' => $mhsIrs
        ]); 
    }

    // ambil irs mhs
    public function getIrs()
    {
        $nim = auth()->user()->username;

        // Panggil API untuk mendapatkan krs yg telah diambil (mhs)
        $url = "http://103.80.88.77:8001/get_irs.php?nim=".$nim."";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $mhsIrs = json_decode($response);

        if($mhsIrs[0]){
            foreach ($mhsIrs as $value)
            {
                $allSks[] = $value->num_sks;
            }
        } else {
            $allSks = 0;
        }

        return view('akademik.krs.irslist', [
            'lists' => $mhsIrs,
            'totalSKS' => $allSks
        ]); 
    }

    // // ambil matakuliah yg tersedia
    // public function getMatkulIrs()
    // {
    //     $nim = auth()->user()->username;

    //     // Panggil API untuk mendapatkan krs yg telah diambil (mhs)
    //     $url = "http://103.80.88.77:8001/get_makul.php?nim=".$nim."";
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     $matkulIrs = json_decode($response);

    //     return view('akademik.krs.matkulist', [
    //         'lists' => $matkulIrs
    //     ]); 
    // }
    
    // public function irsAdd(Request $request)
    // {

    //     $dataIrs = $request->all();

    //     $url = 'http://103.80.88.77:8001/post_irs.php';
    //     $irsPost = http_build_query($dataIrs);
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $irsPost);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($ch);
    //     curl_close($ch);
    //     $response = json_decode($response);

    //     return redirect()->back()->with('irsAddesSuccess', 'Berhasil ditambahkan!'); 
    // }

    // public function irsDel($kelas)
    // {
    //     $nim = auth()->user()->username;
        
    //     $url = 'http://103.80.88.77:8001/remove_irs.php?str_id_nim='.$nim.'&int_kd_perkuliahan_d='.$kelas.'';
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $result = curl_exec($ch);
    //     $result = json_decode($result);
    //     curl_close($ch);

    //     return redirect()->back()->with('irsDeletedSuccess', 'Berhasil dihapus!'); 
    // }

    // fungsi untuk mengubah angka ke romawi pada IRS
    function numberToRoman($num)  
    { 
        // Be sure to convert the given parameter into an integer
        $n = intval($num);
        $result = ''; 
    
        // Declare a lookup array that we will use to traverse the number: 
        $lookup = array(
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ); 
    
        foreach ($lookup as $roman => $value)  
        {
            // Look for number of matches
            $matches = intval($n / $value); 
    
            // Concatenate characters
            $result .= str_repeat($roman, $matches); 
    
            // Substract that from the number 
            $n = $n % $value; 
        } 

        return $result; 
    } 
}
