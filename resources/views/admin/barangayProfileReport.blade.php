<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
            <h1>Barangay Profile Report</h1>
            <hr>
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
                                
                                // Form the SQL query 
                                $strQuery = "SELECT *, COUNT(gender) as a FROM resident WHERE resident_status='Active' GROUP BY gender";
                                // Execute the query, or else return the error message.
                                $result = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");
                                $strQuery = "SELECT *, COUNT(voter) as b FROM resident WHERE resident_status='Active' AND voter='voter' GROUP BY voter";
                                // Execute the query, or else return the error message.
                                $result1 = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");
                                 $strQuery = "SELECT *, COUNT(birthdate) as c FROM resident WHERE YEAR(birthdate)<=1955 AND resident_status='Active' GROUP BY birthdate";
                                // Execute the query, or else return the error message.
                                $result2 = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");
                                $strQuery = "SELECT family_id, COUNT(DISTINCT family_id) as d FROM resident";
                                // Execute the query, or else return the error message.
                                $result3 = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");
                                $strQuery = "SELECT household_id, COUNT(DISTINCT household_id) as e FROM resident";
                                // Execute the query, or else return the error message.
                                $result4 = $con->query($strQuery) or exit("Error code ({$con->errno}): {$con->error}");

                                // If the query returns a valid response, prepare the JSON string
                                if ($result) {
                                    // The `$arrData` array holds the chart attributes and data
                                    $arrData = array(
                                        "chart" => array(
                                          "caption" => "Resident",
                                          "showValues" => "1",
                                          "showLegend"=>"1",
                                          "legendPosition" => "right",
                                          "legendItemFontSize" => "15.5",
                                          "labelFontSize" => "11",
                                          "bgColor" => "#ffffff",
                                          "theme" => "zune"

                                        )
                                    );

                                    $arrData["data"] = array();

                            // Push the data into the array
                                    while($row = mysqli_fetch_array($result)) {
                                    array_push($arrData["data"], array(
                                        "label" => $row["gender"],
                                        "value" => $row["a"]
                                        )
                                    );
                                    }
                                    while($row = mysqli_fetch_array($result1)) {
                                    array_push($arrData["data"], array(
                                        "label" => $row["voter"],
                                        "value" => $row["b"]
                                        )
                                    );
                                    }
                                    while($row = mysqli_fetch_array($result2)) {
                                    array_push($arrData["data"], array(
                                        "label" => "Senior Citizen",
                                        "value" => $row["c"]
                                        )
                                    );
                                    }
                                    while($row = mysqli_fetch_array($result3)) {
                                    array_push($arrData["data"], array(
                                        "label" => "Number of Family",
                                        "value" => $row["d"]
                                        )
                                    );
                                    }
                                    while($row = mysqli_fetch_array($result4)) {
                                    array_push($arrData["data"], array(
                                        "label" => "Number of Household",
                                        "value" => $row["e"]
                                        )
                                    );
                                    }

                                    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

                                    $jsonEncodedData = json_encode($arrData);

                            /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

                                    $PieChart = new FusionCharts("Pie2d", "myFirstChart" , 710, 320, "chart-1", "json", $jsonEncodedData);

                                    // Render the chart
                                    $PieChart->render();

                                    // Close the database connection
                                    //$con->close();
                                }

                            ?>

                         <div id="printableArea" id="chart-1"><!-- Fusion Charts will render here--></div>
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
                            </div>';
                            <div class="panel-body">
                                $total = $con-> query("SELECT firstname FROM resident WHERE resident_status='Active'");
                                $row = $total -> num_rows;
                                $male = $con -> query("SELECT firstname FROM resident where gender='Male' AND resident_status='Active'");
                                $row1 = $male -> num_rows;
                                $female = $con -> query("SELECT firstname FROM resident where gender='Female' AND resident_status='Active'");
                                $row2 = $female -> num_rows;
                                $senior = $con -> query("SELECT birthdate FROM resident where YEAR(birthdate)<1955 AND resident_status='Active'");
                                $row3 = $senior -> num_rows;
                                $voter = $con -> query("SELECT firstname FROM resident where voter='voter' AND resident_status='Active'");
                                $row4 = $voter -> num_rows;
                                $household = $con -> query("SELECT distinct(household_id) FROM resident");
                                $row5 = $household -> num_rows;
                                $family = $con -> query("SELECT distinct(family_id) FROM resident");
                                $row6 = $family -> num_rows;
                                <table class="table">';
                                    <thead>
                                        <tr>
                                            <th><strong>Total number of:</strong></th>
                                            <th><strong>Total:</strong></th>
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
                                        </tr>';
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
