<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Add Resident</title>

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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <form method="post" id="resident">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">First Name *</label>
                                        <input type="text" name="fname" class="form-control input-xs" id="InputFName" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Middle Name *</label>
                                        <input type="text" name="mname" class="form-control input-xs" id="InputMName" placeholder="Middle Name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Last Name *</label>
                                        <input type="text" name="lname" class="form-control input-xs" id="InputLName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Address *</label>
                                        <input type="text" name="houseNo" class="form-control input-xs" id="InputHouseNo" placeholder="House No">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Street *</label>
                                        <select class="form-control" name="street" id="InputStreet" >
                                            <option hidden value="">--Select Street--</option>
                                            <option>P. Ortega</option>
                                            <option>Asuncion</option>
                                            <option>Morga</option>
                                            <option>Zamora</option>
                                            <option>J. Nolasco</option>
                                            <option>Sto. Cristo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputHouseID" id="householdID">Household ID:</label>
                                        <br>
                                        <label>{{$houseID['household_id']+1}}</label>
                                        <input type="hidden" name="householdID" class="form-control input-xs"  placeholder="Household id" id="houseID" value="{{$houseID['household_id']+1}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="Inputbirthdate">Birthday:&nbsp;&nbsp;</label>
                                        <input type="date" name="birthdate" min="1954-10-01" max="<?php echo date('Y-m-d'); ?>" class="form-control input-xs" id="bday">
                                        <span id="resultBday" hidden></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputContact">Mobile</label>
                                        <input type="number" min="999999999" max="9999999999" name="mobile" class="form-control input-xs" id="InputCellphone" placeholder="(+63)">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputContact">Telephone</label>
                                        <input type="number" min="999999" max="9999999" name="telno" class="form-control input-xs" id="InputTelephone" placeholder="(2)" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="InputStatus">Status</label>
                                            <select class="form-control" name="status" id="InputStatus" >
                                                <option>Single</option>
                                                <option>Married</option>
                                                <option>Separated</option>
                                                <option>Widowed</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputOccupation">Occupation:</label>
                                        <input type="text" name="occupation" class="form-control input-xs" id="InputOccupation" placeholder="Occupation" >
                                    </div>
                                    <div class="form-group col-md-4" id="voter" hidden>
                                        <label class='col-lg-12 control-label'>
                                            Voter *
                                        </label>
                                        <div class="col-md-12">
                                            <div class='radio'>
                                            <input type="radio" name="voter" id="voter" value="voter" >
                                            <label for='male'>Yes</label>
                                            <br>
                                            <input type="radio" name="voter" id="voter" value="nonvoter" >
                                            <label for='Female'>No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="InputContact">Nationality</label>
                                        <input type="text" name="nationality" class="form-control input-xs" id="InputNation" placeholder="Nationality">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputReligion">Religion</label>
                                        <input type="text" name="religion" class="form-control input-xs" id="InputReligion" placeholder="Religion" >
                                    </div>
                                    <div class="form-group col-md-4"><br>
                                        <label for="InputFamID" id="famID">Family ID:</label><br>
                                        <label>{{$familyID['family_id']+1}}</label>
                                        <input type="hidden" name="familyID"class="form-control input-xs" id="familyID" placeholder="Family Id" value="{{$familyID['family_id']+1}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="InputFName">Role:</label>
                                        <select class="form-control" name="role" id="InputRole" >
                                            <option hidden value="">--Select Role--</option>
                                            <option>Husband</option>
                                            <option>Wife</option>
                                            <option>Son</option>
                                            <option>Daughter</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputMother">Mother's Name:&nbsp;&nbsp;</label>
                                        <input type="text" name="mother" class="form-control input-xs" id="InputMother" placeholder="Mothers Name" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputFather">Father's Name:</label>
                                        <input type="text" name="father" class="form-control input-xs" id="InputFather" placeholder="Fathers Name" >
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="reset"class="btn btn-warning" name="reset" id="reset">Reset</button>
                                <button id="register" type="submit" name="tryy" class="btn btn-warning"><span class="glyphicon glyphicon-plus"> </span> Register</button>
                            </div>
                        </form>
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

    <!--     link for swal -->
<script src="{!! asset('assets/sweetalert-master/dist/sweetalert.min.js')!!}"></script>
<link rel="stylesheet" href="{!! asset('assets/sweetalert-master/dist/sweetalert.css')!!}">

<!-- link for validation -->
<script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
    <script>
    $('#bday').change(function(){
        var Bdate =$('#bday').val();
        var Bday = +new Date(Bdate);
        //Q4A = Bdate + ". You are " + ~~ ((Date.now() - Bday) / (31557600000));
        age = ~~ ((Date.now() - Bday) / (31557600000));  
        var theBday = $('#resultBday');
        theBday.innerHTML = age;

        if(age >= 18){
            $('#voter').attr('hidden', false);
        }
        else if(age <18){
            $('#voter').attr('hidden', true);
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
  <script>
  $('document').ready(function(){
    $('#resident').formValidation({
            framework: 'bootstrap',
            // Only disabled elements are excluded
            // The invisible elements belonging to inactive tabs must be validated
            excluded: [':hidden'],
            fields: {
                fname: {
                  validators: {
                    notEmpty: {
                      message: "Firstname is required"
                     }
                  }
                },
                mname: {
                  validators: {
                    notEmpty: {
                      message: "Middlename is required"
                     }
                  }
                },
                lname: {
                  validators: {
                    notEmpty: {
                      message: "Lastname is required"
                     }
                  }
                },
                houseNo: {
                  validators: {
                    notEmpty: {
                      message: "House No is required"
                     }
                  }
                },
                status: {
                  validators: {
                    notEmpty: {
                      message: 'Marital status is required'
                    }
                  }
                },
                street: {
                  validators: {
                    notEmpty: {
                      message: "Street is required"
                     }
                  }
                },
                birthdate: {
                  validators: {
                    notEmpty: {
                      message: "Birthdate is required"
                     }
                  }
                },
                religion: {
                  validators: {
                    notEmpty: {
                      message: "Religion is required"
                     }
                  }
                },
                nationality: {
                  validators: {
                    notEmpty: {
                      message: "Nationality is required"
                     }
                  }
                },
                voter: {
                  validators: {
                    notEmpty: {
                      message: "This is required"
                     }
                  }
                },
                role: {
                  validators: {
                    notEmpty: {
                      message: "Role is required"
                     }
                  }
                },
            }
    })
    .on('err.field.fv', function(e, data) {
      e.preventDefault();

       var $form = $(e.target),
         fv    = $form.data('formValidation');
        $('#register').focus(function(e){
            e.preventDefault();
            swal({
              title: "Are you sure?",
                text: "You are trying to save new officials.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
              if(isConfirm){
                var info = $('#resident').serialize()
                $.ajax({
                  method: 'POST',
                  url: "{{URL::Route('saveResident')}}",
                  headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                  dataType: 'JSON',
                  data: info,
                  success: function(data){
                    if(data.success == "yes"){
                      swal({
                        title:"Saved!", 
                        text: "New officials has been saved!",
                        type: "success"
                      });
                      $('#householdID').text('Household ID: '+ (parseInt($('#houseID').val())+ 1));
                      $('#famID').text('Household ID: ' + (parseInt($('#familyID').val())+ 1));
                    }
                  },error: function(data){
                      swal("Error!", "Something went wrong", "error");
                    }
                });
              }
              else {
                swal("Cancelled", "Something went wrong!", "error");
              }
            });
          });
        })  
    });
  </script>
</body>

</html>
