<?php

use App\Services\CompanyService;

View::composer(['employee.create', 'employee.edit'], function ($view) {
    $company_service    =   new CompanyService();
    $results = $company_service->getCompanies();
    $companies  = array();
    foreach ($results as $result){
        $companies[$result->id] = $result->name;
    }
    $view->with(['companies'=>$companies]);
});

?>