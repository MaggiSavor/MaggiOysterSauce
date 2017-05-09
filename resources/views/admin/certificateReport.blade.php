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

        <div id="page-wrapper" style="padding-top: 0% ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Issued Certificate Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Certificate
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label for="InputStart">Start Date</label>
                                <input type="date" id="dateStart" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="InputStart">End Date</label>
                                <input type="date" id="dateEnd" min="1954-10-01" max="<?php echo date('Y-m-d');?>" class="form-control" required />
                            </div>
                            <div class="form-group col-md-4">
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
                                        <li id="cert" value="Certificate"><a href="#">Certificate</a></li>
                                        <li id="goodMoral" value="Good Moral"><a href="#">Good Moral</a></li>
                                        <li id="indigency" value="Indigency"><a href="#">Indigency</a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
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
                           <button type="submit" class="btn btn-danger btn-small btn pull-right">
                            <span class = "glyphicon glyphicon-print"> Print</span>
                           <!-- /.table-responsive -->
                       </div>
                       <!-- /.panel-body -->
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
        var cert = $('#filter');

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

              $('.title').html(cert.text()+ ' Report: ' + start + ' to ' + end);
          }
      })
    </script>
    <script>
      var counter=0;

         $('#generate').focus(function() {
            if(counter>-1)
            {
                $('#certificate').dataTable().fnClearTable();
            }
            counter++;;

           var start = $('#dateStart').val();
           var end = $('#dateEnd').val();

           if(reports === "Certificate"){
                $.ajax({
                 method: 'get',
                 url: '{{ URL::route("certDate")}}',
                 dataType:'json',
                 data: {
                  'start':start,
                  'end':end
                 },
                 success:function(data){
                  console.log(data.certification.length)
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
            }else if(reports === "Indigency"){
                $.ajax({
                 method: 'get',
                 url: '{{ URL::route("certDate")}}',
                 dataType:'json',
                 data: {
                  'start':start,
                  'end':end
                 },
                 success:function(data){
                  console.log(data.indigency.length)
                   for(i=0; i< data.indigency.length; i++){
                    if(data.indigency.length != 0){
                      $('#certificate').dataTable().fnAddData([
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
            }else{
               $.ajax({
                 method: 'get',
                 url: '{{ URL::route("certDate")}}',
                 dataType:'json',
                 data: {
                  'start':start,
                  'end':end
                 },
                 success:function(data){
                  console.log(data.goodMoral.length)
                   for(i=0; i< data.goodMoral.length; i++){
                    if(data.goodMoral.length != 0){
                      $('#certificate').dataTable().fnAddData([
                          data.goodMoral[i]['goodmoral_id'],
                          data.goodMoral[i]['name'],
                          data.goodMoral[i]['date_issued'],
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
    <script>
        $selectFilter = $('#selectFilter li'),
        $liYear = $selectFilter.find('li');

        var counter=0;

         $selectFilter.click(function() {
            if(counter>-1)
            {
                $('#certificate').dataTable().fnClearTable();
            }
            counter++;;
           var report = $(this);
            $('#filter').html(report.text()+' <span class="caret"></span>');
            $('.title').html(report.text()+' Report');
           var reports = report.text();
           console.log(reports)

           if(reports === "Certificate"){
                $.ajax({
                 method: 'get',
                 url: '{{ URL::route("returnCert")}}',
                 dataType:'json',
                 data: {
                     certification: reports,
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
            }else if(reports === "Indigency"){
                $.ajax({
                 method: 'get',
                 url: '{{ URL::route("returnCert")}}',
                 dataType:'json',
                 data: {
                     indigency: reports,
                 },
                 success:function(data){
                   for(i=0; i< data.indigency.length; i++){
                    if(data.certification.length != 0){
                      $('#certificate').dataTable().fnAddData([
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
            }else{
                $.ajax({
                 method: 'get',
                 url: '{{ URL::route("returnCert")}}',
                 dataType:'json',
                 data: {
                     goodMoral: reports,
                 },
                 success:function(data){
                   for(i=0; i< data.goodMoral.length; i++){
                    if(data.certification.length != 0){
                      $('#certificate').dataTable().fnAddData([
                          data.goodMoral[i]['goodmoral_id'],
                          data.goodMoral[i]['name'],
                          data.goodMoral[i]['date_issued'],
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
            var t = $('#certificate').DataTable({
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
