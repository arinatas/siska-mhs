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
                  @if ($selectedSmt && $selectedTahun != null)
                  <li class="breadcrumb-item text-white opacity-75">
                    <span class="badge rounded-pill bg-light text-dark">{{ $selectedSmt }} {{ $selectedTahun }}</span>
                  </li>
                  @endif
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
                              <div class="d-flex my-1 justify-content-end">
                                <!--begin::Actions-->
                                <div class="d-flex my-0">
                                  <!--begin::Select-->
                                  <select name="tahun" data-control="tahun" data-hide-search="true" data-placeholder="Tahun Ajaran" class="form-select form-select-white form-select-sm w-150px">
                                    <option value="" selected>Tahun Ajaran</option>
                                      @foreach ($tahunAjar as $tahun)
                                      <option value="{{ $tahun }}" {{ ($tahun == $selectedTahun) ? 'selected' : ''}}>{{ $tahun }}</option>
                                      @endforeach
                                  </select>
                                  <!--end::Select-->
                                  <!--begin::Select-->
                                  <select name="semester" value="{{ old('semester') }}" data-control="semester" data-hide-search="true" data-placeholder="Semester" class="form-select form-select-white form-select-sm w-110px">
                                    <option value="" selected>Semester</option>
                                          @foreach ($semesters as $smt)
                                          <option value="{{ $smt }}" {{ ($smt == $selectedSmt) ? 'selected' : ''}}>{{ $smt }}</option>
                                          @endforeach
                                  </select>
                                  <!--end::Select-->
                                  <div class="d-flex">
                                    <button class="btn btn-sm btn-primary me-3" type="submit">Cari</button>
                                  </div>
                                </div>
                                <!--end::Actions-->
                              </div>
                            </div>
                          </form>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <div class="row text-center">
                            <div class="col-lg-4">
                                <div class="alert alert-info" role="alert">
                                    Semester : <span class="badge badge-info">{{ $semesterText }}</span>
                                  </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="alert alert-primary" role="alert">
                                    SKS : <span class="badge badge-primary">{{ array_sum($allSks) }}</span>
                                  </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="alert alert-success" role="alert">
                                    IPS : <span class="badge badge-success">{{ number_format($totalIps, 2)}}</span>
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
                                  <th class="min-w-100px">Kode MK</th>
                                  <th class="min-w-150px">Matakuliah</th>
                                  <th class="min-w-50px">SKS</th>
                                  <th class="min-w-50px">Grade</th>
                                  <th class="min-w-50px rounded-end">Nilai</th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              @foreach ($khs as $value)
                              <tbody class="border-bottom border">
                                <tr
                                  class="text-center"
                                >
                                  <td>{{ $totalMatkul++ }}</td>
                                  <td>{{ $value->str_kd_mk }}</td>
                                  <td>{{ $value->str_nm_mk }}</td>
                                  <td>{{ $value->num_sks }}</td>
                                  @if($value->str_na == 'A' || $value->str_na == 'A-')
                                  <td>
                                    <span class="badge rounded-pill bg-success">{{ $value->str_na }}</span>
                                  </td>
                                  @elseif($value->str_na == 'B+' || $value->str_na == 'B' || $value->str_na == 'B-')
                                  <td>
                                    <span class="badge rounded-pill bg-primary">{{ $value->str_na }}</span>
                                  </td>
                                  @elseif($value->str_na == 'C+' || $value->str_na == 'C')
                                  <td>
                                    <span class="badge rounded-pill bg-warning">{{ $value->str_na }}</span>
                                  </td>
                                  @else
                                  <td>
                                    <span class="badge rounded-pill bg-danger">{{ $value->str_na }}</span>
                                  </td>
                                  @endif
                                  <td>{{ $value->num_bobot }}</td>
                                </tr>
                              </tbody>
                              @endforeach
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
                                <button type="button" class="btn btn-primary disabled">Print</button>
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