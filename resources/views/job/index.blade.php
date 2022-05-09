<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Job Portal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   @include('layout.css')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->


            @include('layout.navbar')



        <!-- Navbar End -->


        <!-- Carousel Start -->

        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel End -->

        @include('job.search')

        <!-- Category Start -->

            @include('job.category')

        <!-- Category End -->


        <!-- Footer Start -->


            @include('layout.footer')


        <!-- Footer End -->

        {{-- <a  class="nav-link" href="#login" data-toggle="modal"><i class="fa fa-sign-in"></i> Login</a>
  <a  class="nav-link" href="#register" data-toggle="modal"><i class="fa fa-user-plus"></i> Register</a> --}}
  <!-- Login Modal -->




  <div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content form-wrapper">
        <div class="close-box" data-dismiss="modal">
          <i class="fa fa-times fa-2x"></i>
        </div>
        <div class="container-fluid mt-5">
          <form action="" method="post" id="LoginForm">
            <div class="form-group text-center">
              <h4>Login Form</h4>
              <h6>Enter your credentials</h6>
            </div>
            <div class="form-group" style="position: relative;">
              <label for="l_email">Email</label>
              <input type="email" id="l_email" class="form-control mb-1" placeholder="someone@something.domain" required>



            </div>
            <div class="form-group pb-3" style="position: relative;">
              <label for="l_password">Password</label>
              <input type="password" id="l_password" class="form-control mb-1" placeholder="*******************" required>
              <a href="#forgotPassword" style="display:block; position: absolute; right: 0;" title="Fill Email Field and Click it">
                Forgot Password?
              </a>
            </div>
            <div class="form-group pt-2">
              <button class="btn btn-info form-control">Login</button>
            </div>
            <div class="form-group text-center pt-2 social-login">
              <h6>OR Continue with</h6>
              <a href="#" class="google"> <i class="fab fa-google" aria-hidden="true"></i> </a>
              {{-- <i class="fab fa-google"></i> --}}


              <a href="#" class="facebook"> <i class="fab fa-facebook fa-lg"></i> </a>
              <a href="#" class="twitter"> <i class="fab fa-twitter fa-lg"></i> </a>
              <a href="#" class="github"> <i class="fab fa-github fa-lg"></i> </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Registeration Modal -->
  <div class="modal fade" id="register">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content form-wrapper">
        <div class="close-box" data-dismiss="modal">
          <i class="fa fa-times fa-2x"></i>
        </div>
        <div class="container-fluid mt-5">
          <form action="#" method="post" id="RegisterationForm">
            <div class="form-group text-center pb-2">
              <h4>Registration Form</h4>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" placeholder="Jhon Doe" required>
              </div>
              <div class="form-group col" style="position:relative;">
                <label for='photo_upload' style="display:block">Profile Picture</label>
                <button type="button" class="btn btn-dark form-control" onclick="document.getElementById('photo_upload').click()" id="photo_btn">Select Image</button>
                <input type="file" name="photo" id="photo_upload" accept="image/*" style="display:none;" required>
              </div>
            </div>
            <div class="form-group" style="position:relative;">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control mb-1" placeholder="jhonedoe@gmail.com" required>
              <a href="#" data-toggle="modal" data-target="#login" style="display:none; position: absolute; right: 0; font-size: 12px;">That's you? Login</a>

            </div>
            <div class="form-row mb-1">
              <div class="form-group col">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="*******************" required>

              </div>
              <div class="form-group col">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-control" placeholder="*******************" required>
              </div>
            </div>

            <div class="form-group">
              <button class="btn btn-info form-control">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- -Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content login-modal">
      		<div class="modal-header login-modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title text-center" id="loginModalLabel">USER AUTHENTICATION</h4>
      		</div>
      		<div class="modal-body">
      			<div class="text-center">
	      			<div role="tabpanel" class="login-tab">
					  	<!-- Nav tabs -->
					  	<ul class="nav nav-tabs" role="tablist">
					    	<li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">Sign In</a></li>
					    	<li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sign Up</a></li>
					    	<li role="presentation"><a id="forgetpass-taba" href="#forget_password" aria-controls="forget_password" role="tab" data-toggle="tab">Forget Password</a></li>
					  	</ul>

					  	<!-- Tab panes -->
					 	<div class="tab-content">
					    	<div role="tabpanel" class="tab-pane active text-center" id="home">
					    		&nbsp;&nbsp;
					    		<span id="login_fail" class="response_error" style="display: none;">Loggin failed, please try again.</span>
					    		<div class="clearfix"></div>
					    		<form>
									<div class="form-group">
								    	<div class="input-group">
								      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
								      		<input type="text" class="form-control" id="login_username" placeholder="Username">
								    	</div>
								    	<span class="help-block has-error" id="email-error"></span>
								  	</div>
								  	<div class="form-group">
								    	<div class="input-group">
								      		<div class="input-group-addon"><i class="fa fa-lock"></i></div>
								      		<input type="password" class="form-control" id="password" placeholder="Password">
								    	</div>
								    	<span class="help-block has-error" id="password-error"></span>
								  	</div>
						  			<button type="button" id="login_btn" class="btn btn-block bt-login" data-loading-text="Signing In....">Login</button>
						  			<div class="clearfix"></div>
						  			<div class="login-modal-footer">
						  				<div class="row">
											<div class="col-xs-8 col-sm-8 col-md-8">
												<i class="fa fa-lock"></i>
												<a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

											</div>

											<div class="col-xs-4 col-sm-4 col-md-4">
												<i class="fa fa-check"></i>
												<a href="javascript:;" class="signup-tab"> Sign Up </a>
											</div>
										</div>
						  			</div>
								</form>
					    	</div>
					    	<div role="tabpanel" class="tab-pane" id="profile">
					    	    &nbsp;&nbsp;
					    	    <span id="registration_fail" class="response_error" style="display: none;">Registration failed, please try again.</span>
					    		<div class="clearfix"></div>
					    		<form>
									<div class="form-group">
								    	<div class="input-group">
								      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
								      		<input type="text" class="form-control" id="username" placeholder="Username">
								    	</div>
								    	<span class="help-block has-error" data-error='0' id="username-error"></span>
								  	</div>
								  	<div class="form-group">
								    	<div class="input-group">
								      		<div class="input-group-addon"><i class="fa fa-at"></i></div>
								      		<input type="text" class="form-control" id="remail" placeholder="Email">
								    	</div>
								    	<span class="help-block has-error" data-error='0' id="remail-error"></span>
								  	</div>
						  			<button type="button" id="register_btn" class="btn btn-block bt-login" data-loading-text="Registering....">Register</button>
									<div class="clearfix"></div>
									<div class="login-modal-footer">
						  				<div class="row">
											<div class="col-xs-8 col-sm-8 col-md-8">
												<i class="fa fa-lock"></i>
												<a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

											</div>

											<div class="col-xs-4 col-sm-4 col-md-4">
												<i class="fa fa-check"></i>
												<a href="javascript:;" class="signin-tab"> Sign In </a>
											</div>
                                            <div class="form-group text-center pt-2 social-login">
                                                <h6>OR Continue with</h6>
                                                <a href="#" class="google"> <i class="fab fa-google" aria-hidden="true"></i> </a>
                                                <a href="#" class="facebook"> <i class="fab fa-facebook fa-lg"></i> </a>
                                                <a href="#" class="twitter"> <i class="fab fa-twitter fa-lg"></i> </a>
                                                <a href="#" class="github"> <i class="fab fa-github fa-lg"></i> </a>
                                              </div>
										</div>
						  			</div>
								</form>
					    	</div>
					    	<div role="tabpanel" class="tab-pane text-center" id="forget_password">
					    		&nbsp;&nbsp;
					    	    <span id="reset_fail" class="response_error" style="display: none;"></span>
						    		<div class="clearfix"></div>
						    		<form>
										<div class="form-group">
									    	<div class="input-group">
									      		<div class="input-group-addon"><i class="fa fa-user"></i></div>
									      		<input type="text" class="form-control" id="femail" placeholder="Email">
									    	</div>
									    	<span class="help-block has-error" data-error='0' id="femail-error"></span>
									  	</div>

							  			<button type="button" id="reset_btn" class="btn btn-block bt-login" data-loading-text="Please wait....">Forget Password</button>
										<div class="clearfix"></div>
										<div class="login-modal-footer">
							  				<div class="row">
												<div class="col-xs-6 col-sm-6 col-md-6">
													<i class="fa fa-lock"></i>
													<a href="javascript:;" class="signin-tab"> Sign In </a>

												</div>

												<div class="col-xs-6 col-sm-6 col-md-6">
													<i class="fa fa-check"></i>
													<a href="javascript:;" class="signup-tab"> Sign Up </a>
												</div>
											</div>
							  			</div>
									</form>
						    	</div>
						  	</div>
						</div>

	      			</div>
	      		</div>

	    	</div>
	   </div>
 	</div>
 	<!-- - Login Model Ends Here -->





        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
















    @include('layout.script')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
</body>

</html>




