@extends('front.master')
@section('title', 'Edit Article')
@section('content')
<!-- Article Start -->
<div class="article-page under-nav category-page">
  <div class="container">
    
    <div class="row">
	    <div class="col-md-12 mb-5">

	    {!! Form::model($article, 
	        ['route' => ['updateArticle', $article->articles_id], 'role' => 'form', 'files' => true]) !!}

	        @include('front.pages.articleForm', [ 'btnName' => 'save' ])

	    {!! Form::close() !!}

	        
	    </div>
	</div

</div>
</div>
<!-- Article / End -->


{{-- include this file to Enable select image from local --}}
@include('mceImageUpload::upload_form')

@endsection