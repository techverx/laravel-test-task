<?php

namespace App\Repositories;


use App\Company;

/**
 * Class CompanyRepo
 * @package App\Repositories
 */
class CompanyRepo extends BaseRepo{

    protected $company;

    /**
     * CompanyRepo constructor.
     */
    public function __construct()
    {
        $this->company = new Company();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->company->paginate(10);
    }

    /**
     * @return Company[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCompanies()
    {
        return $this->company->all();
    }

    /**
     * @param $request
     */
    public function store($request)
    {
        return $this->company->create($request);
    }

    /**
     * @param $condition
     * @param $object
     */
    public function update($condition, $object)
    {
        return $this->company->where($condition)->update($object);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id){
        return $this->company->find($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        return $this->company->where('id',$id)->delete();
    }
}