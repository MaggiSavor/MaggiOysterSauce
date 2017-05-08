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

    .password-progress {
        margin-top: 10px;
        margin-bottom: 0;
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
                                <form method="post" id="updateSettings">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-lg-12" style="display: inline-block; padding-top: 2%;">
                                        <label><h4>Navigation Bar Color</h4></label>
                                            <input id="navbarColor" type="color" name="navbarColor" value="{{$settings->navbar}}">
                                            <!-- <button type="button" id="ok" class="btn btn-default btn-circle"><i class="fa fa-check"></i> -->
                                   
                                        <div class="clearfix"></div>
                                    </div>
                                    <hr />
                                    <div class="col-lg-12" style="padding-bottom: 1%">  
                                        <label><h4>Background Image</h4></label>
                                            <input type="checkbox" class="cj_toggle" id="bg_toggle" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="90" data-height="15">

                                            <input type="text" id="bg_image_toggle" name="bg_image_toggle" value="{{$settings->bg_image_toggle}}">
                                        <br>
                                        <button type="button" class="cj_bg" id="bg1" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/loginbg.jpg')!!}'); background-size: 100%;" value="loginbg.jpg">
                                        </button>
                                        <button type="button" class="cj_bg" id="bg2" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/bg2.jpg')!!}'); background-size: 100%;" value="bg2.jpg">
                                        </button>
                                        <button type="button" class="cj_bg" id="bg3" style="height:60px; width:100px; background-image: url('{!! asset('assets/images/vision.png')!!}'); background-size: 100%;" value="vision.png" >
                                        </button>
                                        <input type="text" name="background_image" id="background_image" value="{{$settings->bg_image}}">
                                    </div>
                                    <hr />
                                    <div class="col-lg-12" style="display: inline-block; ">
                                        
                                        <label><h4>Background Filter</h4></label>
                                        <a type="button" id="default" data-value="248, 248, 248, 0" data-color="#f8f8f8" style="background-color: #f8f8f8;" class="btn btn-default btn-circle filters" ></a>
                                        <a type="button" id="black" data-value="0, 3, 26, 0.5" data-color="#00031a" style="background-color: #00031a;" class="btn btn-default btn-circle filters" ></a>
                                        <a type="button" id="blue" data-value="0, 102, 255, 0.5" data-color="#0066ff" style="background-color: #0066ff;" class="btn btn-default btn-circle filters" ></a>
                                        <a type="button" id="red" data-value="255, 0, 0, 0.5" data-color="#ff0000" style="background-color: #ff0000;" class="btn btn-default btn-circle filters" ></a>
                                        <a type="button" id="green" data-value="51, 204, 51, 0.5" data-color="#33cc33" style="background-color: #33cc33;" class="btn btn-default btn-circle filters" ></a>
                                        <a type="button" id="orange" data-value="255, 102, 0, 0.5" data-color="#ff6600" style="background-color: #ff6600;" class="btn btn-default btn-circle filters" ></a>
                                        <a type="button" id="violet" data-value="204, 0, 204, 0.5" data-color="#cc00cc" style="background-color: #cc00cc;" class="btn btn-default btn-circle filters" ></a>
                                        <input type="hidden" name="colorFilter" id="colorFilter" value="{{$settings->filter}}">

                                    </div>
                                    <hr/>
                                    <div class="pull-right" style="pad">
                                        <button type="button" id="reset" class="btn btn-default">Reset to Default</button>
                                        <button type="submit" id="saveChanges"  class="btn btn-barangay">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="admin">
                                <div style="padding-top: 20px;">
                                    <div class="tab">
                                      <button class="tablinks" onclick="openCity(event, 'manageUser')" id="defaultOpen">Manage Users</button>
                                      <button class="tablinks" onclick="openCity(event, 'addUser')">Add Users</button>
                                      <button class="tablinks" onclick="openCity(event, 'tab')">Tab</button>
                                    </div>

                                    <div id="manageUser" class="tabcontent">

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Users Table
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body" width="100%">
                                                    <table width="100%" cellspacing="0" class="table table-striped table-bordered dt-responsive nowrap" id="usersTable">
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
                                                            <td><button type="button" class="btn btn-success" name="Update" id="Update" >
                                                                <span class="glyphicon glyphicon-edit"> </span> Update
                                                            </button></td>
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

                                    <div id="addUser" class="tabcontent">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Add Account
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <form method="post" id="registerUser">
                                                    <div class="form-horizontal" style="">
                                                        <div class="form-group">
                                                            <label for="SearchName" class="col-sm-3 control-label">Official's Name:</label>
                                                            <div class="col-sm-8">
                                                                <input id="SearchName" name="SearchName" class="form-control" placeholder="Full Name" list="listid" autocomplete="auto">

                                                                <datalist id='listid'>
                                                                @foreach($residents as $resident)
                                                                  <option value="{{$resident['fullname']}}">{{$resident['resident_id']}}</option>
                                                                @endforeach
                                                                </datalist>
                                                            </div>
                                                        </div>              
                                                        <div class="form-group">
                                                            <label for="inputEmail" class="col-sm-3 control-label">Email Address:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="inputEmail" placeholder="Email Address" autocomplete="off">
                                                            </div>
                                                        </div>              
                                                        <div class="form-group">
                                                            <label for="inputUsername" class="col-sm-3 control-label">Username:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="inputUsername" placeholder="Username" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="col-sm-3 control-label">Password:</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                                <div class="progress password-progress"  id="passwordMeter">
                                                                    <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="confirmPassword" class="col-sm-3 control-label">Confirm Password:</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
                                                            </div>
                                                        </div>                                                    
                                                        <div class="form-group">
                                                            <label for="inputUserType" class="col-sm-3 control-label">User Type:</label>
                                                            <div class="col-sm-8">
                                                                <select name="inputUserType" class="form-control">
                                                                    <option value="Standard User">Standard User</option>
                                                                    <option>Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputSecQuestion" class="col-sm-3 control-label">Security Question:</label>
                                                            <div class="col-sm-8">
                                                                <select name="inputSecQuestion" class="form-control">
                                                                    <option>In what city or town did your mother and father meet?</option>
                                                                    <option>What is the name of your first pet?</option>
                                                                    <option>What was your childhood nickname?</option>
                                                                    <option>What is your favorite movie?</option>
                                                                    <option>What was your favorite sport in high school?</option>
                                                                    <option>What is the name of your favorite childhood friend?</option>
                                                                    <option>Who is your childhood sports hero?</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputSecAnswer" class="col-sm-3 control-label">Security Answer:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="inputSecAnswer" placeholder="Security Answer" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="col-sm-12" style="padding-top: 3%;">
                                                            <button type="submit" class="btn btn-success btn pull-right" name="AddUserSubmitBtn" id="AddUserSubmitBtn" >
                                                                <span class="glyphicon glyphicon-plus"> </span> Add User
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                        <!-- /.panel -->
                                    </div>

                                    <div id="tab" class="tabcontent">
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

    
    <script type="text/javascript">
         
    </script>
    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
        //toggle background button 
        $(document).ready(function() {
            if(($('#bg_image_toggle').val()) == '0'){
                $('#bg_toggle').bootstrapToggle('off')
            }else{
                $('#bg_toggle').bootstrapToggle('on')
            }
        });

        $('#bg_toggle').on('change',function(){
            // $('#bg_image_toggle').val($(this).prop('checked'))
            if($(this).is(':checked')) {
                ($('#bg_image_toggle').val('1'))
            }else{
                ($('#bg_image_toggle').val('0'))
            }
        });
        //end toggle background button 

        //background
        $('.cj_bg').on('click',function(){
            var foo = $(this).val();

        });
        //

        //reset to default button
        $('#reset').on('click',function(){
            $('#bg_image_toggle').val('0')
            $('#navbarColor').val('#F8F8F8')
            $('#colorFilter').val('255,255,255,1')



            var bg = ('');
            var bar = ('255,255,255,1');
            $('#page-wrapper').css({background: 'linear-gradient(0deg, rgba('+bar+'), rgba('+bar+')), url("{!! asset("assets/images/'+bg+'")!!}") '});
            $('#navbar').css('background-color', '#F8F8F8');
            $('#bg_image_toggle').val('0')
        });
        

        $('#navbarColor').on('change',function(){
            // alert($(this).data('color'));
            var bar = ($(this).val());
            $('#navbar').css('background-color', bar);

        });

        $('.filters').on('click',function(){
            // alert($(this).data('color'));
            var bg = $('#background_image').val();
            var bar = ($(this).data('value'));
            $('#page-wrapper').css({background: 'linear-gradient(0deg, rgba('+bar+'), rgba('+bar+')), url("{!! asset("assets/images/'+bg+'")!!}") ', "background-position": "center center", "background-repeat": "no-repeat", "background-attachment": "fixed", "background-size": "cover", "height": "100%"});
            
            $('#colorFilter').val(bar);
        });

        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                searchHighlight: true,
                "columnDefs": [
                    { 
                      "sortable" : false, 
                      "searchable": false,
                      "targets": 5
                    }
                ]
            });
        });


        $('#saveChanges').focus(function(e){
           e.preventDefault();
           swal({
             title: "Are you sure?",
               text: "You are trying to save the event.",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes",
               closeOnConfirm: false,
               closeOnCancel: false
           },
           function(isConfirm){
             var transfer = $("#updateSettings");
             var dataString = transfer.serialize();
             if(isConfirm){
               $.ajax({
                 method: 'POST',
                 url: "{{URL::Route('saveSettings', $settings['id'])}}",
                 headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                 dataType: 'JSON',
                 processData : false,
                 data: dataString,
                 success: function(data){
                    if(data.success == "yes"){
                        swal("Saved!", "Settings has been saved!", "success");
                    }
                 },error: function(data){
                    swal("Something went wrong!");
                 }
               });
             }
             else {
               swal("Cancelled", "", "error");
             }
           });
        })
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
    <script>
    $(document).ready(function() {
        $('#registerUser').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                SearchName: {
                    validators: {
                        notEmpty: {
                            message: 'Name of Official is required'
                        }
                    }
                },
                inputEmail: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required'
                        },
                        emailAddress: {
                            message: 'This is not a valid email address'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        }
                    }
                },
                inputUsername: {
                    validators: {
                        notEmpty: {
                            message: 'Username is required'
                        },
                        stringLength: {
                            min: 3,
                            max: 10,
                            message: 'Username must be at 3-10 characters'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Password must be atleast 6 characters'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var score = 0;

                                if (value === '') {
                                    return {
                                        valid: true,
                                        score: null
                                    };
                                }

                                // Check the password strength
                                score += ((value.length >= 8) ? 1 : -1);

                                // The password contains uppercase character
                                if (/[A-Z]/.test(value)) {
                                    score += 1;
                                }

                                // The password contains uppercase character
                                if (/[a-z]/.test(value)) {
                                    score += 1;
                                }

                                // The password contains number
                                if (/[0-9]/.test(value)) {
                                    score += 1;
                                }

                                // The password contains special characters
                                if (/[!#$%&^~*_]/.test(value)) {
                                    score += 1;
                                }

                                return {
                                    valid: true,
                                    score: score    // We will get the score later
                                };
                            }
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: 'Please confirm password'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                inputSecAnswer: {
                    validators: {
                        notEmpty: {
                            message: 'Security Answer is required'
                        }
                    }
                }
            }
        })
        .on('err.validator.fv', function(e, data) {
            // data.bv        --> The FormValidation.Base instance
            // data.field     --> The field name
            // data.element   --> The field element
            // data.validator --> The current validator name

            if (data.field === 'inputEmail') {
                // The email field is not valid
                data.element
                    .data('fv.messages')
                    // Hide all the messages
                    .find('.help-block[data-fv-for="' + data.field + '"]').hide()
                    // Show only message associated with current validator
                    .filter('[data-fv-validator="' + data.validator + '"]').show();
            }
        })
        .on('success.validator.fv', function(e, data) {
            // The password passes the callback validator
            if (data.field === 'password' && data.validator === 'callback') {
                // Get the score
                var score = data.result.score,
                    $bar  = $('#passwordMeter').find('.progress-bar');

                switch (true) {
                    case (score === null):
                        $bar.html('').css('width', '0%').removeClass().addClass('progress-bar');
                        break;

                    case (score <= 0):
                        $bar.html('Very weak').css('width', '25%').removeClass().addClass('progress-bar progress-bar-danger');
                        break;

                    case (score > 0 && score <= 2):
                        $bar.html('Weak').css('width', '50%').removeClass().addClass('progress-bar progress-bar-warning');
                        break;

                    case (score > 2 && score <= 4):
                        $bar.html('Medium').css('width', '75%').removeClass().addClass('progress-bar progress-bar-info');
                        break;

                    case (score > 4):
                        $bar.html('Strong').css('width', '100%').removeClass().addClass('progress-bar progress-bar-success');
                        break;

                    default:
                        break;
                }
            }
        })
        .on('success.form.fv', function(e) {
                e.preventDefault();

                    var $form = $(e.target),        // The form instance
                    fv    = $(e.target).data('formValidation'); // FormValidation instance
                    $('#AddUserSubmitBtn').focus(function(e){
                       e.preventDefault();
                       swal({
                         title: "Are you sure?",
                           text: "You are trying to save the event.",
                           type: "warning",
                           showCancelButton: true,
                           confirmButtonColor: "#DD6B55",
                           confirmButtonText: "Yes",
                           closeOnConfirm: false,
                           closeOnCancel: false
                       },
                       function(isConfirm){
                         var transfer = $("#registerUser");
                         var dataString = transfer.serialize();
                         if(isConfirm){
                           $.ajax({
                             method: 'POST',
                             url: "{{URL::Route('registerUser')}}",
                             headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                             dataType: 'JSON',
                             processData : false,
                             data: dataString,
                             success: function(data){
                                if(data.success == "Successfully Saved!"){
                                    swal("Saved!", "User has been saved!", "success");
                                    $("#registerUser")[0].reset();
                                }else if(data.error == "User Exists!"){
                                    swal("Error!", "Resident does not Exists", "error");
                                }else if(data.error == "Username Exists!"){
                                    swal("Error!", "Username Already Exists", "error");
                                }else if(data.error == "Email Exists!"){
                                    swal("Error!", "Email Already Exists", "error");
                                }else if(data.error == "Not a Resident!"){
                                    swal("Error!", "Official's Name is not a Resident", "error");
                                }
                             },error: function(data){
                                swal("Something went wrong!");
                             }
                           });
                         }
                         else {
                           swal("Cancelled", "", "error");
                         }
                       });
                    })
            });
    });
    </script>

</body>

</html>
