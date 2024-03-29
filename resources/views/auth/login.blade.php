<!DOCTYPE html><!-- saved from url=(0014)about:internet -->
<html 
    lang="en" 
    dir="ltr" 
    data-nav-layout="vertical" 
    data-vertical-style="overlay" 
    data-theme-mode="dark" 
    data-header-styles="dark" 
    data-menu-styles="dark" 
    data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'STORE KEEP') }}</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit."> <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon"> <!-- Main Theme Js -->
    <script src="../assets/js/authentication-main.js"></script> <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Style Css -->
    <link href="../assets/css/styles.min.css" rel="stylesheet"> <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-lg">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center"> 
                    <a href="index.html"> 
                        <!-- <img src="{{asset('assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo"> <img src="{{asset('assets/images/brand-logos/desktop-dark.png" alt="logo')}}" class="desktop-dark">  -->
                        <h3 style="font-weight: bold;">STORE KIPPA</h3>
                    </a> 
                </div>
                @if(Session::has('fail'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" style="color: red; text-align: center;">{{ Session::get('fail') }}</p>
                @endif
                
                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}" style="color: red; text-align: center;">{{ Session::get('success') }}</p>
                @endif
            
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Login</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Enter your Username and Password to Login</p>

                        <form method="post" action="{{ route('admin.login')}} ">

                            @csrf

                            <div class="row gy-3">
                                <div class="col-xl-12"> 
                                    <label for="signup-username" class="form-label text-default">User Name</label> 
                                    <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocusid="signup-username" placeholder="Username"> 
                                    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12"> 
                                    <label for="signup-password" class="form-label text-default">Password</label>
                                    <div class="input-group"> 
                                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="signup-password" placeholder="password"> 
                                        <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2">
                                            <i class="ri-eye-off-line align-middle"></i>
                                        </button> 
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-xl-12 d-grid mt-4"> <button class="btn btn-lg btn-primary" type="submit" style="font-weight: bold;">LOGIN</button> </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
    <!-- Show Password JS -->
    <script src="{{asset('assets/js/show-password.js')}}"></script>
</body>

</html>
