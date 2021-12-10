<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Configuration extends Model
{
    use HasFactory;

    protected $table = 'ws_configuration';

    protected $primaryKey = 'id_configuration';

    public $timestamps = false;

    static public function get($name, $default = 0, $memcached = true, $cache = true, $idLang = NULL)
    {
        /*
        if (self::$_CacheConfig == NULL) {
            self::loadcache();
        }
        */
        if (!$idLang && defined('_ID_LANG_')) {
            $idLang = env('_ID_LANG_');
        }
        /*
        if (self::$_CacheConfig != false and self::$_CacheConfig != NULL) {

            if (isset(self::$_CacheConfig[$name])) {
                $e = self::$_CacheConfig[$name];
                if (!isset($e['lang']) or !isset($e['lang'][$idLang])) {
                    return $e['value'];
                } else {
                    return $e['lang'][$idLang]['value_lang'];
                }
            } else {
                return $default;
            }
        }
        */
        // absence du fichier de cache, utilisation de MySQL
        $idLang = 1;
\Tools::debug($idLang, true);
\Tools::debug($name, true);

        $sql = DB::select( DB::raw('SELECT if(cl.value_lang!="",cl.value_lang,c.value) as value ' .
        'FROM `' . env('_DB_PREFIX_') . 'configuration` c ' .
        'JOIN `' . env('_DB_PREFIX_') . 'configuration_lang` cl ' .
        'ON cl.id_configuration = c.id_configuration ' .
        'AND cl.id_lang = :id_lang AND c.name = :name'), array(
            'id_lang' => $idLang,
            'name' => $name,
          ));
/*
        $sql = 'SELECT if(cl.value_lang!="",cl.value_lang,c.value) as value ' .
            'FROM `' . env('_DB_PREFIX_') . 'configuration` c ' .
            'JOIN `' . env('_DB_PREFIX_') . 'configuration_lang` cl ' .
            'ON cl.id_configuration = c.id_configuration ' .
            'AND cl.id_lang = ' . pSQL($idLang) . ' ' .
            'AND c.name = \'' . pSQL($name) . '\'';
        $r = DB::getValue($sql, $memcached);
        */

        if ($r === false) {
            return $default;
        } else {
            return $r;
        }

    }    

    
}