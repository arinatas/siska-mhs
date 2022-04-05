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
                      <!--begin::Content main-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        <div class="mb-15">
                          <!--begin::Title-->
                          <form method="GET">
                            <div class="row"> 
                              <div class="col-lg-6">
                                <div class="btn-group">
                                  <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Tahun Ajaran</label>
                                    <select name="tahun" class="form-select" id="inputGroupSelect01">
                                      @foreach ($tahunAjar as $tahun)
                                      <option value="{{ $tahun }}">{{ $tahun }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="row">
                                  <div class="col-lg-10">
                                    <div class="btn-group">
                                      <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Semester</label>
                                        <select name="semester" class="form-select" id="inputGroupSelect01">
                                          @foreach ($semesters as $smt)
                                          <option value="{{ $smt }}">{{ $smt }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 text-end">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <div class="row text-center">
                            <div class="col-lg-6">
                                <div class="alert alert-primary" role="alert">
                                    SKS : <span class="badge badge-primary">23</span>
                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="alert alert-success" role="alert">
                                    IPS : <span class="badge badge-success">4</span>
                                  </div>
                            </div>
                        </div>
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
                                  <th class="min-w-50px rounded-start">No</th>
                                  <th class="min-w-150px">Kode MK</th>
                                  <th class="min-w-150px">Matakuliah</th>
                                  <th class="min-w-50px">SKS</th>
                                  <th class="min-w-50px">Nilai</th>
                                  <th class="min-w-50px rounded-end">Grade</th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              <tbody class="border-bottom border-dashed">
                                <tr
                                  class="text-center"
                                >
                                  <td class="" >1</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>3</td>
                                  <td>A</td>
                                  <td>4.00</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td class="" >1</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>3</td>
                                  <td>A</td>
                                  <td>4.00</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td class="" >1</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>3</td>
                                  <td>A</td>
                                  <td>4.00</td>
                                </tr>
                                <tr
                                  class="text-center"
                                >
                                  <td class="" >1</td>
                                  <td>REK-ITA-P0120-si</td>
                                  <td>Rekayasa Perangkat Lunak</td>
                                  <td>3</td>
                                  <td>A</td>
                                  <td>4.00</td>
                                </tr>
                                
                              </tbody>
                              <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                          </div>
                          <!--end::Table container-->
                        </div>
                        <!--end::Table-->
                        <!-- printbtn -->
                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary">Print</button>
                            </div>
                        </div>
                        <!-- end printbtn -->
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