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

    public function __construct()
    {
        $this->company_repo = new CompanyRepo();
    }

    public function getAllCompanies(){
        return $this->company_repo->getAll();
    }

    public function getCompanies(){
        return $this->company_repo->getAllCompanies();
    }

    public function create($request){
        return $this->company_repo->store($request);
    }

    public function updateRecord($condition, $record){
        return $this->company_repo->update($condition, $record);
    }

    public function getCompany($id){
        return $this->company_repo->findById($id);
    }

    public function destroy($id){
        $this->company_repo->destroy($id);
    }

}