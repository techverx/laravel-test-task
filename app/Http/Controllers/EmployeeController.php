<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    protected $employee_service;
    protected $company_service;

    public function __construct()
    {
        $this->employee_service = new EmployeeService();
        $this->company_service = new CompanyService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = $this->employee_service->getAllEmployees();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = ['first_name'=> $request->first_name,'last_name'=> $request->last_name,'email'=> $request->email,'phone'=> $request->phone,'company_id'=> $request->company];
        $company = $this->employee_service->create($data);

        Session::flash('message', 'Employee Has Been Successfully Created!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->employee_service->getEmployee($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->employee_service->getEmployee($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $data = ['first_name'=> $request->first_name, 'last_name'=> $request->last_name, 'email' => $request->email, 'phone' => $request->phone, 'company_id' => $request->company];
        $employee = $this->employee_service->updateRecord(['id'=>$id], $data);

        Session::flash('message', 'Employee Has Been Successfully Updated!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employee_service->destroy($id);

        Session::flash('message', 'Employee Has Been Successfully Deleted!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/employee');
    }
}
