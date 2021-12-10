@extends('inspinia.layout.default')



@section('content')


@push('styles')
<link href="{{ asset('assets/inspinia/css/datatables.min.css') }}" rel="stylesheet">
@endpush

    <div class="row">
        <div class="col-lg-12">
            
            
        <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Liste</h5>
                        <!--
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>-->
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actif ?</th>
                        <th>Profil</th>
                        <th>Stores</th>
                        @if ($hasRightToEdit)
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($emps as $emp)
                        <tr>
                            <td>{{ $emp->id_employee }}</td>
                            <td>{{ $emp->getFullName() }}</td>
                            <td>{{ $emp->mail }}</td>
                            <td>
                                @if ($emp->active)
                                <span class="badge badge-primary">Actif</span>
                                @else 
                                <span class="badge badge-danger">Inactif</span>
                                @endif
                            </td>
                            <td>@if ($emp->group)
                                {{ $emp->group['group_name'] }}
                                @else
                                <span class="ms-2 badge badge-light-danger fw-bold">N/A</span
                                @endif
                            </td>
                            <td>
                                @if ($emp->exclusiveStore)
                                    <span class="badge badge-info">{{ $emp->exclusiveStore->storeLang[0]->name }}</span>
                                @endif
                                @if ($emp->stores)
                                @foreach ($emp->stores as $store)
                                <span class="badge badge-default">{{ $store->storeLang[0]->name }}</span>
                                    
                                @endforeach
                                @endif
                            </td>
                            @if ($hasRightToEdit)
                            <td><button type="button" 
                                data-emp_id="{{ $emp->id_employee }}" 
                                class="btn btn-primary btn-sm seeEmpBtn"><i class="fa fa-eye"></i>&nbsp;Voir</button></td>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

</div>
        </div>    
        

        </div>    
    </div>


    @push('scripts')

    <script src="{{ asset('assets/inspinia/js/datatables.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
                    
	    $(document).ready(function() {


            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    /*
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},*/
                    /*
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }*/
                ]

            });


            $(".seeEmpBtn").on("click", seeEmpBtnClick);

        });



        // EVENTS
        function seeEmpBtnClick(e) {
            e.preventDefault();
            console.log($(this).data("emp_id"));
        }
    </script>

    @endpush


@endsection
        