<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barangay ID</title>

    

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
                    <h1 class="page-header">Barangay ID</h1>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-3">
                                <label class="control-label">ID No.</label>
                                <input type="text" name="idNo" class="form-control" id="title" value="{{$bid['id']}}" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" id="title" value="{{$bid['fullname']}}" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Date of Birth</label>
                                <input type="text" name="status" class="form-control" id="cname" value="{{$bid['birthdate']}}" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Address</label>
                                <input type="text" name="address" class="form-control" id="dname" value="{{$bid['house_no']}} {{$bid['street']}}" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Place of Birth</label>
                                <input type="text" name="place" class="form-control" id="title" placeholder="Place of Birth" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Blood Type</label>
                                <input type="text" name="bloodType" class="form-control" id="title" placeholder="Blood Type" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Height</label>
                                <input type="text" name="height" class="form-control" id="cname" placeholder="Height" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Weight</label>
                                <input type="text" name="weight" class="form-control" id="dname" placeholder="Weight" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Status</label>
                                <input type="text" name="status" class="form-control" id="title" value="{{$bid['status']}}" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Occupation</label>
                                <input type="text" name="occupation" class="form-control" id="title" value="{{$bid['occupation']}}" readonly="">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Tin No.</label>
                                <input type="text" name="tin" class="form-control" id="cname" placeholder="Tin No." required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Contact</label>
                                <input type="text" name="contact" class="form-control" id="dname" placeholder="Contact" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>In case of emergency</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label class="control-label">Name</label>
                                <input type="text" name="ename" class="form-control" id="cname" placeholder="Name" list="resident" autocomplete="off">
                            </div>
                            <datalist id="resident">
                                @foreach($res as $resident)
                                  <option>{{$resident['fullname']}}</option>
                                @endforeach
                            </datalist>
                            <div class='form-group col-md-6'>
                                  <label class='col-lg-12 control-label' for='relation'>Relation</label>
                                  <div class='col-lg-12'>
                                    <select class="form-control" name="relation" id="relation">
                                        <option value="Guardian">Guardian</option>
                                        <option>Father</option>
                                        <option>Mother</option>
                                        <option>Sibling</option>
                                        <option>Relatives</option>
                                    </select>
                                  </div>
                                </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Address</label>
                                <input type="text" name="eaddress" class="form-control" id="dname" placeholder="Address">
                            </div>
                            <div class="form-group col-md-6">
                            <label>Contact:</label>
                                <div class="col-md-12">
                                    <label class="radio">
                                        <input type="radio" name="contact" id="mob">Mobile
                                    </label>
                                        <input type="text" name="mobile" class="form-control contact" id="mobile" placeholder="(+63)">
                                </div>
                                <div class="col-md-12">
                                    <label class="radio">
                                        <input type="radio" name="contact" id="tel">Telephone
                                    </label>
                                        <input type="text" name="telephone" class="form-control contact" id="telephone" placeholder="(2)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="pull-right">
                        <button id="print" type="submit" name="tryy" class="btn btn-danger"><span class="glyphicon glyphicon-print"> </span> Print</button>
                    </div>

                        
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script>
        $(document).ready(function() {
            $('#mobile').hide();
            $('#telephone').hide();

            $('#mob').click(function(){
                $('#mobile').show();
                $('#telephone').hide();
            })
            $('#tel').click(function(){
                $('#mobile').hide();
                $('#telephone').show();
            })
        })
    </script>

</body>

</html>
