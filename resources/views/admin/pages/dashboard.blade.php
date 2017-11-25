@extends('admin.master')

@section('title', 'Dashboard')

@section('breadcrumb')

 <!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

@endsection

@section('content')

    @role('admin')

	<div class="row">

        <div class="col-xl-3 col-lg-6">
            <div class="card card-primary card-inverse">
                <div class="card-header card-primary">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-xs-right">
                            <div class="huge">{{ $usersCount }}</div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-default">
                    <a href="{{ route('users.index') }}">
                        <span class="pull-xs-left">View Details</span>
                        <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-green card-inverse">
                <div class="card-header card-green">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-xs-right">
                            <div class="huge">{{ $categoriesCount }}</div>
                            <div>Category</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-green">
                    <a href="{{ route('categories.index') }}">
                        <span class="pull-xs-left">View Details</span>
                        <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-yellow card-inverse">
                <div class="card-header card-yellow">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-edit fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-xs-right">
                            <div class="huge">{{ $articlesCount }}</div>
                            <div>Articles</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-yellow">
                    <a href="{{ route('articles.index') }}">
                        <span class="pull-xs-left">View Details</span>
                        <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card card-red card-inverse">
                <div class="card-header card-red">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comment fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-xs-right">
                            <div class="huge">13</div>
                            <div>Comments</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer card-red">
                    <a href="javascript:;">
                        <span class="pull-xs-left">View Details</span>
                        <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    @endrole

    @role('editor')
    
        <div class="row">
           <div class="col-xl-3 col-lg-6">
                <div class="card card-yellow card-inverse">
                    <div class="card-header card-yellow">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-edit fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-xs-right">
                                <div class="huge">{{ $articlesCount }}</div>
                                <div>Articles</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer card-yellow">
                        <a href="{{ route('articles.index') }}">
                            <span class="pull-xs-left">View Details</span>
                            <span class="pull-xs-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    @endrole


@endsection
