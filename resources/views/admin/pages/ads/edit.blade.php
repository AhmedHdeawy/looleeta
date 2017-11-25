@extends('admin.master')

@section('title', 'Ads')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Ads
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('ads.index') }}">Ads</a>
            </li>
            <li class="active">
                 Edit
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


 <div class="row">
    <div class="col-lg-6">

    {!! Form::model($ads, 
        ['route' => ['ads.update', $ads->ads_id], 'method' => 'patch', 'role' => 'form', 'file' => true]) !!}

        @include('admin.pages.ads.form', [ 'btnName' => 'Edit' ])

    {!! Form::close() !!}

        
    </div>
</div>


@endsection