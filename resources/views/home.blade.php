@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="small-box">
                        <div class="inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{$total_companies}}</h3>
                                    <p>Companies</p>
                                    <a href="{{url('/company')}}" class="small-box-footer">View Companies <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="small-box">
                        <div class="inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{$total_employees}}</h3>
                                    <p>Employees</p>
                                    <a href="{{url('/employee')}}" class="small-box-footer">View Employees <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
