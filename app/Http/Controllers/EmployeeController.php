<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeGroup;
use App\Models\Store;
use App\Models\Right;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //
    
    public function index(Request $request)
    {

        $page_title = 'Liste des utilisateurs';
        $page_active = 'emp_list'; // to change
        $page_description = 'Some description for the page';

        $emps = Employee::getAll();

        $hasRightToEdit = hasRight("edit_user");
        
        return view('inspinia.employee.list', compact('page_title', 'page_description', 'page_active', 'emps', 'hasRightToEdit'));

    }

    public function add() {
        

        if (!hasRight("add_user")) {
            return redirect()->route('emp.list');
        }

        $page_title = "Ajout d'un utilisateur";
        $page_active = 'emp_add'; // to change
        $page_description = 'Some description for the page';

        $emp = new Employee();
        $isAdd = true;

        $lstStores = Store::getLstStoresRestricted([0,1,2], true);

        $empStores = [];
        
        $groups = EmployeeGroup::orderBy('id_employee_group')->get();
        $groupsForSelect[''] = "Choix d'un profil";
        foreach ($groups as $group):
            $groupsForSelect[$group->id_employee_group] = $group->group_name;
        endforeach;
        
        return view('inspinia.employee.edit', compact('page_title', 'page_description', 'page_active', 'isAdd', 'emp', 'lstStores', 'groupsForSelect', 'empStores'));

    }


    public function edit(int $id_employee)
    {

        $page_title = "Modification d'un utilisateur";
        $page_active = 'emp_list'; // to change
        $page_description = 'Some description for the page';

        
        $emp = Employee::find($id_employee);
        $isAdd = false;

        $lstStores = Store::getLstStoresRestricted([0,1,2], true);

        $empStores = [];
        foreach ($emp->stores as $store) {
            array_push($empStores, $store->id_store);
        }
        
        $groups = EmployeeGroup::orderBy('id_employee_group')->get();
        $groupsForSelect = [];
        foreach ($groups as $group):
            $groupsForSelect[$group->id_employee_group] = $group->group_name;
        endforeach;
        
        return view('inspinia.employee.edit', compact('page_title', 'page_description', 'page_active', 'isAdd', 'emp', 'lstStores', 'groupsForSelect', 'empStores'));

    }


    public function save(EmployeeRequest $request) 
    {


        $validated = $request->validated();

        
$page_title = 'Liste des utilisateurs';
$page_active = 'emp_list'; // to change
$page_description = 'Some description for the page';

$emps = Employee::getAll();


return view('inspinia.employee.list', compact('page_title', 'page_description', 'page_active', 'emps'));

    }

}
