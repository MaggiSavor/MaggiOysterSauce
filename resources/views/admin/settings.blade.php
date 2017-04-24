<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Settings</title>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="../assets/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-toggle.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.nav')
        

        <div id="page-wrapper" style="padding-top: 0% ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Configuration
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#themes" data-toggle="tab">Themes</a>
                            </li>
                            <li><a href="#manage" data-toggle="tab">Manage Users</a>
                            </li>
                            <li><a href="#addUser" data-toggle="tab">Add User</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="themes">
                                <div class="col-lg-12" style="display: inline-block; padding-top: 2%;">  
                                    <label><h4>Navigation Bar Color</h4></label>
                                        <input id="navbarColor" type="color" name="favcolor" value="#F8F8F8">
                                        <!-- <button type="button" id="ok" class="btn btn-default btn-circle"><i class="fa fa-check"></i> -->
                                </button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-12" style=" border-top: 1px dotted #8c8b8b; padding-bottom: 1%">  
                                    <label><h4>Background Image</h4></label>
                                        <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="90" data-height="15">
                                    <br>
                                    <button type="button" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" >
                                    </button>
                                    <button type="button" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" >
                                    </button>
                                    <button type="button" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" >
                                    </button>
                                    <button type="button" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" >
                                    </button>
                                    <button type="button" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" >
                                    </button>
                                    <button type="button" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" >
                                    </button>
                                </div>
                                <hr />
                                <div class="col-lg-12" style="display: inline-block; border-top: 1px dotted #8c8b8b; ">
                                    
                                    <label><h4>Background Filter</h4></label>
                                    <a type="button" id="default" data-value="248, 248, 248, 0" data-color="#f8f8f8" style="background-color: #f8f8f8;" class="btn btn-default btn-circle filters" ></a>
                                    <a type="button" id="black" data-value="0, 3, 26, 0.5" data-color="#00031a" style="background-color: #00031a;" class="btn btn-default btn-circle filters" ></a>
                                    <a type="button" id="blue" data-value="0, 102, 255, 0.5" data-color="#0066ff" style="background-color: #0066ff;" class="btn btn-default btn-circle filters" ></a>
                                    <a type="button" id="red" data-value="255, 0, 0, 0.5" data-color="#ff0000" style="background-color: #ff0000;" class="btn btn-default btn-circle filters" ></a>
                                    <a type="button" id="green" data-value="51, 204, 51, 0.5" data-color="#33cc33" style="background-color: #33cc33;" class="btn btn-default btn-circle filters" ></a>
                                    <a type="button" id="orange" data-value="255, 102, 0, 0.5" data-color="#ff6600" style="background-color: #ff6600;" class="btn btn-default btn-circle filters" ></a>
                                    <a type="button" id="violet" data-value="204, 0, 204, 0.5" data-color="#cc00cc" style="background-color: #cc00cc;" class="btn btn-default btn-circle filters" ></a>
                                </div>
                                <button type="button" class="btn btn-success pull-right">Save Changes</button>
                            </div>
                            <div class="tab-pane fade" id="manage">
                                <h4>Manage Users</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="addUser">
                                <h4>Add User</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
        $('#navbarColor').on('change',function(){
            // alert($(this).data('color'));
            var bar = ($(this).val());
            $('#navbar').css('background-color', bar);
        });

        $('.filters').on('click',function(){
            // alert($(this).data('color'));
            var bg = ('loginbg.jpg');
            var bar = ($(this).data('value'));
            $('#page-wrapper').css({background: 'linear-gradient(0deg, rgba('+bar+'), rgba('+bar+')), url("{!! asset("assets/images/'+bg+'")!!}") no-repeat center center fixed', 'background-size' : '100%'});
        });
    </script>

</body>

</html>
