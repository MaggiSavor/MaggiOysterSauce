<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Good Moral</title>

    

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
                    <h1 class="page-header">Good Moral</h1>
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
                    <form method="post" action="{{URL::Route('addGoodMoral')}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="title" value="{{$gm['fullname']}}" readonly="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Age</label>
                                    <input type="text" name="age" class="form-control" id="title" value="<?php $birthDate = explode("-", $gm['birthdate']); $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[0], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));echo $age;?>" readonly="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Status</label>
                                    <input type="text" name="status" class="form-control" id="cname" value="{{$gm['status']}}" readonly="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="dname" value="{{$gm['house_no']}} {{$gm['street']}}" readonly="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pull-right">
                            <button id="print" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-print"> </span> Print</button>
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

</body>

</html>
