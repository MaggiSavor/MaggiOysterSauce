<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Letter of File Action</title>

    

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
                            Letter of File Action
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="summon">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Case ID</th>
                                        <th>Title</th>
                                        <th>Complainant</th>
                                        <th>Defendant</th>
                                        <th>Status</th>
                                        <th>Case Date</th>
                                        <th>Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                @foreach($summon as $summons)
                                    <tr>
                                       <td></td>
                                       <td>{{$summons['case_id']}}</td>
                                       <td>{{$summons['case_title']}}</td>
                                       <td>{{$summons['complainant_fullname']}}</td>
                                       <td>{{$summons['defendant_fullname']}}</td>
                                       <td>{{$summons['case_status']}}</td>
                                       <td>{{$summons['case_date']}}</td>
                                       <!-- <td><a href="{{URL::Route('summonPrint', $summons['case_id'])}}"><button type="button" class="btn btn-success" name="issue" id="issue"> <span class="glyphicon glyphicon-file"></span> Reprint Summon Letter</button></a></td> -->
                                       <td><button type="button" class="btn btn-success" name="issue" id="issue" data-toggle="modal" data-target="#myModal{{$summons['case_id']}}"> <span class="glyphicon glyphicon-file"></span> Print Letter of File Action</button></td>
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
        @foreach($summon as $summons)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{$summons['case_id']}}" role="dialog">
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
                            <div class="tab-pane fade in active" id="info{{$summons['case_id']}}">
                                <div class="card-box">
                                <h3>{{$summons['case_title']}}</h3>
                                <h4><center>Case Number: {{$summons->case_id}}</center></h4>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Complainant</label>
                                            <input type="text" name="cname" class="form-control" id="cname" value="{{$summons['complainant_fullname']}}" readonly="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Defendant</label>
                                            <input type="text" name="dname" class="form-control" id="dname" value="{{$summons['defendant_fullname']}}" readonly="">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>Reasons:</label>
                                            <div class="col-md-12">
                                              <div class="radio">
                                                  <input type="radio" value="Obey summons or to appear for hearing" name="reasons" id="option1" required>
                                                  <label for="option1" class="control-label">Obey summons or to appear for hearing</label>
                                              </div>
                                              <div class="radio">
                                                  <input type="radio" value="No settlement/conciliation was reached" name="reasons" id="option2">
                                                  <label for="option2" class="control-label">No settlement/conciliation was reached</label>
                                              </div>
                                               <div class="radio">
                                                  <input type="radio" value="Settlement has been repudiated" name="reasons" id="option3">
                                                  <label for="option3" class="control-label">Settlement has been repudiated</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- /.panel-body -->
                  <!-- /.panel -->
                </div>
                <div id="printableArea{{$summons['case_id']}}" hidden style="position: absolute;">
                    <img src="../assets/images/fileaction.jpg" style="height: 11in; width: 8.5in;">
                    <p style="position:absolute; left:28%; top:41.5%;">{{$summons['complainant_fullname']}}</p>
                    <p style="position:absolute; left:28%; top:44.5%;">{{$summons['defendant_fullname']}}</p>
                    <p style="position:absolute; left:20%; top:16%;">{{$summons['complainant_fullname']}}</p>
                    <p style="position:absolute; left:20%; top:25%;">{{$summons['defendant_fullname']}}</p>
                    <?php
                    $date1 = date("d");
                    $date2 = date("F");
                    $date3 = date("Y") - 2000;
                    echo '<p style="position:absolute; left:13%; top:63%;">'.$date1.'</p>';
                    echo '<p style="position:absolute; left:30%; top:63%;">'.$date2.'</p>';
                    echo '<p style="position:absolute; left:47.7%; top:63%;">'.$date3.'</p>';
                    ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" onclick="printDiv('printableArea{{$summons['case_id']}}')"><span class="glyphicon glyphicon-print"></span> Print</button>
                </div>
              </div>
            </div>
        </div>
        @endforeach 
    </div>
    <!-- /#wrapper -->

    
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).ready(function() {
            var t = $('#summon').DataTable({
                responsive: true,
                "columnDefs": [
                    { 
                      "sortable" : false, 
                      "searchable": false,
                      "targets": [0,7]
                    }
                ],
                searchHighlight: true,
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
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            // history.go(0); 
            document.body.innerHTML = oldPage;
            window.location.reload();

          
        }
        
    </script>

</body>

</html>
