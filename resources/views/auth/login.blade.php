
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{ asset('assets/inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/inspinia/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/inspinia/css/style.css') }}" rel="stylesheet">


</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>TOOLBOX</div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                <x-input id="mail" class="form-control block mt-1 w-full" type="email" name="mail" :value="old('mail')" required autofocus />
                <!--<input type="email" class="form-control" placeholder="Username" required="">-->
                </div>
                <div class="form-group">
                    <!--<input type="password" class="form-control" placeholder="Password" required="">-->
                    <x-input id="password" class="form-control block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                </div>
                <!--<button type="submit" class="btn btn-primary block full-width m-b">Login</button>-->
                <x-button class="btn btn-primary block full-width m-b ml-3">
                    {{ __('Log in') }}
                </x-button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/inspinia/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/inspinia/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/inspinia/js/bootstrap.js') }}"></script>

</body>

</html>
