<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resident List</title>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="../assets/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-toggle.css" rel="stylesheet">
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
                    <h1 class="page-header">Residents</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Transferred
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <table id="datatable" class="table table-hover mails m-0 table table-actions-bar">
                <thead>
                  <tr>
                    <th style="max-width: 10px;"></th>
                    <th style="max-width: 95px;">Resident ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Household ID</th>
                    <th>Family ID</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($residentInfo as $resident)
                    <tr class="">
                      <td></td>
                      <td>{{$resident['resident_id']}}</td>
                      <td>{{$resident['firstname']}} {{$resident['middlename']}} {{$resident['lastname']}}</td>
                      <td>{{$resident['house_no']}} {{$resident['street']}} Tondo, Manila</td>
                      <td>{{$resident['gender']}}</td>
                      <td>{{$resident['status']}}</td>
                      <td>{{$resident['household_id']}}</td>
                      <td>{{$resident['family_id']}}</td>
                    </tr>
                @endforeach
                </tbody>
              </table> 
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
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script src="{!! asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js')!!}" type="text/javascript"></script>

    <script type="text/javascript">
        $('#navbarColor').on('change',function(){
            // alert($(this).data('color'));
            var bar = ($(this).val());
            $('#navbar').css('background-color', bar);
        });

        $('.filters').on('click',function(){
            // alert($(this).data('color'));
            var bg = ('loginbg.jpg');
            var bar = ($(this).data('value'));
            $('#page-wrapper').css({background: 'linear-gradient(0deg, rgba('+bar+'), rgba('+bar+')), url("{!! asset("assets/images/'+bg+'")!!}") no-repeat center center fixed', 'background-size' : '100%'});
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          var oTable = $('#datatable').DataTable({
            "orderCellsTop": false,
            "searchHighlight" : true,
            // "columnDefs": [
            //               { 
            //                 "sortable" : false, "targets": [0, 8, 8],
            //                 "searchable": false, "targets": [0, 8,  8]
            //               }
            //               ]
          });
          
          oTable.on('order.dt search.dt', function(){
            oTable.column(0, {search:'applied', order:'applied'}).nodes().each(
             function (cell, i) {
              cell.innerHTML = i+1;
              } );
          }).draw();

          $('#search').keyup(function(){
                oTable.search($(this).val()).draw() ;
          });
          $('#datatable-keytable').DataTable({keys: true});
          $('#datatable-responsive').DataTable();
          $('#datatable-colvid').DataTable({
              "dom": 'C<"clear">lfrtip',
              "colVis": {
                  "buttonText": "Change columns"
              }
          });
          
          var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
          var table = $('#datatable-fixed-col').DataTable({
              scrollY: "300px",
              scrollX: true,
              scrollCollapse: true,
              paging: false,
              fixedColumns: {
                  leftColumns: 1,
                  rightColumns: 1
              }
          });
      });
      TableManageButtons.init();
    </script>

</body>

</html>
