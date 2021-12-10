@extends('layout.default')



@section('content')
					<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
						<!--begin::Container-->
						<div class="container" id="kt_content_container">
							<!--begin::Row-->
							<div class="row g-xl-12">
								<!--begin:::Col-->
								<div class="col-xxl-12">
									<!--begin::Row-->
									<div class="row g-xl-12">
										<!--begin:::Col-->
										<div class="col">
											<!--begin::Table Widget 1-->
											<div class="card card-xxl-stretch mb-5 mb-xl-3">
												<!--begin::Header-->
												<div class="card-header border-0 pt-5 pb-3">
													<!--begin::Card title-->
													<h3 class="card-title align-items-start flex-column">
														<span class="card-label fw-boldest text-gray-800 fs-2">Teams Progress</span>
														<span class="text-gray-400 fw-bold mt-2 fs-6">890,344 Sales</span>
													</h3>
													<!--end::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
														<!--begin::Search-->
														<div class="position-relative pe-6 my-1">
															<!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
															<span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
															<input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10" name="search" value="" placeholder="Search" />
														</div>
														<!--end::Search-->
														<div class="my-1">
															<!--begin::Select-->
															<select class="form-select form-select-sm form-select-solid fw-bolder w-125px" data-control="select2" data-placeholder="All Users" data-hide-search="true">
																<option value="1" selected="selected">All Users</option>
																<option value="2">Active users</option>
																<option value="3">Pending users</option>
															</select>
															<!--end::Select-->
														</div>
													</div>
													<!--end::Card toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body py-0">
													<!--begin::Table-->
													<div class="table-responsive">
														<table class="table align-middle table-row-bordered table-row-dashed gy-5" id="kt_table_widget_1">
															<!--begin::Table body-->
															<thead>
																<!--begin::Table row-->
																<tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
																	<th class="w-20px ps-0">
																		<div class="form-check form-check-sm form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
																		</div>
																	</th>
																	<th class="min-w-200px px-0">Name/Email</th>
																	<th class="min-w-125px">Profile</th>
																	<th class="min-w-125px">Store</th>
																	<th class="min-w-125px">Stores</th>
																	<th class="min-w-125px">Active</th>
																	<th class="text-end pe-2 min-w-70px">Action</th>
																</tr>
																<!--end::Table row-->
															</thead>
															<tbody>
																<!--begin::Table row-->
                                                                @foreach ($emps as $emp)
																<tr>
																	<!--begin::Checkbox-->
																	<td class="p-0">
																		<div class="form-check form-check-sm form-check-custom form-check-solid">
																			<input class="form-check-input" type="checkbox" value="1" />
																		</div>
																	</td>
																	<!--end::Checkbox-->
																	<!--begin::Author=-->
																	<td class="p-0">
																		<div class="d-flex align-items-center">
																			<div class="ps-3">
																				<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">{{ $emp->lastname }} {{ $emp->firstname }}</a>
																				<span class="text-gray-400 fw-bold d-block">{{ $emp->mail }}</span>
																			</div>
																		</div>
																	</td>
																	<!--end::Author=-->
																	<!--begin::Progress=-->
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
                                                                            @if (!!($emp->group))
                                                                                {{ $emp->group->group_name }}
                                                                            @else
                                                                                <span class="ms-2 badge badge-light-danger fw-bold">N/A</span
                                                                            @endif
																		</div>
																	</td>
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
                                                                            @if (!!($emp->exclusiveStore))
                                                                                {{ $emp->exclusiveStore->name }}
                                                                            @endif
																		</div>
																	</td>
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
                                                                            @if (!!($emp->stores))
                                                                                @foreach ($emp->stores as $store)
                                                                                    @if (count($store->storeLang) > 0)
                                                                                        {{ $store->storeLang[0]->name }} |
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
																		</div>
																	</td>
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
                                                                            @if ($emp->active == 0)
                                                                            <span class="ms-2 badge badge-light-danger fw-bold">Inactive</span>
                                                                            @else
                                                                            <span class="ms-2 badge badge-light-success fw-bold">Active</span>
                                                                            @endif
																		</div>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
																	</td>
																	<!--end::Action=-->
																</tr>
                                                                @endforeach
																<!--end::Table row-->
															</tbody>
															<!--end::Table body-->
														</table>
													</div>
													<!--end::Table-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::Table Widget 1-->
										</div>
										<!--end:::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end:::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>


@push('scripts')					

<script>
	$("#kt_table_widget_1").DataTable();
</script>
@endpush

@endsection