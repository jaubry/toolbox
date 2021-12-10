<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    

    protected $table = 'ws_orders';

    protected $primaryKey = 'id_order';

    
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id_customer', 'id_customer');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'id_store', 'id_store');
    }
}
