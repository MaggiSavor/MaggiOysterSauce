<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex,follow" />
	<title> RESIDENTS</title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,600,500,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300italic,400italic' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="../css/reset.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">

</head>
<body>

    <div id="wrapper">
             
        <!-- Navigation -->
        @include('admin.nav')
        <div id="page-wrapper" style="padding-top: 3%">
            <div class= "container">
        <div class = "row">
            <h1>Resident</h1>
            <hr>
            <br>
                <!--<div class="col-md- col-md-offset-1">-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">NUMBER HERE</div>
                                                <div><b>All Residents</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="ResidentList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <div class="container">
                        <div class="row">
                            <div  class="col-md-4">
                                <div  class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-home fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">NUMBER HERE</div>
                                                <div><b>Household</b><br>+Add Family<br>+View Household</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="HouseholdList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">NUMBER HERE</div>
                                                <div><b>Families</b><br>+Add Family Member<br>+View Family</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="FamilyList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>  
                <br>
                <br>
                <br>    
        </div><!-- /.canvas -->
    </div>
    <div class= "container">
        <div class = "row">
            
            <hr>
            <br>
            <div class="col-md- col-md-offset-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">NUMBER HERE</div>
                                                <div>Total Number of Female</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="FResidentList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">NUMBER HERE</div>
                                                <div>Total Number of Male</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="MResidentList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
                <div class="col-md- col-md-offset-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">NUMBER HERE</div>
                                                <div>Total Number of Voters</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="VotersList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>                          
                            <div class="col-md-4">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"></div>
                                                <div>Total Number of Senior Citizen</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="SCList.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md- col-md-offset-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge"></div>
                                                <div>Total Number of Transferred</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="Transferred.php">
                                        <div class="panel-footer" style="color:#002a40;">
                                            <span class="pull-left">View List</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
    </div>        
        </div>
    </div>
    <!-- /#wrapper -->
    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>


</body>

</html>
