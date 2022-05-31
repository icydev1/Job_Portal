@php
 $count = Session::get('count');
@endphp
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('JobPortal.Index') }}"
        class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">Job Portal</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('JobPortal.Index') }}" class="nav-item nav-link @if (Route::is('JobPortal.Index')) active  @endif">Home</a>
            <a href="{{ route('JobPortal.About') }}" class="nav-item nav-link @if (Route::is('JobPortal.About')) active  @endif">About</a>

            <a href="{{ route('JobPortal.Job') }}" class="nav-item nav-link @if (Route::is('JobPortal.Job')) active  @endif ">Jobs</a>

            <a href="{{ route('JobPortal.Contact') }}" class="nav-item nav-link @if (Route::is('JobPortal.Contact')) active  @endif">Contact</a>

            <div id="ajaxPros">
            @if(DB::table('jobs')->where('user_id',Auth::id())->exists())
            <a href="{{ route('JobPortal.GetJobList') }}" class="nav-item nav-link @if (Route::is('JobPortal.GetJobList')) active  @endif">My Jobs</a>
            @endif
            </div>
            <a class=" nav-item nav-link" href="{{ route('JobPortal.FavJobList') }}"><i class="fa fa-heart text-primary"></i></a><span id="countJob" class="count">{{$count}}</span>





            <div id="ajaxRefreshLogout">
                @if (Auth::user())

                    @if (!empty(Auth::user()->image))

                        <a class="nav-item nav-link dropdown-toggle navbottom" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('uploads/user_profile/'.Auth::user()->image) }}" width="40" height="40" class="rounded-circle">
                        </a>
                    @elseif (!empty(Auth::user()->avatar))

                    <a class="nav-item nav-link dropdown-toggle navbottom" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" width="40" height="40" class="rounded-circle">
                        </a>

                    @else

                    <a class="nav-item nav-link dropdown-toggle navbottom" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                width="40" height="40" class="rounded-circle">
                        </a>

                    @endif
                    @php $dcrypt  = Crypt::encrypt(Auth::id());
                    @endphp
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('JobPortal.MyProfile',['profile_id'=>$dcrypt])}}">My Profile</a>

                        <a class="dropdown-item" href="{{route('JobPortal.EditProfile',['user_id'=>$dcrypt])}}">Edit Profile</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#">Log Out</a>
                    </div>

                @endif
            </div>

        </div>
        {{-- <a href="#" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block loginAjax"  >Post A Job<i class="fa fa-arrow-right ms-3"></i></a> --}}

        <div id="ajaxRefresh">
            @if (Auth::user())
                <a href="{{route('JobPortal.PostJob')}}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block loginAjax">Post A Job<i
                        class="fa fa-arrow-right ms-3"></i></a>
            @else
                <a href="#" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block loginAjax"
                    data-toggle="modal" data-target="#loginModal">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
            @endif
        </div>

    </div>
</nav>




<!-- -Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content login-modal">
            <div class="modal-header login-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="loginModalLabel">USER AUTHENTICATION</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div role="tabpanel" class="login-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a id="signin-taba" href="#home"
                                    aria-controls="home" role="tab" data-toggle="tab">Sign In</a></li>
                            <li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile"
                                    role="tab" data-toggle="tab">Sign Up</a></li>
                            <li role="presentation"><a id="forgetpass-taba" href="#forget_password"
                                    aria-controls="forget_password" role="tab" data-toggle="tab">Forget Password</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active text-center" id="home">
                                &nbsp;&nbsp;
                                <span id="login_fail" class="response_error" style="display: none;">Loggin failed,
                                    please try again.</span>
                                <div class="clearfix"></div>
                                <form method="POST" id="loginForm" autocomplete="off">

                                    <div class="form-group text-center pt-2 social-login">
                                        <h6>Login with</h6>
                                        <a href="{{ route('JobPortal.Google') }}" class="google"> <i
                                                class="fab fa-google" aria-hidden="true"></i> </a>
                                        <a href="{{ route('JobPortal.Facebook') }}" class="facebook"> <i
                                                class="fab fa-facebook fa-lg"></i> </a>
                                        <a href="#" class="twitter"> <i class="fab fa-twitter fa-lg"></i>
                                        </a>
                                        <a href="#" class="github"> <i class="fab fa-github fa-lg"></i>
                                        </a>
                                    </div>

                                    <h6>Or</h6>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                            <input type="email" class="form-control" name="login_email"
                                                id="login_email" placeholder="email">

                                        </div>
                                        <span class="help-block has-error" style="color:red" id="emailError"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                            <input type="password" name="login_password" class="form-control"
                                                id="login_password" placeholder="Password">

                                        </div>
                                        <span class="help-block has-error" style="color:red" id="passwordError"></span>
                                    </div>
                                    <button type="submit" id="login_btn" class="btn btn-block bt-login"
                                        data-loading-text="Signing In....">Login</button>
                                    <div class="clearfix"></div>
                                    <div class="login-modal-footer">
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <i class="fa fa-lock lg-ga"></i>
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
                                <span id="registration_fail" class="response_error" style="display: none;">Registration
                                    failed, please try again.</span>
                                <div class="clearfix"></div>
                                <form id="registerForm" autocomplete="off">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Name">

                                        </div>
                                        <div id="err"></div>
                                        <span class="help-block has-error" style="color: red" data-error='0' id="usernameError"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                            <input type="email" required class="form-control"  name="email" id="email"
                                                placeholder="Email">

                                        </div>
                                        <div id="errEmail"></div>
                                        <span class="help-block has-error" data-error="0" style="color: red" id="remail-error"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fas fa-key"></i></div>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="password">

                                        </div>
                                        <div id="errPass"></div>
                                        <span class="help-block has-error" style="color: red" data-error="0" id="password-error"></span>
                                    </div>
                                    <button type="button" id="register_btn" class="btn btn-block bt-login userLogin"
                                        data-loading-text="Registering....">Register</button>
                                    <div class="clearfix"></div>
                                    <div class="login-modal-footer">
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <i class="fa fa-lock register"></i>
                                                <a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

                                            </div>

                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <i class="fa fa-check"></i>
                                                <a href="javascript:;" class="signin-tab"> Sign In </a>
                                            </div>
                                            <div class="form-group text-center pt-2 social-login">
                                                <h6>OR Continue with</h6>
                                                <a href="{{ route('JobPortal.Google') }}" class="google"> <i
                                                        class="fab fa-google" aria-hidden="true"></i> </a>
                                                <a href="#" class="facebook"> <i
                                                        class="fab fa-facebook fa-lg"></i> </a>
                                                <a href="#" class="twitter"> <i
                                                        class="fab fa-twitter fa-lg"></i>
                                                </a>
                                                <a href="#" class="github"> <i
                                                        class="fab fa-github fa-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="namePath" data-path="JobPortal">
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane text-center" id="forget_password">
                                &nbsp;&nbsp;
                                <span id="reset_fail" class="response_error" style="display: none;"></span>
                                <div class="clearfix"></div>
                                <form autocomplete="off">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" class="form-control" id="femail" placeholder="Email">
                                        </div>
                                        <span class="help-block has-error" data-error='0' id="femail-error"></span>
                                    </div>

                                    <button type="button" id="reset_btn" class="btn btn-block bt-login"
                                        data-loading-text="Please wait....">Forget Password</button>
                                    <div class="clearfix"></div>
                                    <div class="login-modal-footer">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <i class="fa fa-lock sign-in"></i>
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

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content login-modal">
            <div class="modal-header login-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="loginModalLabel">Are You Sure To Logout</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <div class="row">
                        <div id="logout" class="col-md-6"><button class="btn btn-danger"
                                type="button">Yes</button></div>
                        <div class="col-md-6"><button type="button" class="btn btn-success close"
                                data-dismiss="modal" aria-label="Close">NO</button></div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>




<!-- - Login Model Ends Here -->
