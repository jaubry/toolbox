<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    use HasFactory;
    
    use EagerLoadPivotTrait;

    protected $table = 'ws_store';

    protected $primaryKey = 'id_store';
    
    public function employee()
    {
        return $this->belongsToMany(Employee::class, 'ws_employee_store', 'id_store', 'id_employee');
    }
    /*
    public function storeLang()
    {
        return $this->hasMany(StoreLang::class, 'id_store', 'id_store');
    }*/
    
    public function storeLang()
    {
        return $this->hasMany(StoreLang::class, 'id_store', 'id_store');
    }


    public static function getStores($idLang)   {
        return Store::with(['storeLang' => function($query2) { 
            $query2->where('id_lang', '=', '1'); }
        ])->orderBy('name')->get();
    }

    
    public static function getStoresFiltered($idLang, $lstStores)   {
        return Store::with(['storeLang' => function($query2) { 
            $query2->where('id_lang', '=', '1'); }
        ])->orderBy('name')->whereIn('id_store', $lstStores)->get();
    }



	public static function getLstStoresRestricted($arrType = array(0,1,2), $withEmptyLine = false) {

	    //global $employee, $countryMnemo;

	    //$req = null;

        $countryHasStoreType = Schema::hasTable('ws_store_type');

        //$group = Redis::get('user:employee:group');
        
        $employeeId = Auth::id(); //session('userGroupId'); // Redis::get('user:employee:id');

        $finalLstStores = [];

        if ($withEmptyLine) {
            $finalLstStores['0'] = '---------------';
        }

        if (isProfilFranchise()) {

            // FRANCHISE ----------------------------------------------------
            //  linked stores with type FRANCHISE 

            $employee = Employee::find($employeeId);
            $lstStores = $employee->getStores();

            if ($countryHasStoreType):
                $rawStores = Store::join('ws_store_lang', 'ws_store.id_store', '=', 'ws_store_lang.id_store')
                    ->join('ws_store_type', 'ws_store.id_store', '=', 'ws_store_type.id_store')
                    ->join('ws_type_store', 'ws_type_store.id_type_store', '=', 'ws_store_type.id_type_store')
                    ->where('id_lang', '=', 1) // to change
                    ->where('active', '=', 1)
                    ->where('mnemo', 'FRANCHISE')
                    ->whereIn('ws_store.id_store', $lstStores)
                    ->orderBy('ws_store_lang.name')
                    ->select('ws_store.id_store', 'ws_store_lang.name')
                    ->get();
            else:
                $rawStores = Store::join('ws_store_lang', 'ws_store.id_store', '=', 'ws_store_lang.id_store')
                    ->where('id_lang', '=', 1) // to change
                    ->where('active', '=', 1)
                    ->whereIn('id_store', $lstStores)
                    ->orderBy('ws_store_lang.name')
                    ->select('ws_store.id_store', 'ws_store_lang.name')
                    ->get();
            endif;

            foreach($rawStores as $store):
                $finalLstStores[$store->id_store] = $store->name;
            endforeach;


        } else if (isProfilSuperAdmin()) {
            // 
            // SUPER ADMIN ----------------------------------------------------
            //   => All shops

            $rawStores = Store::join('ws_store_lang', 'ws_store.id_store', '=', 'ws_store_lang.id_store')
                ->where('id_lang', '=', 1) // to change
                ->where('active', '=', 1)
                ->orderBy('ws_store_lang.name')
                ->select('ws_store.id_store', 'ws_store_lang.name')
                ->get();

            foreach($rawStores as $store):
                $finalLstStores[$store->id_store] = $store->name;
            endforeach;
        }

        return $finalLstStores;

        /*

	    $countryHasStoreType = MysqliDb::getInstance()->tableExists('ws_store_type');

	    $critTypeShop = "";
	    if (is_array($arrType)) {
	    	$strCritTypeShop = implode(",", $arrType);
	    	$critTypeShop = " and type_shop in ($strCritTypeShop)";
	    }


		// language
		$dbCountry = initConn($countryMnemo);
		$idLangCountry = Configuration::getLangForceDb($dbCountry);


		if (isProfil(V3_SUPERVISEUR) && $countryMnemo =="FR")
	    {

            $req = "SELECT s.id_store, sl.name
                FROM ws_store s inner join ws_store_lang sl on sl.id_store = s.id_store and sl.id_lang = $idLangCountry " .
                (($countryHasStoreType) ? "inner join ws_store_type st on st.id_store = s.id_store
	            inner join ws_type_store t on t.id_type_store = st.id_type_store and t.mnemo = 'INTEGRE' " :"") .
                " where s.active = 1 $critTypeShop order BY sl.name ";

	    }

	    else if (isProfil(PROFIL_FRANCHISE) || isProfil(V3_GESTION_BOUT) || isProfil(V3_MANAGER)  || isProfil(PROFIL_SUP) || isProfil(V3_SUPERVISEUR) || isProfil(PROFIL_SUP_FRANCH)) {
	    	$idEmployee = $employee->id;
	        $idStoreEmployee = $employee->id_store;

	        $lstStore = Employee::getStoresEmployee($idEmployee);

	        $lstStoresWhere = implode(",", $lstStore);

            $req = "SELECT s.id_store, sl.name
                FROM ws_store s inner join ws_store_lang sl on sl.id_store = s.id_store and sl.id_lang = $idLangCountry 
                where s.active = 1 $critTypeShop ";
            if (!!$lstStoresWhere) {
            	$req .= " and s.id_store in ($lstStoresWhere) ";
            } else {
            	$req .= " and s.id_store = $idStoreEmployee ";
            }
            $req .= " order by sl.name asc ";
	    }

	    else if (isProfil(PROFIL_BOUTIQUE))
	    {

	        $idEmployee = $employee->id;
	        $idStoreEmployee = $employee->id_store;

	        if (!!$idStoreEmployee) 
	        {
	            $req = "SELECT s.id_store, sl.name
	                FROM ws_store s inner join ws_store_lang sl on sl.id_store = s.id_store and sl.id_lang = $idLangCountry 
	                where s.active = 1 $critTypeShop 
	         		and s.id_store = $idStoreEmployee limit 0,1";
	        }
	    }

	    else 
	    {

            $req = "SELECT s.id_store, sl.name
                FROM ws_store s inner join ws_store_lang sl on sl.id_store = s.id_store and sl.id_lang = $idLangCountry 
                where s.active = 1 $critTypeShop  
         		order BY sl.name ";

	    }


	    if ($req) {
	        return MysqliDb::getInstance()->rawQuery($req);
	    } else {
	        return array();
	    }
        */
    }

}
