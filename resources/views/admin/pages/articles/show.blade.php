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
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 text-left">
                        <span>Category:</span>     
                    </div>
                    <div class="col-md-9 text-muted text-left">
                        {{ $article->category->categories_name }}
                    </div>
                </div>
            </li>
    
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 text-left">
                        <span>Author:</span>     
                    </div>
                    <div class="col-md-9 text-muted text-left">
                        {{ $article->user->name }}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 text-left">
                        <span>Title:</span>     
                    </div>
                    <div class="col-md-9 text-muted text-left">
                        {{ $article->articles_title }}
                    </div>
                </div>
                
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 text-left">
                        <span>Description:</span>     
                    </div>
                    <div class="col-md-9 text-muted text-left">
                        {!! $article->articles_desc !!}
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3 text-left">
                        <span>image:</span>     
                    </div>
                    <div class="col-md-9 text-muted text-left">
                        <img src="{{ asset('images/articles/'.$article->articles_img) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <a class="btn btn-danger btn-sm" 
                    href="{{ route('articles.edit', $article->articles_id) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                </a>
                <a class="btn btn-primary btn-sm" 
                    href="{{ route('articles.index') }}">
                    <i class="fa fa-previouse" aria-hidden="true"></i> back
                </a>
            </li>
            
        </ul>
         
    </div>
</div>


@endsection