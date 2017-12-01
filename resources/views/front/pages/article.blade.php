@extends('front.master')

@section('title', 'Article Page')

@section('content')

    <!-- Article Start -->

    <div class="article-page under-nav">
      <div class="container">

        <div class="add-post">
            <a href="{{ route('addArticle') }}" class="btn btn-custom btn-primary"> <i class="fa fa-plus-circle"></i> Add Article</a>
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
                          <span>{{ $article->user->name }}</span>
                      </li>
                      <li>
                          <i class="fa fa-tag"></i>
                          <span>
                            <a href="{{ route('category', $article->category->categories_slug) }}">
                              {{ $article->category->categories_name }}
                            </a>
                          </span>
                      </li>
                      <li>
                        <i class="fa fa-calendar"></i>
                        <span>
                          {{ \Carbon\Carbon::createFromTimeStamp(strtotime($article->created_at))->toDateString() }}
                        </span>
                      </li>
                      @if (auth()->check() && auth()->user()->hisArticle($article->articles_id))
                        {{-- expr --}}
                        <a href="{{ route('editArticle', $article->articles_id) }}" class="pull-right pt-0 btn btn-empty">
                          <i class="fa fa-edit"></i>
                        </a>

                        <a href="{{ route('deleteArticle', $article->articles_id) }}" 
                          class="pull-right pt-0 btn btn-empty"
                          onclick="return confirm('Are you sure');">
                          <i class="fa fa-trash"></i>
                        </a>
                      @endif
                    </ul>
                </h3>
                <div class="card-block article-card-body">
                  <h3 class="card-title">{{ $article->articles_title }}</h3>
                  <p class="card-text">{!! $article->articles_desc !!}</p>
                </div>
                <div class="card-footer">
                  <ul class="article-info">
                    <li>
                        <button class="btn btn-sm like-btn 
                        {{ auth()->check() && auth()->user()->isLike($article->articles_id) == true ? 'liked' : ''}} " 
                        data-article="{{ $article->articles_id }}">
                          like <i class="fa fa-thumbs-o-up"></i>
                        </button>
                    </li>
                    <li>
                        <button class="btn btn-sm comment-btn" data-article="{{ $article->articles_id }}">
                          comment <i class="fa fa-comment-o"></i>
                        </button>
                    </li>  <li>
                          <button class="btn btn-sm">share <i class="fa fa-share"></i></button>
                      </li>
                  </ul>

                  <!-- Comment Form -->
                  @if (auth()->check())
                    {{-- expr --}}
                      <div class="comment-box">
                        <form class="comment-form" action="{{ route('addComment') }}" method="post">
                          <input type="hidden" name="articles_id"  value="{{ $article->articles_id }}">
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Write a comment..." id="commentTextarea" rows="3"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-custom btn-sm btn-primary">Comment</button>
                          </div>
                        </form>
                      </div>
                  @else
                      <div class="py-3">
                        <div class="text-muted text-center my-2">
                          sign in to add comment
                          <a data-toggle="modal" data-target="#modelUserLogin" href="javascript:;">login</a>
                        </div>
                      </div>
                  @endif
                  <!-- Comment Form / End -->
                </div>
              </div>


              <!-- Comments Card -->
              @if ($article->comments->count() > 0)
                {{-- expr --}}
                <div class="card comments-section">
                  <h3 class="card-header">
                      <div class="text-center">{{ $article->comments->count() }} comments</div>
                  </h3>
                  <div class="card-block article-card-body">
                    
                    @foreach ($article->comments->sortByDesc('created_at') as $comment)
                      
                      <div class="row comment-block" data-commentID="{{ $comment->comments_id }}">
                        <div class="col-sm-2">
                          <div class="comment-thumbnail">
                            <img class="img-responsive user-photo" 
                                src="{{ asset('images/users/'.$comment->user->image) }}">
                          </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="card">
                              <div class="card-header">
                                <span class="pull-left comment-author">
                                  {{ $comment->user->name }} 
                                  <small>
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}
                                  </small>
                                </span>
                                {{-- button to add comment --}}
                                @if (auth()->check() && auth()->user()->hisComment($comment->comments_id, $article->articles_id))
                                  
                                  <span class="pull-right">
                                    <button data-comment="{{ $comment->comments_id }}" class="edit-comment btn-cursor btn-empty">
                                      <i class="fa fa-edit"></i>
                                    </button>
                                  </span>
                                  <span class="pull-right mx-2">
                                    <button data-comment="{{ $comment->comments_id }}" class="delete-comment btn-cursor btn-empty">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                  </span>

                                @endif
                              </div>
                              <div class="card-block">
                                  <div class="card-text">
                                      {{ $comment->comments_desc }}
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div> <!-- row -->

                    @endforeach

                  </div>
                  {{-- load more --}}
                  {{-- <div class="card-footer">
                      <div class="text-center">
                          <button class="btn btn-primary">Load More</button>
                      </div>
                  </div> --}}
                </div>
              
              @else
                <h3 class="text-center text-danger my-4">No comments yet</h3>
              @endif
              

              
              {{-- Modal for edit comment --}}
              <div id="editModal" class="modal fade" role="dialog">

                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    
                    <div class="modal-body">
                      <form class="form-edit-comment" action="{{ route('editComment') }}" method="post">
                        <input type="hidden" value="" name="comments_id">
                        <div class="form-group">
                          <textarea class="form-control" name="editComment" value=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom btn-sm btn-cursor">Edit</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-cursor btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>

                </div>
              </div>
              {{-- Modal / End --}}

            </div>
            {{-- End / Article --}}

           @include('front.pages.rightSide')

          </div>

        </div>

      </div>
    </div>

    <!-- Article / End -->


@endsection