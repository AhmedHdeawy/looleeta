    <!-- Navbar Start -->
      <nav class=" nav-main navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container">



          <div class="menu-logo">
              <div class="navbar-brand">
                  <span class="navbar-logo">
                      <a href="{{ route('home') }}">
                          <img src="{{ asset('assets/images/logo.png') }}" alt="looleeta" title="" media-simple="true" style="height: 3.8rem;">
                      </a>
                  </span>

              </div>
          </div>
          <!--  Toogle button      -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

          <!--   Items     -->
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                @foreach ($categories as $category)
                  {{-- expr --}}
                  <li class="nav-item">
                      <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink">
                        {{ $category->categories_name }}
                      </a>
                  </li>
                @endforeach
                  
                  <li class="nav-item subMenu">
                      <a class="nav-link" href="#" data-toggle="modal" data-target="#categoriesModal">All</a>
                      
                  </li>
                  @if (!auth()->check())
                    {{-- expr --}}
                    <li class="nav-item">
                        {{-- <button data-toggle="modal" data-target="#modelUserLogin" class="btn btn-custom btn-sm btn-br-100 btn-primary">
                            Login / Register <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </button> --}}
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#modelUserLogin">Login</a>
                    </li>
                  @else

                    <li class="nav-item">
                        {{-- <button class="btn btn-custom btn-sm btn-br-100 btn-primary">
                           {{ substr(auth()->user()->name, 0, 5) }}
                        </button> --}}
                        <a class="nav-link profile-link" href="#">
                         {{ substr(auth()->user()->name, 0, 5) }} 
                         <img src="{{ auth()->user()->image != null ? asset('images/users/' . auth()->user()->image) : asset('images/users/default.jpg') }}" class="img-fluid">
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>

                  @endif
                  @if (auth()->check())
                    
                    @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
                      
                      <li class="nav-item subMenu">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>             
                      </li> 

                    @endif
                  @endif

              </ul>
          </div>
      </div>
      </nav>
    <!-- navbar End -->

    <!-- Start Modal for Login/SignUp -->
      <div class="modal fade" id="modelUserLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modelTitleId">Login / Register</h4>

                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="container login-page">

                            <h1 class="text-center">
                                <span class="active" data-class="login">Login</span> | <span data-class="signup">Register</span>
                            </h1>

                            <h4 class="welocme-msg alert alert-success text-success"></h4>
                            <h4 class="error-msg alert alert-danger text-danger"></h4>
                            
                            <form class="login" id="userLogin" role="form" method="POST" action="{{ route('login') }}">

                                {{ csrf_field() }}

                                <div class="input_control">
                                    <input type="email" class="form-control" name="email" placeholder="Type Your Email" required>
                                </div>

                                <div class="input_control">
                                    <input type="password" class="form-control" name="password" placeholder="Type your Password" autocomplete="new-password" required>
                                </div>

                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input">
                                    Remember me
                                  </label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                  login <i class="fa fa-cog spinner-form"></i>
                                </button>

                            </form>


                            <!-- SignUp Form -->
                            <form class="signup" id="userRegister" role="form" method="POST" action="{{ route('register') }}" nctype="multipart/form-data">

                                <div class="input_control">
                                    <input type="text" class="form-control" name="name" placeholder="Type Your Username" required>
                                </div>

                                <div class="input_control">
                                    <input type="email" class="form-control" name="email" placeholder="Type a valid Email" autocomplete="on" required>
                                </div>

                                <div class="input_control">
                                    <input type="password" class="form-control" name="password" placeholder="Type a Password" autocomplete="new-password" required>
                                </div>
                                <div class="input_control">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Type Password again" autocomplete="new-password" required>
                                </div>

                                 <div class="form-group">
                                    <label for="image">Upload Profile image</label>
                                    <input type="file" name="image" class="form-control-file" id="image" aria-describedby="fileHelp">
                                  </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                  SignUp <i class="fa fa-cog spinner-form"></i>
                                </button>

                            </form>

                            <!-- End Form Register -->


                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal for Login/SignUp -->


    <!-- Start Modal for all categories -->
    <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="categoriesModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
            
              <ul class="sub-menu">
                <div class="container-fluid">
                  <div class="row">
                      
                      @foreach ($categoriesModal as $category)
                        
                        <li class="col-md-3 sub-menu-item">
                            <ul class="sub-menu-menu">
                              <li class="cat-title"><a href="#">{{ $category->categories_name }}</a></li>
                              @if ( $category->children )
                                @foreach ($category->children as $children)
                                  <li><a href="#">{{ $children->categories_name }}</a></li>
                                @endforeach
                              @endif
                              
                            </ul>
                        </li>
                      @endforeach

                      
                  </div>
                </div>
              </ul>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>