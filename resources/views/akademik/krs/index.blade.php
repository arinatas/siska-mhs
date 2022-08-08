@extends('layouts.main')

@section('container')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
	// function romanize (num) {
	// 	if (isNaN(num))
	// 		return NaN;
	// 	var digits = String(+num).split(""),
	// 		key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
	// 			"","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
	// 			"","I","II","III","IV","V","VI","VII","VIII","IX"],
	// 		roman = "",
	// 		i = 3;
	// 	while (i--)
	// 		roman = (key[+digits.pop() + (i * 10)] || "") + roman;
	// 	return Array(+digits.join("") + 1).join("M") + roman;
	// }

	function deleteIrs(form) {
		Swal.fire({
		title: 'Hapus Kelas ?',
		text: "Yakin ingin menghapus kelas yang telah diambil ?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya',
		cancelButtonText: 'Tidak',
		reverseButtons: true
		}).then((result) => {
		if (result.isConfirmed) {
			const element = document.getElementById("IrsTable");
   			element.classList.add("disabledbutton");
			//mengubah data yang di dapat dari form ke bentuk object
			var unindexed_array = $( form ).serializeArray();
			var indexed_array = {};
			$.map(unindexed_array, function(n, i){
				indexed_array[n['name']] = n['value'];
			});
			// post api with ajax
			$.ajax({
				// url: "http://localhost:8000/remove_irs.php",
				url: "/irsDel",
				method: "POST",
				data: indexed_array,
				dataType:'json',
				success: function (response) {
					if (response.status == false){
						Swal.fire(
						'Gagal!',
						response.message,
						'error'
						)
						$.get("{{ URL::to('getIrs') }}", function(data){
							$('#listIrsMhs').empty().html(data);
						});
						element.classList.remove("disabledbutton");
					} else {
						Swal.fire(
						'Berhasil!',
						response.message,
						'success'
						)
						$.get("{{ URL::to('getIrs') }}", function(data){
							$('#listIrsMhs').empty().html(data);
						});
						element.classList.remove("disabledbutton");
					}
				},
				error: function(error){
					console.log("Something went wrong", error);
				}

			});

  			event.preventDefault();
		}
		});
		return false;
	}

	function addIrsMhs(form) {
		
		Swal.fire({
		title: 'Ambil Kelas ?',
		text: "Sudah yakin ingin mengambil kelas ini ?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya',
		cancelButtonText: 'Tidak',
		reverseButtons: true
		}).then((result) => {
		if (result.isConfirmed) {
			const element = document.getElementById("kt_project_users_table");
   			element.classList.add("disabledbutton");
			//mengubah data yang di dapat dari form ke bentuk object
			var unindexed_array = $( form ).serializeArray();
			var indexed_array = {};
			$.map(unindexed_array, function(n, i){
				indexed_array[n['name']] = n['value'];
			});
			// post api with ajax
			$.ajax({
				// url: "http://localhost:8000/post_irs.php",
				url: "/irsAdd",
				method: "POST",
				data: indexed_array,
				dataType:'json',
				success: function (response) {
					if (response.status == false){
						Swal.fire(
						'Gagal!',
						response.message,
						'error'
						)
						$.get("{{ URL::to('getIrs') }}", function(data){
							$('#listIrsMhs').empty().html(data);
						});
						element.classList.remove("disabledbutton");
					} else {
						Swal.fire(
						'Berhasil!',
						response.message,
						'success'
						)
						$.get("{{ URL::to('getIrs') }}", function(data){
							$('#listIrsMhs').empty().html(data);
						});
						element.classList.remove("disabledbutton");
					}
				},
				error: function(error){
					console.log("Something went wrong", error);
				}
			});
  			event.preventDefault();
		}
		});
		return false;
	}


	$(function() {
		//reload table di matakuliah yang di ambil
		$.get("{{ URL::to('getIrs') }}", function(data){
			$('#listIrsMhs').empty().html(data);
		});
		//ajax
			// $('#IrsTable').dataTable();
			// $.ajax({
			// 	url: "http://localhost:8000/get_irs.php?nim={{ $nim }}",
			// 	method: "GET",
			// 	crossDomain: true,
			// 	dataType: "json",
			// 	headers: {
			//       "accept": "application/json",
			// 	  "x-requested-with":"XMLHttpRequest"
			//   	},
			// 	success: function(data) {
			// 		// bindtoDatatable(data);
					
			// 		// using with foreach
			// 		// var html = '';
			// 		// $.each(data, function(index, value){
			// 		// 	html += `<tr>\
			// 		// 	<td>`+value.str_nm_mk+`<br><b>(`+value.str_kd_mk+`)</b></td>\
			// 		// 	<td>`+value.str_nm_kad+`</td>\
			// 		// 	<td>`+value.str_nama_hari+`,&nbsp`+value.awal+`-`+value.akhir+`<br><b>(`+value.str_nm_ruang+`)</b></td>\
			// 		// 	<td>`+value.num_sks+`&nbsp;&nbsp;(`+ romanize(value.num_kd_semester)+`)</td>\
			// 		// 	<td> <a href="/irsDel/`+value.int_kd_perkuliahan_d+`"><i class="bi bi-trash3-fill text-danger fs-1"></i></a></td>\
			// 		// 	</tr>`;
			// 		// 	$("#listIrsMhs").html(html);
			// 		// });
			// 	}
			// });
    });
