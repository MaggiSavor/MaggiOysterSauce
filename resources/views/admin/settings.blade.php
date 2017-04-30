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
    <style>

    /* Style the tab */
    div.tab {
        float: left;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 20%;
        height: 100%;
    }

    /* Style the buttons inside the tab */
    div.tab button {
        display: block;
        background-color: inherit;
        color: black;
        width: 100%;
        height: 100%;
        text-align: left;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        font-size: 2vw;
    }

    /* Change background color of buttons on hover */
    div.tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    div.tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 1%;
        border-top: 1px solid #ccc;
        width: 80%;
        border-left: none;
        height: 100%;
    }
    </style>
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.nav')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Configuration
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#themes" data-toggle="tab">System Settings</a>
                            </li>
                            <li><a href="#admin" data-toggle="tab">Admin Settings</a>
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
                                <button type="button" class="btn btn-barangay pull-right">Save Changes</button>
                            </div>
                            <div class="tab-pane fade" id="admin">
                                <div style="padding-top: 20px;">
                                    <div class="tab">
                                      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Manage Users</button>
                                      <button class="tablinks" onclick="openCity(event, 'Paris')">Add Users</button>
                                      <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                                    </div>

                                    <div id="London" class="tabcontent">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Users Table
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                    <table width="100%" class="table table-striped table-bordered table-hover" id="usersTable">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>User Type</th>
                                                            <th>Resident Name</th>
                                                            <th>Email Address</th>
                                                            <th>Username</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $user)
                                                        <tr>
                                                            <td>{{$user->id}}</td>
                                                            <td>{{$user->user_type}}</td>
                                                            <td>{{$user->fullname}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->username}}</td>
                                                            <td>{{$user->username}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <!-- /.table-responsive -->
                                                
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                        <!-- /.panel -->
                                            
                                        
                                    </div>

                                    <div id="Paris" class="tabcontent">
                                      <h3>Paris</h3>
                                      <p>Paris is the capital of France.</p> 
                                    </div>

                                    <div id="Tokyo" class="tabcontent">
                                      <h3>Tokyo</h3>
                                      <p>Tokyo is the capital of Japan.</p>
                                    </div>
                                </div>
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

        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                searchHighlight: true,
                "columnDefs": [
                    { 
                      "sortable" : false, "targets": [5],
                      "searchable": false, "targets": [5]
                    }
                ]
            });
        });     
    </script>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>

</body>

</html>
