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
                 Edit
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


 <div class="row">
    <div class="col-md-12">

    {!! Form::model($article, 
        ['route' => ['articles.update', $article->articles_id], 'method' => 'patch', 'role' => 'form', 'files' => true]) !!}

        @include('admin.pages.articles.form', [ 'btnName' => 'Edit' ])

    {!! Form::close() !!}

        
    </div>
</div>


@endsection