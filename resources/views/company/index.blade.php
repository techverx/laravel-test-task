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

                <div class="float-right">
                    <a href="/company/create" class="btn btn-md btn-primary">Create Company</a>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Companies Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="companies" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company['name']}}</td>
                                    <td>{{$company['email']}}</td>
                                    <td>{{$company['website']}}</td>
                                    <td class="text-center">
                                        @if($company['logo'])
                                            @if (file_exists(public_path('storage/'.$company['logo'])))
                                                <img src="{{asset('storage/'.$company['logo'])}}" width="50px" height="50px">
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span><a class="btn btn-sm btn-success deleteForm" href="/company/{{$company->id}}">Show</a></span>
                                        <span><a class="btn btn-sm btn-primary deleteForm" href="/company/{{$company->id}}/edit">Edit</a></span>
                                        <div class="deleteForm">
                                            {{ Form::open(array('url' => '/company/'.$company->id, 'id' => 'deleteForm')) }}
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
                    {{ $companies->links() }}
                </div>
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection