<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Certificate</title>

    

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
                    <h1 class="page-header">Issued Certificate Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
              <div class="col-lg-12">
                <div class="panel panel-success">
                  <div class="panel-heading">
                      Certificate
                  </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#cert">Certificate</a></li>
                        <li><a data-toggle="tab" href="#gm">Good Moral</a></li>
                        <li><a data-toggle="tab" href="#ind">Indigency</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="cert" class="tab-pane fade in active">
                            <div class="panel-body">
                              <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="InputStart">Start Date</label>
                                    <input type="date" id="dateStart" name="dateStart" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="InputStart">End Date</label>
                                    <input type="date" id="dateEnd" name="dateEnd" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control"/>
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
                                            <li id="all" value="All"><a href="#">All</a></li>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pull-right">
                                <button type="button" id="generate" class="btn btn-warning" >Generate</button>
                            </div>
                          </div>
                          <hr>
                          <!-- /.panel-body -->
                          <div class="panel-body">
                            <h3 class="title">Certificate Report </h3>
                              <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="certificate">
                                <thead>
                                  <tr>
                                    <th>Certificate ID</th>
                                    <th>Name</th>
                                    <th>Date Issued</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
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

                        <div id="gm" class="tab-pane fade">
                          <div class="panel-body">
                              <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="InputStart">Start Date</label>
                                    <input type="date" id="dateStart1" name="dateStart1" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="InputStart">End Date</label>
                                    <input type="date" id="dateEnd1" name="dateEnd1" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control"/>
                                </div>
                                <div class="form-group pull-right">
                                <label for="InputStart">Filter</label>
                                    <div class="dropdown">
                                      <button class="btn btn-info dropdown-toggle" type="button" id="filter1" data-toggle="dropdown"
                                        aria-haspopup="true" 
                                        aria-expanded="true">
                                        --
                                        Select--
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="selectFilter1">
                                            <li id="all1" value="All"><a href="#">All</a></li>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pull-right">
                                <button type="button" id="generate1" class="btn btn-warning" >Generate</button>
                            </div>
                          </div>
                          <hr>
                          <!-- /.panel-body -->
                          <div class="panel-body">
                            <h3 class="title1">Good Moral Report </h3>
                              <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="goodmoral">
                                <thead>
                                  <tr>
                                    <th>Good Moral ID</th>
                                    <th>Name</th>
                                    <th>Date Issued</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
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

                        <div id="ind" class="tab-pane fade">
                          <div class="panel-body">
                              <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="InputStart">Start Date</label>
                                    <input type="date" id="dateStart2" name="dateStart2" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="InputStart">End Date</label>
                                    <input type="date" id="dateEnd2" name="dateEnd2" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control"/>
                                </div>
                                <div class="form-group pull-right">
                                <label for="InputStart">Filter</label>
                                    <div class="dropdown">
                                      <button class="btn btn-info dropdown-toggle" type="button" id="filter2" data-toggle="dropdown"
                                        aria-haspopup="true" 
                                        aria-expanded="true">
                                        --
                                        Select--
                                        <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="selectFilter2">
                                            <li id="all2" value="All"><a href="#">All</a></li>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pull-right">
                                <button type="button" id="generate2" class="btn btn-warning" >Generate</button>
                            </div>
                          </div>
                          <hr>
                          <!-- /.panel-body -->
                          <div class="panel-body">
                            <h3 class="title2">Indigency Report </h3>
                              <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="indigency">
                                <thead>
                                  <tr>
                                    <th>Indigency ID</th>
                                    <th>Name</th>
                                    <th>Date Issued</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
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
    // certificate
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

              $('.title').html('Certificate Report: ' + start + ' to ' + end);
          }
      })
    // end of certificate
    // good moral
      $('#generate1').click(function() {
        var dateEnd1 = $('#dateEnd1').val();
        var dateStart1 = $('#dateStart1').val();

          if(dateStart1 > dateEnd1){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'The end date can not be less than the start date',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd1').val("");
            });
          }else if(dateEnd1 == "" && dateStart1 == ""){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'Input Date!',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd1').val("") ;
            });
          }else if(dateEnd1 == "" || dateStart1 == ""){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'Input Date!',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd1').val("") ;
            });
          }else{
              var mydateStart = new Date($('#dateStart1').val()); 
              var monthStart = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"][mydateStart.getMonth()];
              var start = monthStart + ' ' + mydateStart.getDate() + ', ' + mydateStart.getFullYear();

              var mydateEnd = new Date($('#dateEnd1').val());
              var monthEnd = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"][mydateEnd.getMonth()];
              var end = monthEnd + ' ' + mydateEnd.getDate() + ', ' + mydateEnd.getFullYear();

              $('.title1').html('Good Moral Report: ' + start + ' to ' + end);
          }
      })
    // end of good moral
    // indigency
      $('#generate2').click(function() {
        var dateEnd2 = $('#dateEnd2').val();
        var dateStart2 = $('#dateStart2').val();

          if(dateStart2 > dateEnd2){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'The end date can not be less than the start date',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd2').val("");
            });
          }else if(dateEnd2 == "" && dateStart2 == ""){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'Input Date!',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd2').val("") ;
            });
          }else if(dateEnd2 == "" || dateStart2 == ""){
            sweetAlert({
                  title:'ERROR!!!',
                  text: 'Input Date!',
                  type:'error'
            },function(isConfirm){
                  $('#dateEnd2').val("") ;
            });
          }else{
              var mydateStart = new Date($('#dateStart2').val()); 
              var monthStart = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"][mydateStart.getMonth()];
              var start = monthStart + ' ' + mydateStart.getDate() + ', ' + mydateStart.getFullYear();

              var mydateEnd = new Date($('#dateEnd2').val());
              var monthEnd = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"][mydateEnd.getMonth()];
              var end = monthEnd + ' ' + mydateEnd.getDate() + ', ' + mydateEnd.getFullYear();

              $('.title2').html('Indigency Report: ' + start + ' to ' + end);
          }
      })
    //end of indigency
    </script>
    <script>
        $('#selectFilter li').click(function(){
              var report = $(this);
              $('#filter').html(report.text());
        })
    </script>
    <script>
      //certificate
        var counter=0;

         $('#generate').focus(function() {
            if(counter>-1)
            {
                $('#certificate').dataTable().fnClearTable();
            }
            counter++;;

           var start = $('#dateStart').val();
           var end = $('#dateEnd').val();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("certDate")}}',
             dataType:'json',
             data: {
              'start':start,
              'end':end
             },
             success:function(data){
              console.log(data.cert.length)
               for(i=0; i< data.cert.length; i++){
                if(data.cert.length != 0){
                  $('#certificate').dataTable().fnAddData([
                        data.cert[i]['certificate_id'],
                        data.cert[i]['name'],
                        data.cert[i]['date_issued'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
         }) 
      // end of certificate
      // good moral
        var counter1=0;

         $('#generate1').focus(function() {
            if(counter1>-1)
            {
                $('#goodmoral').dataTable().fnClearTable();
            }
            counter1++;;

           var start1 = $('#dateStart1').val();
           var end1 = $('#dateEnd1').val();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("goodMoralDate")}}',
             dataType:'json',
             data: {
              'start1':start1,
              'end1':end1
             },
             success:function(data){
              console.log(data.gm.length)
               for(i=0; i< data.gm.length; i++){
                if(data.gm.length != 0){
                  $('#goodmoral').dataTable().fnAddData([
                        data.gm[i]['goodmoral_id'],
                        data.gm[i]['name'],
                        data.gm[i]['date_issued'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
         }) 
      // end of good moral
      // indigency
          var counter2=0;

         $('#generate2').focus(function() {
            if(counter2>-1)
            {
                $('#indigency').dataTable().fnClearTable();
            }
            counter2++;;

           var start2 = $('#dateStart2').val();
           var end2 = $('#dateEnd2').val();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("indigencyDate")}}',
             dataType:'json',
             data: {
              'start2':start2,
              'end2':end2
             },
             success:function(data){
              console.log(data.indigency.length)
               for(i=0; i< data.indigency.length; i++){
                if(data.indigency.length != 0){
                  $('#indigency').dataTable().fnAddData([
                        data.indigency[i]['indigency_id'],
                        data.indigency[i]['name'],
                        data.indigency[i]['date_issued'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
         }) 
      //end of indigency
    </script>
    <script>
    // certificate
        $selectFilter = $('#selectFilter li'),
        $liYear = $selectFilter.find('li');

         var counter=0;

         $selectFilter.click(function() {
            if(counter>-1)
            {
                $('#certificate').dataTable().fnClearTable();
            }
            counter++;;
           var cert = $(this);
            $('#filter').html(cert.text()+' <span class="caret"></span>');
            $('.title').html('Certificate Report: '+ cert.text());
           var cert= cert.text();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("returnCert")}}',
             dataType:'json',
             data: {
                 certification: cert,
             },
             success:function(data){
               for(i=0; i< data.certification.length; i++){
                if(data.certification.length != 0){
                  $('#certificate').dataTable().fnAddData([
                        data.certification[i]['certificate_id'],
                        data.certification[i]['name'],
                        data.certification[i]['date_issued'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
         }) 
    //end of certificate
    // good moral
        $selectFilter1 = $('#selectFilter1 li'),
        $liYear = $selectFilter1.find('li');

         var counter1=0;

         $selectFilter1.click(function() {
            if(counter1>-1)
            {
                $('#goodmoral').dataTable().fnClearTable();
            }
            counter1++;;
           var goodmoral = $(this);
            $('#filter1').html(goodmoral.text()+' <span class="caret"></span>');
            $('.title1').html('Good Moral Report: '+ goodmoral.text());
           var gm= goodmoral.text();

           $.ajax({
             method: 'get',
             url: '{{ URL::route("returnGoodMoral")}}',
             dataType:'json',
             data: {
                 goodmoral: gm,
             },
             success:function(data){
               for(i=0; i< data.goodmoral.length; i++){
                if(data.goodmoral.length != 0){
                  $('#goodmoral').dataTable().fnAddData([
                        data.goodmoral[i]['goodmoral_id'],
                        data.goodmoral[i]['name'],
                        data.goodmoral[i]['date_issued'],
                      ]);
                }else{
                  $('.myTable').append('<center>No data available</center>');
                }
              }

             }
           })
         }) 
      // end of good moral
      // indigency
          $selectFilter2 = $('#selectFilter2 li'),
          $liYear = $selectFilter2.find('li');

           var counter2=0;

           $selectFilter2.click(function() {
              if(counter2>-1)
              {
                  $('#indigency').dataTable().fnClearTable();
              }
              counter2++;;
             var report = $(this);
              $('#filter2').html(report.text()+' <span class="caret"></span>');
              $('.title2').html('Indigency Report: '+ report.text());
             var reports= report.text();

             $.ajax({
               method: 'get',
               url: '{{ URL::route("returnIndigency")}}',
               dataType:'json',
               data: {
                   indigency: reports,
               },
               success:function(data){
                 for(i=0; i< data.indigency.length; i++){
                  if(data.indigency.length != 0){
                    $('#indigency').dataTable().fnAddData([
                          data.indigency[i]['indigency_id'],
                          data.indigency[i]['name'],
                          data.indigency[i]['date_issued'],
                        ]);
                  }else{
                    $('.myTable').append('<center>No data available</center>');
                  }
                }

               }
             })
           })
      // end of indigency
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        var t = $('#certificate').DataTable({
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
    <script type="text/javascript">
      $(document).ready(function() {
        var t = $('#goodmoral').DataTable({
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
    <script type="text/javascript">
      $(document).ready(function() {
        var t = $('#indigency').DataTable({
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
