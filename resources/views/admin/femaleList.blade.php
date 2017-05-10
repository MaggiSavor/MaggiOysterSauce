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
<style>
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 400px;
    overflow-y: auto;
}
.data:hover{
    color:red;
}
</style>
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
                        Female
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
                              <tr class="data" style="cursor:pointer" data-toggle="tooltip" title="Click for more options!">
                                <td></td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['id']}}</td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['firstname']}} {{$resident['middlename']}} {{$resident['lastname']}}</td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['house_no']}} {{$resident['street']}} Tondo, Manila</td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['gender']}}</td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['status']}}</td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['household_id']}}</td>
                                <td data-toggle="modal" data-target="#statusModal{{$resident['id']}}">{{$resident['family_id']}}</td>
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
    <!-- Modal -->
    
      @foreach($residentInfo as $residentinfo)
          <div class="modal fade" id="statusModal{{$residentinfo['id']}}" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Details</h4>
                </div>
                <div class="modal-body">
                  <div class="table-responsive card-box">
                  <h3>Personal Information</h3>
                  <center><label>Household ID: {{$residentinfo['household_id']}}    </label>
                  <label>Family ID: {{$residentinfo['family_id']}}</label></center>
                    <table class="table table-hover mails m-0 table table-actions-bar">
                      <thead>
                        <tr>
                        </tr>
                      </thead>
                        <tbody>
                          <tr class="">
                            <td></td>
                            <td><b>Resident ID</b></td>
                            <td class="id" style="min-width: 350px">{{$residentinfo['id']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Role</b></td>
                            <td class="id" style="min-width: 350px">{{$residentinfo['role']}}</td>
                          </tr>
                           <tr class="">
                            <td></td>
                            <td><b>Name</b></td>
                            <td style="min-width: 50px">{{$residentinfo['firstname']}} {{$residentinfo['middlename']}} {{$residentinfo['lastname']}}</td>
                          </tr>
                          <tr class="">
                            <td style="min-width: 50px"></td>
                            <td><b>Address</b></td>
                            <td style="min-width: 350px">{{$residentinfo['house_no']}} {{$residentinfo['street']}} Tondo, Manila</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Gender</b></td>
                            <td style="min-width: 350px">{{$residentinfo['gender']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Birthday</b></td>
                            <td style="min-width: 350px">{{$residentinfo['birthdate']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Age</b></td>
                            <td style="min-width: 350px"><?php $birthDate = explode("-", $residentinfo['birthdate']);
                            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[0], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
                              echo $age;
                             ?></td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Contact</b></td>
                            <td style="min-width: 350px"></td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td>Mobile</td>
                            <td style="min-width: 350px">{{$residentinfo['mobile']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td>Telephone</td>
                            <td style="min-width: 350px">{{$residentinfo['telno']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Civil Status</b></td>
                            <td style="min-width: 350px">{{$residentinfo['status']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Occupation</b></td>
                            <td style="min-width: 350px">{{$residentinfo['occupation']}}</td>
                          </tr>
                           <tr class="">
                            <td></td>
                            <td><b>Nationality</b></td>
                            <td style="min-width: 350px">{{$residentinfo['nationality']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Religion</b></td>
                            <td style="min-width: 350px">{{$residentinfo['religion']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Mother</b></td>
                            <td style="min-width: 350px">{{$residentinfo['mothers_name']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Father</b></td>
                            <td style="min-width: 350px">{{$residentinfo['fathers_name']}}</td>
                          </tr>
                          <tr class="">
                            <td></td>
                            <td><b>Resident Status</b></td>
                            <td style="min-width: 350px">{{$residentinfo['resident_status']}}</td>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach 
         
<!-- End of Modal -->

    

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
      $('[data-toggle="tooltip"]').tooltip(); 

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
