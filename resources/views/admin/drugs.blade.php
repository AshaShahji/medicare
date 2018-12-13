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
                            <h3 class="box-title">View Added Drugs</h3>
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

                                @if(!empty($drugs))
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Drug Name</th>
                                            <th>Dosage</th>
                                            <th>Expiry Date</th>
                                            <th>Added by</th>
                                            <th>Status</th>
                                            <th>Manage</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 0; $i < count($drugs); $i++)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$drugs[$i]->drug_name}}</td>
                                                <td>{!!$drugs[$i]->dosage  !!}</td>
                                                <td>
                                                    {{$drugs[$i]->expiry_date}}

                                                </td>
                                                <td>
                                                    {{$drugs[$i]->name}}
                                                </td>
                                                @if($drugs[$i]->status <> 'Active')
                                                    <td><span class="label label-warning">Not Active </span></td>
                                                @else
                                                    <td><span class="label label-success">Active </span></td>
                                                @endif

                                                @if($drugs[$i]->status <> 'Active')
                                                    <td>
                                                        <form method="post" action="{{url('activate-drug')}}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="drug_id" value="{{$drugs[$i]->id}}" >
                                                            <button type="submit" class="btn btn-block btn-success btn-sm">Activate Drug</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form method="post" action="{{url('deactivate-drug')}}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="drug_id" value="{{$drugs[$i]->id}}" >

                                                            <button type="submit" class="btn btn-block btn-danger btn-sm">Deactivate Drug</button>
                                                        </form>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endfor

                                        </tbody>
                                    </table>
                                @else
                                    <div class="well">
                                        No drugs added by stores yet
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

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection