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
                                      <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin:Action-->
                                    <div class="d-flex align-items-center">
                                      <button type="submit" class="btn btn-primary me-5">Search</button>
                                    </div>
                                    <!--end:Action-->
                                  </div>
                                </div>
                                <!--end::Search-->
                                <!--end::Controls-->
                              </div>
                              <!--end::Toolbar-->
                              <!--begin::Tab Content-->
                              <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div id="kt_project_users_card_pane" class="tab-pane fade">
                                  <!--begin::Row-->
                                  <div class="row g-6 g-xl-9">
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="assets/media//avatars/150-3.jpg" alt="image" />
                                            <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Karina Clark</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <span class="symbol-label fs-2x fw-bold text-primary bg-light-primary">S</span>
                                            <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Sean Bean</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Developer at Loop Inc</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="assets/media//avatars/150-2.jpg" alt="image" />
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Alan Johnson</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Web Designer at Nextop Ltd.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="assets/media//avatars/150-11.jpg" alt="image" />
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Robert Doe</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Marketing Analytic at Avito Ltd.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="assets/media//avatars/150-1.jpg" alt="image" />
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Olivia Wild</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Art Director at Seal Inc.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <span class="symbol-label fs-2x fw-bold text-warning bg-light-warning">A</span>
                                            <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Adam Williams</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">System Arcitect at Wolto Co.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <span class="symbol-label fs-2x fw-bold text-info bg-light-info">P</span>
                                            <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Peter Marcus</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <span class="symbol-label fs-2x fw-bold text-success bg-light-success">N</span>
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Neil Owen</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Accountant at Numbers Co.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 col-xxl-4">
                                      <!--begin::Card-->
                                      <div class="card">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                          <!--begin::Avatar-->
                                          <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="assets/media//avatars/150-7.jpg" alt="image" />
                                          </div>
                                          <!--end::Avatar-->
                                          <!--begin::Name-->
                                          <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Benjamin Jacob</a>
                                          <!--end::Name-->
                                          <!--begin::Position-->
                                          <div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
                                          <!--end::Position-->
                                          <!--begin::Info-->
                                          <div class="d-flex flex-center flex-wrap">
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$14,560</div>
                                              <div class="fw-bold text-gray-400">Earnings</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">23</div>
                                              <div class="fw-bold text-gray-400">Tasks</div>
                                            </div>
                                            <!--end::Stats-->
                                            <!--begin::Stats-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                              <div class="fs-6 fw-bolder text-gray-700">$236,400</div>
                                              <div class="fw-bold text-gray-400">Sales</div>
                                            </div>
                                            <!--end::Stats-->
                                          </div>
                                          <!--end::Info-->
                                        </div>
                                        <!--end::Card body-->
                                      </div>
                                      <!--end::Card-->
                                    </div>
                                    <!--end::Col-->
                                  </div>
                                  <!--end::Row-->
                                  <!--begin::Pagination-->
                                  <div class="d-flex flex-stack flex-wrap pt-10">
                                    <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
                                    <!--begin::Pages-->
                                    <ul class="pagination">
                                      <li class="page-item previous">
                                        <a href="#" class="page-link">
                                          <i class="previous"></i>
                                        </a>
                                      </li>
                                      <li class="page-item active">
                                        <a href="#" class="page-link">1</a>
                                      </li>
                                      <li class="page-item">
                                        <a href="#" class="page-link">2</a>
                                      </li>
                                      <li class="page-item">
                                        <a href="#" class="page-link">3</a>
                                      </li>
                                      <li class="page-item">
                                        <a href="#" class="page-link">4</a>
                                      </li>
                                      <li class="page-item">
                                        <a href="#" class="page-link">5</a>
                                      </li>
                                      <li class="page-item">
                                        <a href="#" class="page-link">6</a>
                                      </li>
                                      <li class="page-item next">
                                        <a href="#" class="page-link">
                                          <i class="next"></i>
                                        </a>
                                      </li>
                                    </ul>
                                    <!--end::Pages-->
                                  </div>
                                  <!--end::Pagination-->
                                </div>
                                <!--end::Tab pane-->
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
                                          <thead class="fs-7 text-gray-400 text-uppercase">
                                            <tr>
                                              <th class="min-w-250px">Manager</th>
                                              <th class="min-w-150px">Date</th>
                                              <th class="min-w-90px">Amount</th>
                                              <th class="min-w-90px">Status</th>
                                              <th class="min-w-50px text-end">Details</th>
                                            </tr>
                                          </thead>
                                          <!--end::Head-->
                                          <!--begin::Body-->
                                          <tbody class="fs-6">
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Emma Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">e.smith@kpmg.com.au</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jul 25, 2021</td>
                                              <td>$731.00</td>
                                              <td>
                                                <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Melody Macy</a>
                                                    <div class="fw-bold fs-6 text-gray-400">melody@altbox.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 20, 2021</td>
                                              <td>$640.00</td>
                                              <td>
                                                <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Max Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">max@kt.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>May 05, 2021</td>
                                              <td>$515.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Sean Bean</a>
                                                    <div class="fw-bold fs-6 text-gray-400">sean@dellito.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Feb 21, 2021</td>
                                              <td>$788.00</td>
                                              <td>
                                                <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Brian Cox</a>
                                                    <div class="fw-bold fs-6 text-gray-400">brian@exchange.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Dec 20, 2021</td>
                                              <td>$432.00</td>
                                              <td>
                                                <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Mikaela Collins</a>
                                                    <div class="fw-bold fs-6 text-gray-400">mikaela@pexcom.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 24, 2021</td>
                                              <td>$946.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-8.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Francis Mitcham</a>
                                                    <div class="fw-bold fs-6 text-gray-400">f.mitcham@kpmg.com.au</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Nov 10, 2021</td>
                                              <td>$598.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Olivia Wild</a>
                                                    <div class="fw-bold fs-6 text-gray-400">olivia@corpmail.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Aug 19, 2021</td>
                                              <td>$668.00</td>
                                              <td>
                                                <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Neil Owen</a>
                                                    <div class="fw-bold fs-6 text-gray-400">owen.neil@gmail.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 20, 2021</td>
                                              <td>$460.00</td>
                                              <td>
                                                <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Sep 22, 2021</td>
                                              <td>$804.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Emma Bold</a>
                                                    <div class="fw-bold fs-6 text-gray-400">emma@intenso.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Feb 21, 2021</td>
                                              <td>$443.00</td>
                                              <td>
                                                <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-7.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Ana Crown</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ana.cf@limtel.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 24, 2021</td>
                                              <td>$743.00</td>
                                              <td>
                                                <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Robert Doe</a>
                                                    <div class="fw-bold fs-6 text-gray-400">robert@benko.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Feb 21, 2021</td>
                                              <td>$933.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-17.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">John Miller</a>
                                                    <div class="fw-bold fs-6 text-gray-400">miller@mapple.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Sep 22, 2021</td>
                                              <td>$629.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Lucy Kunic</a>
                                                    <div class="fw-bold fs-6 text-gray-400">lucy.m@fentech.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Apr 15, 2021</td>
                                              <td>$772.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-10.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Ethan Wilder</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ethan@loop.com.au</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Oct 25, 2021</td>
                                              <td>$453.00</td>
                                              <td>
                                                <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Sean Bean</a>
                                                    <div class="fw-bold fs-6 text-gray-400">sean@dellito.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Oct 25, 2021</td>
                                              <td>$465.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-7.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Ana Crown</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ana.cf@limtel.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Oct 25, 2021</td>
                                              <td>$447.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Lucy Kunic</a>
                                                    <div class="fw-bold fs-6 text-gray-400">lucy.m@fentech.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Aug 19, 2021</td>
                                              <td>$689.00</td>
                                              <td>
                                                <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Sean Bean</a>
                                                    <div class="fw-bold fs-6 text-gray-400">sean@dellito.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Nov 10, 2021</td>
                                              <td>$525.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Nov 10, 2021</td>
                                              <td>$518.00</td>
                                              <td>
                                                <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Emma Bold</a>
                                                    <div class="fw-bold fs-6 text-gray-400">emma@intenso.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Dec 20, 2021</td>
                                              <td>$978.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Emma Bold</a>
                                                    <div class="fw-bold fs-6 text-gray-400">emma@intenso.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Mar 10, 2021</td>
                                              <td>$833.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Oct 25, 2021</td>
                                              <td>$959.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Mikaela Collins</a>
                                                    <div class="fw-bold fs-6 text-gray-400">mikaela@pexcom.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>May 05, 2021</td>
                                              <td>$918.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Emma Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">e.smith@kpmg.com.au</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Aug 19, 2021</td>
                                              <td>$538.00</td>
                                              <td>
                                                <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                    <!--end::Online-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Neil Owen</a>
                                                    <div class="fw-bold fs-6 text-gray-400">owen.neil@gmail.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 20, 2021</td>
                                              <td>$859.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 20, 2021</td>
                                              <td>$574.00</td>
                                              <td>
                                                <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Dan Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Jun 24, 2021</td>
                                              <td>$960.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                  <!--begin::Wrapper-->
                                                  <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                      <img alt="Pic" src="assets/media/avatars/150-8.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                  </div>
                                                  <!--end::Wrapper-->
                                                  <!--begin::Info-->
                                                  <div class="d-flex flex-column justify-content-center">
                                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">Francis Mitcham</a>
                                                    <div class="fw-bold fs-6 text-gray-400">f.mitcham@kpmg.com.au</div>
                                                  </div>
                                                  <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                              </td>
                                              <td>Mar 10, 2021</td>
                                              <td>$953.00</td>
                                              <td>
                                                <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                              </td>
                                              <td class="text-end">
                                                <a href="#" class="btn btn-light btn-sm">View</a>
                                              </td>
                                            </tr>
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