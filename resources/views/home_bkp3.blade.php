<!DOCTYPE html>
<html lang="fr">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Rider Theme | Keenthemes</title>
		<meta name="description" content="Rider admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Rider, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

        <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto pt-9 pb-7 px-9" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="index.html">
							<img alt="Logo" src="assets/media/logos/logo-default.svg" class="max-h-50px logo-default" />
							<img alt="Logo" src="assets/media/logos/logo-compact.svg" class="max-h-50px logo-minimize" />
						</a>
						<!--end::Logo-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid px-3 px-lg-6">
						<!--begin::Aside Menu-->
						<!--begin::Menu-->
						<div class="menu menu-column menu-pill menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 menu-active-bg-primary fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
							<div class="hover-scroll-y me-n3 pe-3" id="kt_aside_menu_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="20px">
								<div class="menu-item mb-1">
									<a class="menu-link active" href="index.html">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
														<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Dashboards</span>
									</a>
								</div>
								<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Pages</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion">
										<div class="menu-item">
											<a class="menu-link" href="general/about.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">About Us</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="general/invoice.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">Invoice</span>
											</a>
										</div>
										<div class="menu-item">
											<a class="menu-link" href="general/faq.html">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">FAQ</span>
											</a>
										</div>
									</div>
								</div>
								<div class="menu-item">
									<div class="menu-content">
										<div class="separator mx-1 my-4"></div>
									</div>
								</div>
								<div class="menu-item mb-1">
									<a class="menu-link" href="documentation/base/utilities.html" title="Check out over 200 in-house components, plugins and ready for use solutions" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-arrange.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000" />
														<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Components</span>
									</a>
								</div>
								<div class="menu-item mb-1">
									<a class="menu-link" href="documentation/getting-started.html" title="Check out the complete documentation" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
														<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Documentation</span>
									</a>
								</div>
								<div class="menu-item mb-1">
									<a class="menu-link" href="#" data-kt-page="pro" title="Build your layout, preview and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.25" d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z" fill="#12131A" />
													<path d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z" fill="#12131A" />
													<path opacity="0.25" d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z" fill="#12131A" />
													<path d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z" fill="#12131A" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Layout Builder
										<span class="badge badge-pro badge-light-danger fw-bold fs-9 px-2 py-1 ms-1">Pro</span></span>
									</a>
								</div>
								<div class="menu-item mb-1">
									<a class="menu-link" href="documentation/getting-started/changelog.html">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotone/Files/File.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
														<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Changelog</span>
									</a>
								</div>
							</div>
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Aside menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="text-dark fw-bolder mt-1 mb-1 fs-2">Dashboard
								<small class="text-muted fs-6 fw-normal ms-1"></small></h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb fw-bold fs-base mb-1">
									<li class="breadcrumb-item text-muted">
										<a href="index.html" class="text-muted text-hover-primary">Home</a>
									</li>
									<li class="breadcrumb-item text-dark">Dashboards</li>
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
							<!--begin::Logo bar-->
							<div class="d-flex d-lg-none align-items-center flex-grow-1">
								<!--begin::Aside Toggle-->
								<div class="btn btn-icon btn-circle btn-active-light-primary ms-n2 me-1" id="kt_aside_toggle">
									<!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
									<span class="svg-icon svg-icon-2x">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
												<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
											</g>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Aside Toggle-->
								<!--begin::Logo-->
								<a href="index.html" class="d-lg-none">
									<img alt="Logo" src="assets/media/logos/logo-compact.svg" class="max-h-40px" />
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Logo bar-->
							<!--begin::Toolbar wrapper-->
							<div class="d-flex align-items-stretch flex-shrink-0">
								<!--begin::Notifications-->
								<div class="d-flex align-items-center ms-1 ms-lg-3">
									<!--begin::Menu wrapper-->
									<div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
										<!--begin::Svg Icon | path: icons/duotone/General/Notification2.svg-->
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</div>
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column w-350px" data-kt-menu="true">
										<!--begin::Card-->
										<div class="card">
											<!--begin::Card header-->
											<div class="card-header">
												<h3 class="card-title">Notifications
												<span class="badge badge-light-success fs-7 fw-500 ms-3">24 reports</span></h3>
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body p-0">
												<!--begin::Notifications-->
												<div class="mh-350px scroll-y py-3">
													<!--begin::Item-->
													<div class="d-flex align-items-center bg-hover-lighten py-3 px-9">
														<!--begin::Symbol-->
														<div class="symbol symbol-40px symbol-circle me-5">
															<span class="symbol-label bg-light-warning">
																<!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
																<span class="svg-icon svg-icon-warning svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																			<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																		</g>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div class="mb-1 pe-3 flex-grow-1">
															<a href="#" class="fs-6 text-dark text-hover-primary fw-bold">Developer Library added</a>
															<div class="text-gray-400 fw-bold fs-7">2 hours ago</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-center bg-hover-lighten py-3 px-9">
														<!--begin::Symbol-->
														<div class="symbol symbol-40px symbol-circle me-5">
															<span class="symbol-label bg-light-danger">
																<!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
																<span class="svg-icon svg-icon-danger svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
																			<rect fill="#000000" x="2" y="8" width="20" height="3" />
																			<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
																		</g>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div class="mb-1 pe-3 flex-grow-1">
															<a href="#" class="fs-6 text-dark text-hover-primary fw-bold">Credit card expired</a>
															<div class="text-gray-400 fw-bold fs-7">1 day ago</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Notifications-->
											</div>
											<!--end::Card header-->
											<!--begin::Card footer-->
											<div class="card-footer text-center py-5">
												<a href="#" class="btn btn-light btn-active-light-primary btn-sm">All Notifications</a>
											</div>
											<!--end::Card footer-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::Notifications-->
								<!--begin::User-->
								<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
										<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
									</div>
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<!--begin::Avatar-->
												<div class="symbol symbol-50px symbol-circle me-5">
													<img alt="Logo" src="assets/media/avatars/150-1.jpg" />
												</div>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bolder d-flex align-items-center fs-5">Aria Grande
													<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
													<a href="#" class="fw-bold text-muted text-hover-primary fs-7">aria@kt.com</a>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="account/overview.html" class="menu-link px-5">Profile</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="account/overview.html" class="menu-link px-5">
												<span class="menu-text">Dashboard</span>
												<span class="menu-badge">
													<span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
												</span>
											</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="#" class="menu-link px-5">Reports</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-5 my-1">
											<a href="#" class="menu-link px-5">Account Settings</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="#" class="menu-link px-5">Sign Out</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::User -->
							</div>
							<!--end::Toolbar wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
						<!--begin::Container-->
						<div class="container" id="kt_content_container">
							<!--begin::Row-->
							<div class="row g-xl-8">
								<!--begin:::Col-->
								<div class="col-xxl-5">                                    
									<!--begin::List Widget 3-->
									<div class="card card-flush mb-5 mb-xl-8">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Card title-->
											<h3 class="card-title fw-boldest">Latest Authors Sales</h3>
											<!--end::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar">
												<!--begin::Icon-->
												<a class="btn btn-sm btn-icon btn-circle btn-icon-success btn-active-light-success" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">
													<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add New User">
														<!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
														<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A" />
																<path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a class="btn btn-sm btn-icon btn-circle btn-icon-primary btn-active-light-primary" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
													<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add New Card">
														<!--begin::Svg Icon | path: icons/duotone/Interface/Image.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.25" d="M2.45153 5.94826C2.71842 4.12109 4.12109 2.71842 5.94826 2.45153C7.54228 2.21869 9.6618 2 12 2C14.3382 2 16.4577 2.21869 18.0517 2.45153C19.8789 2.71842 21.2816 4.12109 21.5485 5.94826C21.7813 7.54228 22 9.6618 22 12C22 14.3382 21.7813 16.4577 21.5485 18.0517C21.2816 19.8789 19.8789 21.2816 18.0517 21.5485C16.4577 21.7813 14.3382 22 12 22C9.6618 22 7.54228 21.7813 5.94826 21.5485C4.12109 21.2816 2.71842 19.8789 2.45153 18.0517C2.21869 16.4577 2 14.3382 2 12C2 9.6618 2.21869 7.54228 2.45153 5.94826Z" fill="#12131A" />
																<path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" fill="#12131A" />
																<path d="M21.6642 17.2016C21.7024 16.8989 21.5962 16.5963 21.3805 16.3806L17.4143 12.4144C16.6332 11.6334 15.3669 11.6334 14.5858 12.4144L11.7072 15.2931C11.3166 15.6836 10.6835 15.6836 10.293 15.2931L9.41427 14.4144C8.63322 13.6334 7.36689 13.6334 6.58584 14.4144L2.93337 18.0669C2.68517 18.3151 2.57669 18.679 2.70674 19.005C3.24439 20.3529 4.45448 21.3303 5.94832 21.5485C7.54234 21.7813 9.66186 22 12.0001 22C14.3383 22 16.4578 21.7813 18.0518 21.5485C19.879 21.2816 21.2816 19.8789 21.5485 18.0517C21.5878 17.7828 21.6267 17.499 21.6642 17.2016Z" fill="#12131A" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span>
												</a>
												<!--end::Icon-->
												<!--begin::Icon-->
												<a class="btn btn-sm btn-icon btn-circle btn-icon-danger btn-active-light-danger" href="#" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
													<!--begin::Svg Icon | path: icons/duotone/Interface/Options-Square.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z" fill="#12131A" />
															<path fill-rule="evenodd" clip-rule="evenodd" d="M9 12C9 12.5523 8.55228 13 8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12ZM13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11C15.4477 11 15 11.4477 15 12C15 12.5523 15.4477 13 16 13Z" fill="#12131A" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</a>
												<!--begin::Menu 1-->
												<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
													<!--begin::Header-->
													<div class="px-7 py-5">
														<div class="fs-5 text-dark fw-bolder">Filter Options</div>
													</div>
													<!--end::Header-->
													<!--begin::Menu separator-->
													<div class="separator border-gray-200"></div>
													<!--end::Menu separator-->
													<!--begin::Form-->
													<div class="px-7 py-5">
														<!--begin::Input group-->
														<div class="mb-10">
															<!--begin::Label-->
															<label class="form-label fw-bold">Status:</label>
															<!--end::Label-->
															<!--begin::Input-->
															<div>
																<select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
																	<option></option>
																	<option value="1">Approved</option>
																	<option value="2">Pending</option>
																	<option value="2">In Process</option>
																	<option value="2">Rejected</option>
																</select>
															</div>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10">
															<!--begin::Label-->
															<label class="form-label fw-bold">Member Type:</label>
															<!--end::Label-->
															<!--begin::Options-->
															<div class="d-flex">
																<!--begin::Options-->
																<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
																	<input class="form-check-input" type="checkbox" value="1" />
																	<span class="form-check-label">Author</span>
																</label>
																<!--end::Options-->
																<!--begin::Options-->
																<label class="form-check form-check-sm form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox" value="2" checked="checked" />
																	<span class="form-check-label">Customer</span>
																</label>
																<!--end::Options-->
															</div>
															<!--end::Options-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10">
															<!--begin::Label-->
															<label class="form-label fw-bold">Notifications:</label>
															<!--end::Label-->
															<!--begin::Switch-->
															<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
																<label class="form-check-label">Enabled</label>
															</div>
															<!--end::Switch-->
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="d-flex justify-content-end">
															<button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
															<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
														</div>
														<!--end::Actions-->
													</div>
													<!--end::Form-->
												</div>
												<!--end::Menu 1-->
												<!--end::Icon-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Body-->
										<div class="card-body pt-1">
											<!--begin::Tabs-->
											<ul class="nav rounded-pill flex-center bg-light overflow-auto flex-nowrap p-2 mb-8">
												<!--begin::Tab nav-->
												<li class="nav-item flex-equal">
													<a class="nav-link btn btn-active-white btn-color-gray-500 btn-active-color-gray-700 py-2 px-4 fs-6 fw-bold active" data-bs-toggle="tab" href="#kt_lists_widget_3_tab_pane_1">Exclusive Authors</a>
												</li>
												<!--end::Tab nav-->
												<!--begin::Tab nav-->
												<li class="nav-item flex-equal mx-1">
													<a class="nav-link btn btn-active-white btn-color-gray-500 btn-active-color-gray-700 py-2 px-4 fs-6 fw-bold" data-bs-toggle="tab" href="#kt_lists_widget_3_tab_pane_2">Statistics</a>
												</li>
												<!--end::Tab nav-->
												<!--begin::Tab nav-->
												<li class="nav-item flex-equal">
													<a class="nav-link btn btn-active-white btn-color-gray-500 btn-active-color-gray-700 py-2 px-4 fs-6 fw-bold" data-bs-toggle="tab" href="#kt_lists_widget_3_tab_pane_3">Recent Trends</a>
												</li>
												<!--end::Tab nav-->
											</ul>
											<!--end::Tabs-->
											<!--begin:Tab content-->
											<div class="tab-content">
												<!--begin::Tab pane-->
												<div class="tab-pane fade active show" id="kt_lists_widget_3_tab_pane_1">
													<!--begin::Section-->
													<div class="mb-7">
														<!--begin::Heading-->
														<div class="fw-bold fs-4 text-gray-400 mb-5">24 Sep, 2021</div>
														<!--end::Heading-->
														<!--begin::Items-->
														<div class="overflow-auto mb-10">
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-40px symbol-circle me-4">
																	<img alt="Pic" src="assets/media/avatars/150-7.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::List content-->
																<div class="d-flex flex-column min-w-150px me-4">
																	<a href="#" class="fw-boldest text-gray-800 text-hover-primary fs-4">Cessna SF150</a>
																	<div class="fw-bold fs-6 text-gray-400">cessna-aircraft-class.jsp</div>
																</div>
																<!--end::List content-->
																<!--begin::Price-->
																<div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">1,050.00$</div>
																<!--end::Price-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Items-->
													</div>
													<!--end::Section-->
													<!--begin::Section-->
													<div class="mb-7">
														<!--begin::Heading-->
														<div class="fw-bold fs-4 text-gray-400 mb-5">30 Sep, 2021</div>
														<!--end::Heading-->
														<!--begin::Items-->
														<div class="overflow-auto">
															<!--begin::Item-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<div class="symbol symbol-40px symbol-circle me-4">
																	<img alt="Pic" src="assets/media/avatars/150-12.jpg" />
																</div>
																<!--end::Avatar-->
																<!--begin::List content-->
																<div class="d-flex flex-column min-w-150px me-4">
																	<a href="#" class="fw-boldest text-gray-800 text-hover-primary fs-4">Flight Carrier</a>
																	<div class="fw-bold fs-6 text-gray-400">flight-module.jsp</div>
																</div>
																<!--end::List content-->
																<!--begin::Price-->
																<div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">3,150.00$</div>
																<!--end::Price-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Items-->
													</div>
													<!--end::Section-->
												</div>
												<!--end::Tab pane-->
												<!--begin::Tab pane-->
												<div class="tab-pane fade" id="kt_lists_widget_3_tab_pane_2">
													<!--begin::Chart-->
													<div id="kt_lists_widget_3_chart" style="height: 350px"></div>
													<!--end::Chart-->
												</div>
												<!--end::Tab pane-->
												<!--begin::Tab pane-->
												<div class="tab-pane fade" id="kt_lists_widget_3_tab_pane_3">
													<!--begin::Items-->
													<div class="mb-0">
														<!--begin::Item-->
														<div class="d-flex align-items-sm-center mb-7">
															<!--begin::Symbol-->
															<div class="symbol symbol-50px symbol-circle me-5">
																<span class="symbol-label">
																	<img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Section-->
															<div class="d-flex align-items-center flex-row-fluid flex-wrap">
																<div class="flex-grow-1 me-2">
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top Authors</a>
																	<span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
																</div>
																<span class="badge badge-light fw-bolder my-2">+82$</span>
															</div>
															<!--end::Section-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex align-items-sm-center mb-7">
															<!--begin::Symbol-->
															<div class="symbol symbol-50px symbol-circle me-5">
																<span class="symbol-label">
																	<img src="assets/media/svg/brand-logos/telegram.svg" class="h-50 align-self-center" alt="" />
																</span>
															</div>
															<!--end::Symbol-->
															<!--begin::Section-->
															<div class="d-flex align-items-center flex-row-fluid flex-wrap">
																<div class="flex-grow-1 me-2">
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular Authors</a>
																	<span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
																</div>
																<span class="badge badge-light fw-bolder my-2">+280$</span>
															</div>
															<!--end::Section-->
														</div>
														<!--end::Item-->
													</div>
													<!--end::Items-->
												</div>
												<!--end::Tab pane-->
											</div>
											<!--end:Tab content-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::List Widget 3-->
									<!--begin::Slider Widget 1-->
									<div class="card mb-5 mb-xl-8">
										<!--begin::Body-->
										<div class="card-body pt-5">
											<div id="kt_stats_widget_8_carousel" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
												<!--begin::Heading-->
												<div class="d-flex flex-stack flex-wrap">
													<span class="fs-4 text-gray-400 fw-boldest pe-2">Announcements</span>
													<!--begin::Carousel Indicators-->
													<ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
														<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="0" class="ms-1 active"></li>
														<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="1" class="ms-1"></li>
														<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="2" class="ms-1"></li>
														<li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="3" class="ms-1"></li>
													</ol>
													<!--end::Carousel Indicators-->
												</div>
												<!--end::Heading-->
												<!--begin::Carousel-->
												<div class="carousel-inner pt-6">
													<!--begin::Item-->
													<div class="carousel-item active">
														<div class="carousel-wrapper">
															<div class="d-flex flex-column justify-content-between flex-grow-1">
																<a href="" class="fs-2 text-gray-800 text-hover-primary fw-boldest">Rider Admin Launch Day</a>
																<p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
															</div>
															<!--begin::Info-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-boldest me-2">OCT 05, 10</span>
																<a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
															</div>
															<!--end::Info-->
														</div>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<div class="carousel-wrapper">
															<!--begin::Title-->
															<div class="d-flex flex-column justify-content-between flex-grow-1">
																<a href="" class="fs-2 text-gray-800 text-hover-primary fw-boldest">Rider Dashboard Launch</a>
																<p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-boldest me-2">DEC 03, 20</span>
																<a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
															</div>
															<!--end::Info-->
														</div>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<div class="carousel-wrapper">
															<!--begin::Title-->
															<div class="d-flex flex-column justify-content-between flex-grow-1">
																<a href="" class="fs-2 text-gray-800 text-hover-primary fw-boldest">Reached 50,000 Sales</a>
																<p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-boldest me-2">NOV 06, 23</span>
																<a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
															</div>
															<!--end::Info-->
														</div>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="carousel-item">
														<div class="carousel-wrapper">
															<!--begin::Title-->
															<div class="d-flex flex-column justify-content-between flex-grow-1">
																<a href="" class="fs-2 text-gray-800 text-hover-primary fw-boldest">Reached 50,000 Sales</a>
																<p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a topic about and first brainstorm ways to write details</p>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="d-flex flex-stack pt-8">
																<span class="badge badge-light-primary fs-7 fw-boldest me-2">AUG 01, 13</span>
																<a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
															</div>
															<!--end::Info-->
														</div>
													</div>
													<!--end::Item-->
												</div>
												<!--end::Carousel-->
											</div>
										</div>
										<!--end::Body-->
									</div>
									<!--end::Slider Widget 1-->
									<!--begin::List Widget 4-->
									<div class="card mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header align-items-center border-0 mt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="fw-boldest text-dark fs-2">Folders</span>
												<span class="text-gray-400 mt-2 fw-bold fs-6">32 Active Folders</span>
											</h3>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body pt-1">
											<!--begin::Item-->
											<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
												<!--begin::Section-->
												<div class="d-flex align-items-center">
													<!--begin::Symbol-->
													<div class="symbol symbol-40px symbol-circle me-4">
														<span class="symbol-label bg-light-primary">
															<!--begin::Svg Icon | path: icons/duotone/Clothes/Crown.svg-->
															<span class="svg-icon svg-icon-1 svg-icon-primary">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<path d="M11.2600599,5.81393408 L2,16 L22,16 L12.7399401,5.81393408 C12.3684331,5.40527646 11.7359848,5.37515988 11.3273272,5.7466668 C11.3038503,5.7680094 11.2814025,5.79045722 11.2600599,5.81393408 Z" fill="#000000" opacity="0.3" />
																	<path d="M12.0056789,15.7116802 L20.2805786,6.85290308 C20.6575758,6.44930487 21.2903735,6.42774054 21.6939717,6.8047378 C21.8964274,6.9938498 22.0113578,7.25847607 22.0113578,7.535517 L22.0113578,20 L16.0113578,20 L2,20 L2,7.535517 C2,7.25847607 2.11493033,6.9938498 2.31738608,6.8047378 C2.72098429,6.42774054 3.35378194,6.44930487 3.7307792,6.85290308 L12.0056789,15.7116802 Z" fill="#000000" />
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span>
													</div>
													<!--end::Symbol-->
													<!--begin::Title-->
													<div class="ps-1 mb-1">
														<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Project Alice</a>
														<div class="text-gray-400 fw-bold">Phase 1 development</div>
													</div>
													<!--end::Title-->
												</div>
												<!--end::Section-->
												<!--begin::Label-->
												<span class="badge badge-light rounded-pill fs-7 fw-boldest">43 files</span>
												<!--end::Label-->
											</div>
											<!--end::Item-->
											<!--begin::Alert-->
											<div class="rounded border border-primary bg-light-primary border-dashed px-6 py-5">
												<a href="#" class="link-primary fw-bolder fs-6 me-1">Intive New .NET Collaborators</a>
												<span class="text-gray-800 fw-bold fs-6">to creating great outstanding business to business .jsp modular class outstanding scripts</span>
											</div>
											<!--end::Alert-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::List Widget 4-->
								</div>
								<!--end:::Col-->
								<!--begin:::Col-->
								<div class="col-xxl-7">
									<!--begin::Row-->
									<div class="row g-xl-8">
										<!--begin:::Col-->
										<div class="col-xl-6">
											<!--begin::Engage widget 1-->
											<div class="card card-xl-stretch mb-5 mb-xl-8">
												<!--begin::Card body-->
												<div class="card-body bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-center" style="background-image:url('assets/media/illustrations/customer.png')">
													<!--begin::Title-->
													<div class="fw-boldest fs-3 mb-2">Quick Start Project</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="fw-bold fs-6 text-gray-400 mb-7">Earn $200 bonus now</div>
													<!--end::Description-->
													<!--begin::Link-->
													<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Quick Start</a>
													<!--end::Link-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Engage widget 1-->
										</div>
										<!--end:::Col-->
										<!--begin:::Col-->
										<div class="col-xl-6">
											<!--begin::Chart Widget 1-->
											<div class="card card-xl-stretch mb-5 mb-xl-8">
												<!--begin::Body-->
												<div class="card-body p-0 d-flex justify-content-between flex-column">
													<div class="d-flex flex-stack card-p flex-grow-1">
														<!--begin::Icon-->
														<div class="symbol symbol-45px symbol-circle">
															<div class="symbol-label">
																<!--begin::Svg Icon | path: icons/duotone/Shopping/Cart4.svg-->
																<span class="svg-icon svg-icon-2x">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path opacity="0.25" d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z" fill="#7E8299" />
																		<path d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z" fill="#7E8299" />
																		<path d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z" fill="#7E8299" />
																		<path d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z" fill="#7E8299" />
																		<g opacity="0.25">
																			<path d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z" fill="#7E8299" />
																			<path d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z" fill="#7E8299" />
																		</g>
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
														</div>
														<!--end::Icon-->
														<!--begin::Text-->
														<div class="d-flex flex-column text-end">
															<a href="#" class="fw-boldest text-gray-800 text-hover-primary fs-2">Orders</a>
															<span class="text-gray-400 fw-bold fs-6">Sep 1 - Sep 16 2020</span>
														</div>
														<!--end::Text-->
													</div>
													<!--begin::Chart-->
													<div class="pt-1">
														<div id="kt_chart_widget_1_chart" class="card-rounded-bottom h-125px"></div>
													</div>
													<!--end::Chart-->
												</div>
											</div>
											<!--end::Chart Widget 1-->
										</div>
										<!--end:::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Row-->
									<div class="row g-xl-8">
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
																	<th class="min-w-200px px-0">Authors</th>
																	<th class="min-w-125px">Company</th>
																	<th class="min-w-125px">Progress</th>
																	<th class="text-end pe-2 min-w-70px">Action</th>
																</tr>
																<!--end::Table row-->
															</thead>
															<tbody>
																<!--begin::Table row-->
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
																			<!--begin::Logo-->
																			<div class="symbol symbol-circle symbol-50px me-2">
																				<span class="symbol-label">
																					<img alt="" class="w-25px" src="assets/media/svg/brand-logos/aven.svg" />
																				</span>
																			</div>
																			<!--end::Logo-->
																			<div class="ps-3">
																				<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Brad Simmons</a>
																				<span class="text-gray-400 fw-bold d-block">HTML, JS, ReactJS</span>
																			</div>
																		</div>
																	</td>
																	<!--end::Author=-->
																	<!--begin::Company=-->
																	<td>
																		<span class="text-gray-800 fw-boldest fs-5 d-block">Intertico</span>
																		<span class="text-gray-400 fw-bold">Web, UI/UX Design</span>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Progress=-->
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
																			<span class="text-gray-400 me-2 fw-boldest mb-2">65%</span>
																			<div class="progress bg-light-danger w-100 h-5px">
																				<div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
																			</div>
																		</div>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
																	</td>
																	<!--end::Action=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
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
																			<!--begin::Logo-->
																			<div class="symbol symbol-circle symbol-50px me-2">
																				<span class="symbol-label">
																					<img alt="" class="w-25px" src="assets/media/svg/brand-logos/leaf.svg" />
																				</span>
																			</div>
																			<!--end::Logo-->
																			<div class="ps-3">
																				<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Jessie Clarcson</a>
																				<span class="text-gray-400 fw-bold d-block">C#, ASP.NET, MS SQL</span>
																			</div>
																		</div>
																	</td>
																	<!--end::Author=-->
																	<!--begin::Company=-->
																	<td>
																		<span class="text-gray-800 fw-boldest fs-5 d-block">Agoda</span>
																		<span class="text-gray-400 fw-bold">Houses &amp; Hotels</span>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Progress=-->
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
																			<span class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
																			<div class="progress bg-light-danger w-100 h-5px">
																				<div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
																			</div>
																		</div>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
																	</td>
																	<!--end::Action=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
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
																			<!--begin::Logo-->
																			<div class="symbol symbol-circle symbol-50px me-2">
																				<span class="symbol-label">
																					<img alt="" class="w-25px" src="assets/media/svg/brand-logos/atica.svg" />
																				</span>
																			</div>
																			<!--end::Logo-->
																			<div class="ps-3">
																				<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Lebron Wayde</a>
																				<span class="text-gray-400 fw-bold d-block">PHP, Laravel, VueJS</span>
																			</div>
																		</div>
																	</td>
																	<!--end::Author=-->
																	<!--begin::Company=-->
																	<td>
																		<span class="text-gray-800 fw-boldest fs-5 d-block">RoadGee</span>
																		<span class="text-gray-400 fw-bold">Transportation</span>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Progress=-->
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
																			<span class="text-gray-400 me-2 fw-boldest mb-2">40%</span>
																			<div class="progress bg-light-danger w-100 h-5px">
																				<div class="progress-bar bg-success" role="progressbar" style="width: 40%"></div>
																			</div>
																		</div>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
																	</td>
																	<!--end::Action=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
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
																			<!--begin::Logo-->
																			<div class="symbol symbol-circle symbol-50px me-2">
																				<span class="symbol-label">
																					<img alt="" class="w-25px" src="assets/media/svg/brand-logos/volicity-9.svg" />
																				</span>
																			</div>
																			<!--end::Logo-->
																			<div class="ps-3">
																				<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Natali Trump</a>
																				<span class="text-gray-400 fw-bold d-block">Python, ReactJS</span>
																			</div>
																		</div>
																	</td>
																	<!--end::Author=-->
																	<!--begin::Company=-->
																	<td>
																		<span class="text-gray-800 fw-boldest fs-5 d-block">The Hill</span>
																		<span class="text-gray-400 fw-bold">Insurance</span>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Progress=-->
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
																			<span class="text-gray-400 me-2 fw-boldest mb-2">71%</span>
																			<div class="progress bg-light-danger w-100 h-5px">
																				<div class="progress-bar bg-info" role="progressbar" style="width: 71%"></div>
																			</div>
																		</div>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
																	</td>
																	<!--end::Action=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
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
																			<!--begin::Logo-->
																			<div class="symbol symbol-circle symbol-50px me-2">
																				<span class="symbol-label">
																					<img alt="" class="w-25px" src="assets/media/svg/brand-logos/aven.svg" />
																				</span>
																			</div>
																			<!--end::Logo-->
																			<div class="ps-3">
																				<a href="#" class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Brad Simmons</a>
																				<span class="text-gray-400 fw-bold d-block">HTML, JS, ReactJS</span>
																			</div>
																		</div>
																	</td>
																	<!--end::Author=-->
																	<!--begin::Company=-->
																	<td>
																		<span class="text-gray-800 fw-boldest fs-5 d-block">Intertico</span>
																		<span class="text-gray-400 fw-bold">Web, UI/UX Design</span>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Progress=-->
																	<td>
																		<div class="d-flex flex-column w-100 me-2 mt-2">
																			<span class="text-gray-400 me-2 fw-boldest mb-2">65%</span>
																			<div class="progress bg-light-danger w-100 h-5px">
																				<div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
																			</div>
																		</div>
																	</td>
																	<!--end::Company=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
																	</td>
																	<!--end::Action=-->
																</tr>
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
									<!--begin::Row-->
									<div class="row g-xl-8">
										<!--begin:::Col-->
										<div class="col-xl-6">
											<!--begin::List Widget 1-->
											<div class="card card-xl-stretch mb-5 mb-xl-8">
												<!--begin::Header-->
												<div class="card-header align-items-center border-0 mt-5">
													<!--begin::Heading-->
													<h3 class="card-title align-items-start flex-column">
														<span class="fw-boldest text-dark fs-2">My Competitors</span>
														<span class="text-gray-400 mt-2 fw-bold fs-6">More than 400+ new members</span>
													</h3>
													<!--end::Heading-->
													<!--begin::Toolbar-->
													<div class="card-toolbar">
														<!--begin::Menu-->
														<button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
															<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
															<span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
																		<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																		<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																		<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</button>
														<!--begin::Menu 1-->
														<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
															<!--begin::Header-->
															<div class="px-7 py-5">
																<div class="fs-5 text-dark fw-bolder">Filter Options</div>
															</div>
															<!--end::Header-->
															<!--begin::Menu separator-->
															<div class="separator border-gray-200"></div>
															<!--end::Menu separator-->
															<!--begin::Form-->
															<div class="px-7 py-5">
																<!--begin::Input group-->
																<div class="mb-10">
																	<!--begin::Label-->
																	<label class="form-label fw-bold">Status:</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<div>
																		<select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
																			<option></option>
																			<option value="1">Approved</option>
																			<option value="2">Pending</option>
																			<option value="2">In Process</option>
																			<option value="2">Rejected</option>
																		</select>
																	</div>
																	<!--end::Input-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-10">
																	<!--begin::Label-->
																	<label class="form-label fw-bold">Member Type:</label>
																	<!--end::Label-->
																	<!--begin::Options-->
																	<div class="d-flex">
																		<!--begin::Options-->
																		<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
																			<input class="form-check-input" type="checkbox" value="1" />
																			<span class="form-check-label">Author</span>
																		</label>
																		<!--end::Options-->
																		<!--begin::Options-->
																		<label class="form-check form-check-sm form-check-custom form-check-solid">
																			<input class="form-check-input" type="checkbox" value="2" checked="checked" />
																			<span class="form-check-label">Customer</span>
																		</label>
																		<!--end::Options-->
																	</div>
																	<!--end::Options-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-10">
																	<!--begin::Label-->
																	<label class="form-label fw-bold">Notifications:</label>
																	<!--end::Label-->
																	<!--begin::Switch-->
																	<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
																		<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
																		<label class="form-check-label">Enabled</label>
																	</div>
																	<!--end::Switch-->
																</div>
																<!--end::Input group-->
																<!--begin::Actions-->
																<div class="d-flex justify-content-end">
																	<button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
																	<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
																</div>
																<!--end::Actions-->
															</div>
															<!--end::Form-->
														</div>
														<!--end::Menu 1-->
														<!--end::Menu-->
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body pt-5">
													<!--begin::Item-->
													<div class="d-flex mb-6">
														<!--begin::Symbol-->
														<div class="symbol symbol-60px symbol-2by3 me-4">
															<img src="assets/media/stock/600x400/img-17.jpg" class="mw-100" alt="" />
														</div>
														<!--end::Symbol-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
															<!--begin::Title-->
															<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
																<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Cup &amp; Green</a>
																<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
																<span class="text-gray-400 fw-bold fs-7">By:
																<a href="#" class="text-primary fw-bold">CoreAd</a></span>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="text-end py-lg-0 py-2">
																<span class="text-gray-800 fw-boldest fs-3">24,900</span>
																<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
															</div>
															<!--end::Info-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex mb-6">
														<!--begin::Symbol-->
														<div class="symbol symbol-60px symbol-2by3 me-4">
															<img src="assets/media/stock/600x400/img-10.jpg" class="mw-100" alt="" />
														</div>
														<!--end::Symbol-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
															<!--begin::Title-->
															<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
																<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Yellow Hearts</a>
																<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
																<span class="text-gray-400 fw-bold fs-7">By:
																<a href="#" class="text-primary fw-bold">KeenThemes</a></span>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="text-end py-lg-0 py-2">
																<span class="text-gray-800 fw-boldest fs-3">70,380</span>
																<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
															</div>
															<!--end::Info-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex mb-6">
														<!--begin::Symbol-->
														<div class="symbol symbol-60px symbol-2by3 me-4">
															<img src="assets/media/stock/600x400/img-1.jpg" class="mw-100" alt="" />
														</div>
														<!--end::Symbol-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
															<!--begin::Title-->
															<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
																<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Nike &amp; Blue</a>
																<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
																<span class="text-gray-400 fw-bold fs-7">By:
																<a href="#" class="text-primary fw-bold">Invision Inc.</a></span>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="text-end py-lg-0 py-2">
																<span class="text-gray-800 fw-boldest fs-3">7,200</span>
																<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
															</div>
															<!--end::Info-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex mb-">
														<!--begin::Symbol-->
														<div class="symbol symbol-60px symbol-2by3 me-4">
															<img src="assets/media/stock/600x400/img-9.jpg" class="mw-100" alt="" />
														</div>
														<!--end::Symbol-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
															<!--begin::Title-->
															<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
																<a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Red Boots</a>
																<span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
																<span class="text-gray-400 fw-bold fs-7">By:
																<a href="#" class="text-primary fw-bold">Figma Studio</a></span>
															</div>
															<!--end::Title-->
															<!--begin::Info-->
															<div class="text-end py-lg-0 py-2">
																<span class="text-gray-800 fw-boldest fs-3">36,450</span>
																<span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
															</div>
															<!--end::Info-->
														</div>
														<!--end::Section-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::List Widget 1-->
										</div>
										<!--end:::Col-->
										<!--begin:::Col-->
										<div class="col-xl-6">
											<!--begin::List Widget 2-->
											<div class="card card-xl-stretch mb-5 mb-xl-8">
												<!--begin::Header-->
												<div class="card-header align-items-center border-0 mt-5">
													<h3 class="card-title align-items-start flex-column">
														<span class="fw-boldest text-dark fs-2">My Agents</span>
														<span class="text-gray-400 mt-2 fw-bold fs-6">More than 400+ new members</span>
													</h3>
													<div class="card-toolbar">
														<!--begin::Menu-->
														<button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
															<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
															<span class="svg-icon svg-icon-2">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
																		<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																		<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																		<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</button>
														<!--begin::Menu 2-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu separator-->
															<div class="separator mb-3 opacity-75"></div>
															<!--end::Menu separator-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">New Ticket</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">New Customer</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start" data-kt-menu-flip="left-start, top">
																<!--begin::Menu item-->
																<a href="#" class="menu-link px-3">
																	<span class="menu-title">New Group</span>
																	<span class="menu-arrow"></span>
																</a>
																<!--end::Menu item-->
																<!--begin::Menu sub-->
																<div class="menu-sub menu-sub-dropdown w-175px py-4">
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3">Admin Group</a>
																	</div>
																	<!--end::Menu item-->
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3">Staff Group</a>
																	</div>
																	<!--end::Menu item-->
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3">Member Group</a>
																	</div>
																	<!--end::Menu item-->
																</div>
																<!--end::Menu sub-->
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">New Contact</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu separator-->
															<div class="separator mt-3 opacity-75"></div>
															<!--end::Menu separator-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<div class="menu-content px-3 py-3">
																	<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
																</div>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu 2-->
														<!--end::Menu-->
													</div>
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body pt-5">
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-7">
														<!--begin::Section-->
														<div class="d-flex align-items-center">
															<!--begin::Symbol-->
															<div class="symbol symbol-circle symbol-40px me-4">
																<img src="assets/media/avatars/150-3.jpg" alt="" />
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="ps-1">
																<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">Anne Clarc</a>
																<div class="fs-7 text-gray-400 fw-bold mt-1">HTML, CSS, Laravel</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<a href="#" class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-7">
														<!--begin::Section-->
														<div class="d-flex align-items-center">
															<!--begin::Symbol-->
															<div class="symbol symbol-circle symbol-40px me-4">
																<img src="assets/media/avatars/150-2.jpg" alt="" />
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="ps-1">
																<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">Brad Simmons</a>
																<div class="fs-7 text-gray-400 fw-bold mt-1">HTML, JS, ReactJS</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<a href="#" class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-7">
														<!--begin::Section-->
														<div class="d-flex align-items-center">
															<!--begin::Symbol-->
															<div class="symbol symbol-circle symbol-40px me-4">
																<img src="assets/media/avatars/150-4.jpg" alt="" />
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="ps-1">
																<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">Randy Trent</a>
																<div class="fs-7 text-gray-400 fw-bold mt-1">C#, ASP.NET, MS SQL</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<a href="#" class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-7">
														<!--begin::Section-->
														<div class="d-flex align-items-center">
															<!--begin::Symbol-->
															<div class="symbol symbol-circle symbol-40px me-4">
																<img src="assets/media/avatars/150-5.jpg" alt="" />
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="ps-1">
																<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">Ricky Hunt</a>
																<div class="fs-7 text-gray-400 fw-bold mt-1">PHP, Laravel, VueJS</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<a href="#" class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
														<!--end::Label-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-">
														<!--begin::Section-->
														<div class="d-flex align-items-center">
															<!--begin::Symbol-->
															<div class="symbol symbol-circle symbol-40px me-4">
																<img src="assets/media/avatars/150-6.jpg" alt="" />
															</div>
															<!--end::Symbol-->
															<!--begin::Title-->
															<div class="ps-1">
																<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-boldest">Jessie Clarcson</a>
																<div class="fs-7 text-gray-400 fw-bold mt-1">ReactJS</div>
															</div>
															<!--end::Title-->
														</div>
														<!--end::Section-->
														<!--begin::Label-->
														<a href="#" class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
														<!--end::Label-->
													</div>
													<!--end::Item-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::List Widget 2-->
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
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row flex-stack">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-gray-400 fw-bold me-1">Created by</span>
								<a href="" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
								</li>
								<li class="menu-item">
									<a href="https://keenthemes.com/products/rider-html-free" target="_blank" class="menu-link px-2">Free Download</a>
								</li>
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->

		<!--begin::Drawers-->
		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop rounded-circle" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<!--end::Page Custom Javascript-->
        <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Javascript-->
		<script>
			$("#kt_table_widget_1").DataTable();
		</script>
	</body>
	<!--end::Body-->
</html>