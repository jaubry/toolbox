@extends('layout.default')



@section('content')


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
		<!--begin::Layout-->
		<div class="d-flex flex-column flex-xl-row">
			<!--begin::Sidebar-->
			<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
				<!--begin::Card-->
				<div class="card mb-5 mb-xl-8">
					<!--begin::Card body-->
					<div class="card-body">
						<!--begin::Summary-->
						<!--begin::User Info-->
						<div class="d-flex flex-center flex-column py-5">
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGhlaWdodD0iNTEycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yNTcuMTA3LDVDMTE4LjQ3Myw1LDYuMTA5LDExNy4zNjUsNi4xMDksMjU1Ljk5OEM2LjEwOSwzOTQuNjMxLDExOC40NzMsNTA3LDI1Ny4xMDcsNTA3ICBzMjUwLjk5OC0xMTIuMzcsMjUwLjk5OC0yNTEuMDAyQzUwOC4xMDUsMTE3LjM2NSwzOTUuNzQsNSwyNTcuMTA3LDV6IE0yNTcuMTA3LDI1LjkxN2MxMjYuODY4LDAsMjMwLjA4MiwxMDMuMjE0LDIzMC4wODIsMjMwLjA4MiAgYzAsNTUuODE1LTE5Ljk5NywxMDcuMDQzLTUzLjE5LDE0Ni45MjZjLTIyLjkzOS05LjU4LTc3LjA4OS0yOC4zNzItMTEwLjYwOS0zOC4yNjljLTIuODU5LTAuODk4LTMuMzA5LTEuMDQyLTMuMzA5LTEyLjk0ICBjMC05LjgyNiw0LjA0NC0xOS43MjEsNy45ODctMjguMDk2YzQuMjY5LTkuMSw5LjMzNC0yNC4zOTksMTEuMTUzLTM4LjEyNmM1LjA4Ni01LjkwNCwxMi4wMS0xNy41NDcsMTYuNDYzLTM5LjczOSAgYzMuOTAxLTE5LjU1OSwyLjA4My0yNi42NzctMC41MS0zMy4zNTdjLTAuMjY2LTAuNzA1LTAuNTUyLTEuMzk5LTAuNzU2LTIuMDk0Yy0wLjk4MS00LjU4NiwwLjM2Ny0yOC40MTMsMy43MTgtNDYuODk5ICBjMi4zMDgtMTIuNjg1LTAuNTkzLTM5LjY1OC0xOC4wNTctNjEuOTcyYy0xMS4wMy0xNC4xMDUtMzIuMTMxLTMxLjQxNi03MC42NzUtMzMuODI2bC0yMS4xNDEsMC4wMiAgYy0zNy44OTEsMi4zOTEtNTkuMDEyLDE5LjcwMS03MC4wNDIsMzMuODA2Yy0xNy40NjQsMjIuMzE1LTIwLjM2NCw0OS4yODgtMTguMDU2LDYxLjk2M2MzLjM3LDE4LjQ5NSw0LjY5OCw0Mi4zMjIsMy43MzgsNDYuODE2ICBjLTAuMjA0LDAuNzg2LTAuNDksMS40ODEtMC43NzYsMi4xODZjLTIuNTc0LDYuNjgtNC40MTIsMTMuNzk4LTAuNDksMzMuMzU3YzQuNDMyLDIyLjE5MiwxMS4zNTcsMzMuODM2LDE2LjQ2MywzOS43MzkgIGMxLjc5OCwxMy43MjYsNi44NjQsMjkuMDI2LDExLjE1MywzOC4xMjZjMy4xMjUsNi42NTksNC41OTYsMTUuNzE4LDQuNTk2LDI4LjUyNWMwLDExLjg5OC0wLjQ1LDEyLjA0Mi0zLjEyNiwxMi44ODkgIGMtMzQuNjYzLDEwLjIzNC04OS44MzQsMzAuMTctMTEwLjQwNCwzOS4xNzhjLTMzLjg0Ni00MC4wNjYtNTQuMjkzLTkxLjc4NS01NC4yOTMtMTQ4LjIxMiAgQzI3LjAyNSwxMjkuMTMsMTMwLjIzOSwyNS45MTcsMjU3LjEwNywyNS45MTd6IE05Ni40NzQsNDIwLjUxNmMyMy41NTItOS42MTUsNzAuNTEyLTI2LjM2NSwxMDEuMzU1LTM1LjQ3NSAgYzE3LjkzNS01LjY1OCwxNy45MzUtMjAuNzYzLDE3LjkzNS0zMi44OTZjMC0xMC4wNi0wLjY5NC0yNC44OS02LjU3Ny0zNy40MzFjLTQuMDQ1LTguNTg5LTguNjYyLTIzLjMxNy05LjY4Mi0zNC44NDcgIGMtMC4yMjUtMi42OTYtMS40OTEtNS4xODgtMy41MzQtNi45NjVjLTIuOTYyLTIuNTk1LTguOTg4LTEyLjA5My0xMi44MjgtMzEuMjUyYy0zLjA0My0xNS4xNjctMS43NTYtMTguNDg2LTAuNTEtMjEuNjkzICBjMC41MzEtMS4zNjksMS4wNDItMi43MTcsMS40NTEtNC4yMzljMi41MTItOS4xODEtMC4yODctMzkuMzQxLTMuMzMtNTYuMDdjLTEuMzI3LTcuMjcyLDAuMzQ3LTI3LjkzMywxMy45NTEtNDUuMzM3ICBjMTIuMTk0LTE1LjU5NSwzMC42NTktMjQuMjg3LDU0LjIxMS0yNS43ODhsMTkuODM0LTAuMDIxYzI0LjE4NSwxLjUyMiw0Mi42NSwxMC4yMTQsNTQuODY1LDI1LjgwOSAgYzEzLjYwNCwxNy40MDQsMTUuMjU5LDM4LjA2NSwxMy45Myw0NS4zNDZjLTMuMDIzLDE2LjcyLTUuODQyLDQ2Ljg3OS0zLjMzLDU2LjA1YzAuNDMsMS41MzIsMC45MTksMi44OCwxLjQ1MSw0LjI0OSAgYzEuMjQ3LDMuMjA2LDIuNTMzLDYuNTI2LTAuNDksMjEuNjkzYy0zLjgzOSwxOS4xNi05Ljg4NiwyOC42NTgtMTIuODQ4LDMxLjI1MmMtMi4wMjIsMS43NzctMy4yODgsNC4yNjktMy41MzQsNi45NjUgIGMtMS4wMDEsMTEuNTMtNS42MTcsMjYuMjU4LTkuNjYxLDM0Ljg0N2MtNC42MzcsOS44NTYtOS45NjgsMjIuOTgtOS45NjgsMzcuMDAyYzAsMTIuMTM0LDAsMjcuMjM5LDE4LjExOCwzMi45NDggIGMyOS41MTYsOC43MjIsNzYuNzAxLDI0LjkzLDEwMS42MjEsMzQuNzNjLTQxLjYwOCw0MS4xOTktOTguNzgxLDY2LjY5MS0xNjEuNzk3LDY2LjY5MSAgQzE5NC42NjQsNDg2LjA4NCwxMzcuOTgxLDQ2MS4wNDIsOTYuNDc0LDQyMC41MTZ6IiBmaWxsPSIjMzc0MDREIi8+PC9zdmc+" width="150" class="img-responsive" alt="">
                            </div>
							<!--begin::Name-->
							<span class="fs-3 text-gray-800 fw-bolder">{{ $emp->lastname }}</span>
                            <span class="fs-3 text-gray-800 mb-3">{{ $emp->firstname }}</span>
							<!--end::Name-->
							<!--begin::Position-->
							<div class="mb-9">
								<!--begin::Badge-->
								<div class="badge badge-lg badge-light-primary d-inline">{{ $emp->group->group_name }}</div>
								<!--begin::Badge-->
							</div>
							<!--end::Position-->

						</div>
						<!--end::User Info-->
						<!--end::Summary-->
						<div class="separator"></div>
						<!--begin::Details content-->
						<div id="kt_user_view_details" class="collapse show">
							<div class="pb-5 fs-6">
								<!--begin::Details item-->
								<div class="fw-bolder mt-5">Dernière connexion</div>
								<div class="text-gray-600">22 Sep 2021, 11:05 am <span class="badge badge-danger">TO CHANGE</span></div>
								<!--begin::Details item-->
							</div>
						</div>
						<!--end::Details content-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Sidebar-->
			<!--begin::Content-->
			<div class="flex-lg-row-fluid ms-lg-15">
				<!--begin:::Tabs-->
				<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
					<!--begin:::Tab item-->
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">Informations</a>
					</li>
					<!--end:::Tab item-->
					<!--begin:::Tab item-->
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Logs</a>
					</li>
					<!--end:::Tab item-->
					<!--begin:::Tab item-->
					<!--<li class="nav-item">
						<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">Events &amp; Logs</a>
					</li>-->
					<!--end:::Tab item-->
				</ul>
				<!--end:::Tabs-->
				<!--begin:::Tab content-->
				<div class="tab-content" id="myTabContent">
					<!--begin:::Tab pane-->
					<div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">

                    
						<!--begin::Card-->
						<div class="card pt-4 mb-6 mb-xl-9">
							<!--begin::Card header-->
							<div class="card-header border-0">
								<!--begin::Card title-->
								<div class="card-title">
									<h2>Profile</h2>
								</div>
								<!--end::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<button id="btn_kt_modal_update_details" type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
										<!--SVG file not found: media/icons/duotune/art/art008.svg-->
														Modifier
									</button>
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0 pb-5">
								<!--begin::Table wrapper-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed gy-3" id="kt_table_users_login_session">
										<!--begin::Table body-->
										<tbody class="fs-6 text-gray-600">
											<tr>
												<td>Nom/Prénom</td>
												<td><span id="txtLastname" class="fw-bold">{{ $emp->lastname }}</span> <span id="txtFirstname" class="">{{ $emp->firstname }}</span></td>
												<td class="text-end">
												</td>
											</tr>
											<tr>
												<td>Email</td>
												<td><span id="txtMail" class="fw-bold">{{ $emp->mail }}</span></td>
												<td class="text-end">
												</td>
											</tr>
											<tr>
												<td>Actif ?</td>
												<td id="txtActive">
                                                    
                                                    @if ($emp->active == 0)
                                                    <span class="ms-2 badge badge-light-danger fw-bold">Non</span>
                                                    @else
                                                    <span class="ms-2 badge badge-light-success fw-bold">Oui</span>
                                                    @endif
                                                </td>
												<td class="text-end">
												</td>
											</tr>
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table wrapper-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->
                        
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h2 class="mb-1">Rôle de l'utilisateur</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column">
										@if (!!($emp->group))
                                        <div class="badge badge-lg badge-primary d-inline" id="badge_role">{{ $emp->group->group_name }}</div>
										@else
										<div class="badge badge-lg badge-danger d-inline" id="badge_role">N/A</div>
                                        @endif
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Action-->
                                    <div class="d-flex justify-content-end align-items-center">
                                        <!--begin::Button-->
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
														<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
														<span class="svg-icon svg-icon-3">
															<svg
																xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
																<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h2 class="mb-1">Gestion du mot de passe</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pb-5">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column">
                                        <span>******</span>
                                        <span class="text-muted fs-6">Dernière modification le {{ $emp->last_password_modification }}</span>
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Action-->
                                    <div class="d-flex justify-content-end align-items-center">
                                        <!--begin::Button-->
                                        <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-5" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

						<!--begin::Card-->
						<div class="card card-flush mb-6 mb-xl-9">
							<!--begin::Card header-->
							<div class="card-header mt-6">
								<!--begin::Card title-->
								<div class="card-title flex-column">
									<h2 class="mb-1">Boutiques associées</h2>
								</div>
								<!--end::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<button type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_stores">
										<!--SVG file not found: media/icons/duotune/art/art008.svg-->
														Modifier
									</button>
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body p-9 pt-4" id="lst_stores">
                                @if (count($emp->stores) > 0)
                                    @foreach ($emp->stores as $store)
                                        @if (count($store->storeLang) > 0)
                                            <span class="badge badge-light-info fs-7 m-1">{{ $store->storeLang[0]->name }}</span>
                                        @endif
                                    @endforeach
                                @else
                                Aucune
                                @endif
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end:::Tab pane-->
					<!--begin:::Tab pane-->
					<div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
					</div>
					<!--end:::Tab pane-->
				</div>
				<!--end:::Tab content-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Layout-->
		<!--begin::Modals-->
		<!--begin::Modal - Update user details-->
		<div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Form-->
					<form class="form" action="#" id="kt_modal_update_user_form">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_update_user_header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder">Saisie des informations utilisateur</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
									<svg
										xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
										<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Close-->
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body py-10 px-lg-17">
							<input type="hidden" name="id_employee" id="id_employee" value="{{ $emp->id_employee }}"/>
							<!--begin::Scroll-->
							<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
								<!--begin::User form-->
								<div id="kt_modal_update_user_user_info" class="collapse show">
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">Nom</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control " placeholder="" id="lastname" name="lastname" value="{{ $emp->lastname }}" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">Prénom</label>
										<!--end::Label-->
										<!--begin::Input-->
										<!-- form-control-solid -->
										<input type="text" class="form-control " placeholder="" id="firstname" name="firstname" value="{{ $emp->firstname }}" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">Email</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="email" class="form-control " placeholder="" id="mail" name="mail" value="{{ $emp->mail }}" />
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									
									<!--begin::Input group-->
									<div class="fv-row mb-7">
										<!--begin::Label-->
										<label class="fs-6 fw-bold mb-2">Actif ?</label>
										<!--end::Label-->
										<!--begin::Input-->
										<div class="form-check form-check-solid form-switch fv-row">
												<input class="form-check-input w-45px h-30px" type="checkbox" id="active" name="active" @if ($emp->active) checked="checked" @endif />
												<label class="form-check-label" for="active"></label>
											</div>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									
								</div>
								<!--end::User form-->
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Annuler</button>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
								<span class="indicator-label">Enregistrer</span>
								<span class="indicator-progress">En cours... 
													
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
								</span>
							</button>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					</form>
					<!--end::Form-->
				</div>
			</div>
		</div>
		<!--end::Modal - Update user details-->
		<!--begin::Modal - Update password-->
		<div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2 class="fw-bolder">Update Password</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg
									xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
						<!--begin::Form-->
						<form id="kt_modal_update_password_form" class="form" action="#">
                            

							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bold fs-6 mb-2">Nouveau mot de passe</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Merci de saisir au moins 12 caractères, avec lettres, chiffres et symboles.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group=-->
							<div class="fv-row mb-10">
								<label class="form-label fw-bold fs-6 mb-2">Confirmez le nouveau mot de passe</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />
							</div>
							<!--end::Input group=-->
							<!--begin::Actions-->
							<div class="text-center pt-15">
								<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Annuler</button>
								<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
									<span class="indicator-label">Enregistrer</span>
									<span class="indicator-progress">Patientez... 
														
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
									</span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Update password-->
		<!--begin::Modal - Update role-->
		<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2 class="fw-bolder">Modification du profil</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg
									xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
						<!--begin::Form-->
						<form id="kt_modal_update_role_form" class="form" action="#">
						<input type="hidden" name="id_employee" id="id_employee3" value="{{ $emp->id_employee }}"/>
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<!--begin::Label-->
								<label class="fs-6 fw-bold form-label mb-5">
									<span class="required">Choisir le rôle à associer</span>
								</label>
								<!--end::Label-->

                                @foreach ($groups as $group)
                                
								<!--begin::Input row-->
								<div class="d-flex">
									<!--begin::Radio-->
									<div class="form-check form-check-custom form-check-solid">
										<!--begin::Input-->
										<input class="form-check-input me-3" name="user_role" type="radio" value="{{ $group->id_employee_group }}" id="kt_modal_update_role_option_{{ $group->id_employee_group }}" 
                                        @if ($group->id_employee_group == $emp->id_employee_group)
                                        checked='checked'
                                        @endif />
										<!--end::Input-->
										<!--begin::Label-->
										<label class="form-check-label" for="kt_modal_update_role_option_{{ $group->id_employee_group }}">
											<div class="fw-bolder text-gray-800">{{ $group->group_name }}</div>
											<!--<div class="text-gray-600">Best for business owners and company administrators</div>-->
										</label>
										<!--end::Label-->
									</div>
									<!--end::Radio-->
								</div>
								<!--end::Input row-->
								<div class='separator separator-dashed my-2'></div>
								<!--begin::Input row-->

                                @endforeach

							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center pt-15">
								<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
								<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait... 
														
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
									</span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Update role-->
		<!--begin::Modal - Add task-->
		<div class="modal fade" id="kt_modal_stores" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					
					<form class="form" action="#" id="kt_modal_stores_form">
						
					<input type="hidden" name="id_employee" id="id_employee2" value="{{ $emp->id_employee }}"/>
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2 class="fw-bolder">Associer des boutiques</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg
									xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
						<!--begin::Content-->
						<select id="lstStores" name="lstStores[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
							<option value=""></option>
							@foreach ($stores as $store)
							<option value="{{ $store->id_store }}"
							@if(in_array($store->id_store, $empStores))
								selected
							@endif >{{ $store->storeLang[0]->name }}</option>
							@endforeach
						</select>
                        
							<!--begin::Actions-->
							<div class="text-center pt-15">
								<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Annuler</button>
								<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
									<span class="indicator-label">Enregistrer</span>
									<span class="indicator-progress">Patientez... 
														
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
									</span>
								</button>
							</div>
							<!--end::Actions-->
					</div>
					<!--end::Modal body-->
					</form>
					
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Add task-->
	</div>
	<!--end::Container-->
</div>
<!--end::Content-->

@push('scripts')	
		<script src="{{ asset('assets/js_tb/user.details.management.js') }}"></script>
		<script src="{{ asset('assets/js_tb/user.role.management.js') }}"></script>
		<script src="{{ asset('assets/js_tb/user.update-password.js') }}"></script>
		<script src="{{ asset('assets/js_tb/user.stores.js') }}"></script>

        <script>
            $("#lstStores").select2();
        </script>
		<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		</script>
@endpush
@endsection