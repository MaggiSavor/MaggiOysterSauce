<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Permit</title>

    

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
                    <h1 class="page-header">Business Permit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Business Permit Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="title" value="{{$permit['name']}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Business Name</label>
                                    <input type="text" name="bname" class="form-control" id="title" value="{{$permit['business_name']}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Kind of Business</label>
                                    <input type="text" name="bkind" class="form-control" id="cname" value="{{$permit['business_kind']}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Business Address</label>
                                    <input type="text" name="address" class="form-control" id="dname" value="{{$permit['business_address']}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">OR Number</label>
                                    <input type="text" name="orNum" class="form-control" id="dname">
                                </div>
                            </div>
                        </div> 
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

</body>

</html>
