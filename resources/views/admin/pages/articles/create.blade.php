@extends('admin.master')

@section('title', 'Articles')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Articles
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
             <li>
                <a href="{{ route('articles.index') }}">Articles</a>
            </li>
            <li class="active">
                 Create
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


 <div class="row">
    <div class="col-lg-12">

    {!! Form::open(['route' => ['articles.store'], 'role' => 'form', 'files' => true]) !!}

        @include('admin.pages.articles.form', [ 'btnName' => 'Create' ])

    {!! Form::close() !!}

        
    </div>
</div>

@include('mceImageUpload::upload_form')

@endsection