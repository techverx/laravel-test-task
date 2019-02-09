<?php

namespace App\Services;

use App\Repositories\EmployeeRepo;

class EmployeeService extends BaseService{

    protected $employee_repo;

    /**
     * EmployeeService constructor.
     */
    public function __construct()
    {
        $this->employee_repo = new EmployeeRepo();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllEmployees(){
        return $this->employee_repo->getAll();
    }

    /**
     * @return EmployeeRepo[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEmployees(){
        return $this->employee_repo->getEmployees();
    }

    /**
     * @param $request
     */
    public function create($request){
        return $this->employee_repo->store($request);
    }

    /**
     * @param $condition
     * @param $record
     */
    public function updateRecord($condition, $record){
        return $this->employee_repo->update($condition, $record);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEmployee($id){
        return $this->employee_repo->findById($id);
    }

    /**
     * @param $id
     */
    public function destroy($id){
        $this->employee_repo->destroy($id);
    }
}