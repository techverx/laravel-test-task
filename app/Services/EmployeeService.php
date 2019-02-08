<?php

namespace App\Services;

use App\Repositories\EmployeeRepo;

class EmployeeService extends BaseService{

    protected $employee_repo;
    public function __construct()
    {
        $this->employee_repo = new EmployeeRepo();
    }

    public function getAllEmployees(){
        return $this->employee_repo->getAll();
    }

    public function getEmployees(){
        return $this->employee_repo->getEmployees();
    }

    public function create($request){
        return $this->employee_repo->store($request);
    }

    public function updateRecord($condition, $record){
        return $this->employee_repo->update($condition, $record);
    }

    public function getEmployee($id){
        return $this->employee_repo->findById($id);
    }

    public function destroy($id){
        $this->employee_repo->destroy($id);
    }
}