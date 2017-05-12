<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Dashboard</title>

    

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
        @include('standardUser.nav1')
        

        <div id="page-wrapper" style="padding-top: 0%;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Residents!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Cases!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Graphical Representation / Barangay Profile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="form-group">      
                                <div class='col-md-12'>
                                    <div class='card-box'>
                                      <input type="hidden" id="resident" value="{{$resident}}">
                                      <input type="hidden" id="male" value="{{$male}}">
                                      <input type="hidden" id="female" value="{{$female}}">
                                      <input type="hidden" id="senior" value="{{$senior}}">
                                      <input type="hidden" id="voter" value="{{$voter}}">
                                      <input type="hidden" id="household" value="{{$household['household_id']}}">
                                      <input type="hidden" id="family" value="{{$family['family_id']}}">
                                        <h4 class='text-dark header-title m-t-0'>Residents Population</h4>
                                        
                                    </div>

                                    <div class="col-lg-8">
                                        <div id="pie-chart"></div>
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
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Graphical Representation / Case
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="form-group">      
                                <div class='col-md-12'>
                                    <div class='card-box'>
                                      <input type="hidden" id="alarms" value="{{$alarms}}">
                                      <input type="hidden" id="false" value="{{$false}}">
                                      <input type="hidden" id="physical" value="{{$physical}}">
                                      <input type="hidden" id="abandonment" value="{{$abandonment}}">
                                      <input type="hidden" id="tresspass" value="{{$tresspass}}">
                                      <input type="hidden" id="threats" value="{{$threats}}">
                                      <input type="hidden" id="theft" value="{{$theft}}">
                                      <input type="hidden" id="swindling" value="{{$swindling}}">
                                      <input type="hidden" id="sexual" value="{{$sexual}}">
                                      <input type="hidden" id="murder" value="{{$murder}}">
                                      <input type="hidden" id="illegal" value="{{$illegal}}">
                                        <h4 class='text-dark header-title m-t-0'>Case Rate</h4>
                                        
                                    </div>

                                    <div class="col-lg-8">
                                        <div id="morris-bar-chart" style="width:120%"></div>
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
                                                    <td><strong>Alarms and Scandals</strong></td>
                                                    <td><i>{{$alarms}}</i></td>   
                                                </tr>
                                                <tr>
                                                    <td><strong>False Identities</strong></td>
                                                    <td><i>{{$false}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Physical Injury</strong></td>
                                                    <td><i>{{$physical}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Abandonment</strong></td>
                                                    <td><i>{{$abandonment}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tresspass</strong></td>
                                                    <td><i>{{$tresspass}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Threats</strong></td>
                                                    <td><i>{{$threats}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Theft</strong></td>
                                                    <td><i>{{$theft}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Swindling</strong></td>
                                                    <td><i>{{$swindling}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Sexual Assault</strong></td>
                                                    <td><i>{{$sexual}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Murder</strong></td>
                                                    <td><i>{{$murder}}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Illegal Drug</strong></td>
                                                    <td><i>{{$illegal}}</i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>

    <script type="text/javascript">
        function graphDonut(colors) {
                Morris.Donut({
                element: 'pie-chart',
                colors : colors,
                data: [{label: 'Residents',value: $('#resident').val()}, 
                {label: 'Male',value: $('#male').val()},
                {label: 'Female',value: $('#female').val()}, 
                {label: 'Seniors',value: $('#senior').val()}, 
                {label: 'Voters',value: $('#voter').val()},
                {label: 'Household',value: $('#household').val()},
                {label: 'Family',value: $('#family').val()}]
          
        });  

        }

        graphDonut( ['#5ea9e8', '#5ee89d', '#e5484f', '#ffc0c0', '#fff867', '#fba16c','#4eeed3'] );
    </script>

    <script type="text/javascript">
                Morris.Bar({
                element: 'morris-bar-chart',
                data: [{y: 'Alarms and Scandals',a: $('#alarms').val()}, 
                {y: 'False Identities',a: $('#false').val()},
                {y: 'Physical Injury',a: $('#physical').val()}, 
                {y: 'Abandonment',a: $('#abandonment').val()}, 
                {y: 'Tresspass',a: $('#tresspass').val()},
                {y: 'Threats',a: $('#threats').val()},
                {y: 'Theft',a: $('#theft').val()},
                {y: 'Swindling',a: $('#swindling').val()},
                {y: 'Sexual Assault',a: $('#sexual').val()},
                {y: 'Murder',a: $('#murder').val()},
                {y: 'Illegal Drug',a: $('#illegal').val()}],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Count'],
                hideHover: 'auto',
                resize: true,
                numLines: 3,
                barColors: function (row, series, type) {
                  if(row.label == "Alarms and Scandals") return "#5ea9e8";
                  else if(row.label == "False Identities") return "#5ee89d";
                  else if(row.label == "Physical Injury") return "#e5484f";
                  else if(row.label == "Abandonment") return "#ffc0c0";
                  else if(row.label == "Tresspass") return "#CBA4FC";
                  else if(row.label == "Threats") return "#647AC1";
                  else if(row.label == "Theft") return "#fff867";
                  else if(row.label == "Swindling") return "#FFF7BD";
                  else if(row.label == "Sexual Assault") return "#fba16c";
                  else if(row.label == "Murder") return "#95CFB7";
                  else if(row.label == "Illegal Drug") return "#4eeed3";
                  }
         
    });  
    </script>


</body>

</html>
