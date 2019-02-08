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
                    <a href="/company" class="btn btn-md btn-success addNewService"><i class="fa fa-arrow-left"></i> Back</a>
                </div>

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">View Company</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                {!! Form::open(['url' => '']) !!}

                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('Name'); !!}
                                        {!! Form::text('name',$company['name'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Email'); !!}
                                        {!! Form::text('email', $company['email'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('Website'); !!}
                                        {!! Form::text('website', $company['website'],['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                    <div class="form-group">
                                        <img src="{{asset('storage/'.$company->logo)}}">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                {!! Form::close() !!}
                            </div>
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