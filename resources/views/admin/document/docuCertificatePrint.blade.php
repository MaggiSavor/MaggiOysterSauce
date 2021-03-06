<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Certificate</title>

    

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
                    <h1 class="page-header">Certificate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Resident Details
                    </div>
                    <!-- /.panel-heading -->
                <div class="panel-body">
                <form method="post" action="{{URL::Route('addCert')}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" id="title" value="{{$cert['fullname']}}" readonly="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Age</label>
                                <input type="text" name="age" class="form-control" id="title" value="<?php $birthDate = explode("-", $cert['birthdate']); $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[0], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));echo $age;?>" readonly="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Status</label>
                                <input type="text" name="status" class="form-control" id="cname" value="{{$cert['status']}}" readonly="">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Address</label>
                                <input type="text" name="address" class="form-control" id="dname" value="{{$cert['house_no']}} {{$cert['street']}}" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Reasons:</label>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option1" required="">Application for employment
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option2">School Requirement
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option3">Hospital/Medical Purposes
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option4">Processing of Calamity
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option5">Travel Abroad
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option6">Transfer of Residency
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option7">SSS/GSIS/PAGIBIG/PHILHEALTH Req.
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option8">NBI/POLICE Clearance
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option9">TIN/BIR Requirement
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option10">DSWD Requirement
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" class="same" value="Option11">Bank Transaction
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" id="idFor" value="Option12">ID For
                                    <input type="text" name="idFor" class="form-control" id="id" required="">
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="radio-inline">
                                    <input type="radio" name="reasons" id="others" value="Option13">Others
                                    <input type="text" name="others" class="form-control" id="other" required="">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button id="print" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-print"> </span> Print</button>
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

    
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script src="../assets/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id').hide();
            $('#other').hide();

            $('#idFor').click(function(){
                $('#id').show();
                $('#other').hide();
                $('#id').attr('required', true);
                $('#other').removeAttr('required');
            })
            $('#others').click(function(){
                $('#id').hide();
                $('#other').show();
                $('#other').attr('required', true);
                $('#id').removeAttr('required');
            })
            $('.same').click(function(){
                $('#id').hide();
                $('#other').hide();
                $('#id').removeAttr('required');
                $('#other').removeAttr('required');
            })
        })
    </script>

</body>

</html>
