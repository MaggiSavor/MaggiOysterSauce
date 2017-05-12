<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Update Resident</title>

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
                    <h1 class="page-header">Update Resident</h1>
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
                          <input type="hidden" value="{{$info['id']}}" name="residentId">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                      <label for="InputStatus">Role</label>
                                          <select class="form-control" name="role" id="inputRole" >
                                          <?php
                                          if($info['gender'] == "Male"){
                                          echo '
                                            <option value="Husband"'; if($info['role'] == "Husband"){ echo ' selected';} echo '>Husband</option>
                                            <option value="Son"'; if($info['role'] == "Son"){ echo ' selected';} echo '>Son</option>';
                                          }
                                          else{
                                          echo'
                                            <option value="Wife"'; if($info['role'] == "Wife"){ echo ' selected';} echo '>Wife</option>
                                            <option value="Daughter"'; if($info['role'] == "Daughter"){ echo ' selected';} echo '>Daughter</option>';
                                          }
                                          ?>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputResStatus">Resident Status</label>
                                            <select class="form-control" name="resStatus" id="inputResStatus" >
                                                <option value="Active" <?php if($info['resident_status'] == "Active"){ echo ' selected';} ?> >Active</option>
                                                <option value="Deceased" <?php if($info['resident_status'] == "Deceased"){ echo ' selected';} ?> >Deceased</option>
                                                <option value="Transferred" <?php if($info['resident_status'] == "Transferred"){ echo ' selected';} ?> >Transferred</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-4" id="transToWhere"hidden>
                                        <label class="control-label">Transfer to where?</label>
                                        <input type="text" name="transfer" class="form-control input-xs" id="InputTransfer" placeholder="Input Place/Barangay">
                                    </div>
                                </div>
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
                                        <input type="text" name="houseNo" class="form-control input-xs" id="inputHouseNo" value="{{$info['house_no']}}" placeholder="House No">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Street *</label>
                                        <select class="form-control" name="street" id="inputStreet" >
                                            <option hidden value="">--Select Street--</option>
                                            <option value="P. Ortega" <?php if($info['street'] == "P. Ortega"){ echo ' selected';} ?> >P. Ortega</option>
                                            <option value="Asuncion" <?php if($info['street'] == "Asuncion"){ echo ' selected';} ?> >Asuncion</option>
                                            <option value="Morga" <?php if($info['street'] == "Morga"){ echo ' selected';} ?> >Morga</option>
                                            <option value="Zamora" <?php if($info['street'] == "Zamora"){ echo ' selected';} ?> >Zamora</option>
                                            <option value="J. Nolasco" <?php if($info['street'] == "J. Nolasco"){ echo ' selected';} ?> >J. Nolasco</option>
                                            <option value="Sto. Cristo" <?php if($info['street'] == "Sto. Cristo"){ echo ' selected';} ?> >Sto. Cristo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4" id="defaultHouse" style="display: block;">
                                        <label for="InputHouseID" id="householdID">Household ID:</label>
                                        <br>
                                        <label id="labelHouse">{{$info['household_id']}}</label>
                                        <input type="hidden" name="householdID" class="form-control input-xs"  placeholder="Household id" id="houseID" value="{{$info['household_id']}}">
                                        <input type="hidden" name="oldHouseholdID"class="form-control input-xs" id="oldHouseholdID" value="{{$info['household_id']}}">
                                        <button type="button" id="newHouse" class="btn btn-success">New</button>
                                        <button type="button" id="transferHouse" class="btn btn-warning">Transfer</button>
                                    </div>
                                    <div class="form-group col-md-4" id="transferHouseForm" style="display: none;">
                                        <label for="InputHouseID" id="householdID">Household ID:</label>
                                        <br>
                                        <label>Transfer To:</label>
                                        <input type="text" class="form-control input-xs" id="transferHouseName" list="selectFamily" placeholder="Input Name" id="houseID">
                                        <button type="button" id="transHouse" class="btn btn-success">Transfer</button>
                                        <button type="button" id="hideHouse" class="btn btn-warning">Cancel</button>
                                    </div>
                                    <datalist id="selectHouse">
                                      @foreach($househead as $house)
                                        <option>{{$house['fullname']}}</option>
                                      @endforeach
                                    </datalist>
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
                                    <div class="form-group col-md-4" id="defaultFamily" style="display: block;"><br>
                                        <label for="InputFamID" id="famID">Family ID:</label><br>
                                        <label id="labelFamily">{{$info['family_id']}}</label>
                                        <input type="hidden" name="familyID"class="form-control input-xs" id="familyID" placeholder="Family Id" value="{{$info['family_id']}}">
                                        <input type="hidden" name="oldFamilyID"class="form-control input-xs" id="oldFamilyID" placeholder="Family Id" value="{{$info['family_id']}}">
                                        <button type="button" id="newFamily" class="btn btn-success">New</button>
                                        <button type="button" id="transferFamily" class="btn btn-warning">Transfer</button>
                                    </div>
                                    <div class="form-group col-md-4" id="transferFamilyForm" style="display: none;">
                                        <label for="InputFamilyID" id="familyID">Family ID:</label>
                                        <br>
                                        <label>Transfer To:</label>
                                        <input type="text" class="form-control input-xs" id="transferFamilyName" list="selectFamily" placeholder="Input Name" id="houseID">
                                        <button type="button" id="transFam" class="btn btn-success">Transfer</button>
                                        <button type="button" id="hideFam" class="btn btn-warning">Cancel</button>
                                    </div>
                                    <datalist id="selectFamily">
                                      @foreach($familyhead as $fam)
                                        <option>{{$fam['fullname']}}</option>
                                      @endforeach
                                    </datalist>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <input type="hidden" value="{{$info['household_head']}}" name="househead" id="househead">
                                        <label for="householdhead"><input type="checkbox" id="housecheck">
                                        <strong>Household Head</strong>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="hidden" value="{{$info['family_head']}}" name="familyhead" id="familyhead">
                                        <label for="familyhead"><input type="checkbox" id="familycheck">
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
                  setTimeout(function(){
                             location.reload();
                        }, 2000); 
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

      $('#inputResStatus').change(function(){
        if(this.value == 'Transferred'){
          $('#transToWhere').attr('hidden', false);  
          $('#housecheck').prop('checked', false);
          $('#familycheck').prop('checked', false);
        }
        else if(this.value == 'Deceased'){
          $('#transToWhere').attr('hidden', true); 
          $('#housecheck').prop('checked', false);
          $('#familycheck').prop('checked', false);
        }
        else{
          $('#transToWhere').attr('hidden', true); 
        }
      })

      $('#housecheck').click(function(){

        if($('#housecheck').prop('checked') == true){
          $('#househead').val('yes');
          var id = $('#houseID').val();
            $.ajax({
            method: 'GET',
            url: '{{ URL::route("checkHead")}}',
            data:{
              'type' : 'household', 
              'id': id
            },
            success:function(data)
            {
              if(data == 'exist'){
                swal({title:"Existing Household Head!", 
                  text: "You will overwrite the existing Household Head",
                  type: "warning"
                })
              }
            }
          })
        }
        else{
          $('#househead').val('no');
          // alert('no')
        }
      })
      $('#familycheck').click(function(){
        if($('#familycheck').prop('checked') == true){
          $('#familyhead').val('yes');
          var id = $('#familyID').val();
            $.ajax({
            method: 'GET',
            url: '{{ URL::route("checkHead")}}',
            data:{
              'type' : 'family', 
              'id': id
            },
            success:function(data)
            {
              if(data == 'exist'){
                swal({title:"Existing Family Head!", 
                  text: "You will overwrite the existing Family Head",
                  type: "warning"
                })
              }
            }
          })
        }
        else{
          $('#familyhead').val('no');
          // alert('no')
        }
      })

      $('#newHouse').click(function(){
        $('#housecheck').prop('checked', true);
        $('#househead').val('yes');
        $('#familycheck').prop('checked', true);
        $('#familyhead').val('yes');
        $.ajax({
          method: 'GET',
          url: '{{ URL::route("getHouseId")}}',
          data:{'type': 'new'},
          success:function(data)
          {
            console.log(data)
            $('#houseID').val(data);
            $('#labelHouse').text(data);
            $('#inputHouseNo').val("");
            $('#inputStreet').val("");
          }
        })
      })

      $('#transferHouse').click(function(){
        $('#defaultHouse').css('display','none');
        $('#transferHouseForm').css('display','block');
      })

      $('#hideHouse').click(function(){
        $('#defaultHouse').css('display','block');
        $('#transferHouseForm').css('display','none');
      })
      
      $('#transHouse').click(function(){
        $('#housecheck').prop('checked', false);
        $('#househead').val('no');
        var name = $('#transferHouseName').val();
        $.ajax({
          method: 'GET',
          url: '{{ URL::route("getHouseId")}}',
          data:{
            'type' : 'transfer',
            'name' : name
          },
          success:function(data)
          {
            console.log(data)
            $('#defaultHouse').css('display','block');
            $('#transferHouseForm').css('display','none');
            $('#houseID').val(data.household_id);
            $('#labelHouse').text(data.household_id);
            $('#inputHouseNo').val(data.house_no);
            $("#inputStreet").val(data.street);
          }
        })
      })

      $('#newFamily').click(function(){
        $('#familycheck').prop('checked', true);
        $('#familyhead').val('yes');
        $.ajax({
          method: 'GET',
          url: '{{ URL::route("getFamilyId")}}',
          data:{'type': 'new'},
          success:function(data)
          {
            console.log(data)
            $('#familyID').val(data);
            $('#labelFamily').text(data);
          }
        })
      })

      $('#transferFamily').click(function(){
        $('#defaultFamily').css('display','none');
        $('#transferFamilyForm').css('display','block');
      })

      $('#hideFam').click(function(){
        $('#defaultFamily').css('display','block');
        $('#transferFamilyForm').css('display','none');
      })
    })

    $('#transFam').click(function(){
        var name = $('#transferFamilyName').val();
        $('#familycheck').prop('checked', false);
        $('#familyhead').val('no');
        $.ajax({
          method: 'GET',
          url: '{{ URL::route("getFamilyId")}}',
          data:{
            'type' : 'transfer',
            'name' : name
          },
          success:function(data)
          {
            console.log(data)
            $('#defaultFamily').css('display','block');
            $('#transferFamilyForm').css('display','none');
            $('#familyID').val(data);
            $('#labelFamily').text(data);
          }
        })
      })

    </script>
  
</body>

</html>
