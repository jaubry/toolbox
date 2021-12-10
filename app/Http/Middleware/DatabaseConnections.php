<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use Closure;

class DatabaseConnections 
{
    
    public function handle($request, Closure $next)
    {
        if (\Session::has('country')) {

            $connectionName = (session('country') == "FR") ? 'mysql' : 'mysql_'.session('country');

            //DB::setDefaultConnection('mysql_UK');
            // Purge the current database connection, thus making Laravel get the default values all over again...
            DB::purge('default');

            //var_dump(\Config::get('database.default'));

            // Now set the new connection
            //config(['database.default' => 'mysql_UK']);
            \Config::set('database.default', $connectionName);

            //dd(DB::connection('mysql_UK')->getDatabaseName());

            // ! Reconnect and close previous connection
            DB::reconnect($connectionName);

            // Ping the database.
            // This will throw an exception in case the database does not exists or the connection fails
            Schema::connection($connectionName)->getConnection()->reconnect();
        }
        return $next($request);
    }
}
