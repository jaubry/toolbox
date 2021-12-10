<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStore extends \Illuminate\Database\Eloquent\Relations\Pivot
{
    
    protected $table = 'ws_employee_store';

    protected $primaryKey = 'id_employee_store';

    protected $fillable = ['id_employee', 'id_store'];
    
    public $timestamps = false;
    
    public function store2()
    {
        return $this->belongsTo('Store');
    }

    //public function 

}
