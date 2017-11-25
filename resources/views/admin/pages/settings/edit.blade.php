@extends('admin.master')

@section('title', 'Settings')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Settings
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('settings.index') }}">Settings</a>
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

    {!! Form::model($setting, 
        ['route' => ['settings.update', $setting->settings_id], 'method' => 'patch', 'role' => 'form', 'file' => true]) !!}

        @include('admin.pages.settings.form', [ 'btnName' => 'Edit' ])

    {!! Form::close() !!}

        
    </div>
</div>


@endsection