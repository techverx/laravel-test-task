@extends('layouts/app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="">
            <!-- left column -->
            <div class="col-md-12 wrapper">
                <!-- general form elements -->

                {{--Session Alert Starts--}}
                @if (session('message'))
                    <div class="alert alert-success alert-notification">
                        {{ session('message') }}
                    </div>
                @endif
                {{--Session Alert Ends--}}

                <div>
                    <a href="/employee/create" class="btn btn-md btn-primary float-right addNewService">Add An Employee</a>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Employees Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="projects" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->first_name.' '.$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>{{$employee->company->name}}</td>
                                <td class="text-center">
                                    <span><a class="btn btn-sm btn-success deleteForm" href="/employee/{{$employee->id}}">Show</a></span>
                                    <span><a class="btn btn-sm btn-primary deleteForm" href="/employee/{{$employee->id}}/edit">Edit</a></span>
                                    <div class="deleteForm">
                                        {{ Form::open(array('url' => '/employee/'.$employee->id, 'id' => 'deleteForm')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn btn-sm btn-danger formDeleteButton">Delete</button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="pagination float-right">
                    {{ $employees->links() }}
                </div>
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection