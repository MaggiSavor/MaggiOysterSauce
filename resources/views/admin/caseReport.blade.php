<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Case Report</title>

    

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
                    <h1 class="page-header">Case Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class= "container">
            <div class = "row">
                <h1>Case Report</h1>
                    <hr>
                    <div id="res"></div>
                    <div id="result">
                    <br>
                    <div class="col-md- col-md-offset-3">;
                    <div class="col-md-9">
                    <form class="inline" method="POST">
                        <div class="panel panel-primary" style="width: 630px;">
                            <div class="panel-heading">
                                <h2 class="panel-title">Graphical Representation</h2>
                                </div>
                                <div class="panel-body">
                            <div class="form-group-sm">
                               
                                // Form the SQL query that returns the top 10 most populous countries
                                $strQuery = "SELECT *, COUNT(case_type) as ccount FROM `case` GROUP BY case_type";
                                // Execute the query, or else return the error message.
                                $result = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");

                                // If the query returns a valid response, prepare the JSON string
                                if ($result) {
                                    // The `$arrData` array holds the chart attributes and data
                                    $arrData = array(
                                        "chart" => array(
                                          "caption" => "Case Type",
                                          "showValues" => "1",
                                          "palettecolors" => "#008ee4",
                                          "useplotgradientcolor" => "0",
                                          "showplotborder" => "0",
                                          "showShadow" => "0",
                                          "palette" => "3",
                                          "labelFontSize" => "13",
                                          "theme" => "zune"
                                        )
                                    );

                                    $arrData["data"] = array();

                            // Push the data into the array
                                    while($row = mysqli_fetch_array($result)) {
                                    array_push($arrData["data"], array(
                                        "label" => $row["case_type"],
                                        "value" => $row["ccount"]
                                        )
                                    );
                                    }

                                    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

                                    $jsonEncodedData = json_encode($arrData);

                            /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

                                    $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

                                    // Render the chart
                                    $columnChart->render();

                                    // Close the database connection
                                    //$con->close();
                                }

                            ?>

                         <div id="chart-1"><!-- Fusion Charts will render here--></div>

                                </div>      
                                </div>
                                </div>  
                                </div>
                            </div>
                        </form>
              
                    
                    echo '<div class="col-md- col-md-offset-1">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    //echo '<table>';
                    //echo '<tr>';
                    //echo '<td>';
                    echo '<div class="col-md-5">';
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
                                echo '<br>';
                                echo '<br>';
                                echo '<div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" style="width:100px;" class="btn btn-primary btn pull-right" onclick="pass()" >Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo '<div class="col-md-6">';
                    echo '<form class="inline" method="POST">';
                        echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading">';
                            echo '</div>';
                            echo '<div class="panel-body">';
                            echo '<div class="form-group-sm">
                                <label class="col-lg-10" control-label">Filter:</label>
                                <div class="col-sm-7">
                                        <select id ="filter" name="filter" class="form-control" style="width:300px;">
                                            <option hidden>-- Select --</option>
                                            <option> All Case </option>
                                            <option> On-Going </option>
                                            <option> 1st Cycle </option>
                                            <option> 2nd Cycle </option>
                                            <option> 3rd Cycle </option>
                                            <option> 4th Cycle </option>
                                            <option> 5th Cycle </option>
                                            <option> 6th Cycle </option>
                                            <option> Turn over </option>
                                            <option> Case Closed </option>
                                            <option> Transfer to Higher Authority </option>';       
                                        echo '</select><br><br><br>
                                </div>';
                                echo '<br>'; echo '<br>';
                                echo '<br>'; echo '<br>';
                                echo '<br>';echo '<br>';
                                echo '<br>';
                                echo '<button type="submit" class="btn btn-primary btn pull-right" name="generate">Generate</button>';          
                        echo '</div>';
                        echo '</div>';  
                        echo '</div>';
                    echo '</div>';
                    echo '</form>';
                echo '</div>';
                echo '</div>';


                        if(isset($_POST['generate'])){
                            $value = $_POST['filter'];
                            echo'<div id="printablediv">';
                            echo'<img src="../files/header.jpg" class="print" style=" display: none; align:center !important;">';
                            echo '<p class="print" style="color: blue !important; text-align:right !important; display: none;">'.$dates.'</p>';
                            echo '<h1>Case Report: '.$value.'</h1>';
                            if($value=="All Case"){
                                $results = $con->query("SELECT case_id, case_title, complainant_fullname, defendant_fullname, case_status, case_date FROM `case`");
                                    echo '<table class ="table table-bordered">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            echo '<th><label>Case ID</label></th>';
                                            echo '<th><label>Case Title</label></th>';
                                            echo '<th><label>Complainant Name</label></th>';
                                            echo '<th><label>Defendant Name</label></th>';
                                            echo '<th><label>Case Status</label></th>';
                                            echo '<th><label>Case Date</label></th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row = $results->fetch_array())
                                    {
                                        echo '<tr>';
                                            echo '<td>'.$row['case_id'].'</td>';
                                            echo '<td>'.$row['case_title'].'</td>';
                                            echo '<td>'.$row['complainant_fullname'].'</td>';
                                            echo '<td>'.$row['defendant_fullname'].'</td>';
                                            echo '<td>'.$row['case_status'].'</td>';
                                            echo '<td>'.$row['case_date'].'</td>';          
                                        echo '</tr>';   
                                    }                               
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '</table>';
                                    $results = $con->query("SELECT COUNT(case_id) as cas FROM `case`");
                                            while($row = $results->fetch_array())
                                                {
                                                echo '<p>Total: '.$row["cas"].' </p>';
                                                }
                                    echo '<br>';
                                        
                                        echo'</div>';
                                    echo'';

                            }else{
                                $results1 = $con->query("SELECT case_id, case_title, complainant_fullname, defendant_fullname, case_date FROM `case` where case_status = '$value'");
                                    echo '<table class ="table table-bordered">';
                                        echo '<thead>';
                                            echo '<tr>';
                                            echo '<th><label>Case ID</label></th>';
                                            echo '<th><label>Case Title</label></th>';
                                            echo '<th><label>Complainant Name</label></th>';
                                            echo '<th><label>Defendant Name</label></th>';
                                            echo '<th><label>Case Date</label></th>';
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';
                                    while($row1 = $results1->fetch_array())
                                    {
                                        echo '<tr>';
                                            echo '<td>'.$row1['case_id'].'</td>';
                                            echo '<td>'.$row1['case_title'].'</td>';
                                            echo '<td>'.$row1['complainant_fullname'].'</td>';
                                            echo '<td>'.$row1['defendant_fullname'].'</td>';
                                            echo '<td>'.$row1['case_date'].'</td>'; 
                                            echo '</tr>';   
                                        }           
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '</table>';
                                    $results = $con->query("SELECT COUNT(case_id) as cas FROM `case` where case_status = '$value'");
                                            while($row1 = $results->fetch_array())
                                                {
                                                echo '<p>Total: '.$row1["cas"].' </p>';
                                                }
                                    echo '<br>';
                                    echo'</div>';
                        
                    
                    
                    <button type="submit" class="btn btn-primary btn-small btn pull-right" onclick="javascript:printDiv('printablediv')" >
                <span class = "glyphicon glyphicon-print"> Print</span>
            </button>
                    <br>
                    <br>                    
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
