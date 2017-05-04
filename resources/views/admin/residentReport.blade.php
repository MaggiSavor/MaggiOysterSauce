<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resident Report</title>

    

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
                    <h1 class="page-header">Resident Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class= "container">
            <div class = "row">
                    <div id="res"></div>
                    <div id="result">
                    <br>
                    
                    <div class="col-md- col-md-offset-1">
                    <div class="container">
                    <div class="row">
                    <table>
                        <tr>
                        <td>
                        <div class="col-md-5">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                </div>
                                   <div class="panel-body">
                                        <div class="form-group-sm">
                                <div class="col-lg-10">
                                    <label for="InputStart">Start Date:&nbsp;&nbsp;</label>
                                  <input type="date" id="dateStart" style="width:300px;" class="form-control" required />
                                </div>
                                <br> <br><br>
                                <div class="col-lg-10">
                                    <label for="InputEnd">End Date:&nbsp;&nbsp;</label>
                                  <input type="date" id="dateEnd" style="width:300px;" class="form-control" required />
                                </div>
                                </div>
                                <br><br><br><br>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" style="width:100px;" class="btn btn-primary btn pull-right" onclick="pass()" >Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    <div class="col-md-6">
                    <form class="inline" method="POST">
                   <div class="col-md- col-md-offset-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                            <div class="form-group-sm">
                                <label class="col-lg-10" control-label">Filter:</label>
                                <div class="col-sm-7">
                                        <select id ="filter" name="filter" class="form-control" style="width:300px;">
                                            <option hidden>-- Select --</option>
                                            <option> All Resident </option>
                                            <option> Male </option>
                                            <option> Female </option>
                                            <option> Senior </option>
                                            <option> Voter </option>          
                                        </select><br><br><br>
                                </div>
                                <br><br><br><br><br>';echo '<br><br>
                                <button type="submit" class="btn btn-primary btn pull-right" name="generate">Generate</button>          
                        </div>
                        </div>  
                        </div>
                    </div>
                    </form>
                </div>
                </div>

                
                    <div id="printablediv">
                    <img src="../files/header.jpg" class="print" style=" display: none; align:center !important;">
                    <p class="print" style="color: blue !important; text-align:right !important; display: none;">'.$dates.'</p>


                    <h1>Resident Report: '.$value.'</h1>
                    
                    
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><label>Resident ID</label></th>
                                    <th><label>Full Name</label></th>
                                    <th><label>Address</label></th>
                                    <th><label>Gender</label></th>
                                    <th><label>Status</label></th>
                                    <th><label>Age</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>                       
                            </tbody>
                            </table>
                        
                            <p>Total: </p>
                            <br>
                            
                    </div>
                        

                    <table class ="table table-bordered">
                            <thead>
                                <tr>
                                    <th><label>Resident ID</label></th>
                                    <th><label>Full Name</label></th>
                                    <th><label>Address</label></th>
                                    <th><label>Gender</label></th>
                                    <th><label>Status</label></th>
                                    <th><label>Age</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>   
                            </tbody>
                    </table>
                        <p>Total:  </p>
                           
                        <br>
                </div>
                    
                        <button type="submit" class="btn btn-primary btn-small btn pull-right" onclick="javascript:printDiv('printablediv')" >
                            <span class = "glyphicon glyphicon-print"> Print</span>
                        </button>
                                <br>
                                <br>                    
                                <br>
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
