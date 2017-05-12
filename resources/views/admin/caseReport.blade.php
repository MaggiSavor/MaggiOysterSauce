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

    <title>BRIMS - Case Report</title>

    

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
                    <h1 class="page-header">Case Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
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
                            <div class="pull-right">
                                <button type="reset" class="btn btn-danger" name="reset" id="reset"><span class="glyphicon glyphicon-print"></span> Print</button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
              </div>
            </div> 
            <div class="row" style="padding-bottom: 5%;">
              <div class="col-lg-12">
                <div class="panel panel-success">
                  <div class="panel-heading">
                      Cases
                  </div>
                    <!-- /.panel-heading -->
                  <form method="get">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label for="InputStart">Start Date</label>
                                <input type="date" id="dateStart" name="dateStart" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="InputStart">End Date</label>
                                <input type="date" id="dateEnd" name="dateEnd" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control" />
                            </div>
                            <div class="form-group pull-right">
                            <label for="InputStart">Filter</label>
                                <div class="dropdown">
                                  <button class="btn btn-info dropdown-toggle" type="button" id="filter" data-toggle="dropdown"
                                    aria-haspopup="true" 
                                    aria-expanded="true">
                                    --
                                    Select--
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="selectFilter">
                                        <li id="all" value="All"><a href="#">All Case</a></li>
                                        <li id="1st" value="1st"><a href="#">1st Cycle</a></li>
                                        <li id="2nd" value="2nd"><a href="#">2nd Cycle</a></li>
                                        <li id="3rd" value="3rd"><a href="#">3rd Cycle</a></li>
                                        <li id="4th" value="4th"><a href="#">4th Cycle</a></li>
                                        <li id="5th" value="5th"><a href="#">5th Cycle</a></li>
                                        <li id="6th" value="6th"><a href="#">6th Cycle</a></li>
                                        <li id="turnOver" value="Turn Over"><a href="#">Turn over</a></li>
                                        <li id="caseClose" value="Case Close"><a href="#">Case Closed</a></li>
                                        <li id="transfer" value="Transfer"><a href="#">Transfer to Higher Authority</a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pull-right">
                                <button type="button" id="generate" class="btn btn-warning" >Generate</button>
                            </div>
                    </div>
                  </form>
                    <hr>
                    <!-- /.panel-body -->
                    <div class="panel-body">
                    <h3 class="title">Case Report </h3>
                           <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="case">
                               <thead>
                                   <tr>
                                    <th>Case ID</th>
                                    <th>Case Title</th>
                                    <th>Complainant Name</th>
                                    <th>Defendant Name</th>
                                    <th>Case Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr> 
                               </tbody>
                           </table>
                           <button type="submit" class="btn btn-danger btn-small btn pull-right">
                            <span class = "glyphicon glyphicon-print"> Print</span>
                           <!-- /.table-responsive -->
                       </div>
                       <!-- /.panel-body -->
                </div>
              </button>
            </div>        
        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
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

    <script>
      $('#generate').click(function() {
        var dateEnd = $('#dateEnd').val();
        var dateStart = $('#dateStart').val();

          if(dateStart > dateEnd){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'The end date can not be less than the start date',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd').val("");
            });
          }else if(dateEnd == "" && dateStart == ""){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'Input Date!',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd').val("") ;
            });
          }else if(dateEnd == "" || dateStart == ""){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'Input Date!',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd').val("") ;
            });
          }else{
              var mydateStart = new Date($('#dateStart').val());
              var monthStart = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"][mydateStart.getMonth()];
              var start = monthStart + ' ' + mydateStart.getDate() + ', ' + mydateStart.getFullYear();

              var mydateEnd = new Date($('#dateEnd').val());
              var monthEnd = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"][mydateEnd.getMonth()];
              var end = monthEnd + ' ' + mydateEnd.getDate() + ', ' + mydateEnd.getFullYear();

              $('.title').html('Case Report: ' + start + ' to ' + end);
          }

          
      })
    </script>
    <script>
      var counter=0;

         $('#generate').focus(function() {
            if(counter>-1)
            {
                $('#case').dataTable().fnClearTable();
            }
            counter++;;

           var start = $('#dateStart').val();
           var end = $('#dateEnd').val();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("caseDate")}}',
             dataType:'json',
             data: {
              'start':start,
              'end':end
             },
             success:function(data){
              console.log(data.case.length)
               for(i=0; i< data.case.length; i++){
                if(data.case.length != 0){
                  $('#case').dataTable().fnAddData([
                        data.case[i]['case_id'],
                        data.case[i]['case_title'],
                        data.case[i]['complainant_fullname'],
                        data.case[i]['defendant_fullname'],
                        data.case[i]['case_date'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
         }) 
    </script>
    <script>
        $selectFilter = $('#selectFilter li'),
        $liYear = $selectFilter.find('li');

        var counter=0;

         $selectFilter.click(function() {
            if(counter>-1)
            {
                $('#case').dataTable().fnClearTable();
            }
            counter++;;
           var report = $(this);
            $('#filter').html(report.text()+' <span class="caret"></span>');
            $('.title').html('Case Report: '+ report.text());
           var reports= report.text();

           if(reports === "All Case"){
              $.ajax({
             method: 'get',
             url: '{{ URL::route("returnCaseReport")}}',
             dataType:'json',
             data: {
                 all: reports,
             },
             success:function(data){
               for(i=0; i< data.all.length; i++){
                 // console.log(data[i]['id'])
                if(data.all.length != 0){
                  $('#case').dataTable().fnAddData([
                      data.all[i]['case_id'],
                      data.all[i]['case_title'],
                      data.all[i]['complainant_fullname'],
                      data.all[i]['defendant_fullname'],
                      data.all[i]['case_date'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
           }else{
              $.ajax({
             method: 'get',
             url: '{{ URL::route("returnCaseReport")}}',
             dataType:'json',
             data: {
                 case: reports,
             },
             success:function(data){
               for(i=0; i< data.case.length; i++){
                 // console.log(data[i]['id'])
                if(data.case.length != 0){
                  $('#case').dataTable().fnAddData([
                      data.case[i]['case_id'],
                      data.case[i]['case_title'],
                      data.case[i]['complainant_fullname'],
                      data.case[i]['defendant_fullname'],
                      data.case[i]['case_date'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
           }
         }) 
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).ready(function() {
            var t = $('#case').DataTable({
                responsive: true,
                searchHighlight: true,
                "columnDefs": [
                    { 
                      "sortable" : false, 
                      "searchable": false,
                      "targets": 0
                    }
                ],
                "order": [[ 1, 'asc' ]]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        });
      });
    </script>

    


</body>

</html>
