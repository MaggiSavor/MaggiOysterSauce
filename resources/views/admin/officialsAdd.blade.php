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

    <title>Add Officials</title>


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
                                        <input type="text" name="chairman" class="form-control" id="Chairman" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Secretary</label>
                                        <input type="text" name="secretary" class="form-control" id="Secretary" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Treasurer</label>
                                        <input type="text" name="treasurer" class="form-control"  id="Treasurer" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad1</label>
                                        <input type="text" name="kag1" class="form-control" id="Kag1" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad2</label>
                                        <input type="text" name="kag2" class="form-control" id="Kag2" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad3</label>
                                        <input type="text" name="kag3" class="form-control" id="Kag3" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad4</label>
                                        <input type="text" name="kag4" class="form-control" id="Kag4" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad5</label>
                                        <input type="text" name="kag5" class="form-control" id="Kag5" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad6</label>
                                        <input type="text" name="kag6" class="form-control" id="Kag6" placeholder="Full Name" list="selectOfficials" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Brgy Kagawad7</label>
                                        <input type="text" name="kag7" class="form-control" id="Kag7" placeholder="Full Name" list="selectOfficials" autocomplete="off">
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>
    <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>
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
    $('document').ready(function(){
    $('#addOfficials').formValidation({
            framework: 'bootstrap',
            // Only disabled elements are excluded
            // The invisible elements belonging to inactive tabs must be validated
            // excluded: [':disabled'],
            excluded: [':disabled'],
            icon: {
                // valid: 'glyphicon glyphicon-ok',
                // invalid: 'glyphicon glyphicon-remove',
                // validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
              // chairman: {
              //     validators: {
              //       notEmpty: {
              //         message: "New chairman name is required"
              //        }
              //     }
              //   },
              //   secretary: {
              //     validators: {
              //       notEmpty: {
              //         message: "New secretary name is required"
              //        }
              //     }
              //   },
              //   treasurer: {
              //     validators: {
              //       notEmpty: {
              //         message: "New treasurer name is required"
              //        }
              //     }
              //   },
              //   kag1: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 1 name is required"
              //        }
              //     }
              //   },
              //   kag2: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 2 name is required"
              //        }
              //     }
              //   },
              //   kag3: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 3 name is required"
              //        }
              //     }
              //   },
              //   kag4: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 4 name is required"
              //        }
              //     }
              //   },
              //   kag5: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 5 name is required"
              //        }
              //     }
              //   },
              //   kag6: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 6 name is required"
              //        }
              //     }
              //   },
              //   kag7: {
              //     validators: {
              //       notEmpty: {
              //         message: "New Kagawad 7 name is required"
              //        }
              //     }
              //   },
            }
    })
    .on('err.field.fv', function(e, data) {
      e.preventDefault();

       var $form = $(e.target),
         fv    = $form.data('formValidation');
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
