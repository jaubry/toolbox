@extends('inspinia.layout.default')



@section('content')


@push('styles')
<link href="{{ asset('assets/inspinia/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/inspinia/css/select2-bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row">
        <div class="col-lg-12">
            
            
            <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Informations utilisateur</h5>
                    </div>
                    <div class="ibox-content">

                    {!! Form::open(['url' => route('emp.save'), 'name' => 'empEdit', 'id' => 'empEdit', 'class' => '', 'method' => 'post']) !!}
            @csrf
                        

                                        <fieldset>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Nom :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="lastname" name="lastname" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom" value="{{ old('lastname') }}"/>
                                                    @error('lastname')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Prénom :</label>
                                                <div class="col-sm-10">
                                                {!! Form::text('firstname', $emp->firstname, array('class' => 'form-control') ) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Email :</label>
                                                <div class="col-sm-10">
                                                {!! Form::email('mail', $emp->mail, array('class' => 'form-control') ) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Mot de passe :</label>
                                                <div class="col-sm-10">
                                                {!! Form::password('password', array('class' => 'form-control') ) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Profil:</label>
                                                <div class="col-sm-10">
                                                {!! Form::select('id_employee_group', $groupsForSelect, $emp->id_employee_group, [
	                                                	'id' => 'id_employee_group', 
	                                                	'class' => 'form-control select2',
	                                                	'data-placeholder' => 'Choix d\'un profil...']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Boutique exclusive :</label>
                                                <div class="col-sm-10">
                                                    
                                                    {!! Form::select('id_store', $lstStores, (!!$emp->exclusiveStore) ? $emp->exclusiveStore->id_store : "", [
	                                                	'id' => 'id_store', 
	                                                	'class' => 'form-control select2',
	                                                	'data-placeholder' => 'Choix d\'un boutique...']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Boutiques multiples :</label>
                                                <div class="col-sm-10">
                                                <select id="lstStores" name="lstStores[]" class="form-select select2 form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                                    <option value=""></option>
                                                    @foreach ($lstStores as $id_store => $store_name)
                                                    <option value="{{ $id_store }}"
                                                    @if(in_array($id_store, $empStores))
                                                        selected
                                                    @endif >{{ $store_name }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>

                                            <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="buttton">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                    </div>
                                </div>
                                        </fieldset>

                        {!! Form::close() !!}


                    </div>
            </div>    
        

        </div>    
    </div>


    @push('scripts')

    <script src="{{ asset('assets/inspinia/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
                    
	    $(document).ready(function() {

            $(".select2").select2();


        });



    </script>

    @endpush


@endsection
        