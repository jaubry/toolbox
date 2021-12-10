<?php

use Illuminate\Support\Facades\Redis;
use App\Models\Right;


function isProfil($group) {
    $currentGroup = session('userGroupId'); //Redis::get('user:employee:group');
    $result = ($currentGroup == $group);
    return $result;
}

function isProfilFranchise() {
    return isProfil(Config::get('global.groups.FRANCHISE'));
}
function isProfilSuperAdmin() {
    return isProfil(Config::get('global.groups.SUPER_ADMIN'));
}



function hasRight($rightMnemo) {
    
    $foundGroupForRight = false;

    $right = Right::where('right_label', $rightMnemo)->get();
    if (isProfilSuperAdmin()) {
        $foundGroupForRight = true;
    }
    else if (!isProfilSuperAdmin() && count($right) > 0) {
        foreach ($right[0]->employeeGroups as $group):
            //var_dump($group);
            if (session('userGroupId') == $group) {
                $foundGroupForRight = true;
            }
        endforeach;
    }
    //dd($foundGroupForRight);
    return $foundGroupForRight;
}