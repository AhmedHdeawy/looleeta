@extends('admin.master')

@section('title', 'Users')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Users
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">Users</a>
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

    {!! Form::model($user, 
        ['route' => ['users.update', $user->id], 'method' => 'patch', 'role' => 'form']) !!}

        @include('admin.pages.users.form', [ 'btnName' => 'Save' ])

    {!! Form::close() !!}

        
    </div>
</div>


@endsection