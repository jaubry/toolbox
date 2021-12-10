<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    use HasFactory;
    
    protected $table = 'ws_employee_group';

    protected $primaryKey = 'id_employee_group';

    public function rights()
    {
        return $this->belongsToMany(Right::class, 'ja_right_group', 'id_group', 'id_right');
    }

}
