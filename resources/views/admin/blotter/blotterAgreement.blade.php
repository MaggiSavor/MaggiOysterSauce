<?php
use App\Models\BarangayOfficial;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Agreement Letter</title>

    <style type="text/css">
        .page {
            width: 100%;
            height: 100%;
            min-width: 8.5in;
            min-height: 11in;
        }
    </style>

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
        

        <div id="page-wrapper" >
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agreement Letter</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Blotter List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="details">
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
                                       <td><button type="button" class="btn btn-success cj" name="issue" id="issue" data-toggle="modal" data-target="#myModal{{$summons['case_id']}}" value="{{$summons['case_id']}}"> <span class="glyphicon glyphicon-file"></span> Print Agreement Letter</button></td>
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
                                <form id="blotter{{$summons['case_id']}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="card-box">
                                        <h3>{{$summons['case_title']}}</h3>
                                        <h4><center>Case Number: {{$summons->case_id}}</center></h4>
                                        <div class="col-md-12" style="padding-top: 5%;">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Complainant Name</label>
                                                    <input type="text" name="cname" class="form-control" id="cname" value="{{$summons['complainant_fullname']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Defendant Name</label>
                                                    <input type="text" name="dname" class="form-control" id="dname" value="{{$summons['defendant_fullname']}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label">Agreement</label>
                                                    <textarea name="agreement" class="form-control agree" maxlength="300" id="agreement{{$summons['case_id']}}" style="height: 100px;"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="caseID" name="caseID" value="{{$summons['case_id']}}">
                                            <input type="hidden" name="title" value="{{$summons['case_title']}}">
                                            <input type="hidden" name="status" value="{{$summons['case_status']}}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <!-- /.panel-body -->
                  <!-- /.panel -->
                </div>
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="print" class="btn btn-danger print" value="{{$summons['case_id']}}"><span class="glyphicon glyphicon-print" ></span> Print</button>
                </div>
              </div>
            </div>
        </div>
        <div id="printableArea{{$summons['case_id']}}" hidden style="position: absolute; " >
            <img src="../assets/images/agreement.jpg"  class="page" >
            <p style="position:absolute; left:12%; top:23%;">{{$summons['complainant_fullname']}}</p>
            <p style="position:absolute; left:12%; top:29%;">{{$summons['defendant_fullname']}}</p>
            <p style="position:absolute; left:12%; top:56.5%;">{{$summons['complainant_fullname']}}</p>
            <p style="position:absolute; left:12%; top:63%;">{{$summons['defendant_fullname']}}</p>
            <p style="position:absolute; width:78%; left:13%; top:34%;" class="des"></p>
            <?php

            
                $date1 = date("d");
                $date2 = date("F");
                $date3 = date("Y") - 2000;
                echo '<p style="position:absolute; left:15%; top:74%;">'.$date1.'</p>';
                echo '<p style="position:absolute; left:33%; top:74%;">'.$date2.'</p>';
                echo '<p style="position:absolute; left:51.5%; top:74%;">'.$date3.'</p>';

            $chairman = BarangayOfficial::where('position', '=', 'chairman')
                    ->orderBy('term_year', 'desc')->first();
            ?>
            <p style="position:absolute; left:57%; top:78%;">{{$chairman}}</p>;
        </div>
        @endforeach 
    </div>
                <input type="hidden" id="idnumber">
    <!-- /#wrapper -->

    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
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

        $('.cj').on('click',function(){
            $('#idnumber').val( $(this).val());
        });


        $('.agree').on('keyup',function(){
            $('.des').html( $(this).val());
        });

    </script>
    <script type="text/javascript">

        var oldPage = document.body.innerHTML;
        $('.print').focus(function(e){
           var caseID = $(this).val();
           // e.preventDefault();
           swal({
             title: "Are you sure?",
               text: "Once you click yes, it will be saved even if you cancel printing.",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes",
               closeOnConfirm: false,
               closeOnCancel: false
           },
           function(isConfirm){
             var transfer = $("#blotter"+caseID);
             var dataString = transfer.serialize();
             if(isConfirm){
               $.ajax({
                 method: 'POST',
                 url: "{{URL::Route('blotterAgreementsPrint')}}",
                 headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                 dataType: 'JSON',
                 processData : false,
                 data: dataString,
                 success: function(data){
                    if(data.success == "Successfully Saved!"){
                        // window.location.reload();
                        swal("Saved!", "New case has been saved!", "success");
                    }

                 },error: function(data){
                    // window.location.reload();
                    swal("Something went wrong!");
                 }
               });

               //Get the HTML of div
               var divElements = document.getElementById('printableArea'+caseID).innerHTML;
               //Reset the page's HTML with div's HTML only
               document.body.innerHTML = 
                 "<html><head><title></title></head><body>" + 
                 divElements + "</body>";

               //Print Page
               window.print();

               //Restore orignal HTML
               // history.go(0); 
               // document.body.innerHTML = oldPage;
               window.location.reload();
             }
             else {
               swal("Cancelled", "", "error");
             }
           });


        })
    </script>

</body>

</html>
