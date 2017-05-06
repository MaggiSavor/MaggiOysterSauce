<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <title>Barangay Profile Report</title>

    

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
                    <h1 class="page-header">Barangay Profile Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Graphical Representation / Barangay Profile
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="form-group">      
                            <div class='col-md-12'>
                                <div class='card-box pull-left'>
                                  <input type="hidden" id="grade1" value="">
                                  <input type="hidden" id="grade2" value="">
                                  <input type="hidden" id="grade3" value="">
                                  <input type="hidden" id="grade4" value="">
                                  <input type="hidden" id="grade5" value="">
                                  <input type="hidden" id="grade6" value="">
                                  <input type="hidden" id="grade7" value="">
                                  <input type="hidden" id="grade8" value="">
                                  <input type="hidden" id="grade9" value="">
                                  <input type="hidden" id="grade10" value="">
                                  <input type="hidden" id="grade11" value="">
                                  <input type="hidden" id="grade12" value="">
                                    <h4 class='text-dark header-title m-t-0'>Student Per Grade Level</h4>
                                    <div class='text-center'>
                                      <ul class='list-inline chart-detail-list'>
                                        <li>
                                          <h5><i class='fa fa-circle m-r-5' style='color: #5fbeaa;'></i>Number of Students
                                          </h5>
                                        </li>
                                      </ul>
                                    </div>
                                    <div id='student-grade-breakdown' style='height: 372px;'></div>
                                </div>
                                <div class="card-box pull-right" style="background-color: #eeeeee;">
                                    <table class="table table-hover mails m-0 table table-actions-bar">
                                        <thead>
                                            <tr>
                                                <th>Total number of</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Resident Population</strong></td>
                                                <td><i>{{$resident}}</i></td>   
                                            </tr>
                                            <tr>
                                                <td><strong>Male</strong></td>
                                                <td><i>{{$male}}</i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Female</strong></td>
                                                <td><i>{{$female}}</i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Senior Citizen</strong></td>
                                                <td><i>{{$senior}}</i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Voters</strong></td>
                                                <td><i>{{$voter}}</i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Number of Household</strong></td>
                                                <td><i>{{$household['household_id']}}</i></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Number of Family</strong></td>
                                                <td><i>{{$family['family_id']}}</i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="reset" class="btn btn-danger" name="reset" id="reset"><span class="glyphicon glyphicon-print"></span> Print</button>
                                <button id="register" type="submit" name="tryy" class="btn btn-danger"><span class="glyphicon glyphicon-print"></span> Print Graph</button>
                            </div>
                        </div>
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


</body>

</html>
