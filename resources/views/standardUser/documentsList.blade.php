<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets/css/ihover.css" rel="stylesheet">

    <title>Documents List</title>

    

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
        @include('standardUser.nav1')
        

        <div id="page-wrapper" style="padding-top: 0%;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Documents List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('certificateList1')}}" class="">
                                <div class="img" style="width: 100%; height:10%;"><img src="../assets/images/bclogo.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('goodMoralList1')}}" class="">
                                <div class="img"><img src="../assets/images/gmlogo.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('indigencyList1')}}" class="">
                                <div class="img"><img src="../assets/images/coilogo.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('idList1')}}" class="">
                                <div class="img"><img src="../assets/images/bidlogo.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('permitList1')}}" class="">
                                <div class="img"><img src="../assets/images/bpermitlogo.jpg" alt="6"></div>
                            </a>
                        </div>
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


</body>

</html>
