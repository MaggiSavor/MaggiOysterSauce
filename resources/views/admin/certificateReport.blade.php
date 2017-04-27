<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Certificate</title>

    

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
                    <h1 class="page-header">Certificate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class= "container">
            <div class = "row">
                <h1>Issued Certificate Report</h1>
                <hr>
                    <div id="res"></div>
                    <div id="result">
                    <br>
                   
                    echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                    echo '<form class="form-inline" method="post">';
                    echo '<div class="col-md- col-md-offset-12">';
                        echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading">';
                            echo '</div>';
                                echo '<div class="panel-body">';
                                echo '<div class="form-group-sm">
                                <label class="col-lg-10" control-label">Filter:</label>
                                <div class="col-sm-7">
                                        <select id="filter" class="form-control" style="width:300px;">
                                            <option>Certificate</option>
                                            <option>Good Moral</option>
                                            <option>Indigency</option>';
                                        echo '</select><br><br><br>
                                </div>';
                                echo '<div class="form-group-sm">';
                                echo '<div class="col-lg-10">
                                    <label for="InputStart">Start Date:&nbsp;&nbsp;</label>
                                  <input type="date" id="dateStart" style="width:300px;" class="form-control" required />
                                </div>';
                                echo '<br>'; 
                                echo '<br>'; echo '<br>';
                                echo '<div class="col-lg-10">
                                    <label for="InputEnd">End Date:&nbsp;&nbsp;</label>
                                  <input type="date" id="dateEnd" style="width:300px;" class="form-control" required />
                                </div>';
                            echo '</div>';
                                echo '<br>'; echo '<br>';
                                echo '<br>'; echo '<br>';
                                echo '<br>'; 
                                echo '<div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" style="width:100px;" class="btn btn-primary btn pull-right" name="generate" onclick="pass()" >Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</form>';
                    
                        
                    
                <br>
                <br>
                <br>    
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
