
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Empty Page</title>

    <link href="{{ asset('assets/inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/inspinia/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/inspinia/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/inspinia/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/inspinia/css/more.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body class="">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
        @guest
        no menu
        @endguest
        @auth
        @include('inspinia.layout.menu')
        @endauth

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!--<form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>-->
        </div>
            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <img src="{{ asset('assets/flags/flag1_'.session('country').'.png') }}" width="20"/>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <div class="media-body">
                                    
                                <form name="frmChangeCountry" id="frmChangeCountry" method="POST" action="{{ route('change.country') }}">
                                    <input type="hidden" name="country" value="UK">
                                @csrf
                                <a href="#" class="lnkChangeCountry" >UK</a><!--onclick="event.preventDefault();this.closest('form').find('input:hidden').val(this.text());this.closest('form').submit();">UK</a>-->
                                <a href="#" class="lnkChangeCountry" >FR</a><!-- onclick="event.preventDefault();this.closest('form').find('input:hidden').val(this.text());this.closest('form').submit();">FR</a>-->
                                </form>


                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    @if (Auth::user())
                    <span class="m-r-sm text-muted welcome-message">{{ Auth::user()->getFullName() }} </span>
                    @endif
                </li>


                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <img alt="image" class="rounded-circle" src="{{ asset('assets/inspinia/img/profile_small.jpg') }}" width="24">
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                            </form>
                            </div>
                        </li>
                    </ul>
                </li>

    <!--
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
-->

            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>{!! $page_title !!}</h2>
                    <!--
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">This is</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>-->
                </div>
            </div>

            <div class="wrapper wrapper-content">
            
                        

            @yield('content')

            </div>


            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
        </div>
        
        @if (!!Session::get('message'))
        <div style="position: absolute; top: 20px; right: 20px;">

            <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fa fa-newspaper-o"> </i>
                    <strong class="mr-auto m-l-sm">Notification</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Country successfully changed to : {{ Session::get('country') }}
                </div>
            </div>

        </div>
        @endif

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/inspinia/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/inspinia/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/inspinia/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/inspinia/js/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/inspinia/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/inspinia/js/inspinia.js') }}"></script>
    <!--<script src="js/plugins/pace/pace.min.js"></script>-->

    <script type="text/javascript">

        $(document).ready(function() {

            $(".lnkChangeCountry").on("click", clickChangeCountry);

            var sessionMessage = "{{ Session::get('message') }}";
            if (sessionMessage != "") {
                let toast1 = $('.toast1');
                toast1.toast({
                    delay: 2000,
                    animation: true
                });
                toast1.toast('show');
            }



        });
        function clickChangeCountry(e) {
            e.preventDefault();
            var country = $(this).text();
            $("input[name='country']").val(country);
            $("#frmChangeCountry").submit();
        }
    </script>
    
    @stack('scripts')


</body>

</html>
