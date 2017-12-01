 <!-- Start Left Side -->
        <div class="col-lg-4 aside-section">

          <!-- Search -->
          <div class="card search">
            <h3 class="card-header">Search</h3>
            <div class="card-block">
              <form action="{{ route('searchArticle') }}" method="get">
                
                <div class="input-group">
                 <input type="text" class="form-control" name="q" placeholder="Search for...">
                 <span class="input-group-btn">
                   <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
                 </span>
               </div>
              </form>

            </div>
          </div>


          <!-- Related Posts -->
          <div class="card ">
            <h3 class="card-header">Most Popular</h3>
            <div class="card-block">

            @foreach ($mostPopular as $article)
              {{-- expr --}}
              <div class="row post-wrap">
                  <div class="col-sm-4 col-md-2 col-lg-4 post-img">
                      <img class="d-block img-fluid" src="{{ asset('images/articles/'.$article->articles_img) }}" 
                        alt="{{ $article->articles_title }}">
                  </div>
                  <div class="col-sm-8 col-md-10 col-lg-8 post-title">
                      <a href="{{ route('article', $article->articles_slug) }}"> 
                        {{ substr($article->articles_title, 0, 37) }}... 
                      </a>
                    <div class="aside-post-info">
                        <span>
                        {{ \Carbon\Carbon::createFromTimeStamp(strtotime($article->created_at))->toFormattedDateString() }}
                        </span> 
                        | 
                        <a href="{{ route('category', $article->category->categories_slug) }}">
                          {{ $article->category->categories_name }}
                        </a>
                    </div>
                  </div>
              </div>              
            @endforeach


            </div>
          </div>
          <!-- Related Posts / End -->
          <!-- Ads  -->
          <div class="card ads-section">
            <h3 class="card-header">Advertisment</h3>
            <div class="card-block">
              <a href="#">
                <img src="{{ asset('assets/images/macdonald-ads.jpg') }}" class="ads-img" alt="">
              </a>

            </div>
          </div>
          <!-- Ads / End -->

          <!-- Follow Us -->
          <div class="card follow-section">
            <h3 class="card-header">FOLLOW US</h3>
            <div class="card-block">

                <ul class="list-group">
                  <li class="list-group-item">
                    <a href="{{ getSettingByKey('facebook') }}">
                      <img src="{{ asset('assets/images/icons/facebook.png') }}" alt="Facebook"> FACEBOOK
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ getSettingByKey('twitter') }}">
                      <img src="{{ asset('assets/images/icons/twitter.png') }}" alt="Twitter"> TWITTER
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ getSettingByKey('google') }}">
                      <img src="{{ asset('assets/images/icons/google_plus.png') }}" alt="Google"> GOOGLE
                    </a>
                  </li>
                  <li class="list-group-item">
                    <a href="{{ getSettingByKey('youtube') }}">
                      <img src="{{ asset('assets/images/icons/youtube.png') }}" alt="Youtube"> YOUTUBE
                    </a>
                  </li>
                </ul>

            </div>
          </div>

        </div> <!-- Sidebar / End -->