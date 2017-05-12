<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">
      .printer table{
          counter-reset: rowNumber;
      }
       
      .printer tr {
          counter-increment: rowNumber;
      }
       
      .printer tr td:first-child::before {
          content: counter(rowNumber);
          min-width: 1em;
          margin-right: 0.5em;
      }
    </style>
    <title>BRIMS - Resident Report</title>

    

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
                    <h1 class="page-header">Resident Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="col-lg-12">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          Residents
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
                                      <li id="all" value="All"><a href="#">All Resident</a></li>
                                      <li id="male" value="Male"><a href="#">Male</a></li>
                                      <li id="female" value="Female"><a href="#">Female</a></li>
                                      <li id="senior" value="Senior"><a href="#">Senior</a></li>
                                      <li id="voter" value="Voter"><a href="#">Voter</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 pull-right">
                            <button type="button" id="generate" class="btn btn-warning">Generate</button>
                          </div>     
                        </div>
                      </form> 
                      <hr>
                      <!-- /.panel-body -->
                      <div class="panel-body">
                      <h3 class="title">Resident Report </h3>
                              <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="resident">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Resident ID</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                  </tr> 
                                </tbody>
                              </table>
                              
                             <!-- /.table-responsive -->
                         </div>
                         <!-- /.panel-body -->
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

              $('.title').html('Resident Report: ' + start + ' to ' + end);
          }

      })
    </script>
    <script>
      var counter=0;

         $('#generate').focus(function() {
            if(counter>-1)
            {
                $('#resident').dataTable().fnClearTable();
            }
            counter++;;

           var start = $('#dateStart').val();
           var end = $('#dateEnd').val();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("resDate")}}',
             dataType:'json',
             data: {
              'start':start,
              'end':end
             },
             success:function(data){
              console.log(data.resident.length)
               for(i=0; i< data.resident.length; i++){
                if(data.resident.length != 0){
                  $('#resident').dataTable().fnAddData([
                        '<td></td>',
                        data.resident[i]['id'],
                        data.resident[i]['fullname'],
                        data.resident[i]['house_no']+' '+data.resident[i]['street'],
                        data.resident[i]['gender'],
                        data.resident[i]['status'],
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
                $('#resident').dataTable().fnClearTable();
            }
            counter++;;
           var report = $(this);
            $('#filter').html(report.text()+' <span class="caret"></span>');
            $('.title').html('Resident Report: '+ report.text());
           var reports = report.text();
           console.log(reports)

           if(reports === "All Resident"){
              $.ajax({
               method: 'get',
               url: '{{ URL::route("returnResidentReport")}}',
               dataType:'json',
               data: {
                   all: reports,
               },
               success:function(data){
                 for(i=0; i< data.all.length; i++){
                  if(data.all.length != 0){
                    $('#resident').dataTable().fnAddData([
                        '<td></td>',
                        data.all[i]['id'],
                        data.all[i]['fullname'],
                        data.all[i]['house_no']+' '+data.all[i]['street'],
                        data.all[i]['gender'],
                        data.all[i]['status'],
                        ]);
                  }else{
                    $('.myTable').append('<center>No data available</center>');
                  }
                }

               }
             })
           }else if(reports === "Voter"){
              $.ajax({
               method: 'get',
               url: '{{ URL::route("returnResidentReport")}}',
               dataType:'json',
               data: {
                   voter: reports,
               },
               success:function(data){
                 for(i=0; i< data.voter.length; i++){
                  if(data.voter.length != 0){
                    $('#resident').dataTable().fnAddData([
                        '<td></td>',
                        data.voter[i]['id'],
                        data.voter[i]['fullname'],
                        data.voter[i]['house_no']+' '+data.voter[i]['street'],
                        data.voter[i]['gender'],
                        data.voter[i]['status'],
                        ]);
                  }else{
                    $('.myTable').append('<center>No data available</center>');
                  }
                }

               }
             })
           }else if(reports === "Senior"){
              $.ajax({
               method: 'get',
               url: '{{ URL::route("returnResidentReport")}}',
               dataType:'json',
               data: {
                   senior: reports,
               },
               success:function(data){
                 for(i=0; i< data.senior.length; i++){
                  if(data.senior.length != 0){
                    $('#resident').dataTable().fnAddData([
                        '<td></td>',
                        data.senior[i]['id'],
                        data.senior[i]['fullname'],
                        data.senior[i]['house_no']+' '+data.senior[i]['street'],
                        data.senior[i]['gender'],
                        data.senior[i]['status'],
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
               url: '{{ URL::route("returnResidentReport")}}',
               dataType:'json',
               data: {
                   gender: reports,
               },
               success:function(data){
                 for(i=0; i< data.gender.length; i++){
                  if(data.gender.length != 0){
                    $('#resident').dataTable().fnAddData([
                        '<td></td>',
                        data.gender[i]['id'],
                        data.gender[i]['fullname'],
                        data.gender[i]['house_no']+' '+data.gender[i]['street'],
                        data.gender[i]['gender'],
                        data.gender[i]['status'],
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
            var t = $('#s').DataTable({
                responsive: true,
                searchHighlight: true,
                // searching: false,
                // paging: false,
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
    <script type="text/javascript">
      $(document).ready(function() {
        var t = $('#resident').DataTable({
                    "dom": "lBfrtip",
            responsive: true,
            searchHighlight: true,
            "columnDefs": [
                { 
                  "sortable" : false, 
                  "searchable": false,
                  "targets": [0]
                }
            ],
            "order": [[ 1, 'asc' ]],
            buttons: 
            [
            {
              text: '<i class="fa fa-print"></i> PRINT ',
              extend: 'print',
                  exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                  },  
                customize: function ( win ) {
                    $(win.document.body)
                        .prepend(
                            
                          '<img src="{{ URL::asset("assets/images/header.jpg") }}" style="display: block; width:100%;" />'
                        ).find('table').addClass('printer');
      
                    // $(win.document.body).find( 'table' )
                    //     .addClass( 'compact' )
                    //     .removeClass('table-hover table-striped table-actions-bar')
                    //     .css( {'background-color': 'none', 'background': 'url("http://localhost:8000/assets/images/avatar.png")', });
                }

            }
            ],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

      });
    </script>

</body>

</html>
