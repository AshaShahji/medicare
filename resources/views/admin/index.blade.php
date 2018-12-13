@extends('layouts.admin_header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">

                    <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Manage Pharmacy Stores</h3>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                @if(!empty($pharmacy))
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Store Name</th>
                                            <th>Status</th>
                                            <th>Manage</th>
                                            <th>View Drugs</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 0; $i < count($pharmacy); $i++)
                                            <tr>
                                                <td><a href="#">{{$i + 1}}</a></td>
                                                <td><a href="#">{{$pharmacy[$i]->name}}</a></td>
                                                @if($pharmacy[$i]->status <> 'active')
                                                    <td><span class="label label-warning">pending </span></td>
                                                @else
                                                    <td><span class="label label-success">activated </span></td>
                                                @endif
                                                @if($pharmacy[$i]->status <> 'active')
                                                    <td>
                                                        <form method="post" action="{{url('activate-account')}}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="pharmacy_id" value="{{$pharmacy[$i]->id}}" >
                                                            <button type="submit" class="btn btn-block btn-success btn-sm">Activate Store</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form method="post" action="{{url('deactivate-account')}}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="pharmacy_id" value="{{$pharmacy[$i]->id}}" >

                                                            <button type="submit" class="btn btn-block btn-danger btn-sm">Deactivate</button>
                                                        </form>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{url('view-store-drugs/'.$pharmacy[$i]->id)}}"  class="btn btn-block btn-default btn-sm">View Added Drugs</a>

                                                </td>
                                            </tr>
                                        @endfor

                                        </tbody>
                                    </table>
                                @else
                                    <div class="well">
                                        No pharmacy available on the platform yet
                                    </div>
                                @endif


                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->

                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Available Stores</span>
                            <span class="info-box-number">{{count($pharmacy)}}</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <span class="progress-description">
                        Certified Pharmacy stores
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection