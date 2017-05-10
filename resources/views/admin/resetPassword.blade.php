<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap Core CSS -->
<link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<!--  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- MetisMenu CSS -->
<link href="{{ URL::asset('assets/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
<!-- <link href="../assets/metisMenu/metisMenu.min.css" rel="stylesheet">
 -->
 <!-- Custom CSS -->
<link href="{{ URL::asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">
<!-- <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet"> -->
<!-- Morris Charts CSS -->
<link href="{{ URL::asset('assets/morrisjs/morris.css') }}" rel="stylesheet">
<!-- <link href="../assets/morrisjs/morris.css" rel="stylesheet"> -->
<!-- Custom Fonts -->
<link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
<!-- DataTables CSS -->
<link href="{{ URL::asset('assets/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
<!-- <link href="../assets/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet"> -->
<!-- DataTables Responsive CSS -->
<link href="{{ URL::asset('assets/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
<!-- <link href="../assets/datatables-responsive/dataTables.responsive.css" rel="stylesheet"> -->

<!-- DataTables Search Higlight CSS -->
<link href="{{ URL::asset('assets/datatables-plugins/searchHighlight/dataTables.searchHighlight.css') }}" rel="stylesheet">
<link href="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.css" rel="stylesheet">
<!-- <link href="../assets/datatables-plugins/searchHighlight/dataTables.searchHighlight.css" rel="stylesheet">
<link href="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.css" rel="stylesheet"> -->

<!-- Sweet Alert -->
<script src="{!! asset('assets/sweetalert-master/dist/sweetalert.min.js') !!}"></script>
<link rel="stylesheet" href="{!! asset('assets/sweetalert-master/dist/sweetalert.css') !!}">

    <title>BRIMS</title>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <!-- <a class="navbar-brand" href="{{ url('/') }}"> -->
                <a class="navbar-brand" href="{{url('/')}}">
                    Barangay 5 Zone 1
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <!-- <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul> -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <!-- <li><a href="{{ url('/login') }}">Login</a></li> -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li><a href="{{URL::Route('dashboard')}}">Dashboard</a></li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li> -->
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                        @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>        
                            @endforeach
                        </div>
                        @endif
                    <form class="form-horizontal" id="changePass" role="form" method="POST" action="{{URL::Route('resetPasswordUpdate', $userInfo['id'])}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $userInfo['email'] }}" readonly>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" >

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="proceed" type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form validation -->

<!-- jQuery -->
<script src="{{ URL::asset('assets/jquery/jquery.min.js') }}"></script>
<!-- <script src="../assets/jquery/jquery.min.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- <script src="../assets/bootstrap/js/bootstrap.min.js"></script> -->

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL::asset('assets/metisMenu/metisMenu.min.js') }}"></script>
<!-- <script src="../assets/metisMenu/metisMenu.min.js"></script> -->

<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('assets/dist/js/sb-admin-2.js') }}"></script>
<!-- <script src="../assets/dist/js/sb-admin-2.js"></script> -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ URL::asset('assets/js/light-bootstrap-dashboard.js') }}"></script>
<!-- <script src="../assets/js/light-bootstrap-dashboard.js"></script> -->

<!-- DataTables JavaScript -->
<script src="{{ URL::asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ URL::asset('assets/datatables-responsive/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/datatables-plugins/searchHighlight/dataTables.searchHighlight.js') }}"></script>
<script src="{{ URL::asset('assets/datatables-plugins/searchHighlight/dataTables.searchHighlight.min.js') }}"></script>
<script src="{{ URL::asset('assets/datatables-plugins/searchHighlight/jquery.highlight.js') }}"></script>

<!-- form validation -->
<script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
<script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#changePass').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    stringLength: {
                        min: 6,
                        message: 'Password must be atleast 6 characters'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
</script>
</body>
</html>