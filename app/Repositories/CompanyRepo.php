<?php

namespace App\Repositories;


use App\Company;

/**
 * Class CompanyRepo
 * @package App\Repositories
 */
class CompanyRepo extends BaseRepo{

    protected $company;

    public function __construct()
    {
        $this->company = new Company();
    }

    public function getAll()
    {
        return $this->company->paginate(10);
    }

    public function getAllCompanies()
    {
        return $this->company->all();
    }

    public function store($request)
    {
        return $this->company->create($request);
    }

    public function update($condition, $object)
    {
        return $this->company->where($condition)->update($object);
    }

    public function findById($id){
        return $this->company->find($id);
    }

    public function destroy($id)
    {
        return $this->company->where('id',$id)->delete();
    }
}