
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
                <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">subscribed users</li>
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
                            <h1 class="box-title">subscribed users</h1>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                @if(count($subscribed_users) > 0)
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Subscriber Name</th>
                                            <th>Subscriber Email</th>
                                            <th>Drug</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($subscribed_users as $user)
                                            <tr>
                                                <td><a href="#">{{$user->name}}</a></td>
                                                <td><a href="#">{{$user->email}}</a></td>
                                                <td><a href="#">{{$user->drug_name}}</a></td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                            </div>
                            @else
                                <div class="well">
                                    you currently have no user subscriptions yet
                                </div>
                        @endif
                        <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->

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