@extends('layouts/app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="">
            <!-- left column -->
            <div class="col-md-12 wrapper">
                {{--Session Alert Starts--}}
                @if (session('message'))
                    <div class="alert alert-success alert-notification">
                        {{ session('message') }}
                    </div>
                @endif
                {{--Session Alert Ends--}}

                <div>
                    <a href="{{url('/employee')}}" class="btn btn-md btn-success addNewService"><i class="fa fa-arrow-left"></i> Back</a>
                </div>

            <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">View Employee</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">

                                {!! Form::open(['url' => '/employee/'.$employee['id'], 'method' => 'post']) !!}

                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('First Name'); !!}
                                        {!! Form::text('first_name',$employee['first_name'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Last Name'); !!}
                                        {!! Form::text('last_name', $employee['last_name'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Email'); !!}
                                        {!! Form::text('email', $employee['email'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Phone'); !!}
                                        {!! Form::text('phone', $employee['phone'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Company'); !!}
                                        {!! Form::text('company', $employee['company']['name'], ['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                {!! Form::close() !!}
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection