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
        

        <div id="page-wrapper">
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
                          <input type="hidden" value="{{$info['resident_id']}}" name="residentId">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">First Name *</label>
                                        <input type="text" name="fname" class="form-control input-xs" id="InputFName" placeholder="First Name" value="{{$info['firstname']}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Middle Name *</label>
                                        <input type="text" name="mname" class="form-control input-xs" id="InputMName" placeholder="Middle Name" value="{{$info['middlename']}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Last Name *</label>
                                        <input type="text" name="lname" class="form-control input-xs" id="InputLName" placeholder="Last Name" value="{{$info['middlename']}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Address *</label>
                                        <input type="text" name="houseNo" class="form-control input-xs" id="InputHouseNo" value="{{$info['house_no']}}" placeholder="House No">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Street *</label>
                                        <select class="form-control" name="street" id="InputStreet" >
                                            <option hidden value="">--Select Street--</option>
                                            <option value="P. Ortega" <?php if($info['street'] == "P. Ortega"){ echo ' selected';} ?> >P. Ortega</option>
                                            <option value="Asuncion" <?php if($info['street'] == "Asuncion"){ echo ' selected';} ?> >Asuncion</option>
                                            <option value="Morga" <?php if($info['street'] == "Morga"){ echo ' selected';} ?> >Morga</option>
                                            <option value="Zamora" <?php if($info['street'] == "Zamora"){ echo ' selected';} ?> >Zamora</option>
                                            <option value="J. Nolasco" <?php if($info['street'] == "J. Nolasco"){ echo ' selected';} ?> >J. Nolasco</option>
                                            <option value="Sto. Cristo" <?php if($info['street'] == "Sto. Cristo"){ echo ' selected';} ?> >Sto. Cristo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputHouseID" id="householdID">Household ID:</label>
                                        <br>
                                        <label>{{$info['household_id']}}</label>
                                        <input type="hidden" name="householdID" class="form-control input-xs"  placeholder="Household id" id="houseID" value="{{$info['household_id']}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="InputStatus">Status</label>
                                            <select class="form-control" name="status" id="InputStatus" >
                                                <option value="Single" <?php if($info['status'] == "Single"){ echo ' selected';} ?> >Single</option>
                                                <option value="Married" <?php if($info['status'] == "Married"){ echo ' selected';} ?> >Married</option>
                                                <option value="Seperated" <?php if($info['status'] == "Separated"){ echo ' selected';} ?> >Separated</option>
                                                <option value="Widowed" <?php if($info['status'] == "Widowed"){ echo ' selected';} ?> >Widowed</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputContact">Mobile</label>
                                        <input type="number" min="999999999" max="9999999999" name="mobile" class="form-control input-xs" id="InputCellphone" value="{{$info['mobile']}}" placeholder="(+63)">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputContact">Telephone</label>
                                        <input type="number" min="999999" max="9999999" name="telno" class="form-control input-xs" id="InputTelephone" value="{{$info['telno']}}" placeholder="(2)" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="InputOccupation">Occupation:</label>
                                        <input type="text" name="occupation" class="form-control input-xs" id="InputOccupation" value="{{$info['occupation']}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="InputContact">Nationality</label>
                                        <input type="text" name="nationality" class="form-control input-xs" id="InputNation" value="{{$info['nationality']}}">
                                    </div>
                                    <div class="form-group col-md-4" id="voter">
                                        <input type="hidden" id="votercheck" value="{{$info['voter']}}">
                                        <label class='col-lg-12 control-label'>
                                            Voter *
                                        </label>
                                        <div class="col-md-12">
                                            <div class='radio'>
                                            <label for='voter'>
                                            <input type="radio" name="voter" id="voter" value="voter">
                                            <strong>Yes</strong>
                                            </label>
                                            <label for='nonvoter'>
                                            <input type="radio" name="voter" id="nonvoter" value="nonvoter" >
                                            <strong>No</strong>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="InputReligion">Religion</label>
                                        <input type="text" name="religion" class="form-control input-xs" id="InputReligion" value="{{$info['religion']}}">
                                    </div>
                                    <div class="form-group col-md-4"><br>
                                        <label for="InputFamID" id="famID">Family ID:</label><br>
                                        <label>{{$info['family_id']}}</label>
                                        <input type="hidden" name="familyID"class="form-control input-xs" id="familyID" placeholder="Family Id" value="{{$info['family_id']}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <input type="hidden" value="{{$info['household_head']}}" id="househead">
                                        <label for="householdhead"><input type="checkbox" name="househead" id="housecheck" value="yes">
                                        <strong>Household Head</strong>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="hidden" value="{{$info['family_head']}}" id="familyhead">
                                        <label for="familyhead"><input type="checkbox" name="familyhead" id="familycheck" value="yes">
                                        <strong>Family Head</strong>
                                        </label>
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
            // excluded: [':disabled'],
            excluded: [':hidden'],
            icon: {
                // valid: 'glyphicon glyphicon-ok',
                // invalid: 'glyphicon glyphicon-remove',
                // validating: 'glyphicon glyphicon-refresh'
            },
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
            text: "You are trying to update this resident's information.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
          if(isConfirm){
            $.ajax({
              method: 'POST',
              url: "{{URL::Route('saveUpdate')}}",
              headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
              dataType: 'JSON',
              processData : false,
              contentType : false,
              data: new FormData($("#resident")[0]),
              success: function(data){
                console.log(data)
                if(data.success == "yes"){
                  swal({
                    title:"Saved!", 
                    text: "New resident has been registered!",
                    type: "success",
                    showConfirmButton: false
                  });
                  // setTimeout(function(){
                  //            location.reload();
                  //       }, 2000); 
                }
              },error: function(data){
                  swal("Error!", "Something went wrong", "error");
                }
            });
          }
          else {
            swal("Cancelled", "You cancelled!", "error");
          }
        });
      });
    })  
});
        
    </script>
    <script>
    $('document').ready(function(){
        if($('#househead').val() == "yes"){
            $('#housecheck').prop('checked', true);
        }

        if($('#familyhead').val() == "yes"){
            $('#familycheck').prop('checked', true);
        }

        if($('#votercheck').val() == "yes"){
            $('#voter').prop('checked', true);
        }
        else{
            $('#nonvoter').prop('checked', true);   
        }
    })
    </script>
  
</body>

</html>
