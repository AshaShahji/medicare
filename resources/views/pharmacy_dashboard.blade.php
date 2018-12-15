
@extends('layouts.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Welcome, {{$user->name}}

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif

                            @if (session('success_status'))
                                <div class="alert alert-success">
                                    {{session('success_status')}}
                                </div>
                            @endif



                            @if (session('error_status'))
                                <div class="alert alert-danger">
                                    {{session('error_status')}}
                                </div>
                            @endif


                            <h1 class="box-title">Created Drugs</h1>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                @if(count($created_drugs) > 0)
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Drug Name</th>
                                            <th>Expiry Date</th>
                                            <th>Price</th>
                                            <th>Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($created_drugs as $drug)
                                            <tr>
                                                <td><a href="#">{{$drug->drug_name}}</a></td>
                                                <td>{{$drug->expiry_date}}</td>
                                                <td>€ {{$drug->price}}</td>
                                                @if($drug->status <> 'Active')
                                                    <td><span class="label label-warning">Not Approved </span></td>
                                                @else
                                                    <td><span class="label label-success">Active </span></td>
                                                @endif


                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                            </div>
                            @else
                                <div class="well">
                                    No Drugs created yet!
                                </div>
                        @endif
                        <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{url('add-drug')}}" class="btn btn-sm btn-info btn-flat pull-left">Add Drug</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection