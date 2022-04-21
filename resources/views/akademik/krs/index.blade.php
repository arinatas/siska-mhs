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
                        <div class="mb-15 d-flex justify-content-between">
                          <!--begin::Title-->
                          <h1 class="fs-1x text-dark mb-6">
                            Mata Kuliah Yang Diambil
                          </h1>
                          <div class="">
                            <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Ajukan</a>
                          </div>
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
                                  <th class="min-w-50px px-3 rounded-start">Matakuliah</th>
                                  <th class="min-w-150px">Dosen</th>
                                  <th class="min-w-100px">Waktu</th>
                                  <th class="min-w-50px">SKS/SMT</th>
                                  <th class="min-w-50px px-3 rounded-end">Action</th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              <tbody class="border-bottom border">
                                <tr
                                  class="text-center"
                                >
                                  <td align="left" class="px-5">
                                    Rekayasa Perangkat Lunak <br> (SI20S0301)
                                  </td>
                                  <td>
                                  A A Istri Ita Paramitha, S.Pd.,M.Kom.
                                  </td>
                                  <td>
                                  Senin, 13.01 - 15.00 <br> (R.3B)
                                  </td>
                                  <td>
                                    3/IV
                                  </td>
                                  <td>
                                    <a href="">
                                      <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    </a>
                                  </td>
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
                <!-- begin col -->
                <div class="col-xl-12">
                  <!-- begin table -->
                  <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-5 px-lg-19 py-lg-16">
                      <!--begin::Content main-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        <div class="mb-15 d-flex justify-content-between">
                          <!--begin::Title-->
                          <h1 class="fs-1x text-dark mb-6">
                            Mata Kuliah Yang Tersedia
                          </h1>
                          <div class="">
                            <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Submit</a>
                          </div>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <div>
                          <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                            <!--begin::Post-->
                            <div class="content flex-row-fluid" id="kt_content">
                              <!--begin::Toolbar-->
                              <div class="d-flex flex-wrap flex-stack pb-7">   
                                <!--begin::Controls-->
                                <div class="d-flex flex-wrap my-1">
                                  <!--begin::Actions-->
                                  <div class="d-flex my-0">
                                    <!--begin::Select-->
                                    <select name="status" data-control="select2" data-hide-search="true" data-placeholder="Export" class="form-select form-select-white form-select-sm w-150px">
                                      <option value="1">Semester 1</option>
                                      <option value="2">Semester 2</option>
                                      <option value="3">Semester 3</option>
                                      <option value="4">Semester 4</option>
                                      <option value="5">Semester 5</option>
                                      <option value="6">Semester 6</option>
                                      <option value="7">Semester 7</option>
                                      <option value="8">Semester 8</option>
                                    </select>
                                    <!--end::Select-->
                                    <!--begin::Select-->
                                    <select name="status" data-control="select2" data-hide-search="true" data-placeholder="Export" class="form-select form-select-white form-select-sm w-100px">
                                      <option value="1">Pagi</option>
                                      <option value="2">Malam</option>
                                    </select>
                                    <!--end::Select-->
                                  </div>
                                  <!--end::Actions-->
                                </div>
                                <!--begin:: Search-->
                                <div class="d-flex flex-wrap align-items-center my-1">
                                  <div class="d-flex align-items-center">
                                    <!--begin::Input group-->
                                    <div class="position-relative w-md-300px me-md-2">
                                      <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                      <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                          <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                          <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                      </span>
                                      <!--end::Svg Icon-->
                                      <input type="text" id="kt_filter_search" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" />
                                    </div>
                                    <!--end::Input group-->
                                  </div>
                                </div>
                                <!--end::Search-->
                                <!--end::Controls-->
                              </div>
                              <!--end::Toolbar-->
                              <!--begin::Tab Content-->
                              <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div id="kt_project_users_table_pane" class="tab-pane fade show active">
                                  <!--begin::Card-->
                                  <div class="card card-flush">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                      <!--begin::Table container-->
                                      <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table id="kt_project_users_table" class="table table-row-bordered table-row gy-4 align-middle fw-bolder">
                                          <!--begin::Head-->
                                          <thead class="fs-7 text-gray-700 text-uppercase">
                                            <tr>
                                              <th class="min-w-150px">Kode MK</th>
                                              <th class="min-w-250px">Matakuliah</th>
                                              <th class="min-w-50px">SKS</th>
                                              <th class="min-w-50px">Grade</th>
                                              <th class="min-w-50px">Bobot</th>
                                            </tr>
                                          </thead>
                                          <!--end::Head-->
                                          <!--begin::Body-->
                                          <tbody class="fs-6">
                                            @foreach ($transkrips as $transkrip)
                                            <tr>
                                              <td>
                                                {{ $transkrip->str_kd_mk }}
                                              </td>
                                              <td>
                                              {{ $transkrip->str_nm_mk }}
                                              </td>
                                              <td>
                                              {{ $transkrip->num_sks }}
                                              </td>
                                              @if($transkrip->grade == 'A' || $transkrip->grade == 'A-')
                                              <td>
                                                <span class="badge rounded-pill bg-success">{{ $transkrip->grade }}</span>
                                              </td>
                                              @elseif($transkrip->grade == 'B+' || $transkrip->grade == 'B' || $transkrip->grade == 'B-')
                                              <td>
                                                <span class="badge rounded-pill bg-primary">{{ $transkrip->grade }}</span>
                                              </td>
                                              @elseif($transkrip->grade == 'C+' || $transkrip->grade == 'C')
                                              <td>
                                                <span class="badge rounded-pill bg-warning">{{ $transkrip->grade }}</span>
                                              </td>
                                              @else
                                              <td>
                                                <span class="badge rounded-pill bg-danger">{{ $transkrip->grade }}</span>
                                              </td>
                                              @endif
                                              <td>
                                              {{ $transkrip->num_bobot }}
                                              </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                          <!--end::Body-->
                                        </table>
                                        <!--end::Table-->
                                      </div>
                                      <!--end::Table container-->
                                    </div>
                                    <!--end::Card body-->
                                  </div>
                                  <!--end::Card-->
                                </div>
                                <!--end::Tab pane-->
                              </div>
                              <!--end::Tab Content-->
                            </div>
                            <!--end::Post-->
                          </div>
                        </div>
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