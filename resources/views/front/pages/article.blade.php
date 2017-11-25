@extends('front.master')

@section('title', 'Article Page')

@section('content')

    <!-- Article Start -->

    <div class="article-page under-nav">
      <div class="container">

        <div class="add-post">
            <a href="#" class="btn btn-custom btn-primary"> <i class="fa fa-plus-circle"></i> Add Article</a>
        </div>

        <div class="row">
            <!-- Article Section -->
            <div class="col-lg-8 right-side">
              <!-- Article Card -->

              <div class="card">
                <h3 class="card-header">
                    <ul class="article-info">
                      <li>
                          <i class="fa fa-user-o"></i>
                          <span>Ahmed Hdeawy</span>
                      </li>
                      <li>
                          <i class="fa fa-tag"></i>
                          <span>Media</span>
                      </li>
                      <li>
                          <i class="fa fa-calendar"></i>
                          <span>4-10-2016</span>
                      </li>
                    </ul>
                </h3>
                <div class="card-block article-card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">

                                                What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                              What is Lorem Ipsum?
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                                    What is Lorem Ipsum?
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                  </p>
                </div>
                <div class="card-footer">
                  <ul class="article-info">
                    <li>
                        <button class="btn btn-sm">like <i class="fa fa-thumbs-o-up"></i></button>
                    </li>
                    <li>
                        <button class="btn btn-sm comment-btn">comment <i class="fa fa-comment-o"></i></button>
                    </li>  <li>
                          <button class="btn btn-sm">share <i class="fa fa-share"></i></button>
                      </li>
                  </ul>

                  <!-- Comment Form -->
                    <div class="comment-box">
                      <form class="comment-form" action="index.php" method="post">
                        <div class="form-group">
                          <textarea class="form-control" placeholder="Write a comment..." id="commentTextarea" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-custom btn-primary">Comment</button>
                        </div>
                      </form>
                    </div>
                  <!-- Comment Form / End -->
                </div>
              </div>


              <!-- Comments Card -->

              <div class="card comments-section">
                <h3 class="card-header">
                    <div class="text-center">123 comments</div>
                </h3>
                <div class="card-block article-card-body">

                  <div class="row comment-block">
                    <div class="col-sm-2">
                      <div class="comment-thumbnail">
                        <img class="img-responsive user-photo" src="{{ asset('assets/images/comment-img.jpg') }}">
                      </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="card">
                          <div class="card-header">
                            <strong>Hesham Saad</strong>
                          </div>
                          <div class="card-block">
                              <div class="card-text">
                                  Nice Article
                              </div>
                          </div>
                        </div>
                    </div>
                  </div> <!-- row -->

                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary">Load More</button>
                    </div>
                </div>
              </div>


            </div>
            {{-- End / Article --}}

           @include('front.pages.rightSide')

          </div>

        </div>

      </div>
    </div>

    <!-- Article / End -->


@endsection