<?php

namespace App\Repositories;

use App\Employee;

class EmployeeRepo extends BaseRepo{

    protected $employee;

    /**
     * EmployeeRepo constructor.
     */
    public function __construct()
    {
        $this->employee = new Employee();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->employee->with('company')->paginate(10);
    }

    /**
     * @return Employee[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getEmployees()
    {
        return $this->employee->all();
    }

    /**
     * @param $request
     */
    public function store($request)
    {
        return $this->employee->create($request);
    }

    /**
     * @param $condition
     * @param $object
     */
    public function update($condition, $object)
    {
        return $this->employee->where($condition)->update($object);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id){
        return $this->employee->find($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        return $this->employee->where('id',$id)->delete();
    }
}