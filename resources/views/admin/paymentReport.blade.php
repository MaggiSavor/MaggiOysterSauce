<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment Report</title>

    

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
                    <h1 class="page-header">Payment Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class= "container">
                <div class = "row">
                    <h1>Payment Report</h1>
                    <hr>
                    <br>
                    <div id="res"></div>
                    <div id="result">
                    <br>
                    
                    echo '<table>';
                    echo '<tr>';
                    echo '<td>';
                    echo '<form class="form-inline">';
                    echo '<div class="col-md- col-md-offset-12">';
                        echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading">';
                            echo '</div>';
                                    echo '<div class="panel-body">';
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
                                    <button type="button" style="width:100px;" class="btn btn-primary btn pull-right" onclick="pass()" >Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</form>';
                    echo '<form class="inline" method="POST">';
                    echo '<div class="col-md- col-md-offset-20">';
                        echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading">';
                            echo '</div>';
                            echo '<div class="panel-body">';
                            echo '<div class="form-group-sm">
                                <label class="col-lg-10" control-label">Filter:</label>
                                <div class="col-sm-7">
                                        <select id ="filter" name="filter" class="form-control" style="width:300px;">
                                            <option>-- Select --</option>
                                            <option> All Payment </option>';    
                                        echo '</select><br><br><br>
                                </div>';
                                echo '<div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="generate">Generate</button>
                                    </div>';            
                        echo '</div>';
                        echo '</div>';  
                        echo '</div>';
                    echo '</div>';
                    echo '</form>';
                        if(isset($_POST['generate'])){
                            $value = $_POST['filter'];
                            echo $value;
                            if($value=="All Payment"){
                                $results = $con->query("SELECT permit_id, name, business_name, business_address, payment_details, `date` FROM payment");
                                    echo '<table class ="table">';
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<thead>';
                                        echo '<tr>';
                                             echo '<th><label>Permit ID</label></th>';
                                             echo '<th><label>Name</label></th>';
                                             echo '<th><label>Business Name</label></th>';
                                             echo '<th><label>Business Address</label></th>';
                                             echo '<th><label>Payment Detail</label></th>';
                                             echo '<th><label>Date</label></th>';
                                        echo '</tr>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                        while($row = $results->fetch_array())
                                        {
                                            echo '<tr>';
                                                echo '<td>'.$row['permit_id'].'</td>';
                                                echo '<td>'.$row['name'].'</td>';
                                                echo '<td>'.$row['business_name'].'</td>';
                                                echo '<td>'.$row['business_address'].'</td>';
                                                echo '<td>'.$row['payment_details'].'</td>';
                                                echo '<td>'.$row['date'].'</td>';
                                        }                               
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '</table>';
                            }
                        }
                    }
                    

                </div>
            <div>
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
