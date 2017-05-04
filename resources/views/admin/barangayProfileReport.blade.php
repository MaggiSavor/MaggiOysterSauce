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
        

        <div id="page-wrapper" style="padding-top: 3%;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barangay Profile Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class= "container">
        <div class = "row">
        </div>
    </div>
    <br>
    <br>
        <div class="col-md- col-md-offset--2">
            <div class="container">
            <div class="row">
            <div class="col-md-6">
                        <div  class="panel panel-primary" style="width: 740px;">
                            <div class="panel-heading">
                                <h2 class="panel-title">Graphical Representation</h2>
                                </div>
                                <div class="panel-body">
                            <div class="form-group-sm">
                                
                        <div class='col-lg-8'>
                          <div class='card-box'>
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
                        </div>

                        </div>
                            </div>

                        </div>
                    </div>
            
                <div class="col-md-6">
                <form class="form-horizontal">    
                    <div class="col-md- col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">Barangay Profile</h2>
                            </div>
                            <div class="panel-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th><strong>Total number of: </strong></th>
                                            <th><strong>Total: </strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Resident Population:</strong></th>
                                            <td></td>   
                                        </tr>
                                        <tr>
                                            <td><strong>Male:</strong></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Female:</strong></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Senior Citizen:</strong></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Voters:</strong></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Number of Household:</strong></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Number of Family:</strong></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    </div>
                    <br>
                    <br>
                    <button class="btn pull-right btn-primary" type="button" onclick="printDiv('printableArea')"> Print Graph</button>
                    <button class="btn pull-right btn-primary" type="button" onClick="window.print()"> Print </button>  
                    <br>
                    <br>
                    <br>
            </div>          
            </div>
            </div>
        <div>
        </div><!-- /.canvas -->
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
