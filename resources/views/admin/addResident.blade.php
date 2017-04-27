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
                    <h1 class="page-header">Add Resident</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Personal Information
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                       <form class="form-inline" id="resident" Method="POST" action="{{URL::Route('saveResident')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <div class="input-xs-10">
                                            <label for="InputFName">Full Name:</label>
                                            <input type="text" name="fname" class="form-control input-xs" id="InputFName" placeholder="First Name">
                                            &nbsp;&nbsp;
                                            <input type="text" name="mname" class="form-control input-xs" id="InputMName" placeholder="Middle Name">
                                            &nbsp;&nbsp;
                                            <input type="text" name="lname" class="form-control input-xs" id="InputLName" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputHouseNo">Address:&nbsp;&nbsp;</label>
                                            <input type="text" name="houseNo" class="form-control input-xs" id="InputHouseNo" placeholder="House No">
                                            &nbsp;&nbsp;&nbsp;
                                            <select class="form-control" name="street" id="InputStreet" >
                                                <option hidden value="">Street</option>
                                                <option>P. Ortega</option>
                                                <option>Asuncion</option>
                                                <option>Morga</option>
                                                <option>Zamora</option>
                                                <option>J. Nolasco</option>
                                                <option>Sto. Cristo</option>
                                            </select>
                                            &nbsp;&nbsp;&nbsp;
                                            <label for="InputHouseID">Household ID:&nbsp;&nbsp;&nbsp;&nbsp;{{$houseID['household_id']}}</label>
                                            <input type="hidden" name="householdID" class="form-control input-xs"  placeholder="Household id" value="{{$houseID['household_id']}}">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="Inputbirthdate">Birthday:&nbsp;&nbsp;</label>
                                            <input type="date" name="birthdate" min="1954-10-01" max="<?php echo date('Y-m-d'); ?>" class="form-control input-xs" id="bday">
                                                <span id="resultBday" hidden></span>
                                            </div>
                                    </div>      
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputContact">Contact: (+63)</label>
                                            <input type="number" min="999999999" max="9999999999" name="mobile" class="form-control input-xs" id="InputCellphone" placeholder="Mobile" >&nbsp;&nbsp;
                                            <label for="InputContact">(2)</label>&nbsp;&nbsp;
                                            <input type="number" min="999999" max="9999999" name="telno" class="form-control input-xs" id="InputTelephone" placeholder="Telephone" >
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputStatus">Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <select class="form-control" name="status" id="InputStatus" >
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Separated</option>
                                                <option>Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        
                                            <label for="InputOccupation">Occupation:</label>

                                            <input type="text" name="occupation" class="form-control input-xs" id="InputOccupation" placeholder="Occupation" >
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>                                  
                                    <div class="form-group">
                                        <div class="input-xs-6" id="voter" style="display:none">
                                    <br>
                                            <label for="InputVoter">Voter:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="voter" id="voter" value="voter" >
                                                    <strong>Yes</strong>
                                                </label>
                                            </div>
                                            &nbsp;
                                            <div class="radio">
                                                  <label>
                                                        <input type="radio" name="voter" id="voter" value="nonvoter" >
                                                        <strong>No</strong>
                                                  </label>
                                            </div>
                                        </div>
                                    </div>  
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputNation">Nationality:</label>
                                            <input type="text" name="nationality" class="form-control input-xs" id="InputNation" placeholder="Nationality">
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputReligion">Religion:</label>
                                            <input type="text" name="religion" class="form-control input-xs" id="InputReligion" placeholder="Religion" >
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputFamID">Family ID:&nbsp;&nbsp;&nbsp;&nbsp;{{$familyID['family_id']}}</label>
                                            <input type="hidden" name="familyID"class="form-control input-xs" id="InputFamID" placeholder="Family Id" value="{{$familyID['family_id']}}">
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        <div class="input-xs-10">
                                            <label for="InputFName">Role:</label>
                                            <select class="form-control" name="role" id="InputRole" >
                                                <option>Husband</option>
                                                <option>Wife</option>
                                                <option>Son</option>
                                                <option>Daughter</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputMother">Mother's Name:&nbsp;&nbsp;</label>
                                            <input type="text" name="mother" class="form-control input-xs" id="InputMother" placeholder="Mothers Name" >
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        <div class="input-xs-6">
                                            <label for="InputFather">Father's Name:</label>
                                            <input type="text" name="father" class="form-control input-xs" id="InputFather" placeholder="Fathers Name" >
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <button type="reset"class="btn btn-warning" name="reset" id="submit">Reset</button>
                                    <button id="b1" type="submit" name="tryy" class="btn btn-warning"><span class="glyphicon glyphicon-plus"> </span> Register</button>
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
    <script>
    $('#bday').change(function(){
        var Bdate =$('#bday').val();
        var Bday = +new Date(Bdate);
        //Q4A = Bdate + ". You are " + ~~ ((Date.now() - Bday) / (31557600000));
        age = ~~ ((Date.now() - Bday) / (31557600000));  
        var theBday = $('#resultBday');
        theBday.innerHTML = age;

        if(age >= 18){
            $('#voter').css('display','block');
        }
        else if(age <18){
            $('#voter').css('display','none');
        }
    })
     function validate(evt) {
          var theEvent = evt || window.event;
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode( key );
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }
  </script>
</body>

</html>
