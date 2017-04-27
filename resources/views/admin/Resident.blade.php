<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resident</title>


</head>
<body>

<div id="wrapper">
             
        <!-- Navigation -->
        @include('admin.nav')
    <div id="page-wrapper" style="padding-top: 0% ">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Residents</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
            <div class = "row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div style="font-size: 30px"><i>{{$all}}</i></div>
                                        <div><b>All Residents</b></div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{URL::Route('residentList')}}">
                                <div class="panel-footer" style="color:#002a40;">
                                    <span class="pull-left">View List</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div  class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-home fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: 30px"><i>{{$household}}</i></div>
                                        <div><b>Household</b><br>+Add Family<br>+View Household</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{URL::Route('householdList')}}">
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
                                        <div style="font-size: 30px"><i>{{$family}}</i></div>
                                        <div><b>Families</b><br>+Add Family Member<br>+View Family</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{URL::Route('familyList')}}">
                                <div class="panel-footer" style="color:#002a40;">
                                    <span class="pull-left">View List</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> 
                <br>
                <br>
                <br>    
            </div>
            <div class = "row">
            <hr>
            <br>
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 30px"><i>{{$female}}/i></div>
                                    <div>Total Number of Female</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::Route('femaleList')}}">
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
                                    <div style="font-size: 30px"><i>{{$male}}</i></div>
                                    <div>Total Number of Male</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::Route('maleList')}}">
                            <div class="panel-footer" style="color:#002a40;">
                                <span class="pull-left">View List</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 30px"><i>{{$voter}}</i></div>
                                    <div>Total Number of Voters</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::Route('voterList')}}">
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
        <div class="row">
            <div class="col-md-12" style="margin-left: 180px">                     
                <div class="col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 30px"><i>{{$senior}}</i></div>
                                    <div>Total Number of Senior Citizen</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::Route('seniorList')}}">
                            <div class="panel-footer" style="color:#002a40;">
                                <span class="pull-left">View List</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 30px"><i>{{$transfer}}</i></div>
                                    <div>Total Number of Transferred</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{URL::Route('transferredList')}}">
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
        <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>


</body>

</html>
