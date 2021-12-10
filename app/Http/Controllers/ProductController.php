<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    
    

    public function stockout(Request $request) {

        $page_title = 'Rupture de stock';
        $page_active = 'stockout';
        $page_description = 'bla bla';

        //Redis::set('user:lang:id', 1);
        //Redis::set('user:employee:id', 411);
        //Redis::set('user:employee:group', 25);
        //dd(Redis::get('employee_id'));

        $selectedStore = null;
        $lstStores = Store::getLstStoresRestricted([1]);
        //dd($lstStores);

        $stockoutProducts = Product::getStockoutProducts(219, false);
        //dd($stockoutProducts);
        //return 'ok';
        return view('inspinia.catalog.stockout', compact('page_title', 'page_description', 'page_active', 'selectedStore', 'lstStores', 'stockoutProducts'));
        //return view('catalog.stockout', compact('page_title', 'page_description', 'page_active', 'stockoutProducts'));
        

    }

}
