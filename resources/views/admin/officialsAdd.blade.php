<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="{!! asset('assets/sweetalert-master/dist/sweetalert.min.js')!!}"></script>
    <link rel="stylesheet" href="{!! asset('assets/sweetalert-master/dist/sweetalert.css')!!}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.4.5/css/bootstrapValidator.min.css" rel="stylesheet"/>

    <title>BRIMS - Add Officials</title>


</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.nav')

        <div id="page-wrapper" style="padding-top: 0% ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Officials</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="col-lg-12">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          New Barangay Officials
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <form method="post" id="addOfficials">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group col-md-4">
                                          <label class="control-label">Term Start Year</label>
                                          <input type="text" name="startyear" class="form-control input-xs"  id="InputStart" placeholder="Term Start Year" value="<?php echo date('Y'); ?>" readonly>
                                      </div>
                                      <div class="form-group col-md-4">
                                          <label class="control-label">Term End Year</label>
                                          <input type="text" name="endyear" class="form-control input-xs" id="InputEnd" placeholder="Term End Year" value="<?php echo date('Y')+3; ?>" readonly>
                                      </div>
                                  </div>
                                  <input type="hidden" name="termYear" id="term">
                                  <div class="col-md-12">
                                      <h3 class="pull-left" style="margin-left: 10px">Barangay Officials</h3>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Chairman</label>
                                          <input type="text" name="chairman" class="form-control" id="0" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Secretary</label>
                                          <input type="text" name="secretary" class="form-control" id="1" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Treasurer</label>
                                          <input type="text" name="treasurer" class="form-control"  id="2" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad1</label>
                                          <input type="text" name="kag1" class="form-control" id="3" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad2</label>
                                          <input type="text" name="kag2" class="form-control" id="4" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad3</label>
                                          <input type="text" name="kag3" class="form-control" id="5" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad4</label>
                                          <input type="text" name="kag4" class="form-control" id="6" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad5</label>
                                          <input type="text" name="kag5" class="form-control" id="7" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad6</label>
                                          <input type="text" name="kag6" class="form-control" id="8" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label class="control-label">Brgy Kagawad7</label>
                                          <input type="text" name="kag7" class="form-control" id="9" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                      </div>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <div class="col-xs-12">
                                          <button type="submit" id="addOff" class="btn btn-success btn-rounded btn-small btn pull-right"><span class = "glyphicon glyphicon-plus"></span> Add Officials</button>
                                      </div>
                                  </div>
                              </div>
                                  <datalist id="selectOfficials">
                                      @foreach($officials as $off)
                                        <option>{{$off['fullname']}}</option>
                                      @endforeach
                                  </datalist>
                          </form>
                      </div>
                      <!-- /.panel-body -->
                  </div>
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
    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.js"></script>
    <script>
        $(document).ready(function(){
        var start = $('#InputStart').val();
        var end = $('#InputEnd').val();   
        
        $('#term').val(start+'-'+end);  

        $("#InputStart, #InputEnd").on('blur keyup keypress',function (){
            var termS = $('#InputStart').val();
            var termE = $('#InputEnd').val();   
            
            $('#term').val(termS+'-'+termE); 
        });      
      });
    </script>
    <script>
      $('.form-control').change(function(){
        var name = $(this)
        $.ajax({
          method: 'GET',
          url: '{{ URL::route("validResident")}}',
          data:{
            'name' : name.val()
          },
          success:function(data)
          {
            console.log(data)
            if(data == 0){
              swal("Error!", "Not a resident!", "error");
              name.val("");
            }
          }
        })
      })
    </script>
    <script>
    $('#addOff').click(function(){
      var chair = $('[name="chairman"]').val();
      var sec = $('[name="secretary"]').val();
      var kag1 = $('[name="kag2"]').val();
      var kag2 = $('[name="kag2"]').val();
      var kag3 = $('[name="kag3"]').val();
      var kag4 = $('[name="kag4"]').val();
      var kag5 = $('[name="kag5"]').val();
      var kag6 = $('[name="kag6"]').val();
      var kag7 = $('[name="kag7"]').val();
      // alert($('.form-control').length)
      for(i=0;i<$('.form-control').length;i++){
        if(chair == $('#'+i).val()){
          swal("Error!", "Chairman is duplicated", "error");
          break;
        }
        if(sec == $('#'+i).val()){
          swal("Error!", "Secretary is duplicated", "error");
          break;
        }
        if(kag1 == $('#'+i).val()){
          swal("Error!", "Kagawad 1 is duplicated", "error");
          break;
        }
        if(kag2 == $('#'+i).val()){
          swal("Error!", "Kagawad 2 is duplicated", "error");
          break;
        }
        if(kag3 == $('#'+i).val()){
          swal("Error!", "Kagawad 3 is duplicated", "error");
          break;
        }
        if(kag4 == $('#'+i).val()){
          swal("Error!", "Kagawad 4 is duplicated", "error");
          break;
        }
        if(kag5 == $('#'+i).val()){
          swal("Error!", "Kagawad 5 is duplicated", "error");
          break;
        }
        if(kag6 == $('#'+i).val()){
          swal("Error!", "Kagawad 6 is duplicated", "error");
          break;
        }
        if(kag7 == $('#'+i).val()){
          swal("Error!", "Kagawad 7 is duplicated", "error");
          break;
        }
      }


    })
        // $('#Chairman, #Secretary, #Treasurer, #Kag1, #Kag2, #Kag3, #Kag4, #Kag5, #Kag6, #Kag7').on('change', function(){
            // var chair = $('#Chairman').val();
            // var sec = $('#Secretary').val();
            // var tre = $('#Treasurer').val();
            // var kag1 = $('#Kag1').val();
            // var kag2 = $('#Kag2').val();
            // var kag3 = $('#Kag3').val();
            // var kag4 = $('#Kag4').val();
            // var kag5 = $('#Kag5').val();
            // var kag6 = $('#Kag6').val();
            // var kag7 = $('#Kag7').val();

        //     if (chair === sec || chair === tre || chair === kag1 || chair === kag2 || chair === kag3 || chair === kag4 || chair === kag5 || chair === kag6 || chair === kag7){
        //         sweetAlert({
        //           title:'ERROR!!!',
        //           text: 'Duplicate Record!!',
        //           type:'error'
        //         },function(isConfirm){
        //               // $('#Secretary').val("");
        //         });
        //     }else if (sec == tre || sec == kag1 || sec == kag2 || sec == kag3 || sec == kag4 || sec == kag5 || sec == kag6 || sec == kag7){
        //         sweetAlert({
        //           title:'ERROR!!!',
        //           text: 'Duplicate Record!!',
        //           type:'error'
        //         },function(isConfirm){
        //               // $('#Secretary').val("");
        //         });
        //     }
        // })


    </script>
    <script>
    $('document').ready(function(){
    $('#addOfficials').formValidation({
            framework: 'bootstrap',
            // Only disabled elements are excluded
            // The invisible elements belonging to inactive tabs must be validated
            // excluded: [':disabled'],
            icon: {
                // valid: 'glyphicon glyphicon-ok',
                // invalid: 'glyphicon glyphicon-remove',
                // validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              chairman: {
                  validators: {
                    notEmpty: {
                      message: "New chairman name is required"
                     }
                  }
                },
                secretary: {
                  validators: {
                    notEmpty: {
                      message: "New secretary name is required"
                     }
                  }
                },
                treasurer: {
                  validators: {
                    notEmpty: {
                      message: "New treasurer name is required"
                     }
                  }
                },
                kag1: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 1 name is required"
                     }
                  }
                },
                kag2: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 2 name is required"
                     }
                  }
                },
                kag3: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 3 name is required"
                     }
                  }
                },
                kag4: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 4 name is required"
                     }
                  }
                },
                kag5: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 5 name is required"
                     }
                  }
                },
                kag6: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 6 name is required"
                     }
                  }
                },
                kag7: {
                  validators: {
                    notEmpty: {
                      message: "New Kagawad 7 name is required"
                     }
                  }
                },
            }
    })
    .on('err.form.fv', function(e) {
          e.preventDefault();

          var $form = $(e.target),        // The form instance
          fv = $(e.target).data('formValidation'); // FormValidation instance

        $('#addOff').focus(function(e){
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
                $.ajax({
                  method: 'POST',
                  url: "{{URL::Route('addNew')}}",
                  headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                  dataType: 'JSON',
                  processData : false,
                  contentType : false,
                  data: new FormData($("#addOfficials")[0]),
                  success: function(data){
                    if(data.success == "yes"){
                      swal({
                        title:"Saved!", 
                        text: "New officials has been saved!",
                        type: "success",
                        showConfirmButton: false
                      });
                        setTimeout(function(){
                             window.location.href = '/admin/officials'; 
                        }, 2000);
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
