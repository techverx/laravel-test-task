<?php

namespace App\Services;

use App\Repositories\CompanyRepo;

/**
 * Class CompanyService
 * @package App\Services
 * @author Umar Farooq <umar@gems.techverx.com>
 * @since 2019
 */
class CompanyService extends AbstractBaseService {

    protected $company_repo;

    /**
     * CompanyService constructor.
     */
    public function __construct()
    {
        $this->company_repo = new CompanyRepo();
    }

    /**
     * @return mixed
     */
    public function getAllCompanies(){
        return $this->company_repo->getAll();
    }

    /**
     * @return CompanyRepo[]|\Illuminate\Database\Eloquent\Collection
     */

    public function getCompanies(){
        return $this->company_repo->getAllCompanies();
    }

    /**
     * @param $request
     */

    public function create($request){
        return $this->company_repo->store($request);
    }

    /**
     * @param $condition
     * @param $record
     */
    public function updateRecord($condition, $record){
        return $this->company_repo->update($condition, $record);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCompany($id){
        return $this->company_repo->findById($id);
    }

    /**
     * @param $id
     */
    public function destroy($id){
        $this->company_repo->destroy($id);
    }

}