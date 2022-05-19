@extends('layouts.main')

@section('container')

<script>
  function NeutralComment()
  {
    document.getElementById("komentar").value= 'Tidak ada komentar.';
  }
  function PositiveComment()
  {
    document.getElementById("komentar").value= 'Dosen mengajar sudah baik.';
  }
  function submitForm(form) {
    Swal.fire({
      title: 'Apakah kamu yakin?',
      text: "Data yang telah diisi tidak bisa diubah lagi!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
    return false;
  }
  
</script>

  <!--begin::Body-->
  <body
    id="kt_body"
    style="background-image: url(/assets/media/patterns/header-bg.jpg);"
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
                      {{-- ket --}}
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
														<h3 class="text-gray-900 fw-bolder">Kriteria Penilaian</h3>
														<div class="fs-6 badge bg-info m-1">  <b>1 {!! "&nbsp;" !!}:{!! "&nbsp;" !!} Sangat Kurang</b></div>
														<div class="fs-6 badge bg-info m-1">  <b>2 {!! "&nbsp;" !!}:{!! "&nbsp;" !!} Kurang</b> </div>
														<div class="fs-6 badge bg-info m-1">  <b>3 {!! "&nbsp;" !!}:{!! "&nbsp;" !!} Baik</b></div>
														<div class="fs-6 badge bg-info m-1">  <b>4 {!! "&nbsp;" !!}:{!! "&nbsp;" !!} Sangat Baik</b></div>
														<br />
													</div>
													<!--end::Content-->
												</div>
												<!--end::Wrapper-->
											</div>
                      <!--begin::Kop Pedagogik-->
                      <div class="mb-14">
                        <!--begin::Heading-->
                        {{-- <div class="mb-5">
                          <!--begin::Title-->
                              <h3 class="fs-1x text-dark mb-6">
                                Kopetensi Pedagogik
                              </h3>
                          <!--end::Title-->
                        </div> --}}
                        <!--end::Heading-->
                        <!--begin::Body-->
                        <!--begin::Form-->
                        <form action="/angket" method="POST" onsubmit="return submitForm(this);">
                          @csrf
                          <div class="mb-14">
                            <!--begin::Table container-->
                            <div class="table-responsive mb-3">
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
                                    <th class="min-w-100px">Pertanyaan</th>
                                    <th class="min-w-50px rounded-end">Nilai Angket</th>
                                  </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                {{-- <tbody class="border-bottom border">
                                  <tr
                                    class="text-center"
                                  >
                                    <td>
                                      <span>{{ $tableNumber++ }}</span>
                                    </td>
                                    <td align="left" style="padding-left: 20px">
                                    <b>{{ $pertanyaanLists[0]->pertanyaan }}</b>
                                    </td>
                                    <div class="mb-14">
                                    <td>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="skorPertanyaanID.{{ $pertanyaanLists[0]->id_pertanyaan }}" id="inlineRadio1" value="1" required>
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                      </div>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="skorPertanyaanID.{{ $pertanyaanLists[0]->id_pertanyaan }}" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                      </div>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="skorPertanyaanID.{{ $pertanyaanLists[0]->id_pertanyaan }}" id="inlineRadio3" value="3">
                                        <label class="form-check-label" for="inlineRadio3">3</label>
                                      </div>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="skorPertanyaanID.{{ $pertanyaanLists[0]->id_pertanyaan }}" id="inlineRadio4" value="4">
                                        <label class="form-check-label" for="inlineRadio4">4</label>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody> --}}
                                @foreach ($pertanyaanLists as $pertanyaan)
                                <tbody class="border-bottom border">
                                  <tr
                                    class="text-center"
                                  >
                                    <td>
                                      <span>{{ $tableNumber++ }}</span>
                                    </td>
                                    <td align="left" style="padding-left: 20px">
                                    <b>{{ $pertanyaan->pertanyaan }}</b>
                                    </td>
                                    <div class="mb-14">
                                    <td>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="{{ $pertanyaan->id_pertanyaan }}" id="inlineRadio1" value="1" required>
                                        <label class="form-check-label" for="inlineRadio1">1</label>
                                      </div>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="{{ $pertanyaan->id_pertanyaan }}" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">2</label>
                                      </div>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="{{ $pertanyaan->id_pertanyaan }}" id="inlineRadio3" value="3">
                                        <label class="form-check-label" for="inlineRadio3">3</label>
                                      </div>
                                      <div class="form-check form-check-inline m-2">
                                        <input class="form-check-input" type="radio" name="{{ $pertanyaan->id_pertanyaan }}" id="inlineRadio4" value="4">
                                        <label class="form-check-label" for="inlineRadio4">4</label>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                                @endforeach
                                <!--end::Table body-->
                                <input type="hidden" name="nim" value="{{ auth()->user()->username }}">
                                <input type="hidden" name="id_mk" value="{{ $dataAngket[0]->str_kd_mk }}">
                                <input type="hidden" name="tahun_ajaran" value="{{ $dataAngket[0]->str_thn_ajaran }}">
                                <input type="hidden" name="semester" value="{{ $dataAngket[0]->bol_semester }}">
                                <input type="hidden" name="id_dosen" value="{{ $dataAngket[0]->str_id_kad }}">
                                <input type="hidden" name="id_prodi" value="{{ $dataAngket[0]->str_kd_prodi }}">
                                <input type="hidden" name="id_kelas" value="{{ $dataAngket[0]->int_kd_kelas }}">
                                <input type="hidden" name="id_perkuliahan" value="{{ $dataAngket[0]->int_kd_perkuliahan_d }}">
                              </table>
                              <!--end::Table-->
                            </div>
                            
                            <div class="form-floating">
                              <textarea name="komentar" class="form-control" placeholder="Leave a comment here" id="komentar" style="height: 100px" required></textarea>
                              <label for="komentar">Kritik & Saran</label>
                            </div>
                            <div class="dflex mt-2" style="margin-left: 10px">
                              <span type="button" onclick="NeutralComment()" class="badge rounded-pill bg-primary">Tidak ada kritik.</span>
                              <span style="margin-left: 3px" type="button" onclick="PositiveComment()" class="badge rounded-pill bg-success">Dosen mengajar sudah baik.</span>
                            </div>
                            <div class="row mt-3">
                                <div class="col text-end">
                                  <!-- Button trigger modal -->
                                  {{-- <button type="submit" style="background-color: #003764" class="btn btn-outline-light text-light font-weight-bold px-9 py-4">Submit</button> --}}
                                  <button type="submit" style="background-color: #003764" class="btn btn-outline-light text-light font-weight-bold px-9 py-4">Submit</button>
                                </div>
                            </div>
                            <!--end::Table container-->
                          </div>
                        </form>
                        <!--end::Form-->
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