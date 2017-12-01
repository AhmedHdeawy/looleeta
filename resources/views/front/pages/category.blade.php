@extends('front.master')
@section('title', isset($category) ? $category->categories_name : 'search')
@section('content')
<!-- Article Start -->
<div class="article-page under-nav category-page">
  <div class="container">
    
    <div class="add-post">
      <a href="{{ route('addArticle') }}" class="btn btn-custom btn-primary"> 
        <i class="fa fa-plus-circle"></i> 
        Add Article
      </a>
    </div>
    <?php $i = 0; ?>
    @forelse ($articles as $article)
      
      @if ($i % 2 == 0) 
        
        <div class="row post-card d-flex align-items-stretch">
          <div class="col-lg-8">
            <div class="post-card-inner d-flex align-items-center">
              <div class="post-card-content">
                <header class="post-card-header">
                  <a href="{{ route('article', $article->articles_slug) }}">
                    <h2 class="h4">{{ $article->articles_title }}</h2>
                  </a>
              </header>
              <div class="post-card-desc str-cut">{!! html_entity_decode($article->articles_desc)  !!}</div>
              <section class="post-card-footer d-flex align-items-center">
                 <div class="avatar">
                    <img class="img-fluid" src="{{ asset('images/users/'.$article->user->image) }}" >
                  </div>
                  <div class="title"><span>{{ $article->user->name }}</span></div>

                <div class="date"><i class="fa fa-clock-o"></i> 
                  {{ \Carbon\Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans() }}
                </div>
                <div class="comments"><i class="fa fa-comments"></i>{{ $article->comments->count() }}</div>
              
              </section>
              </div>
              
            </div>
          </div>
          <div class="post-card-image col-lg-4" style="min-height: 250px;">
            
            <img src="{{ asset('images/articles/'.$article->articles_img) }}" 
                          alt="{{ $article->articles_title }}">
          </div>
        </div>

      @else

        <div class="row post-card post-card-odd d-flex align-items-stretch">
          <div class="post-card-image col-lg-4" style="min-height: 250px;">
            
            <img src="{{ asset('images/articles/'.$article->articles_img) }}" 
                          alt="{{ $article->articles_title }}">
          </div>
          <div class="col-lg-8">
            <div class="post-card-inner d-flex align-items-center">
              <div class="post-card-content">
                <header class="post-card-header">
                  <a href="{{ route('article', $article->articles_slug) }}">
                    <h2 class="h4">{{ $article->articles_title }}</h2>
                  </a>
              </header>
              <p class="post-card-desc">{!! substr($article->articles_desc, 0, 250) !!}...</p>
              <section class="post-card-footer d-flex align-items-center">
                 <div class="avatar">
                    <img class="img-fluid" src="{{ asset('images/users/'.$article->user->image) }}" >
                  </div>
                  <div class="title"><span>{{ $article->user->name }}</span></div>

                <div class="date"><i class="fa fa-clock-o"></i> 
                  {{ \Carbon\Carbon::createFromTimeStamp(strtotime($article->created_at))->diffForHumans() }}
                </div>
                <div class="comments"><i class="fa fa-comments"></i>{{ $article->comments->count() }}</div>
              
              </section>
              </div>
              
            </div>
          </div>
          
        </div>

      @endif
      

      <?php $i++; ?>
    
    @empty 
      <h2 class="text-danger text-center my-4">No posts in this category</h2>
      <div class="text-center my-4">
        <a href="/" role="button" class="btn btn-danger">return to home</a>
      </div>
    @endforelse

    <div class="row text-center my-5">
      {{ $articles->links() }}
    </div>
    

</div>
</div>
<!-- Article / End -->
@endsection