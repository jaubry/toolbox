<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'ws_employee';

    protected $primaryKey = 'id_employee';

    public $timestamps = false;

    protected $fillable = ['lastname', 'firstname', 'mail', 'active', 'id_employee_group'];

    public function group()
    {
        return $this->hasOne(EmployeeGroup::class, 'id_employee_group', 'id_employee_group');
    }

    public function exclusiveStore()
    {
        return $this->hasOne(Store::class, 'id_store', 'id_store');
    }
    
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'ws_employee_store', 'id_employee', 'id_store');
    }
    
    /*
    public function getStores($idLang)   {
        return $this->with(['group',  
            'exclusiveStore', 
            'stores',
            'stores.storeLang' => function($query2) { $query2->where('id_lang', '=', '1'); }] 
        )->get();
    }
    */

    public function getFullName() {
        return strtoupper($this->lastname) . " " . $this->firstname;
    }

    public static function getAll() {
        return Employee::with(['group',  
            'exclusiveStore', 
            'stores',
            'stores.storeLang' => function($query2) { $query2->where('id_lang', '=', '1'); }] 
        )->get();
    }
    
    public function getStores() {
        $finalLstStores = [];
        $lstStores = $this->stores;        
        if (count($lstStores) > 0) {
            foreach ($lstStores as $store):
                $finalLstStores[] = $store->id_store;
            endforeach;
        }
        $exclusiveStore = $this->store;
        if (!!$exclusiveStore) {
            $finalLstStores[] = $exclusiveStore->id_store;
        }
        return $finalLstStores;

    }




}
