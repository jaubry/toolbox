<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    
    public static function getStockoutProducts($idStore, $onlyDisabled = false)   {

        $urlProtocol = "http";
        $url = "preprodv3.sushishop.fr";
        $idLang = 1;

        $sql = 'select p.id_product, reference, id_category_default, c.position, IFNULL(cl.name, "[Sans catégorie]") as cat_name, pl.name as product_name, p.quantity, p.price_ttc,
            CONCAT("'.$urlProtocol.'://'.$url.'/product-", pic.id_object_picture, "-200x200/", pl.link_rewrite, ".png") as image_url,
            p.is_menu, p.with_accompagnements,
            tab_rupt.active as active_rupt
        from ws_product p
        inner join ws_product_lang pl on p.id_product = pl.id_product
        left join ws_category c on p.id_category_default = c.id_category 
        left join ws_category_lang cl on c.id_category = cl.id_category and cl.id_lang = '.$idLang.'
        left join ( 
            select id_object, max(id_object_picture) as id_object_picture
            from ws_picture 
            where class = "product"
            group by id_object
        ) pic on p.id_product = pic.id_object
        inner join ws_product_store ps on ps.id_product = p.id_product and ps.id_store = '.$idStore.'
        left join (
        select sp.id_product, active, date_start, date_end
        from (
            select id_store, id_product, max(date_start) as max_date_start
            from ws_stockout_product
            where id_store = '.$idStore.'
            group by id_product, id_store
        ) tab inner join  ws_stockout_product sp on sp.id_product = tab.id_product and sp.id_store = tab.id_store and sp.date_start = tab.max_date_start
        ) tab_rupt on p.id_product = tab_rupt.id_product
        inner join ja_category_visibility cv on id_category_default = cv.id_category
        where p.active = 1 and pl.id_lang = '.$idLang.' and cv.display_stockout = 1 
        group by p.id_product, tab_rupt.active,
            reference, id_category_default, c.position, 
            IFNULL(cl.name, "[Sans catégorie]"), pl.name, p.quantity, p.price_ttc,
            CONCAT("'.$urlProtocol.'://'.$url.'/product-", pic.id_object_picture, "-200x200/", pl.link_rewrite, ".png"),
            p.is_menu, p.with_accompagnements, cl.name, pic.id_object_picture, pl.link_rewrite
        order by c.position, pl.name';
        //dd($sql);

        $products = DB::select( DB::raw($sql) );


        $arrProductsByCat = array();
        $tmpCat = "";
        foreach($products as $productImage) {
          if (($onlyDisabled && $productImage->active_rupt == "1") || (!$onlyDisabled)) {
            if (!array_key_exists($productImage->cat_name, $arrProductsByCat)) {
              $arrProductsByCat[$productImage->cat_name] = array();
            }
            $arrProductsByCat[$productImage->cat_name][] = array(
                "name" => $productImage->product_name,
                "image" => $productImage->image_url,
                "price" => $productImage->price_ttc,
                "id_product" => $productImage->id_product,
                "reference" => $productImage->reference,
                "quantity" => $productImage->quantity,
                "is_menu" => $productImage->is_menu,
                "with_accompagnements" => $productImage->with_accompagnements,
                /*"max_time_deb" => $productImage->max_time_deb,
                "min_time_end" => $productImage->min_time_end,*/
                "active_rupt" => $productImage->active_rupt/*,
                "is_shop" => $productImage->is_shop,
                "is_corner" => $productImage->is_corner,
                "is_retail" => $productImage->is_retail*/
            );
          }
        }
        return $arrProductsByCat;


        /*
        return Store::with(['storeLang' => function($query2) { 
            $query2->where('id_lang', '=', '1'); }
        ])->orderBy('name')->get();
        */
    }
}
