<!--begin::Table container-->
<div id="kt_project_users_table_pane" class="tab-pane fade show active">
  <!--begin::Card-->
  <div class="card card-flush">
    <!--begin::Card body-->
    <div class="">
    <!--begin::Table container-->
    {{-- cek jika belum lunas --}}
    @if ($statusPembayaran->status == false)
      <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6 mt-5">
        <!--begin::Icon-->
        <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
        <span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
          <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
          <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
        </svg>
        </span>
        <!--end::Svg Icon-->
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-grow-1">
        <!--begin::Content-->
        <div class="fw-bold">
          <h4 class="text-gray-900 fw-bolder">Pembayaran Belum Terpenuhi</h4>
          <div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, {{ $statusPembayaran->message }}
          <br />
          {{-- <a class="fw-bolder" href="#">Learn more</a> --}}
          </div>
        </div>
        <!--end::Content-->
        </div>
        <!--end::Wrapper-->
      </div>
    {{-- jika lunas lanjut cek data krs --}}
    @else
      {{-- cek kalo ada data krs --}}
      @if ($lists[0])
        <div class="row text-center justify-content-around my-3">
          <div class="col-md-6">
            <div class="alert alert-primary" role="alert">
              Total SKS : <span class="badge badge-primary">{{ array_sum($totalSKS) }}</span>
            </div>
          </div>
          @if ($statusFinal == false)
            <div class="col-md-6">
                <div class="alert alert-warning" role="alert">
                    Status : <span class="badge rounded-pill bg-warning text-dark">Belum Final</span>
                </div>
            </div>
          @else
            <div class="col-md-6">
              <div class="alert alert-success" role="alert">
                  Status : <span class="badge rounded-pill bg-success">Final</span>
              </div>
            </div>
          @endif
          
          
        </div>
        <div class="table-responsive">
          <!--begin::Table-->
          <table id="IrsTable" class="table table-row-bordered table-row gy-4 align-middle fw-bolder">
            <!--begin::Head-->
              <thead class="fs-7 text-gray-700 text-uppercase">
                <tr>
                <th class="">Matakuliah</th>
                <th class="">Dosen</th>
                <th class="">Kelas</th>
                <th class="">Waktu & Ruangan</th>
                <th class="">SKS & Semester</th>
                <th class="">Hapus</th>
                </tr>
              </thead>
              <!--end::Head-->
              <!--begin::Body-->
              <tbody class="fs-6">
                @inject('romanNum', 'App\Http\Controllers\AkademikController')
                @foreach ( $lists as $irs )
                <tr
                class=""  
                >
                    <td>
                    <span>{{ $irs->str_nm_mk }}</span> <br> <span id="kode_mk">({{ $irs->str_kd_mk }})</span>
                    </td>
                    <td>
                    <span id="dosen">{{ $irs->str_nm_kad }}</span>
                    </td>
                    <td>
                    <span id="dosen">{{ $irs->str_nm_kelas }}</span>
                    </td>
                    <td >
                    <span id="hari">{{ $irs->str_nama_hari }}</span>, <span id="awal">{{ $irs->awal }}</span> - <span id="akhir">{{ $irs->akhir }}</span> <br> <span id="ruangan">{{ $irs->str_nm_ruang }}</span>
                    </td>
                    <td>
                    <span id="sks">{{ $irs->num_sks }}</span> <span id="smt">  ({{ $romanNum::numberToRoman($irs->num_kd_semester) }})</span>
                    </td>
                    @if ($statusFinal == false)
                      <td>
                          {{-- <a id="btnico" href="/irsDel/{{ $irs->int_kd_perkuliahan_d }}"><i class="bi bi-trash3-fill text-success fs-1"></i></a> --}}
                          <form onsubmit="return deleteIrs(this);">
                          {{-- <form action="/irsDel" method="POST"> --}}
                            @csrf
                            <input type="hidden" name="str_id_nim" value="{{ auth()->user()->username }}">
                            <input type="hidden" name="int_kd_perkuliahan_d" value="{{ $irs->int_kd_perkuliahan_d }}">
                              <div>
                                <button id="" type="submit" style="border: none; outline: none; background: none;  padding: 0;"><i class="bi bi-trash3-fill text-danger fs-1"></i></button>
                              </div>
                            </form>
                      </td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
              <!--end::Body-->
          </table>
          <!--end::Table-->
        </div>
      
        <!--end::Table container-->
      {{-- ga irs ada tampilin alert --}}
      @else
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mt-5">
          <!--begin::Icon-->
          <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
          <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
          </svg>
          </span>
          <!--end::Svg Icon-->
          <!--end::Icon-->
          <!--begin::Wrapper-->
          <div class="d-flex flex-stack flex-grow-1">
          <!--begin::Content-->
          <div class="fw-bold">
            <h4 class="text-gray-900 fw-bolder">Data IRS Belum Ada</h4>
            <div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, Tambahkan matakuliah yang ingin diambil.
            <br />
            {{-- <a class="fw-bolder" href="#">Learn more</a> --}}
            </div>
          </div>
          <!--end::Content-->
          </div>
          <!--end::Wrapper-->
        </div>
      @endif
    @endif
    
    </div>
      <!--end::Card body-->
  </div>
    <!--end::Card-->
  </div>
  
