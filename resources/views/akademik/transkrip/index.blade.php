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
                          <h1 class="fs-2x text-dark mb-6">
                            Daftar Mata Kuliah
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
                              class="table  table-row-gray-300 align-middle gs-0 gy-4"
                            >
                              <!--begin::Table head-->
                              <thead>
                                <tr
                                  class="fw-bolder fs-6 text-gray-800 text-center border-0 bg-light"
                                >
                                  <th class="min-w-70px px-3 rounded-start">Kode MK</th>
                                  <th class="min-w-150px">Matakuliah</th>
                                  <th class="min-w-50px">SKS</th>
                                  <th class="min-w-50px">Grade</th>
                                  <th class="min-w-70px px-3 rounded-end">Total Nilai</th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->
                              @foreach ($transkrips as $transkrip)
                              <tbody class="border-bottom border">
                                <tr
                                  class="text-center"
                                >
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
                                  {{ $transkrip->totnilai }}
                                  </td>
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