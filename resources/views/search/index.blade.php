@extends('layout.default')



@section('content')


<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
		<!--begin::Layout-->

<!--begin::Accordion-->
<div class="accordion" id="kt_accordion_1">
    <div class="accordion-item">
        <h2 class="accordion-header" id="kt_accordion_1_header_1">
            <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1" aria-expanded="true" aria-controls="kt_accordion_1_body_1">
            Critères de recherche
            </button>
        </h2>
        <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
            <div class="accordion-body">

<form name="frmSearchOrder" method="post" action="">
{{ csrf_field() }}
    <div class="row mb-3">
        <label for="crit_name" class="col-sm-2 col-form-label">Nom/Prénom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-solid" id="crit_name" name="crit_name" placeholder="">
        </div>
    </div>
    <div class="row mb-3">
        <label for="crit_email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-solid" id="crit_email" name="crit_email" placeholder="">
        </div>
    </div>
    <div class="row mb-3">
        <label for="crit_date" class="col-sm-2 col-form-label">Date cmde</label>
        <div class="col-sm-10">
        <input class="form-control form-control-solid" placeholder="Pick date rage" id="crit_date" name="crit_date"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="crit_numorder" class="col-sm-2 col-form-label">Numéro de commande</label>
        <div class="col-sm-10">
        <input class="form-control form-control-solid" placeholder="" id="crit_numorder" name="crit_numorder"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="crit_stores" class="col-sm-2 col-form-label">Boutique</label>
        <div class="col-sm-10">

            <select id="lstStores" name="crit_stores[]" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                <option value="">Toutes</option>
                
							@foreach ($stores as $store)
							<option value="{{ $store->id_store }}">{{ $store->storeLang[0]->name }}</option>
							@endforeach
            </select>
        
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
<!--end::Accordion-->

<div class="card mt-5">
    <div class="card-header">
        <h3 class="card-title">Title</h3>
        <div class="card-toolbar">
            <button type="button" class="btn btn-sm btn-light">
                Action
            </button>
        </div>
    </div>
    <div class="card-body">
        
    <!--<table id="kt_datatable_example_1dddd" class="table table-striped table-row-bordered gy-5 gs-7">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800">
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
        <tr>
            <td>Garrett Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
        </tr>
    </tbody>
</table>
-->

                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Commandes [TODO]</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="table-responsive mb-4">
<table id="kt_datatable_example_1" class="table table-striped border table-row-bordered rounded gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-muted">
                                              <th>ID</th>
                                              <th>Date cmde (souhait)</th>
                                              <th>Type</th>
                                              <th>Statut</th>
                                              <th>Store</th>
                                              <th>Client / Email</th>
                                              <th>Montant (réduction)</th>
                                              <th>Action</th>
                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td> {{ $order->id_order }} </td>
                                                <td>
                                                    {{ date('d/m/Y', strtotime($order->delivery_date_desired))  }}<br/>
                                                    <small class="text-muted">{{ date('H:i', strtotime($order->delivery_date_desired))  }} </small></td>
                                                <td>{{ $order->type_order }}</td>
                                                <td class="text-center">{{ $order->statut }}</td>
                                                <td>{{ $order->shop }}</td>
                                                <td>{{ $order->client_name }}<br/>
                                                <small class="text-muted">{{ $order->email }}</small></td>
                                                <td>{{ $order->total_paid_real }} &euro;</td>
                                                <td class="text-center"><button class="btn btn-primary">View</button> </td>
                                            </tr>
                                            @endforeach
                                            

                                    </table>
                                </div>
                            </div>
                        </div>

    </div>
    
</div>


	</div>
	<!--end::Container-->
</div>
<!--end::Content-->

@push('scripts')
        <script>
            

            var start = moment().subtract(29, "days");
var end = moment();            

function cb(start, end) {
    $("#crit_date").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
}


KTUtil.onDOMContentLoaded((function() {
    
    $("#crit_date").daterangepicker();
    /*
    $("#crit_date").daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
    "Today": [moment(), moment()],
    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
    "Last 7 Days": [moment().subtract(6, "days"), moment()],
    "Last 30 Days": [moment().subtract(29, "days"), moment()],
    "This Month": [moment().startOf("month"), moment().endOf("month")],
    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
    }
}, cb);
cb(start, end);
*/

$("#lstStores").select2();

$("#kt_datatable_example_1").DataTable({
  "searching": false
} );

}
));

            
        </script>
@endpush
@endsection