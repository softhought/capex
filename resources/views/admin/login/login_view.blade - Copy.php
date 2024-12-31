<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Pips | Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/login-assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets') }}/login-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/login-assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/login-assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/login-assets/css/style.css">

</head>

<body id="top">
    <div class="page_loader"></div>
    <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">
    <div class="login-8" style="background-color: #ebebeb;">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-7 col-md-12 form-info">
                    <div class="form-section">
                        <div class="logo clearfix">
                            <a href="{{ url('/') }}">
                               <img src="{{ asset('assets') }}/img/app-logo.png" alt="logo">
                            </a>
                        </div>
                        <h3 class="mb-3">Sign in</h3>
                        <div class="invalid-feedback d-block text-center mb-4" id="errormsg" style="font-weight: 600;letter-spacing: 0.4px;"></div>
                        <div class="login-inner-form">

                            <form name="loginForm" id="loginForm" >
                                @csrf
                                <div class="form-group form-box">
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Username" aria-label="Username" >
                                    <i class="flaticon-user"></i>
                                    <div class="invalid-feedback d-block text-start px-2" id="username_error">

                                    </div>
                                </div>
                                <div class="form-group form-box">
                                    <input type="password" name="password" id="password" class="form-control"
                                        autocomplete="off" placeholder="Password" aria-label="Password">
                                    <i class="flaticon-password"></i>
                                    <div class="invalid-feedback d-block text-start px-2" id="password_error">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group ">
                                            <input class="captcha-container float-center form-control p-0 text-center" id="captcha" value="{!! $operand1 . ' + '
                                                . $operand2 !!}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">

                                        <button type="button" class="btn-floating" id="reload"><i class="fa fa-refresh"
                                                aria-hidden="true"></i>
                                        </button>

                                    </div>
                                    <div class="col-md-5">
                                    <div class="input-group ">
                                        <input type="text" class="form-control float-right " placeholder="Enter captcha"
                                            name="captcha_input" id="captcha_input" autocomplete="off">
                                        </div>
                                        </div>
                                    <div class="invalid-feedback d-block text-start px-2 mb-5" id="captcha_input_error"></div>
                                </div>

                                <!-- <div class="checkbox form-group form-box">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="forgot-password-8.html">Forgot Password</a>
                            </div> -->
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-md btn-theme w-100" id="login_btn"
                                        style="background-color: #3b3838;">Login</button>
                                    <button class="btn-md btn-theme w-100 d-none" type="button" id="loader_btn" style="background-color: #3b3838;">
                                            <div class="spinner-border" role="status" >
                                          </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 bg-img">
                    <div class="info">
                        <div class="info-text">
                            <div class="waviy">
                                <span style="--i:1; color: #000;">W</span>
                                <span style="--i:2; color: #000;">e</span>
                                <span style="--i:3; color: #000;">l</span>
                                <span style="--i:4; color: #000;">c</span>
                                <span style="--i:5; color: #000;">o</span>
                                <span style="--i:6; color: #000;">m</span>
                                <span style="--i:7; color: #000;">e</span>
                                <span style="--i:8">t</span>
                                <span style="--i:9">o</span>
                                <span style="--i:10; color: #000;">P</span>
                                <span style="--i:11; color: #000;">I</span>
                                <span style="--i:12; color: #000;">P</span>
                                <span style="--i:13; color: #000;">S</span>
                                {{-- <span style="--i:14; color: #000;">l</span>
                                <span style="--i:15; color: #000;">t</span>
                                <span style="--i:16; color: #000;">y</span> --}}
                            </div>
                            <p style="color: #000; text-align: center; font-size: 15px;">Welcome to the Gainwell PIPS.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets') }}/login-assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets') }}/login-assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/login-assets/js/jquery.validate.min.js"></script>
    <script src="{{ asset('assets') }}/login-assets/js/login.js"></script>


</body>

</html>
