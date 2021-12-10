<?php namespace App\Repositories;

interface EmployeeRepositoryInterface{
	
	public function getAll();

	public function getEmployee($id);
	
	public function updateEmployeeInfos($id, array $post_data);

	public function updateEmployeeStores($id, array $post_data);
	// more
}
