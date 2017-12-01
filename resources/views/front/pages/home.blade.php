@extends('front.master')

@section('title', 'Home Page')

@section('content')


<section class="main">

    <div class="container">
      <div class="row">
        <!-- Start Right Side  -->
        <div class="col-lg-8 right-side">
          <!-- carousel / row -->
          <div class="row">

            <div id="carouselExampleIndicators" class="carousel carousel-first slide" data-ride="carousel">
              <ol class="carousel-indicators">
              @for ($c = 0; $c < count($sliderArticles); $c++)
                <li data-target="#carouselExampleIndicators" 
                    data-slide-to="{{ $c }}" class="{{ $c == 0 ? 'active' : '' }}">      
                </li>
              @endfor
                
              </ol>
              <div class="carousel-inner" role="listbox">

              <?php $i = 0; ?>
              @foreach ($sliderArticles as $article)
                {{-- expr --}}
              	<div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
                  <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }} " alt="First slide">
                  <div class="carousel-img-overlay"></div>
                  <div class="carousel-caption  d-md-block">
                  <h3>
                    <a href="{{ route('article', $article->articles_slug) }}"> 
                    {{ $article->articles_title }} 
                    </a>
                  </h3>
                   <p>
                     <ul class="article-info">
                       <li><i class="fa fa-user "></i> {{ $article->user->name }} </li>
                       <li><i class="fa fa-thumbs-up "></i> 312</li>
                       <li><i class="fa fa-comment "></i> {{ $article->comments->count() }}</li>
                     </ul>
                   </p>
                  </div>
                </div>
                <?php $i++; ?>
              @endforeach

              

                

              </div>
              <a class="carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div><!-- carousel / row -->

          <!-- latest / row -->
          <div class="row mr-top-20">

            @if (isset($topCategory[0]))
              <div class="col-md-6 articles-section">

                <div class="card c-1">
                  <h3 class="card-header">
                    <a href="#">{{ $topCategory[0]->categories_name }}</a>
                    <span>latest</span>
                  </h3>
                  <div class="card-block">

                    <div id="firstSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">
                          
                        <?php $i = 0; $counter = 1; ?>
                        @foreach ($topCategory[0]->articles as $article)
                            @if ($counter <= 5)
                              
                              <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">
                                <div class="carousel-img-overlay"></div>
                                <div class="carousel-caption d-md-block">
                                  <h3> {{ $article->articles_title }} </h3>
                                  <p>
                                    <ul class="article-info">
                                      <li><i class="fa fa-user "></i> {{ $article->user->name }}</li>
                                      <li><i class="fa fa-thumbs-up "></i> 312</li>
                                      <li><i class="fa fa-comment "></i>{{ $article->comments->count() }}</li>
                                    </ul>
                                  </p>
                                  <a href="{{ route('article', $article->articles_slug) }}" 
                                    class="btn btn-custom btn-primary btn-lg">Read More
                                  </a>
                                </div>
                              </div>
                              <?php $i++; ?>
                            @endif
                            <?php $counter++; ?>
                        @endforeach
                         
                    </div>
                    <a class="carousel-control carousel-control-prev" href="#firstSectionCarousel" role="button" data-slide="prev">
                       <i class="fa fa-angle-left" aria-hidden="true"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control carousel-control-next" href="#firstSectionCarousel" role="button" data-slide="next">
                       <i class="fa fa-angle-right" aria-hidden="true"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

                  </div>
                </div>

              </div>
            @endif
            
            @if (isset($topCategory[1]))
              
              <div class="col-md-6 articles-section">

                <div class="card c-2">
                  <h3 class="card-header">
                    <a href="#">{{ $topCategory[1]->categories_name }}</a>
                    <span>latest</span>
                  </h3>
                  <div class="card-block">

                    <div id="secondSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                                                
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[1]->articles as $article)
                              @if ($counter <= 5)
                                
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                  <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">
                                  <div class="carousel-img-overlay"></div>
                                  <div class="carousel-caption d-md-block">
                                    <h3> {{ $article->articles_title }} </h3>
                                    <p>
                                      <ul class="article-info">
                                        <li><i class="fa fa-user "></i> {{ $article->user->name }}</li>
                                        <li><i class="fa fa-thumbs-up "></i> 312</li>
                                        <li><i class="fa fa-comment "></i>{{ $article->comments->count() }}</li>
                                      </ul>
                                    </p>
                                    
                                    <a href="{{ route('article', $article->articles_slug) }}" 
                                    class="btn btn-custom btn-primary btn-lg">Read More
                                  </a>
                                  </div>
                                </div>
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach

                      </div>
                      <a class="carousel-control carousel-control-prev" href="#secondSectionCarousel" role="button" data-slide="prev">
                         <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control carousel-control-next" href="#secondSectionCarousel" role="button" data-slide="next">
                         <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                  </div>
                </div>

              </div>
            @endif
            
            @if (isset($topCategory[2]))
              
              <div class="col-md-6 articles-section">

                <div class="card c-3">
                  <h3 class="card-header">
                    <a href="#">{{ $topCategory[2]->categories_name }}</a>
                    <span>latest</span>
                  </h3>
                  <div class="card-block">

                    <div id="thirdSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                          
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[2]->articles as $article)
                              @if ($counter <= 5)
                                
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                  <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">
                                  <div class="carousel-img-overlay"></div>
                                  <div class="carousel-caption d-md-block">
                                    <h3> {{ $article->articles_title }} </h3>
                                    <p>
                                      <ul class="article-info">
                                        <li><i class="fa fa-user "></i> {{ $article->user->name }}</li>
                                        <li><i class="fa fa-thumbs-up "></i> 312</li>
                                        <li><i class="fa fa-comment "></i>{{ $article->comments->count() }}</li>
                                      </ul>
                                    </p>
                                    <a href="{{ route('article', $article->articles_slug) }}" 
                                    class="btn btn-custom btn-primary btn-lg">Read More
                                  </a>
                                  </div>
                                </div>
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach

                      </div>
                      <a class="carousel-control carousel-control-prev" href="#thirdSectionCarousel" role="button" data-slide="prev">
                         <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control carousel-control-next" href="#thirdSectionCarousel" role="button" data-slide="next">
                         <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                  </div>
                </div>

              </div>

            @endif
            
            @if (isset($topCategory[3]))
              
              <div class="col-md-6 articles-section">

                <div class="card c-4">
                  <h3 class="card-header">
                    <a href="#">{{ $topCategory[3]->categories_name }}</a>
                    <span>latest</span>
                  </h3>
                  <div class="card-block">

                    <div id="fourthSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                      <div class="carousel-inner" role="listbox">
                          
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[3]->articles as $article)
                              @if ($counter <= 5)
                                
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                  <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">
                                  <div class="carousel-img-overlay"></div>
                                  <div class="carousel-caption d-md-block">
                                    <h3> {{ $article->articles_title }} </h3>
                                    <p>
                                      <ul class="article-info">
                                        <li><i class="fa fa-user "></i> {{ $article->user->name }}</li>
                                        <li><i class="fa fa-thumbs-up "></i> 312</li>
                                        <li><i class="fa fa-comment "></i>{{ $article->comments->count() }}</li>
                                      </ul>
                                    </p>
                                    <a href="{{ route('article', $article->articles_slug) }}" 
                                    class="btn btn-custom btn-primary btn-lg">Read More
                                  </a>
                                  </div>
                                </div>
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach

                      </div>
                      <a class="carousel-control carousel-control-prev" href="#fourthSectionCarousel" role="button" data-slide="prev">
                         <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control carousel-control-next" href="#fourthSectionCarousel" role="button" data-slide="next">
                         <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                  </div>
                </div>

              </div>
            @endif

          </div><!-- latest / row -->
          <!-- top articles -->

          <!-- Ads row -->

          <div class="row">
            <div class="card ads-card">
              <img class="card-img-top" src="{{ asset('assets/images/row-ads.png') }}" alt="Card image cap">
              {{-- <div class="card-block">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div> --}}
            </div>
          </div>

          <!-- Ads / End -->

          <!-- all with tabs -->
          <div class="row">

            <div class="card col-12 card-tabs text-center">
              <div class="card-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  @if (isset($topCategory[4]))
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#{{ $topCategory[4]->categories_name }}" role="tab">
                        {{ $topCategory[4]->categories_name }}
                      </a>
                    </li>
                  @endif

                  @if (isset($topCategory[5]))
                    <li class="nav-item">
                      <a class="nav-link " data-toggle="tab" href="#{{ $topCategory[5]->categories_name }}" role="tab">
                        {{ $topCategory[5]->categories_name }}
                      </a>
                    </li>
                  @endif

                  @if (isset($topCategory[6]))
                    <li class="nav-item">
                      <a class="nav-link " data-toggle="tab" href="#{{ $topCategory[6]->categories_name }}" role="tab">
                        {{ $topCategory[6]->categories_name }}
                      </a>
                    </li>
                  @endif

                  @if (isset($topCategory[7]))
                    <li class="nav-item">
                      <a class="nav-link " data-toggle="tab" href="#{{ $topCategory[7]->categories_name }}" role="tab">
                        {{ $topCategory[7]->categories_name }}
                      </a>
                    </li>
                  @endif
                  

                  

                </ul>
              </div>
              <div class="card-block">
                <!-- Tab panes -->
                <div class="tab-content">

                  @if (isset($topCategory[4]))
                    
                    <div class="tab-pane active" id="{{ $topCategory[4]->categories_name }}" role="tabpanel">
                      <div class="row row-card">
                          
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[4]->articles as $article)
                              @if ($counter <= 3)
                                  <div class="col-sm-4 article-card">
                                    <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">

                                    <div class="card">
                                      <div class="card-block">
                                        <h3 class="card-title">{{ $article->articles_title }}</h3>
                                        <p class="card-text">{!! substr($article->articles_desc, 0, 50) !!}</p>
                                        
                                        <a href="{{ route('article', $article->articles_slug) }}" 
                                          class="btn btn-custom btn-primary">Read More
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach
                          
                      </div>
                    </div>
                  @endif

                  @if (isset($topCategory[5]))
                    
                    <div class="tab-pane" id="{{ $topCategory[5]->categories_name }}" role="tabpanel">
                      <div class="row row-card">
                          
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[5]->articles as $article)
                              @if ($counter <= 3)
                                  <div class="col-sm-4 article-card">
                                    <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">

                                    <div class="card">
                                      <div class="card-block">
                                        <h3 class="card-title">{{ $article->articles_title }}</h3>
                                        <p class="card-text">{!! substr($article->articles_title, 0, 50) !!}</p>
                                        <a href="{{ route('article', $article->articles_slug) }}" 
                                          class="btn btn-custom btn-primary">Read More
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach
                          
                      </div>
                    </div>
                  @endif

                  @if (isset($topCategory[6]))
                    
                    <div class="tab-pane" id="{{ $topCategory[6]->categories_name }}" role="tabpanel">
                      <div class="row row-card">
                          
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[6]->articles as $article)
                              @if ($counter <= 3)
                                  <div class="col-sm-4 article-card">
                                    <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">

                                    <div class="card">
                                      <div class="card-block">
                                        <h3 class="card-title">{{ $article->articles_title }}</h3>
                                        <p class="card-text">{!! substr($article->articles_title, 0, 50) !!}</p>
                                        <a href="{{ route('article', $article->articles_slug) }}" 
                                          class="btn btn-custom btn-primary">Read More
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach
                          
                      </div>
                    </div>
                  @endif

                  @if (isset($topCategory[7]))
                    
                    <div class="tab-pane" id="{{ $topCategory[7]->categories_name }}" role="tabpanel">
                      <div class="row row-card">
                          
                          <?php $i = 0; $counter = 1; ?>
                          @foreach ($topCategory[7]->articles as $article)
                              @if ($counter <= 3)
                                  <div class="col-sm-4 article-card">
                                    <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" alt="Second slide">

                                    <div class="card">
                                      <div class="card-block">
                                        <h3 class="card-title">{{ $article->articles_title }}</h3>
                                        <p class="card-text">{!! substr($article->articles_title, 0, 50) !!}</p>
                                        <a href="{{ route('article', $article->articles_slug) }}" 
                                          class="btn btn-custom btn-primary">Read More
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                
                                <?php $i++; ?>
                              @endif
                              <?php $counter++; ?>
                          @endforeach
                          
                      </div>
                    </div>
                  @endif

                </div>
              </div>
            </div>

          </div>
          <!-- all with tabs -->

        </div> <!-- col-lg-9 -->

       @include('front.pages.rightSide')

      </div>
    </div>

</section>



@endsection