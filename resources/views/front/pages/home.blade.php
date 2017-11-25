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
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">

              @for($i=0; $i < 5; $i++)
              	<div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
                  <img class="d-block img-fluid" src="{{ asset('assets/images/slide-1.jpg') }} " alt="First slide">
                  <div class="carousel-img-overlay"></div>
                  <div class="carousel-caption  d-md-block">
                   <h3><a href="#"> Mobile Friendly and make all pages responsive with all screens </a></h3>
                   <p>
                     <ul class="article-info">
                       <li><i class="fa fa-user "></i> Ahmed Hdeawy</li>
                       <li><i class="fa fa-thumbs-up "></i> 312</li>
                       <li><i class="fa fa-comment "></i> 34</li>
                     </ul>
                   </p>
                  </div>
                </div>
              @endfor

                

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

            <div class="col-md-6 articles-section">

              <div class="card c-1">
                <h3 class="card-header"><a href="#">Fashion</a><span>latest</span></h3>
                <div class="card-block">

                  <div id="firstSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                  <div class="carousel-inner" role="listbox">

                  @for($i=0; $i < 3; $i++)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                      <img class="d-block img-fluid" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Second slide">
                      <div class="carousel-img-overlay"></div>
                      <div class="carousel-caption d-md-block">
                        <h3> Mobile Friendly and make all pages responsive with all screens </h3>
                        <p>
                          <ul class="article-info">
                            <li><i class="fa fa-user "></i> Ahmed Hdeawy</li>
                            <li><i class="fa fa-thumbs-up "></i> 312</li>
                            <li><i class="fa fa-comment "></i> 34</li>
                          </ul>
                        </p>
                        <a href="#" class="btn btn-custom btn-primary btn-lg">Read More</a>
                      </div>
                    </div>
                    @endfor

                   
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

            <div class="col-md-6 articles-section">

              <div class="card c-2">
                <h3 class="card-header"><a href="#">Art</a><span>latest</span></h3>
                <div class="card-block">

                  <div id="secondSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">

                      @for($i=0; $i < 3; $i++)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                          <img class="d-block img-fluid" src="{{ asset('assets/images/3.jpg') }}" alt="Second slide">
                          <div class="carousel-img-overlay"></div>
                          <div class="carousel-caption d-md-block">
                            <h3> Mobile Friendly and make all pages responsive with all screens </h3>
                            <p>
                              <ul class="article-info">
                                <li><i class="fa fa-user "></i> Ahmed Hdeawy</li>
                                <li><i class="fa fa-thumbs-up "></i> 312</li>
                                <li><i class="fa fa-comment "></i> 34</li>
                              </ul>
                            </p>
                            <a href="#" class="btn btn-custom btn-primary btn-lg">Read More</a>
                          </div>
                        </div>
                      @endfor

                      

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

            <div class="col-md-6 articles-section">

              <div class="card c-3">
                <h3 class="card-header"><a href="#">Travel</a><span>latest</span></h3>
                <div class="card-block">

                  <div id="thirdSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">

                     @for($i=0; $i < 3; $i++)
                      <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/slide-1.jpg') }}" alt="Second slide">
                        <div class="carousel-img-overlay"></div>
                        <div class="carousel-caption d-md-block">
                          <h3> Mobile Friendly and make all pages responsive with all screens </h3>
                          <p>
                            <ul class="article-info">
                              <li><i class="fa fa-user "></i> Ahmed Hdeawy</li>
                              <li><i class="fa fa-thumbs-up "></i> 312</li>
                              <li><i class="fa fa-comment "></i> 34</li>
                            </ul>
                          </p>
                          <a href="#" class="btn btn-custom btn-primary btn-lg">Read More</a>
                        </div>
                      </div>
                      @endfor
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

            <div class="col-md-6 articles-section">

              <div class="card c-4">
                <h3 class="card-header"><a href="#">NATURE</a> <span>latest</span></h3>
                <div class="card-block">

                  <div id="fourthSectionCarousel" class="carousel carousel-section carousel-first slide" data-interval="false" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">

                     @for($i=0; $i < 3; $i++)
                      <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Second slide">
                        <div class="carousel-img-overlay"></div>
                        <div class="carousel-caption d-md-block">
                          <h3> Mobile Friendly and make all pages responsive with all screens </h3>
                          <p>
                            <ul class="article-info">
                              <li><i class="fa fa-user "></i> Ahmed Hdeawy</li>
                              <li><i class="fa fa-thumbs-up "></i> 312</li>
                              <li><i class="fa fa-comment "></i> 34</li>
                            </ul>
                          </p>
                          <a href="#" class="btn btn-custom btn-primary btn-lg">Read More</a>
                        </div>
                      </div>
                      @endfor

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

          </div><!-- latest / row -->
          <!-- top articles -->

          <!-- Ads row -->

          <div class="row">
            <div class="card ads-card">
              <img class="card-img-top" src="{{ asset('assets/images/row-ads.png') }}" alt="Card image cap">
              <!-- <div class="card-block">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div> -->
            </div>
          </div>

          <!-- Ads / End -->

          <!-- all with tabs -->
          <div class="row">

            <div class="card col-12 card-tabs text-center">
              <div class="card-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#design" role="tab">DESIGN</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#food" role="tab">FOOD</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#media" role="tab">MEDIA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#projects" role="tab">PROJECTS</a>
                  </li>

                </ul>
              </div>
              <div class="card-block">
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="design" role="tabpanel">
                    <div class="row row-card">

                        @for($i=0; $i < 3; $i++)
                          <div class="col-sm-4 article-card">
                            <img class="card-img-top" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Card image cap">

                            <div class="card">
                              <div class="card-block">
                                <h3 class="card-title">Mobile Friendly and make all pages responsive with all screens</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-custom btn-primary">Read More</a>
                              </div>
                            </div>
                          </div>
                        @endfor

                       
                    </div>
                  </div>

                  <div class="tab-pane fade" id="food" role="tabpanel">

                    <div class="row row-card">

                        @for($i=0; $i < 3; $i++)
                          <div class="col-sm-4 article-card">
                            <img class="card-img-top" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Card image cap">

                            <div class="card">
                              <div class="card-block">
                                <h3 class="card-title">Mobile Friendly and make all pages responsive with all screens</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-custom btn-primary">Read More</a>
                              </div>
                            </div>
                          </div>
                        @endfor

                    </div>

                  </div>

                  <div class="tab-pane fade" id="media" role="tabpanel">

                    <div class="row row-card">

                         @for($i=0; $i < 3; $i++)
                          <div class="col-sm-4 article-card">
                            <img class="card-img-top" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Card image cap">

                            <div class="card">
                              <div class="card-block">
                                <h3 class="card-title">Mobile Friendly and make all pages responsive with all screens</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-custom btn-primary">Read More</a>
                              </div>
                            </div>
                          </div>
                        @endfor

                    </div>

                  </div>

                  <div class="tab-pane fade" id="projects" role="tabpanel">

                    <div class="row row-card">

                        @for($i=0; $i < 3; $i++)
                          <div class="col-sm-4 article-card">
                            <img class="card-img-top" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Card image cap">

                            <div class="card">
                              <div class="card-block">
                                <h3 class="card-title">Mobile Friendly and make all pages responsive with all screens</h3>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-custom btn-primary">Read More</a>
                              </div>
                            </div>
                          </div>
                        @endfor

                    </div>

                  </div>
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