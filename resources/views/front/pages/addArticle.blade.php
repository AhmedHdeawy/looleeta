@extends('front.master')
@section('title', 'add new article')
@section('content')
<!-- Article Start -->
<div class="article-page under-nav category-page">
  <div class="container">
    
     <div class="row">
      <div class="col-lg-12 mb-5">

      {!! Form::open(['route' => ['storeArticle'], 'role' => 'form', 'files' => true]) !!}

          @include('front.pages.articleForm', [ 'btnName' => 'publish' ])

      {!! Form::close() !!}

          
      </div>
    </div>

</div>
</div>
<!-- Article / End -->

{{-- include this file to Enable select image from local --}}
@include('mceImageUpload::upload_form')

@endsection
