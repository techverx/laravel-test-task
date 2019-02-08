<?php

namespace App\Repositories;

use App\Employee;

class EmployeeRepo extends BaseRepo{
    
    protected $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function getAll()
    {
        return $this->employee->with('company')->paginate(10);
    }

    public function getEmployees()
    {
        return $this->employee->all();
    }

    public function store($request)
    {
        return $this->employee->create($request);
    }

    public function update($condition, $object)
    {
        return $this->employee->where($condition)->update($object);
    }

    public function findById($id){
        return $this->employee->find($id);
    }

    public function destroy($id)
    {
        return $this->employee->where('id',$id)->delete();
    }
}