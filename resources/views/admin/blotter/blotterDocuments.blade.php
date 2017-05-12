<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets/css/ihover.css" rel="stylesheet">

    <title>Blotter Documents</title>

    

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
                    <h1 class="page-header">Blotter Documents</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('blotterSummon')}}" class="">
                                <div class="img"><img src="../assets/images/slogo.jpg" alt="6"></div>
                                <div class="info"><img src="../assets/images/summon.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('blotterFileAction')}}" class="">
                                <div class="img"><img src="../assets/images/falogo.jpg" alt="6"></div>
                                <div class="info"><img src="../assets/images/fileaction.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('blotterDetails')}}" class="">
                                <div class="img"><img src="../assets/images/bdlogo.jpg" alt="6"></div>
                                <div class="info"><img src="../assets/images/blotter.jpg" alt="6"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default">
                        <div style="width: 100%; height:100%;" class="panel-body ih-item square effect13 left_to_right">
                            <a href="{{URL::Route('blotterAgreement')}}" class="">
                                <div class="img"><img src="../assets/images/alogo.jpg" alt="6"></div>
                                <div class="info"><img src="../assets/images/agreement.jpg" alt="6"></div>
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
