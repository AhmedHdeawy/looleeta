
<footer>
  <div class="container">
      <div class="row">
          <div class="col-sm-6">
             <span class="copyrights">
               All Rights Reserved © <?php echo date('Y'); ?>
               <span><a href="#" class="text-white">Looleeta</a></span>
             </span>
             <span class="sep"> | </span>
             <span class="powered">Powered by
               <a href="#" class="text-white">Ahmed Hdeawy</a>
             </span>
          </div>

          <div class="col-sm-6">
              <ul class="justify-content-center">
                <li><a href="#">Contact</a></li>
                <li><a href="#" data-toggle="modal" data-target="#privacyModal">Privacy</a></li>
                <li><a href="#">Terms</a></li>
                <li>
                  <a href="{{ getSettingByKey('facebook') }}">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                </li>
                <li>
                  <a href="{{ getSettingByKey('twitter') }}">
                    <i class="fa fa-twitter-square"></i>
                  </a>
                </li>
                <li>
                  <a href="{{ getSettingByKey('google') }}">
                    <i class="fa fa-google-plus-square"></i>
                  </a>
                </li>
                
              </ul>
          </div>
      </div>
  </div>
</footer>


    <!-- Footer Modals -->
      <!-- Privacy Modal -->
        <div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Modal title</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Privacy Policy Here
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <!-- Privacy Modal / End -->
    <!-- Footer Modals / End -->

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    @include('front.layout.script')