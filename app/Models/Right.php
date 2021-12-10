<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';

    protected $table = 'ja_right';

    protected $primaryKey = 'id_right';

    public $timestamps = false;

    
    public function employeeGroups()
    {
        return $this->belongsToMany(EmployeeGroup::class, 'ja_right_group', 'id_right', 'id_group');
    }

}
