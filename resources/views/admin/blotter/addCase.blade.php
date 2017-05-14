<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">
        .radio {
                left:18%;
        }
    </style>
    <title>BRIMS</title>

    

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
        

        <div id="page-wrapper" style="padding-top: 0%;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Case</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
               <div class="col-lg-12">
                   <div class="panel panel-success">
                        <div class="panel-heading">
                            Case Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form id="post_form" class="form-horizontal" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group col-sm-12">
                                    <label for="inputType" class="col-sm-2 col-sm-offset-2 control-label">Case Type:</label>
                                        <div class="col-sm-6">
                                          <select class="form-control" name="casetype">
                                                <option value="" >-- Select Case Type --</option>
                                                <option>Alarms and Scandals</option>
                                                <option>False Identities</option>
                                                <option>Physical Injury</option>
                                                <option>Abandonment</option>
                                                <option>Tresspass</option>
                                                <option>Threats</option>
                                                <option>Theft</option>
                                                <option>Swindling</option>
                                                <option>Sexual Assault</option>
                                                <option>Murder</option>
                                                <option>Illegal Drug</option>
                                            </select>
                                        </div>
                                  </div>
                                  <div class="radio col-sm-12" style="padding-bottom: 2%;">
                                        <label class="col-sm-offset-2">
                                            <input type="radio" name="rate" id="minor" value="minor" checked>
                                            <strong>Minor</strong>
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input type="radio" name="rate" id="major" value="major">
                                            <strong>Major</strong>
                                        </label>
                                    </div>
                                    <br>
                                  <div class="form-group col-sm-12">
                                    <label for="inputTitle" class="col-sm-2 col-sm-offset-2 control-label">Case Title:</label>
                                        <div class="col-sm-6">
                                          <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Case Title" maxlength="20" required>
                                        </div>
                                  </div>

                                  <div class="form-group col-sm-12">  
                                        <label for="inputDate" class="col-sm-2 col-sm-offset-2 control-label">Date Happened:</label>
                                    <div class="col-sm-3">
                                        <input type="date" name="casedate" min="1954-10-01" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="inputDate" required>
                                    </div>
                                        <label for="inputTime" class="col-sm-1 control-label">Time:</label>
                                    <div class="col-sm-2">
                                        <input type="time" name="casetime" class="form-control" id="inputTime" " required>
                                    </div>  
                                  </div>

                                  
                                  <div class="form-group col-sm-12">  
                                    <label for="inputCName" class="col-sm-2 col-sm-offset-2 control-label">Complainant Name:</label>
                                        <div class="col-sm-6">
                                          <input type="text" name="cname" class="form-control" id="inputCName" placeholder="Full Name" list="listid" autocomplete="off" required>
                                         


                                        </div>
                                  </div>
                                  <div class="form-group col-sm-12">  
                                    <label for="inputCAddress" class="col-sm-2 col-sm-offset-2 control-label">Complainant Address:</label>
                                        <div class="col-sm-6">
                                          <input type="text" id="InputCaddress" name="caddress" class="form-control" id="inputCAddress" placeholder="Complainant Address" required>
                                        </div>
                                  </div>
                                  <div class="form-group col-sm-12">  
                                    <label for="inputDNmae" class="col-sm-2 col-sm-offset-2 control-label">Defendant Name:</label>
                                        <div class="col-sm-6">
                                          <input type="text" list="listid" autocomplete="off" name="dname" class="form-control" id="inputDName" placeholder="Full Name" required>
                                        </div>
                                  </div>
                                  <div class="form-group col-sm-12">  
                                    <label for="inputDAddress" class="col-sm-2 col-sm-offset-2 control-label">Defendant Address:</label>
                                        <div class="col-sm-6">
                                          <input type="text" name="daddress" class="form-control" id="inputDAddress" placeholder="Defendant Address">
                                        </div>
                                  </div>

                                  <div class="form-group col-sm-12">  
                                    
                                        <label for="inputDate" class="col-sm-3 col-sm-offset-1 control-label">Summon Date:</label>
                                    <div class="col-sm-3">
                                        <input type="date" name="summondate" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="inputDate" required>
                                    </div>
                                        <label for="inputTime" class="col-sm-1 control-label">Time:</label>
                                    <div class="col-sm-2">
                                        <input type="time" name="summontime" class="form-control" id="inputTime" " required>
                                    </div>  
                                  </div>

                                  <div class="form-group col-sm-12">  
                                    <label for="inputDesc" class="col-sm-3 col-sm-offset-1 control-label">Case Description:</label>
                                        <div class="col-sm-6">
                                          <textarea class="form-control" name="description" rows="3" placeholder="Case Description" required></textarea>
                                        </div>
                                        <datalist id="listid">
                                          @foreach($res as $res)
                                            <option>{{$res['fullname']}}</option>
                                          @endforeach
                                      </datalist>
                                  </div>
                                  <br>
                                <button type="submit" id="addCase" name="addCase" class="btn btn-success btn-small btn pull-right"><span class = "glyphicon glyphicon-plus"></span> Add Blotter</button>
                            </form> 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#post_form').formValidation({
                framework: 'bootstrap',
                icon: {
                    // valid: 'glyphicon glyphicon-ok',
                    // invalid: 'glyphicon glyphicon-remove',
                    // validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    casetype: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a value'
                            }
                        }
                    },
                    rate: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a value'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Please enter a value'
                            },
                            stringLength: {
                                max: 250,
                                message: 'Description must be less than 250 characters'
                            }
                            
                        }
                    }
                }
            })
            .on('err.form.fv', function(e) {
                    e.preventDefault();

                        var $form = $(e.target),        // The form instance
                        fv    = $(e.target).data('formValidation'); // FormValidation instance
                        $('#addCase').focus(function(e){
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
                             var transfer = $("#post_form");
                             var dataString = transfer.serialize();
                             if(isConfirm){
                               $.ajax({
                                 method: 'POST',
                                 url: "{{URL::Route('addBlotter')}}",
                                 headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                                 dataType: 'JSON',
                                 processData : false,
                                 data: dataString,
                                 success: function(data){
                                    if(data.success == "Successfully Saved!"){
                                        swal("Saved!", "New case has been saved!", "success");
                                        $("#post_form")[0].reset();
                                    }else if(data.error == "Same!"){
                                        swal("Error!", "Complainant Name must not be the same as Defendant Name.", "error");
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