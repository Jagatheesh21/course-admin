  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Login</title>

      <!-- Global stylesheets -->
      <link rel="shortcut icon" href="{{ asset('assets/images/favicons/favicon-32x32.png')}}">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
      <!-- /core JS files -->

      <!-- Theme JS files -->
      <!-- Global stylesheets -->

      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
      <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{ asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">

      
      <!-- /global stylesheets -->
      <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

      <!-- Core JS files -->

      <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
      <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
      <!-- /core JS files -->

      <!-- Theme JS files -->
      <script src="assets/js/app.js"></script>
      <!-- /theme JS files -->

  </head>

  <body class="login-bg">




      <!-- /main navbar -->


      <!-- Page content -->
      <div class="page-content">

          <!-- Main content -->
          <div class="content-wrapper">

              <!-- Content area -->
              <div class="content d-flex justify-content-center align-items-center">

                  <!-- Login form -->
                  <form action="{{ route('login') }}" method="post" class="login-form" id="loginform">
                      @csrf
                      <div class="card mb-0">
                          <div class="card-body">
                              <div class="text-center mb-3">
                                  <i
                                      class="icon-book3 icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                  <h5 class="mb-0">Login to your account</h5>
                                  <span class="d-block text-muted">Your credentials</span>
                              </div>
                              @if (\Session::has('message'))
                              <p style="color:red;">{!! \Session::get('message') !!}</p>
                              @endif

                              <div class="form-group">
                                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                      placeholder="Enter Email">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              </div>

                              <div class="form-group">
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"
                                      aria-label="Password" aria-describedby="password-addon" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              </div>

                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                          class="icon-circle-right2 ml-2"></i></button>
                              </div>

                              <div class="text-center">
                                  <a href="{{ route('password.request') }}" class="text-muted">Forgot password ?</a>
                              </div>
                          </div>
                      </div>
                  </form>
                  <!-- /login form -->

              </div>
              <!-- /content area -->




          </div>
          <!-- /main content -->

      </div>

  </body>

  </html>



  <script type="text/javascript">
      $(document).ready(function() {

          $("#loginform").validate({

              focusInvalid: true,
              rules: {
                  email: {
                      required: true,
                     
                  },

                  password: {
                      required: true,
                     
                  },

              },

              messages: {
                  email: {
                      required: "Email required",
                      
                  },

                  password: {
                      required: "The password is required",
                      
                  },


              },



              submitHandler: function(form) {
                  form.submit();
              }

          });

      });
      
  </script>
 
