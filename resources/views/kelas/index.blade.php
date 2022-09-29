@extends('layouts.main')

@section('container')

  <!--begin::Body-->
  <body
    id="kt_body"
    style="background-image: url(/assets/media/patterns/header-bg.jpg)"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled"
  >
  @if (\Session::has('angketNotYet'))
    <script>
        Swal.fire(
          '{!! \Session::get('angketNotYet') !!}',
          'Masa pengisian angket belum dibuka!',
          'warning'
        )
    </script>
  @endif
  @if (\Session::has('irsNotfound'))
    <script>
        Swal.fire(
          '{!! \Session::get('irsNotfound') !!}',
          'Masa pengisian IRS belum dibuka!',
          'warning'
        )
    </script>
  @endif
  @if (\Session::has('falseAngket'))
    <script>
        Swal.fire(
          'Ups!',
          '{!! \Session::get('falseAngket') !!}',
          'warning'
        )
    </script>
  @endif
  @if (\Session::has('angketDone'))
  <script>
      Swal.fire(
        '{!! \Session::get('angketDone') !!}',
        'Terimakasih telah mengisi angket',
        'success'
      )
  </script>
  @endif
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
          <!--begin::Toolbar-->
          <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
            <!--begin::Container-->
            <div
              id="kt_toolbar_container"
              class="container-xxl d-flex flex-stack flex-wrap py-8"
            >
              <!--begin::Page title-->
              <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-white fw-bolder my-1 fs-3">{{ $title }}</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul
                  class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1"
                >
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-white opacity-75">
                    <a
                      href="#"
                      class="text-white text-hover-primary"
                      >{{ $title }}</a
                    >
                  </li>
                  <!--end::Item-->
                  <!--begin::Item-->
                  <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                  </li>
                  <!--end::Item-->
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-white opacity-75">
                    <span class="badge rounded-pill bg-light text-dark">{{ $semester }} {{ $tahunAjar }}</span>
                  </li>
                  <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
              </div>
              <!--end::Page title-->
              <!--begin::Actions-->

              <!--end::Actions-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Toolbar-->
          <!--begin::Container-->
          <div
            id="kt_content_container"
            class="d-flex flex-column-fluid align-items-start container-xxl"
          >
            <!--begin::Post-->
            <div class="content flex-row-fluid" id="kt_content">
              <!--begin::Row-->
              <div class="row gy-5 g-xl-8">
                <!-- begin col -->
                
                <div class="col-xl-12">
                  <!-- begin table -->
                  <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-5 px-lg-19 py-lg-16">
                      <!--begin::Content main-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        <div class="mb-15">
                          <!--begin::Title-->
                          <h1 class="fs-2x text-dark mb-6">
                            Jadwal Perkuliahan
                          </h1>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <!--begin::Table-->
                        <div class="mb-14">
                          <!--begin::Table container-->
                          <div class="table-responsive">
                            {{-- cek table jadwal kosong --}}
                            @if ($schedules)
                              @if ($statusFinal == true)
                                  <!--begin::Table-->
                                  <table
                                  class="table  table-row-gray-300 align-middle gs-0 gy-4"
                                >
                                  <!--begin::Table head-->
                                  <thead>
                                    <tr
                                      class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                    >
                                      <th class="min-w-150px px-3 rounded-start">Matakuliah</th>
                                      <th class="min-w-150px">Dosen</th>
                                      <th class="min-w-70px">Waktu</th>
                                      <th class="min-w-50px">Ruangan</th>
                                      <th class="min-w-50px">Enrollment Key</th>
                                      <th class="min-w-100px px-3 rounded-end">Link</th>
                                    </tr>
                                  </thead>
                                  <!--end::Table head-->
                                  <!--begin::Table body-->
                                @foreach ($schedules as $schedule)
                                  <tbody class="border-bottom border">
                                    <tr
                                      class="text-center"
                                    >
                                      <td align="left" style="padding-left: 20px">
                                      {{ $schedule->str_nm_mk }}
                                      <br>
                                      <span>Kode: <b>{{ $schedule->str_kd_mk }}</b></span>
                                      </td>
                                      <td align="left" style="padding-left: 20px">
                                      {{ $schedule->str_nm_kad }}
                                      </td>
                                      <td>
                                      {{ $schedule->str_nama_hari }} <br> {{ $schedule->awal }} ~ {{ $schedule->akhir }} <br> (<b>{{ $schedule->str_nm_kelas }}</b>)
                                      </td>
                                      <td>
                                      {{ $schedule->str_nm_ruang }}
                                      </td>
                                      <td>
                                      {{ $schedule->group_spada }}
                                      </td>
                                      <td class="px-5" style="text-align-last: justify;">
                                          <a href="{{ $schedule->link }}" target="blank"><img src="/assets/media/logos/whatsapp.svg" width="30px" alt="SPADA"></a>
                                          <a href="{{ $schedule->link_spada }}" target="blank"><img src="/assets/media/logos/smallprimakara.png" width="25px" alt="SPADA"></a>
                                      </td>
                                    </tr>
                                  </tbody>
                                  @endforeach
                                  <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                              @else
                                <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-9 p-6">
                                  <!--begin::Icon-->
                                  <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                  <span class="svg-icon svg-icon-2tx svg-icon-info me-4">
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
                                      <h4 class="text-gray-900 fw-bolder">IRS Belum difinalisasi</h4>
                                      <div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, IRS kamu belum difinalisasi oleh dosen pembimbing, hubungi dosen pembimbing 1 ya untuk finalisasi IRS.
                                        <br />
                                        {{-- <a class="fw-bolder" href="#">Learn more</a> --}}
                                      </div>
                                    </div>
                                    <!--end::Content-->
                                  </div>
                                  <!--end::Wrapper-->
                                </div>
                              @endif
                              
                            @else
                              <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
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
                                    <h4 class="text-gray-900 fw-bolder">Tidak Ada Jadwal Kuliah</h4>
                                    <div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, kamu mungkin tidak mengambil IRS pada semester ini.
                                      <br />
                                      {{-- <a class="fw-bolder" href="#">Learn more</a> --}}
                                    </div>
                                  </div>
                                  <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                              </div>
                            @endif
                          </div>
                          <!--end::Table container-->
                        </div>
                        <!--end::Table-->
                      </div>
                      <!--end::Card-->
                    </div>
                    <!--end::Body-->
                  </div>
                  <!-- end table -->
                </div>
                <div class="col-xl-12">
                  <!-- begin table -->
                  <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-5 px-lg-19 py-lg-16">
                      <!--begin::Content main-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        <div class="mb-15">
                          <!--begin::Title-->
                          <h1 class="fs-2x text-dark mb-6">
                            Presensi
                          </h1>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <!--begin::Table-->
                        <div class="mb-14">
                          <!--begin::Table container-->
                          <div class="table-responsive">
                            {{-- cek tabel presensi jika kosong --}}
                            @if ($presences && $schedules)
                              <!--begin::Table-->
                              <table
                                class="table  table-row-gray-300 align-middle gs-0 gy-4"
                              >
                                <!--begin::Table head-->
                                <thead>
                                  <tr
                                    class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                  >
                                    <th class="min-w-150px px-3 rounded-start">Matakuliah</th>
                                    <th class="min-w-50px">P1</th>
                                    <th class="min-w-50px">P2</th>
                                    <th class="min-w-50px">P3</th>
                                    <th class="min-w-50px">P4</th>
                                    <th class="min-w-50px">P5</th>
                                    <th class="min-w-50px">P6</th>
                                    <th class="min-w-50px">P7</th>
                                    <th class="min-w-50px">UTS</th>
                                    <th class="min-w-50px">P8</th>
                                    <th class="min-w-50px">P9</th>
                                    <th class="min-w-50px">P10</th>
                                    <th class="min-w-50px">P11</th>
                                    <th class="min-w-50px">P12</th>
                                    <th class="min-w-50px">P13</th>
                                    <th class="min-w-50px">P14</th>
                                    <th class="min-w-50px px-3 rounded-end">UAS</th>
                                  </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                              @foreach ($presences as $presensi)
                                <tbody class="border-bottom border">
                                  <tr
                                    class="text-center"
                                  >
                                    <td class="min-w-150px">
                                      {{ $presensi->str_nm_mk }}
                                    </td>
                                    {{-- presensi if (banyak) --}}
                                      @if ($presensi->p1 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p1 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p1 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p1 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p2 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p2 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p2 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p2 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p3 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p3 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p3 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p3 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p4 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p4 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p4 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p4 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p5 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p5 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p5 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p5 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p6 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p6 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p6 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p6 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p7 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p7 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p7 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p7 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p8 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p8 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p8 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p8 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p9 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p9 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p9 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p9 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p10 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p10 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p10 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p10 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p11 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p11 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p11 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p11 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p12 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p12 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p12 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p12 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p13 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p13 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p13 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p13 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p14 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p14 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p14 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p14 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p15 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p15 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p15 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p15 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                      @if ($presensi->p16 == 1)
                                        <td>
                                          <span class="badge rounded-pill bg-primary">H</span>
                                        </td>
                                        @elseif($presensi->p16 == 2)
                                        <td>
                                          <span class="badge rounded-pill bg-danger">A</span>
                                        </td>
                                        @elseif($presensi->p16 == 3)
                                        <td>
                                          <span class="badge rounded-pill bg-warning">I</span>
                                        </td>
                                        @elseif($presensi->p16 == 4)
                                        <td>
                                          <span class="badge rounded-pill bg-success">S</span>
                                        </td>
                                        @else
                                        <td>-</td>
                                      @endif
                                    {{-- end presensi if (banyak) --}}
                                    
                                    {{-- presnsi lama (salah)
                                      @for ($i = 1; $i <= 16; $i++)
                                        //cek apakah mhs punya kehadiran 
                                        @if(array_key_exists($i, $presensi->kehadiran))
                                          //kalo nilai "h" dimunculkan 
                                          @if($presensi->kehadiran[$i]->num_stat_pertemuan == 'H')
                                          <td>
                                            <span class="badge rounded-pill bg-primary">H</span>
                                          </td>
                                          @elseif($presensi->kehadiran[$i]->num_stat_pertemuan == 'A')
                                          <td>
                                            <span class="badge rounded-pill bg-danger">A</span>
                                          </td>
                                          @elseif($presensi->kehadiran[$i]->num_stat_pertemuan == 'I')
                                          <td>
                                            <span class="badge rounded-pill bg-warning">I</span>
                                          </td>
                                          @elseif($presensi->kehadiran[$i]->num_stat_pertemuan == 'S')
                                          <td>
                                            <span class="badge rounded-pill bg-success">S</span>
                                          </td>
                                          @else
                                          <td>-</td>
                                          @endif
                                          @else
                                          <td>-</td>
                                          @endif
                                      @endfor 
                                    --}}
                                  </tr>
                                </tbody>
                                @endforeach
                                <!--end::Table body-->
                              </table>
                              <!--end::Table-->
                            @elseif($schedules)
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
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
                                  <h4 class="text-gray-900 fw-bolder">Data Presensi Tidak Ada</h4>
                                  <div class="fs-6 text-gray-700">Tidak ada presnsi yang ditemukan.
                                    <br />
                                    {{-- <a class="fw-bolder" href="#">Learn more</a> --}}
                                  </div>
                                </div>
                                <!--end::Content-->
                              </div>
                              <!--end::Wrapper-->
                            </div>
                            @else
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
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
                                  <h4 class="text-gray-900 fw-bolder">Data Presensi Tidak Ada</h4>
                                  <div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, kamu mungkin tidak mengambil IRS pada semester ini.
                                    <br />
                                    {{-- <a class="fw-bolder" href="#">Learn more</a> --}}
                                  </div>
                                </div>
                                <!--end::Content-->
                              </div>
                              <!--end::Wrapper-->
                            </div>
                            @endif
                          </div>
                          <!--end::Table container-->
                        </div>
                        <!--end::Table-->
                      </div>
                      <!--end::Card-->
                    </div>
                    <!--end::Body-->
                  </div>
                  <!-- end table -->
                </div>
                <!-- end col -->  
              </div>
              <!--end::Row-->     
            </div>
            <!--end::Post-->
          </div>
          <!--end::Container-->
          <!--begin::Footer-->
            @include('partials.footer')     
          <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    
  </body>
  <!--end::Body-->

@endsection