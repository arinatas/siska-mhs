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
                <h1 class="d-flex text-white fw-bolder my-1 fs-3">Kelas</h1>
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
                      >Perkuliahan</a
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
                    {{-- Semester Genap 2021/2022 --}}
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
                            <!--begin::Table-->
                            <table
                              class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                            >
                              <!--begin::Table head-->
                              <thead>
                                <tr
                                  class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                >
                                  <th class="min-w-50px rounded-start">Kode MK</th>
                                  <th class="min-w-150px">Matakuliah</th>
                                  <th class="min-w-150px">Dosen</th>
                                  <th class="min-w-70px">Hari</th>
                                  <th class="min-w-100px">Jam</th>
                                  <th class="min-w-30px">Ruangan</th>
                                  <th class="min-w-50px">Enrollment Key</th>
                                  <th class="min-w-50px">Whatsapp</th>
                                  <th class="min-w-50px">Spada</th>
                                  <th class="min-w-50px rounded-end">Keterangan</th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              <tbody class="border-bottom border-dashed">
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    IF1711
                                  </td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>I Putu Satwika M.Kom</td>
                                  <td>Rabu</td>
                                  <td>12:00 ~ 15:30</td>
                                  <td>R.3C</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td><a href="#">link</a></td>
                                  <td><a href="#">link</a></td>
                                  <td>Luring</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    IF1711
                                  </td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>I Putu Satwika M.Kom</td>
                                  <td>Rabu</td>
                                  <td>12:00 ~ 15:30</td>
                                  <td>R.3C</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td><a href="#">link</a></td>
                                  <td><a href="#">link</a></td>
                                  <td>Luring</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    IF1711
                                  </td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>I Putu Satwika M.Kom</td>
                                  <td>Rabu</td>
                                  <td>12:00 ~ 15:30</td>
                                  <td>R.3C</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td><a href="#">link</a></td>
                                  <td><a href="#">link</a></td>
                                  <td>Luring</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    IF1711
                                  </td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>I Putu Satwika M.Kom</td>
                                  <td>Rabu</td>
                                  <td>12:00 ~ 15:30</td>
                                  <td>R.3C</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td><a href="#">link</a></td>
                                  <td><a href="#">link</a></td>
                                  <td>Luring</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    IF1711
                                  </td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>I Putu Satwika M.Kom</td>
                                  <td>Rabu</td>
                                  <td>12:00 ~ 15:30</td>
                                  <td>R.3C</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td><a href="#">link</a></td>
                                  <td><a href="#">link</a></td>
                                  <td>Luring</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    IF1711
                                  </td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>I Putu Satwika M.Kom</td>
                                  <td>Rabu</td>
                                  <td>12:00 ~ 15:30</td>
                                  <td>R.3C</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td><a href="#">link</a></td>
                                  <td><a href="#">link</a></td>
                                  <td>Luring</td>
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
          <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div
              class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between"
            >
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-bold me-1">2022©</span>
                <a
                  href="https://primakara.ac.id"
                  target="_blank"
                  class="text-gray-800 text-hover-primary"
                  >STMIK Primakara</a
                >
              </div>
              <!--end::Copyright-->
              <!--begin::Menu-->
              <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                <li class="menu-item">
                  <a
                    href="https://www.primakara.ac.id/about-primakara"
                    target="_blank"
                    class="menu-link px-2"
                    >About</a
                  >
                </li>
                <li class="menu-item">
                  <a
                    href="#"
                    class="menu-link px-2"
                    >Support</a
                  >
                </li>
                <li class="menu-item">
                  <a
                    href="#"
                    class="menu-link px-2"
                    >Purchase</a
                  >
                </li>
              </ul>
              <!--end::Menu-->
            </div>
            <!--end::Container-->
          </div>
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