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

            <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit An Employee</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(['url' => '/employee/'.$employee['id'], 'method' => 'post']) !!}

                            <div class="box-body">
                                <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    {!! Form::label('First Name'); !!}
                                    {!! Form::text('first_name',$employee['first_name'],['class' => 'form-control', 'required']) !!}

                                    @if ($errors->has('first_name'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    {!! Form::label('Last Name'); !!}
                                    {!! Form::text('last_name', $employee['last_name'],['class' => 'form-control', 'required']) !!}

                                    @if ($errors->has('last_name'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::label('Email'); !!}
                                    {!! Form::text('email', $employee['email'],['class' => 'form-control', 'required']) !!}

                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    {!! Form::label('Phone'); !!}
                                    {!! Form::text('phone', $employee['phone'],['class' => 'form-control', 'required']) !!}

                                    @if ($errors->has('phone'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                                    {!! Form::label('Company'); !!}
                                    {!! Form::select('company', $companies, $employee['company_id'], ['class' => 'form-control']) !!}

                                    @if ($errors->has('company'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            {!! Form::token() !!}

                            {!! Form::hidden('_method', 'PUT') !!}


                            <div class="box-footer">
                                {!! Form::submit('Update', ['class' => 'btn btn-lg btn-primary float-right']) !!}
                            </div>
                            {!! Form::close() !!}
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