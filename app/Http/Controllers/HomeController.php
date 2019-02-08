<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var $company_service
     * @var $employee_service
     */
    protected  $company_service;
    protected  $employee_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->company_service = new CompanyService();
        $this->employee_service = new EmployeeService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_companies = count($this->company_service->getCompanies());
        $total_employees = count($this->employee_service->getEmployees());
        return view('home', compact('total_companies', 'total_employees'));
    }
}
