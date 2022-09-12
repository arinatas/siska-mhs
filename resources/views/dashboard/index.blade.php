@extends('layouts.main')

@section('container')

  <!--begin::Body-->
  <body
    id="kt_body"
    style="background-image: url(/assets/media/patterns/header-bg.jpg)"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled"
  >
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
                    Dashboard{{-- <span class="badge rounded-pill bg-light text-dark">{{ $semester }} {{ $tahunAjar }}</span> --}}
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
              <div class="row gy-5 g-xl-8 mt-1">
                <!--begin::Col-->
                <div class="col-xl-4">
                  <!--begin::Mixed Widget 2-->
                  @if ($statusPembayaran == true)
                    <div class="card">
                      <div class="card-body">
                        <h1 class="card-title text-black my-6 mb-6 text-center">Status Pembayaran SPP</h1>
                        <div class="container">

                          <h4 class="card-text text-black py-4">"Terimakasih telah melakukan pembayaran tepat waktu"</h4>
                          <h5 class="card-text text-black mt-5" style="font-style: italic;">Info : Data pembayaran diperbaharui pada tanggal 10 tiap awal bulan oleh bagian keuangan.</h5>
                          <br>
                          <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="#" class="btn text-white btn-primary">Lunas</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @else
                  <div class="card bg-warning">
                    <div class="card-body">
                      <h1 class="card-title text-black my-6 mb-6 text-center">Status Pembayaran SPP</h1>
                      <div class="container">
                        <h4 class="card-text text-black py-4">"Segera lakukan pembayaran"</h4>
                        <h5 class="card-text text-black mt-5" style="font-style: italic;">Info : Data pembayaran diperbaharui pada tanggal 10 tiap awal bulan oleh bagian keuangan.</h5>
                        <br>
                        <div class="d-grid gap-2 col-6 mx-auto">
                          <a href="#" class="btn text-white btn-danger">Belum Lunas</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                  
                  <div class="card bg-primary mt-5">
                    <div class="card-body">
                      <div class="card mb-xl-1">
                        <!--begin::Body-->
                        <div
                          class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden"
                        >
                          <!--begin::Chart-->
                          <div class="card-body">
                            <h5 class="progress_name">SKS</h5>
                            <div class="progress" style="height: 30px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $sksPercentage }}%" aria-valuenow="{{ $totalSKS }}" aria-valuemin="0" aria-valuemax="144">{{ $totalSKS }}</div>
                            </div>
                            <h5 class="progress_name mt-5">IPK</h5>
                            <div class="progress" style="height: 30px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $ipkPercentage }}%" aria-valuenow="{{ $totalIPK }}" aria-valuemin="0" aria-valuemax="4">{{ $totalIPK }}</div>
                            </div>
                            <h5 class="progress_name mt-5">TAK</h5>
                            <div class="progress" style="height: 30px;">
                            <div class="progress-bar bg-warning text-black" role="progressbar" style="width: {{ $takPercentage }}%" aria-valuenow="{{ $totalTAK }}" aria-valuemin="0" aria-valuemax="120">{{ $totalTAK }}</div>
                            </div>
                          </div>
                          <!--end::Chart-->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card bg-primary mt-5">
                    <div class="card-body">
                      <div class="card mb-xl-1">
                        <!--begin::Body-->
                        <div
                          class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden"
                        >
                          <!--begin::Chart-->
                          <div class="card-body">
                            <h1 class="card-title text-black mb-4 text-center">Informasi Wi-Fi Kampus</h1>
                            {{-- <div class="container"> --}}
                              <h4 class="card-text text-black py-2">Untuk menggunakan Wi-Fi kampus STMIK Primakara kamu dapat mengkoneksikan device terlebih dahulu ke wifi "Primakara"</h4>
                              <h4 class="card-text text-black py-2 text-center"><u><a href="http://10.100.1.1/" target="blank">Kemudian akses link berikut untuk melakukan login</a></u></h4>
                              <h5 class="card-text text-black mt-5" style="font-style: italic;">Berikut account kamu yang digunakan untuk login ya  <br><br>User : {{ auth()->user()->username }}<br>Password : {{ $wifiPassword }}</h5>
                              <br>
                            {{-- </div> --}}
                          </div>
                          <!--end::Chart-->
                        </div>
                      </div>
                    </div>
                  </div>
 
                  <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
                <!-- begin col -->
                <div class="col-xl-8">
                  <!-- begin table matkul -->
                  <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-5 px-lg-19 py-lg-16">
                      <!--begin::Content main-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        <div class="mb-10">
                          <!--begin::Title-->
                          <h1 class="fs-2x text-dark mx-2 mt-3">
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
                            @if ($schedules)
                              @if ($statusFinal == true)
                                  <!--begin::Table-->
                                    <table
                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                    >
                                      <!--begin::Table head-->
                                      <thead>
                                        <tr
                                          class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                        >
                                          <th class="min-w-50px rounded-start">Matakuliah</th>
                                          <th class="min-w-100px">Waktu & Ruangan</th>
                                          <th class="min-w-150px rounded-end">Dosen</th>
                                        </tr>
                                      </thead>
                                      <!--end::Table head-->

                                        <!--begin::Table body-->
                                        @foreach ($schedules as $schedule)
                                        <tbody class="border-bottom border">
                                          <tr
                                            class=""
                                          >
                                            <td class="px-3">{{ $schedule->str_nm_mk }}</td>
                                            <td class="text-center">{{ $schedule->str_nama_hari }}<br> {{ $schedule->awal }}~ {{ $schedule->akhir }} <br>{{ $schedule->str_nm_ruang }}</td>
                                            <td>{{ $schedule->str_nm_kad }}</td>
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
                  <!-- end table matkul-->

                  <!-- begin table invoice-->
                  <div class="card mt-5">
                    <!--begin::Body-->
                    <div class="card-body p-5 px-lg-19 py-lg-16">
                      <!--begin::Content main-->
                      <div class="">
                        <!--begin::Heading-->
                        <div class="mb-10">
                          <!--begin::Title-->
                          <h1 class="fs-2x text-dark mx-2 mt-3">
                            Informasi Pembayaran SPP
                          </h1>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <!--begin::Table-->
                        <div class="mb-5">
                          <!--begin::Table container-->
                          <div class="table-responsive">
                            <!--begin::Table-->
                              <table
                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                              >
                                <!--begin::Table head-->
                                <thead>
                                        <tr
                                          class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                        >
                                          <th class="min-w-50px rounded-start">SPP</th>
                                          <th class="min-w-100px">Telah Dibayar</th>
                                          <th class="min-w-150px rounded-end">Sisa Pembayaran</th>
                                        </tr>
                                </thead>
                                <!--end::Table head-->

                                <!--begin::Table body-->
                                    <tbody class="border-bottom border">
                                          <tr
                                            class="text-center"
                                          >
                                            <td class="px-3">Rp. {{number_format($invoiceInfo->SPP_Awal)}}</td>
                                            <td class="">Rp. {{number_format($invoiceInfo->SPP_dibayarkan)}}</td>
                                            <td>Rp. {{number_format($invoiceInfo->Sisa_SPP)}}</td>
                                          </tr>
                                    </tbody>
                                <!--end::Table body-->

                              </table>
                            <!--end::Table-->
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