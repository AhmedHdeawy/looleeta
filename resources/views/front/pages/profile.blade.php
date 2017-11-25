@extends('front.master')

@section('title', 'Profile Page')

@section('content')

	<!-- Profile / Start -->
    <div class="under-nav">
      <div class="container">
        <div class="row">
            <div class="col-lg-4">
              <div class="card profile">
                <img src="{{ asset('assets/images/comment-img.jpg') }}" alt="John" style="width:100%">
                <h1>Ahmed Hdeawy</h1>

                <ul class="list-group">
                  <li class="list-group-item">full-stack web developer</li>
                  <li class="list-group-item">ahmedhdeawy@gmail.com</li>
                  <li class="list-group-item">23 years</li>
                  <li class="list-group-item"><button class="btn btn-primary" data-toggle="modal" data-target="#user-profile">Edit</button></li>
                </ul>

              </div>

              <!-- Modal for Edit Profile -->
              <!-- Modal -->
              <div class="modal fade bd-example-modal-lg" id="user-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                  <div class="modal-content">
                  <form class="profile-edit-form" action="index.php" method="post">
                    <div class="modal-header">
                      <!-- <h5 class="modal-title" id="exampleModalLabel">Edit</h5> -->
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                          <div class="form-group row">
                              <label for="example-text-input" class="col-2 col-form-label">Name</label>
                              <div class="col-10">
                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-email-input" class="col-2 col-form-label">Email</label>
                            <div class="col-10">
                              <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-password-input" class="col-2 col-form-label">Password</label>
                            <div class="col-10">
                              <input class="form-control" type="password" value="hunter2" id="example-password-input">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                              <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                            </div>
                          </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </form>
                  </div>
                </div>
              </div>

            </div>

            <!-- User's Article -->
            <div class="col-lg-8 user-posts">
              <div class="card">
              <h3 class="card-header">Articles by : Ahmed Hdeawy</h3>
              <div class="card-block">

                <div class="row row-card">

                  @for ($i = 0; $i < 6; $i++)
                  	{{-- expr --}}
                  	<div class="col-sm-4 article-card">
                    <img class="card-img-top" src="{{ asset('assets/images/slide-2.jpg') }}" alt="Card image cap">
                    <div class="card">
                      <div class="card-block">
                        <h3 class="card-title">Mobile Friendly and make all pages responsive with all screens</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-custom btn-primary">Read More</a>
                        </div>
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

    </div>

    <!-- Profile / End -->

@endsection