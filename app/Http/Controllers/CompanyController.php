<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    protected $company_service;

    /**
     * CompanyController constructor.
     */
    public function __construct(CompanyService $company_service)
    {
        $this->company_service = $company_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company_service->getAllCompanies();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = $this->company_service->create($request->all());
        if ($request->hasFile('logo')) {
            $image  =   Input::file('logo');
            $file=$this->uploadImage($image, $company->id);
            $this->company_service->updateRecord(['id'=>$company->id], ['logo'=>$file]);
        }
        Session::flash('message', 'Company Has Been Successfully Created!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/company');
    }

    public function uploadImage($data, $company_id){
        $fileName   = time() . '.' . $data->getClientOriginalExtension();

        $img = Image::make($data->getRealPath());
        $img->resize(120, 120, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream();
        $fileName='images/'.$company_id.'/profile_image/'.$fileName;
        Storage::disk('public')->put($fileName, $img);
        return $fileName;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->company_service->getCompany($id);
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->company_service->getCompany($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $data = ['name'=> $request->name, 'email' => $request->email];
        $company = $this->company_service->updateRecord(['id'=>$id], $data);

        if ($request->hasFile('logo')) {
            $image  =   Input::file('logo');
            $file=$this->uploadImage($image, $request->id);
            $this->company_service->updateRecord(['id'=>$request->id], ['logo'=>$file]);
        }

        Session::flash('message', 'Company Has Been Successfully Updated!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->company_service->destroy($id);

        Session::flash('message', 'Company Has Been Successfully Deleted!');
        Session::flash('alert-class', 'alert-success');

        return redirect('/company');
    }
}
