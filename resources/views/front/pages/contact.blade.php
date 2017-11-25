@extends('front.master')

@section('title', 'Contact-Us Page')

@section('content')


<section class="under-nav contact-page" >

        <div class="contact-overlay"></div>

        <div class="container">

            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="contact-title text-center display-2">
                        Contact Us
                    </h2>
                    <p class="text-center text-white contact-brief">Feel free to contact us</p>
                </div>
            </div>


            <div class="row">

            <div class="col-lg-4" id="panel">
              <form action="index.php" method="post">

                <div class="group">
                    <input type="text" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Name</label>
                </div>

                <div class="group">
                    <input type="email" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                </div>

                <div class="group">
                    <input type="text" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Mobile No</label>
                </div>

                <div class="group">
                    <textarea name="message" rows="4" cols="45"></textarea>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Message</label>
                </div>

                <div class="group">
                    <center> <button type="submit" class="btn btn-default">Send <span class="glyphicon glyphicon-send"></span></button></center>
                </div>

              </form>
            </div>
          </div>

        </div>

    </section>

@endsection