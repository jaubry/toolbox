<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    
    public function index(Request $request)
    {

        $page_title = 'Accueil';
        $page_active = 'home';
        $page_description = 'Some description for the page';
        
        $stores = Store::getStores(1);

        /*$orders = Order::with(['customer', 'store',
        'store.storeLang' => function($query2) { $query2->where('id_lang', '=', '1'); }])->whereRaw("date(delivery_date_desired) = '2021-10-20'")->where('id_store', '=', 56)->get();
        */
        $crit_name = (!!$request->input("crit_name") ? $request->input("crit_name") : "");
        $crit_email = (!!$request->input("crit_email") ? $request->input("crit_email") : "");
        $crit_stores = $request->input("crit_stores");

        if (!!$crit_stores && is_array($crit_stores)) {
            $crit_stores = implode(",",$crit_stores);
        }

            $dataOrder = [
                "lastname" => $crit_name,
                "firstname" => "",
                "email" => $crit_email,
                "id_store" => $crit_stores,
                "order_date" => "2021-10-20",
                "id_order" => ""
            ];
            //dd($dataOrder);
        $req = "  select id_order, o.id_carrier, car.name as type_order, tab_cst.id_customer,  concat(tab_cst.lastname, ' ', tab_cst.firstname) as client_name, tab_cst.email,
        s.name as shop, o.total_product_ttc, o.total_paid_real, o.total_discount, o.date_add, o.delivery_date_desired, o.id_order_state, osl.public_name as statut
        from ws_orders o
        inner join ws_carrier car on o.id_carrier = car.id_carrier ";
    
        if ($dataOrder["lastname"] != "" || $dataOrder["firstname"] != "" || $dataOrder["email"] != "") {
    
          $req .= " inner join (select id_customer, lastname, firstname, email from ws_customer c ";
          $reqSubCrit = ""; //where 1=1 ";
    
          if ($dataOrder["lastname"] != "") {
            $reqSubCrit .= " c.lastname LIKE '%".$dataOrder["lastname"]."%' ";
          }
          if ($dataOrder["firstname"] != "") {
            $reqSubCrit .= ($reqSubCrit != "" ? " and " : "") . " c.firstname LIKE '%".$dataOrder["firstname"]."%' ";
          }
          if ($dataOrder["email"] != "") {
            $reqSubCrit .= ($reqSubCrit != "" ? " and " : "") . " c.email like '".$dataOrder["email"]."%' ";
          }
          $req .= "where " . $reqSubCrit . " limit 500) tab_cst on tab_cst.id_customer = o.id_customer ";
    
        } else {
    
          $req .= " inner join ws_customer tab_cst on tab_cst.id_customer = o.id_customer ";
    
        }
        $req .= " inner join ws_store s on o.id_store = s.id_store
        inner join ws_order_state_lang osl on osl.id_order_state = o.id_order_state and osl.id_lang = "._ID_LANG_."
         where 1=1 "; //and o.id_order_state  in (29,32) ";
    
        if ($dataOrder["email"] == "Delivreoo@achanger.com") {
            $req .= " and o.date_add > DATE_ADD(now(), interval -7 day) ";
        }
    
        if ($dataOrder["id_store"] != "") {
          $req .= " and o.id_store in (".$dataOrder["id_store"].") ";
        }
        if ($dataOrder["order_date"] != "") {
          $req .= " and date(o.delivery_date_desired) = '".$dataOrder["order_date"]."' ";
        }
        if ($dataOrder["id_order"] != "") {
          $req .= " and o.id_order = ".$dataOrder["id_order"]." ";
        }
    
        $req .= " order by o.id_order desc  limit 100;";

        $orders = DB::select( DB::raw($req) );

        
        return view('search.index', compact('page_title', 'page_description', 'page_active', 'stores', 'orders'));

    }
}
