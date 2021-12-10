<?php namespace App\Repositories;

use App\Models\Employee;
use App\Models\EmployeeStore;

class EmployeeRepository implements EmployeeRepositoryInterface
{
	public function getAll(){
		return Employee::all();
	}

	public function getEmployee($id){
		return Employee::findOrFail($id);
	}


    public function updateEmployeeInfos($id, array $post_data) 
    {
        return Employee::find($id)->update($post_data);
    }


    public function updateEmployeeStores($id, array $post_data) 
    {
        // delete first
        EmployeeStore::where('id_employee', '=', $id)->delete();

        $nbInserted = 0;
    
        if (count($post_data) > 0) {
            // then insert if any
            $nbInserted = EmployeeStore::upsert($post_data, ['id_employee','id_store']);
        }
        
        $success = (count($post_data) == $nbInserted);
                
        return $success;
    }
    
	// more 

}