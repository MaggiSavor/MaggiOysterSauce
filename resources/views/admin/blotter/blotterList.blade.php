<?php 
  use App\Models\CaseHistory; 
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<style type="text/css">
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
<title>BRIMS - Blotter List</title>



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
        

        <div id="page-wrapper" style="padding-top: 0%;">
           <div class="row">
               <div class="col-lg-12">
                   <h1 class="page-header">Blotter List</h1>
               </div>
               <!-- /.col-lg-12 -->
           </div>
           <!-- /.row -->
           <div class="row">
               <div class="col-lg-12">
                   <div class="panel panel-success">
                       <div class="panel-heading">
                           Blotter Table
                       </div>
                       <!-- /.panel-heading -->
                       <div class="panel-body">
                           <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="dataTables-example">
                               <thead>
                                   <tr>
                                       <th></th>
                                       <th>Case ID</th>
                                       <th>Type</th>
                                       <th>Title</th>
                                       <th>Complainant</th>
                                       <th>Defendant</th>
                                       <th>Status</th>
                                       <th>Case Date</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach($blotterLists as $blotterList)
                                    <tr class="data" style="cursor:pointer" data-toggle="tooltip" title="Click for more details!">
                                       <td></td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->id}}</td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->case_type}}</td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->case_title}}</td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->complainant_fullname}}</td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->defendant_fullname}}</td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->case_status}}</td>
                                       <td data-toggle="modal" data-target="#myModal{{$blotterList['id']}}">{{$blotterList->created_at}}</td>
                                       <td>
                                        <a href="{{URL::Route('updateBlotter', $blotterList['id'])}}"><button class="btn btn-success btn-sm" type="button">Update</button></a> 
                                       </td>
                                    </tr>
                                    @endforeach
                                   
                               </tbody>
                           </table>
                           <!-- /.table-responsive -->
                       </div>
                       <!-- /.panel-body -->
                   </div>
                   <!-- /.panel -->
               </div>
               <!-- /.col-lg-12 -->
           </div>
           <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        @foreach($blotterLists as $blotterList)
        <?php
          $caseHist = CaseHistory::where('case_id', '=', $blotterList['id'])->get();
        ?>
          
          <!-- Modal -->
          <div class="modal fade" id="myModal{{$blotterList['id']}}" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Details</h4>
                </div>
                <div class="modal-body">


                  <div class="panel panel-default">
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs">
                              <li class="active"><a href="#info{{$blotterList['id']}}" data-toggle="tab">Blotter Information</a>
                              </li>
                              <li><a href="#History{{$blotterList['id']}}" data-toggle="tab">History</a>
                              </li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                              <div class="tab-pane fade in active" id="info{{$blotterList['id']}}">
                                  <div class="table-responsive card-box">
                                    <h3>Case Number: {{$blotterList->id}}</h3>
                                      <table class="table table-hover mails m-0 table table-actions-bar" width="100%">
                                        <thead>
                                          <tr>
                                          </tr>
                                        </thead>
                                          <tbody>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Type</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_type}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Case Rate</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_rate}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Title</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_title}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Case Date</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_date}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Case Time</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_time}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Complainant Fullname</b></td>
                                              <td style="min-width: 350px">{{$blotterList->complainant_fullname}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Complainant Address</b></td>
                                              <td style="min-width: 350px">{{$blotterList->complainant_address}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Defendant Fullname</b></td>
                                              <td style="min-width: 350px">{{$blotterList->defendant_fullname}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Defendant Address</b></td>
                                              <td style="min-width: 350px">{{$blotterList->defendant_address}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Summon Date</b></td>
                                              <td style="min-width: 350px">{{$blotterList->summon_date}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Summon Time</b></td>
                                              <td style="min-width: 350px">{{$blotterList->summon_time}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Case Description</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_description}}</td>
                                            </tr>
                                            <tr class="">
                                              <td colspan="5"></td>
                                              <td><b>Case Status</b></td>
                                              <td style="min-width: 350px">{{$blotterList->case_status}}</td>
                                            </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="History{{$blotterList['id']}}">
                                  <h3>Case Number: {{$blotterList->id}}</h3>
                                  <hr/>
                                  
                                  <table class="table table-hover mails m-0 table table-actions-bar" width="100%">
                                        <thead>
                                          <tr>
                                            <th>Status</th>
                                            <th>Brief Description</th>
                                            <th>Date Added</th>
                                            <th>Summon Date</th>
                                            <th>Issued Documents</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                          <tbody>
                                            @foreach($caseHist as $caseHis)
                                            <tr class="">
                                              <td>{{$caseHis->case_status}}</td>
                                              <td>{{$caseHis->case_desc}}</td>
                                              <td>{{$caseHis->created_at}}</td>
                                              <td>{{$caseHis->summon_date}}</td>
                                              <td>{{$caseHis->issued}}</td>
                                              <td><button class="btn btn-success btn-sm" type="button">Add Description</button></td>
                                            </tr>
                                            @endforeach 
                                          </tbody>
                                      </table>
                              </div>
                              
                          </div>
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->


                  
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach  
    </div>
    <!-- /#wrapper -->

    

<!-- Morris Charts JavaScript -->
<script src="../assets/raphael/raphael.min.js"></script>
<script src="../assets/morrisjs/morris.min.js"></script>
<script src="../assets/data/morris-data.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
      var t = $('#dataTables-example').DataTable({
          responsive: true,
          searchHighlight: true,
          "columnDefs": [
              { 
                "sortable" : false, 
                "searchable": false,
                "targets": 8
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
</script>

</body>

</html>
