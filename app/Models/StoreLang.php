<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLang extends Model
{
    use HasFactory;
    
    protected $table = 'ws_store_lang';

    
    public static function old_getStores($idLang)   {
        return StoreLang::where('id_lang', '1')->orderBy('name')->get();
    }

}
