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
                        <h3 class="box-title">Create Company</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="row">
                        <div class="col-md-12 form">
                            {!! Form::open(['url' => '/company', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('Name'); !!}
                                    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Enter Name', 'required', 'autofocus']) !!}

                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::label('Email'); !!}
                                    {!! Form::text('email',old('email'),['class' => 'form-control', 'placeholder' => 'Enter Email', 'required']) !!}

                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                                    {!! Form::label('Website'); !!} (http://example.com)
                                    {!! Form::text('website',old('website'),['class' => 'form-control', 'placeholder' => 'Enter Website URL', 'required']) !!}

                                    @if ($errors->has('website'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                    {!! Form::file('logo',['required']) !!}
                                    @if ($errors->has('logo'))
                                        <span class="help-block text-danger">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            {!! Form::token() !!}

                            <div class="box-footer">
                                {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-primary float-right']) !!}
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