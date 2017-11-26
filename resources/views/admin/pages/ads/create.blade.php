@extends('admin.master')

@section('title', 'Categories')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Categories
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
             <li>
                <a href="{{ route('ads.index') }}">Categories</a>
            </li>
            <li class="active">
                 Create
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


 <div class="row">
    <div class="col-lg-6">

    {!! Form::open(['route' => ['ads.store'], 'role' => 'form', 'files' => true]) !!}

        @include('admin.pages.ads.form', [ 'btnName' => 'Create' ])

    {!! Form::close() !!}

        
    </div>
</div>


@endsection