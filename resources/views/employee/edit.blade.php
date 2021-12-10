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
														<span class="card-label fw-boldest text-gray-800 fs-2">Modification de l'utilisateur</span>
													</h3>
													<!--end::Card title-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body py-0 mb-5">
                                                    
                                                <form  class="row g-3">

                                                    <div class="row mb-3">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom / Prénom</label>
                                                        <div class="col-sm-10 row">        
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom" value="{{ $emp->lastname }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" value="{{ $emp->firstname }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="mail" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">      
                                                            <input type="email" class="form-control" name="mail" id="mail" value="{{ $emp->mail }}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10 row">        
                                                            <div class="col-md-6">
                                                                <input type="password" class="form-control" name="password" placeholder="Mot de passe" id="password">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="password" class="form-control" name="password2" placeholder="Retapez le mot de passe" id="password2">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-5">
                                                        <label for="id_employee_group" class="col-sm-2 col-form-label">Profile</label>
                                                        <div class="col-sm-10">      
                                                            <select class="form-select" id="id_employee_group" name="id_employee_group">
                                                                <option vlalue=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-5">
                                                        <label for="active" class="col-sm-2 col-form-label">Actif ?</label>
                                                        <div class="col-sm-10">      
                                                            <input type="checkbox" class="form-check-input" id="active">
                                                            <label class="form-check-label" for="active">Oui</label>                                                        
                                                        </div>
                                                    </div>
                                                    
                                                    
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

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
@endsection