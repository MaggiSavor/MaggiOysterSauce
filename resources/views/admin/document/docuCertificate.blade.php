<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Barangay Certificate</title>

    

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
                    <h1 class="page-header">Barangay Certificate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Residents Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="residentsTable">
                                <thead>
                                    <tr>
                                       <th></th>
                                       <th>Resident ID</th>
                                       <th id="sample">Name</th>
                                       <th>Address</th>
                                       <th>Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    @foreach($residentLists as $residentList)
                                    <tr>
                                       <td></td>
                                       <td>{{$residentList->id}}</td>
                                       <td>{{$residentList->fullname}}</td>
                                       <td>{{$residentList['house_no']}} {{$residentList['street']}} Tondo, Manila</td>
                                       <!-- <td><a href="{{URL::Route('certPrint', $residentList['id'])}}"><button type="button" class="btn btn-success" name="issue" id="issue"> <span class="glyphicon glyphicon-file"></span> Issue Certificate</button></a></td> -->
                                       <td><button type="button" class="btn btn-success cj" name="issue" id="issue" data-toggle="modal" data-target="#myModal{{$residentList['id']}}" value="{{$residentList['id']}}"> <span class="glyphicon glyphicon-file"></span> Issue Certificate</button></td>
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
        @foreach($residentLists as $res)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{$res['id']}}" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Details</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="tab-pane fade in active" id="info{{$res['id']}}">
                                <form id="cert{{$res['id']}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                            <h4><center>Resident Number: {{$res->id}}</center></h4>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="title" value="{{$res['fullname']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Age</label>
                                                    <input type="text" name="age" class="form-control resAge" id="resAge{{$res['id']}}" value="<?php $birthDate = explode("-", $res['birthdate']); $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[0], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));echo $age;?>" readonly="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Status</label>
                                                    <input type="text" name="status" class="form-control" id="cname" value="{{$res['status']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" name="address" class="form-control" id="dname" value="{{$res['house_no']}} {{$res['street']}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Reasons:</label>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option1" required="">Application for employment
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option2">School Requirement
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option3">Hospital/Medical Purposes
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option4">Processing of Calamity
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option5">Travel Abroad
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option6">Transfer of Residency
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option7">SSS/GSIS/PAGIBIG/PHILHEALTH Req.
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option8">NBI/POLICE Clearance
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option9">TIN/BIR Requirement
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option10">DSWD Requirement
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="reason" value="Option11">Bank Transaction
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="idFor" value="Option12">ID For
                                                        <input type="text" name="idFor" class="form-control id" id="id{{$res['id']}}" required="" placeholder="ID for">
                                                    </label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="reasons" class="others" value="Option13">Others
                                                        <input type="text" name="others" class="form-control other" id="other{{$res['id']}}" required="" placeholder="Others">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <!-- /.panel-body -->
                  <!-- /.panel -->
                </div>
                <div id="printableArea{{$res['id']}}" hidden style="position: absolute;">
                    <img src="../assets/images/cert.jpg" style="height: 11in; width: 8.5in;">
                    <p style="position:absolute; left:41%; top:30%;">{{$res['fullname']}}</p>
                    <p style="position:absolute; left:80%; top:30%; " class="age"></p>
                    <p style="position:absolute; left:15%; top:31.8%; ">{{$res['status']}}</p>
                    <p style="position:absolute; left:41%; top:33.8%; ">{{$res['house_no']}} {{$res['street']}}, Tondo, Manila</p>
                    <p style="position:absolute; left:8.7%; top:47.4%;" class="radio"><b></b></p>
                    <p style="position:absolute; left:22%; top:64%;" class="reasonss"></p>
                    <p style="position:absolute; left:65%; top:61%;" class="reasonsID"></p>
                    <p style="position:absolute; left:64%; top:81%;">{{$chairman['fullname']}}</p>
                    <?php
                    $date1 = date("d");
                    $date2 = date("F");
                    $date3 = date("Y") - 2000;
                    echo '<p style="position:absolute; left:79%; top:71.3%;">'.$date1.'</p>
                        <p style="position:absolute; left:11.7%; top:73%;">'.$date2.'</p>
                        <p style="position:absolute; left:33%; top:73%;">'.$date3.'</p>';
                    ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="print" class="btn btn-danger print" value="{{$res['id']}}"><span class="glyphicon glyphicon-print" ></span> Print</button>
                </div>
              </div>
            </div>
        </div>
        @endforeach 
    </div>
    <!-- /#wrapper -->

    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
         
    $('.cj').click(function(){
        var id = $(this).val();
        var age = $('#resAge'+id).val();
        $('.age').html(age);
    })
    $('.id').on('keyup',function(){
            $('.reasonsID').html( $(this).val());
    });
    $('.other').on('keyup',function(){
            $('.reasonss').html( $(this).val());
    });

    $("input:radio[name=reasons]").click(function() {
        var reason = $(this).val();
        $('.radio').html(reason);
        var check = '(&#x2713)';
        

        if(reason == "Option1"){
            $('.radio').css({"left": "8.7%", "top": "47%"});
            $('.radio').html(check);
        }else if(reason == "Option2"){
            $('.radio').css({"left": "52.3%", "top": "47%"});
            $('.radio').html(check);
        }else if(reason == "Option3"){
            $('.radio').css({"left": "8.7%", "top": "49.8%"});
            $('.radio').html(check);
        }else if(reason == "Option4"){
            $('.radio').css({"left": "52.3%", "top": "49.8%"});
            $('.radio').html(check);
        }else if(reason == "Option5"){
            $('.radio').css({"left": "8.7%", "top": "52.7%"});
            $('.radio').html(check);
        }else if(reason == "Option6"){
            $('.radio').css({"left": "52.3%", "top": "52.7%"});
            $('.radio').html(check);
        }else if(reason == "Option7"){
            $('.radio').css({"left": "8.7%", "top": "55.4%"});
            $('.radio').html(check);
        }else if(reason == "Option8"){
            $('.radio').css({"left": "52.3%", "top": "55.4%"});
            $('.radio').html(check);
        }else if(reason == "Option9"){
            $('.radio').css({"left": "8.7%", "top": "58.1%"});
            $('.radio').html(check);
        }else if(reason == "Option10"){
            $('.radio').css({"left": "52.3%", "top": "58.1%"});
            $('.radio').html(check);
        }else if(reason == "Option11"){
            $('.radio').css({"left": "8.7%", "top": "60.8%"});
            $('.radio').html(check);
        }else if(reason == "Option12"){
            $('.radio').css({"left": "52.3%", "top": "60.8%"});
            $('.radio').html(check);
        }else if(reason == "Option13"){
            $('.radio').css({"left": "8.7%", "top": "63.5%"});
            $('.radio').html(check);
        }
    })

    $('.cancel').click(function(){
        $('.reason').html("");
        $('.idFor').html("");
        $('.others').html("");
        $('.other').val("");
        $('.id').val("");
        $('.id').hide();
        $('.other').hide();
        $('.reason').prop("checked", false);
        $('.idFor').prop("checked", false);
        $('.others').prop("checked", false);
    })

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.id').hide();
            $('.other').hide();

            $("input:radio[name=reasons]").click(function() {
                var value = $(this).val();

                if(value == "Option12"){
                    $('.id').show();
                    $('.other').hide();
                    $('.id').attr('required', true);
                    $('.other').removeAttr('required');
                }else if(value == "Option13"){
                    $('.id').hide();
                    $('.other').show();
                    $('.other').attr('required', true);
                    $('.id').removeAttr('required');
                }else{
                    $('.id').hide();
                    $('.other').hide();
                    $('.id').removeAttr('required');
                    $('.other').removeAttr('required');
                }
            })
        })
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).ready(function() {
            var t = $('#residentsTable').DataTable({
                responsive: true,
                "columnDefs": [
                    { 
                      "sortable" : false, 
                      "searchable": false,
                      "targets": [0,4]
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
        var oldPage = document.body.innerHTML;
        $('.print').focus(function(e){
           var certID = $(this).val();
           // e.preventDefault();
           swal({
             title: "Are you sure?",
               text: "Once you click yes, it will be saved in the database even if you cancel printing.",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Yes",
               closeOnConfirm: false,
               closeOnCancel: false
           },
           function(isConfirm){
             var cert = $("#cert"+certID);
             var dataString = cert.serialize();
             if(isConfirm){
               $.ajax({
                 method: 'POST',
                 url: "{{URL::Route('addCert')}}",
                 headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                 dataType: 'JSON',
                 processData : false,
                 data: dataString,
                 success: function(data){
                    if(data.success == "Successfully Saved!"){
                        window.location.reload();
                        swal("Saved!", "New case has been saved!", "success");
                    }

                 },error: function(data){
                    window.location.reload();
                    swal("Something went wrong!");
                 }
               });
               //Get the HTML of div
               var divElements = document.getElementById('printableArea'+certID).innerHTML;
               //Reset the page's HTML with div's HTML only
               document.body.innerHTML = 
                 "<html><head><title></title></head><body>" + 
                 divElements + "</body>";

               //Print Page
               window.print();

               //Restore orignal HTML
               // history.go(0); 
               // document.body.innerHTML = oldPage;
               
             }
             else {
               swal("Cancelled", "", "error");
             }
           });


        })
    </script>

</body>

</html>