</script>

	{{-- swall faiyah --}}
		{{-- @if (\Session::has('irsDeletedSuccess'))
			<script>
				Swal.fire(
				'Berhasil!',
				'{!! \Session::get('irsDeletedSuccess') !!}',
				'success'
				)
			</script>
		@endif

		@if (\Session::has('irsAddesSuccess'))
		<script>
			Swal.fire(
			'Berhasil!',
			'{!! \Session::get('irsAddesSuccess') !!}',
			'success'
			)
		</script>
		@endif --}}
	{{-- swall faiyah end --}}

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
                      <div class="container">
                        <!--begin::Heading-->
                        <div class="my-5 d-flex justify-content-between">
                          <!--begin::Title-->
                          <h1 class="fs-1x text-dark" style="margin: 0">
                            Mata Kuliah Yang Diambil
                          </h1>
                          <div class="">
                            {{-- <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" id="kt_drawer_chat_toggle">Ajukan</a> --}}
							{{-- <a href="#" class="btn btn-sm btn-light-primary fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Approve</a> --}}
                          </div>
                          <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Body-->
							<!--begin::Table-->
							<div class="" id="listIrsMhs">
								{{-- ajax here --}}
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
                        <div>
                          {{-- <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl"> --}}
                          <div id="" class="d-flex flex-column-fluid align-items-start container-xxl">
                            <!--begin::Post-->
                            <div class="content flex-row-fluid" id="kt_content">
                              <!--begin::Toolbar-->
                              <div class="d-flex flex-wrap flex-stack pb-5">   
                                <!--begin::Controls-->
                                <div class="d-flex flex-wrap my-1">
                                  <!--begin::Actions-->
                                  <div class="d-flex my-0">
                                    <!--begin::Select-->
                                    <h1 class="fs-1x text-dark" style="margin: 0">
										Mata Kuliah Yang Tersedia
									  </h1>
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
							  @if ($statusPembayaran->status == true)	  
							  <div class="text-center">
								  <div class="alert alert-info" role="alert">
								  <b>Refresh page untuk mengetahui sisa kuota kelas</b>
								  </div>
							  </div>
							  @endif
                              <!--end::Toolbar-->
                              <!--begin::Tab Content-->
                              <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div id="kt_project_users_table_pane" class="tab-pane fade show active">
                                  <!--begin::Card-->
                                  <div class="card card-flush">
                                    <!--begin::Card body-->
                                    <div class="">
                                      <!--begin::Table container-->
                                      <div class="table-responsive">
										{{-- cek jika belum bayar, tidak tampil list matakuliah --}}
										@if ($statusPembayaran->status == false)
											<div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6 mt-5">
												<!--begin::Icon-->
												<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
												<span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
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
												<h4 class="text-gray-900 fw-bolder">Pembayaran Belum Terpenuhi</h4>
												<div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, {{ $statusPembayaran->message }}
												<br />
												{{-- <a class="fw-bolder" href="#">Learn more</a> --}}
												</div>
												</div>
												<!--end::Content-->
												</div>
												<!--end::Wrapper-->
											</div>
										@else
											@if ($irsLists[0])
											<!--begin::Table-->
											<table id="kt_project_users_table" class="table table-row-bordered table-row gy-4 align-middle fw-bolder">
												<!--begin::Head-->
												<thead class="fs-7 text-gray-700 text-uppercase">
												<tr>
													<th class="min-w-150">Dosen</th>
													<th class="min-w-150px">Matakuliah</th>
													<th class="min-w-150">Waktu & Ruangan</th>
													<th class="min-w-50px">SKS & Semester</th>
													<th class="min-w-10px">Kuota</th>
													<th class="min-w-10px">Ambil</th>
												</tr>
												</thead>
												<!--end::Head-->
												{{-- ambil fungsi untuk mengambil fungsi konversi angka romawi --}}
												@inject('romanNum', 'App\Http\Controllers\AkademikController')
												<!--begin::Body-->
												<tbody class="fs-6" id="btnico">
												@foreach ($irsLists as $value)
												<tr>
													<td>{{ $value->str_nm_kad }}</td>
													<td>
													{{ $value->str_nm_mk }} <span>({{ $value->str_kd_mk }})</span>
													</td>
													<td>{{ $value->str_nama_hari }}, {{ $value->awal }} ~ {{ $value->akhir }} ({{ $value->str_nm_ruang }})</td>
													<td>
													{{ $value->num_sks }}  ({{ $romanNum::numberToRoman($value->num_kd_semester) }})
													</td>
													<td>
													{{ $value->num_jml_sisa }}
													</td>
													<td>
															@if ($statusFinal == false)
													<form onsubmit="return addIrsMhs(this);">
													{{-- <form action="/irsAdd" method="POST"> --}}
													@csrf
													<input type="hidden" name="str_id_nim" value="{{ auth()->user()->username }}">
													<input type="hidden" name="int_kd_perkuliahan_d" value="{{ $value->int_kd_perkuliahan_d }}">
													<input type="hidden" name="num_sks" value="{{ $value->num_sks }}">
													<input type="hidden" name="str_kd_mk" value="{{ $value->str_kd_mk }}">
														<div>
															<button id="" type="submit" style="border: none; outline: none; background: none;  padding: 0;"><i class="bi bi-plus-circle-fill text-primary fs-1"></i></button>
														</div>
													</form>
													@endif
													</td>
												</tr>
												@endforeach
												</tbody>
												<!--end::Body-->
											</table>
											<!--end::Table-->
											@else
											<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mt-10">
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
													<h4 class="text-gray-900 fw-bolder">Data IRS Tidak Tersedia</h4>
													<div class="fs-6 text-gray-700">Hallo <b>{{ auth()->user()->display_name }}</b>, kamu mungkin tidak mengambil IRS pada tahun ajaran ini.
													<br />
													{{-- <a class="fw-bolder" href="#">Learn more</a> --}}
													</div>
												</div>
												<!--end::Content-->
												</div>
												<!--end::Wrapper-->
											</div>
											@endif
										@endif
										{{-- cek jika ada matakuliah tersedia --}}
										
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
          		<!--begin::Chat drawer-->
		<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
			<!--begin::Messenger-->
			<div class="card w-100 rounded-0" id="kt_drawer_chat_messenger">
				<!--begin::Card header-->
				<div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
					<!--begin::Title-->
					<div class="card-title">
						<!--begin::User-->
						<div class="d-flex justify-content-center flex-column me-3">
							<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
							<!--begin::Info-->
							<div class="mb-0 lh-1">
								<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
								<span class="fs-7 fw-bold text-muted">Active</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::User-->
					</div>
					<!--end::Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Menu-->
						<div class="me-2">
							<button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
								<i class="bi bi-three-dots fs-3"></i>
							</button>
							<!--begin::Menu 3-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
								<!--begin::Heading-->
								<div class="menu-item px-3">
									<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
								</div>
								<!--end::Heading-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a contact email to send an invitation"></i></a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
									<a href="#" class="menu-link px-3">
										<span class="menu-title">Groups</span>
										<span class="menu-arrow"></span>
									</a>
									<!--begin::Menu sub-->
									<div class="menu-sub menu-sub-dropdown w-175px py-4">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Create Group</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Invite Members</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu sub-->
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3 my-1">
									<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu 3-->
						</div>
						<!--end::Menu-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body" id="kt_drawer_chat_messenger_body">
					<!--begin::Messages-->
					<div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">2 mins</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">How likely are you to recommend our company to your friends and family ?</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">5 mins</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">1 Hour</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">Ok, Understood!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">2 Hours</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">3 Hours</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">You can unwatch this repository immediately by clicking here:
								<a href="https://keenthemes.com">Keenthemes.com</a></div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">4 Hours</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">Most purchased Business courses during this sale!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">5 Hours</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(template for out)-->
						<div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">Just now</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-26.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text"></div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(template for out)-->
						<!--begin::Message(template for in)-->
						<div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">Just now</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Big Deal for you.</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(template for in)-->
					</div>
					<!--end::Messages-->
				</div>
				<!--end::Card body-->
				<!--begin::Card footer-->
				<div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
					<!--begin::Input-->
					<textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
					<!--end::Input-->
					<!--begin:Toolbar-->
					<div class="d-flex flex-stack">
						<!--begin::Actions-->
						<div class="d-flex align-items-center me-2">
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
								<i class="bi bi-paperclip fs-3"></i>
							</button>
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
								<i class="bi bi-upload fs-3"></i>
							</button>
						</div>
						<!--end::Actions-->
						<!--begin::Send-->
						<button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
						<!--end::Send-->
					</div>
					<!--end::Toolbar-->
				</div>
				<!--end::Card footer-->
			</div>
			<!--end::Messenger-->
		</div>
		<!--end::Chat drawer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    
  </body>
  <!--end::Body-->

  <style>
	.disabledbutton {
		pointer-events: none;
		opacity: 0.4;
	}
  </style>

@endsection