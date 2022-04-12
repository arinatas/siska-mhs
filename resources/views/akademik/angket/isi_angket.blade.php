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
                    Semester Genap 2021/2022
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
                      <!--begin::Kop Pedagogik-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        <div class="mb-5">
                          <!--begin::Title-->
                              <h3 class="fs-1x text-dark mb-6">
                                Kopetensi Pedagogik
                              </h3>
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
                              class="table  table-row-gray-300 align-middle gs-0 gy-4"
                            >
                              <!--begin::Table head-->
                              <thead>
                                <tr
                                  class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                >
                                  <th class="min-w-50px rounded-start">No</th>
                                  <th class="min-w-250px">Pertanyaan</th>
                                  <th class="min-w-50px rounded-end">Nilai Angket</th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
							              {{-- @foreach ($schedules as $schedule) --}}
                              <tbody class="border-bottom border">
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    <span>1</span>
                                  </td>
                                  <td>
                                  <span>Kesiapan memberikan kuliah dan/atau praktek/praktikum</span>
                                  </td>
                                  <td>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected>Pilih</option>
                                        <option value="1">Sangat Kurang</option>
                                        <option value="2">Kurang</option>
                                        <option value="3">Baik</option>
                                        <option value="4">Sangat Baik</option>
                                      </select>
                                  </td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td>
                                    <span>2</span>
                                  </td>
                                  <td>
                                  <span>Kesiapan memberikan kuliah dan/atau praktek/praktikum</span>
                                  </td>
                                  <td>
                                  nilai here
                                  </td>
                                </tr>
                              </tbody>
							                {{-- @endforeach --}}
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