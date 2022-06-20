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
                        {{-- user --}}
                        <!-- begin col -->
                        <div class="col-xl-12">
                          <!-- begin table -->
                          <div class="card">
                            <!--begin::Body-->
                            <div class="card mb-5 mb-xl-10">
                              <div class="card-body pt-9 pb-0">
                                <!--begin::Details-->
                                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                  <!--begin: Pic-->
                                  <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                      <img src="/assets/media/avatars/blank.png" alt="image" />
                                      <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                    </div>
                                  </div>
                                  <!--end::Pic-->
                                  <!--begin::Info-->
                                  <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                      <!--begin::User-->
                                      <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                          <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ auth()->user()->display_name }}</a>
                                          
                                          @if ($mahasiswa[0]->status_aktif == "aktif")
                                          <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ $mahasiswa[0]->status_aktif }}</a>
                                          @elseif ($mahasiswa[0]->status_aktif == "cuti")
                                          <a href="#" class="btn btn-sm btn-light-warning fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ $mahasiswa[0]->status_aktif }}</a>
                                          @elseif ($mahasiswa[0]->status_aktif == "lulus")
                                          <a href="#" class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ $mahasiswa[0]->status_aktif }}</a>
                                          @else
                                          <a href="#" class="btn btn-sm btn-light-danger fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ $mahasiswa[0]->status_aktif }}</a>
                                          @endif
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                          <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                          
                                          <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                              <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                              <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                            </svg>
                                          </span>
                                          <!--end::Svg Icon-->{{ auth()->user()->username }}</a>
                                          <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                          
                                          <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" cx="12" cy="12" r="8"/>
                                            </g>
                                          </svg><!--end::Svg Icon--></span>
                                          <!--end::Svg Icon-->{{ $mahasiswa[0]->str_nm_prodi; }}</a>
                                          <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                          <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M7.5,4 L7.5,19 L16.5,19 L16.5,4 L7.5,4 Z M7.71428571,2 L16.2857143,2 C17.2324881,2 18,2.8954305 18,4 L18,20 C18,21.1045695 17.2324881,22 16.2857143,22 L7.71428571,22 C6.76751186,22 6,21.1045695 6,20 L6,4 C6,2.8954305 6.76751186,2 7.71428571,2 Z" fill="#000000" fill-rule="nonzero"/>
                                                <polygon fill="#000000" opacity="0.3" points="7.5 4 7.5 19 16.5 19 16.5 4"/>
                                            </g>
                                            </svg>
                                          </span>
                                          <!--end::Svg Icon-->+{{ auth()->user()->phone }}</a>
                                        </div>
                                        <!--end::Info-->
                                      </div>
                                      <!--end::User-->

                                    </div>
                                    <!--end::Title-->
                                    <!--KHS Section-->
                                    <div class="row text-center">
                                      <div class="col-md-4">
                                          <div class="alert alert-info" role="alert">
                                              Semester : <span class="badge badge-info">{{ $semesterText }}</span>
                                            </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="alert alert-primary" role="alert">
                                              SKS : <span class="badge badge-primary">{{ array_sum($allSks) }}</span>
                                            </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="alert alert-success" role="alert">
                                              IPS : <span class="badge badge-success">{{ number_format($totalIps, 2)}}</span>
                                            </div>
                                      </div>
                                      <div class="">
                                        <form method="GET">
                                          <div class="row">
                                            <div class="d-flex my-1 justify-content-end">
                                              <!--begin::Actions-->
                                              <div class="d-flex my-0">
                                                <!--begin::Select-->
                                                <select name="tahun" data-control="tahun" data-hide-search="true" data-placeholder="Tahun" class="form-select form-select-white form-select-sm w-150px">
                                                  <option value="" selected>Tahun</option>
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
                                      </div>
                                    </div>
                                    <!--end::Stats-->
                                  </div>
                                  <!--end::Info-->
                                </div>
                                <!--end::Details-->
                              </div>
                            </div>
                            <!--end::Body-->
                          </div>
                          <!-- end table -->
                        </div>
                        <!-- end col -->
                        @if ($selectedTahun && $semesterText)
                        <!--begin::Table-->
                        <div class="mb-14">
                          <!--begin::Table container-->
                          <div class="table-responsive">
                            {{-- cek kalo data tidak ada --}}
                            @if($khs)
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
                                  <th class="min-w-100px">Matakuliah & Kode MK</th>
                                  <th class="min-w-50px">Tugas</th>
                                  <th class="min-w-50px">Keaktifan</th>
                                  <th class="min-w-50px">UTS</th>
                                  <th class="min-w-50px">UAS</th>
                                  <th class="min-w-50px">SKS</th>
                                  <th class="min-w-50px">Bobot</th>
                                  <th class="min-w-50px rounded-end">Grade</th>
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
                                    <td>{{ $value["matkul"] }} <b>({{ $value["kode_mk"] }})</b></td>
                                    <td>{{ (int)$value["Tugas"] }}</td>
                                    <td>{{ (int)$value["Keaktifan"] }}</td>
                                    <td>{{ (int)$value["UTS"] }}</td>
                                    <td>{{ (int)$value["UAS"] }}</td>
                                    <td>{{ $value["sks"] }}</td>
                                    <td>{{ $value["bobot"] }}</td>
                                    @if($value["grade"] == 'A' || $value["grade"] == 'A-')
                                    <td>
                                      <span class="badge rounded-pill bg-success">{{ $value["grade"] }}</span>
                                    </td>
                                    @elseif($value["grade"] == 'B+' || $value["grade"] == 'B' || $value["grade"] == 'B-')
                                    <td>
                                      <span class="badge rounded-pill bg-primary">{{ $value["grade"] }}</span>
                                    </td>
                                    @elseif($value["grade"] == 'C+' || $value["grade"] == 'C')
                                    <td>
                                      <span class="badge rounded-pill bg-warning">{{ $value["grade"] }}</span>
                                    </td>
                                    @else
                                    <td>
                                      <span class="badge rounded-pill bg-danger">{{ $value["grade"] }}</span>
                                    </td>
                                    @endif
                                    
                                  </tr>
                                </tbody>
                                @endforeach
                                <!--end::Table body-->

                            </table>
                            <!--end::Table-->
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
                                  <h4 class="text-gray-900 fw-bolder">Data KHS tidak ditemukan</h4>
                                  <div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, kamu mungkin tidak mengambil KRS pada tahun ajaran ini.
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
                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary disabled">Print</button>
                            </div>
                        </div>
                        <!--End KHS Section-->
                        @endif
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