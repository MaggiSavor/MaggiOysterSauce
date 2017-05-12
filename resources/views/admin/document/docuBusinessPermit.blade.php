<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Business Permit</title>

    

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
                    <h1 class="page-header">Business Permit</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <!-- /.row -->
           <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Business Permit Form
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                    <form method="post" id="bp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control neym" id="title" list="resident" autocomplete="off" required="">
                                </div>
                                <datalist id="resident">
                                    @foreach($res as $resident)
                                      <option>{{$resident['fullname']}}</option>
                                    @endforeach
                                </datalist>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Business Name</label>
                                    <input type="text" name="bname" class="form-control bn" id="title" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Kind of Business</label>
                                    <input type="text" name="bkind" class="form-control bk" id="cname" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Business Address</label>
                                    <input type="text" name="address" class="form-control ba" id="dname" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">OR Number</label>
                                    <input type="number" name="orNum" class="form-control" id="dname" required="">
                                </div>
                                    <input type="hidden" name="dateExpired" class="form-control exp" id="dexp">
                            </div>
                        </div> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pull-right">
                            <button id="print" type="submit" class="btn btn-danger print""><span class="glyphicon glyphicon-print"> </span> Print</button>
                        </div>  
                    </form>
                    </div>
                    <div id="printableArea" hidden style="position: absolute;">
                    <img src="../assets/images/bpermit.jpg" style="height: 11in; width: 8.5in;">
                    <p style="position:absolute; left:39%; top:31%;" class="name1"></p>
                    <p style="position:absolute; left:39%; top:33%;" class="bname1"><p>
                    <p style="position:absolute; left:39%; top:35%;" class="bkind1"></p>
                    <p style="position:absolute; left:39%; top:37%;" class="badd1"></p>
                    <p style="position:absolute; left:10%; top:26.5%;"><u>{{$chairman['fullname']}}</u><br>Barangay Chairman</p>
                    <p style="position:absolute; left:10%; top:33%;"><u>{{$kag1['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:39%;"><u>{{$kag2['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:45%;"><u>{{$kag3['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:52%;"><u>{{$kag4['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:58%;"><u>{{$kag5['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:64%;"><u>{{$kag6['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:70.5%;"><u>{{$kag7['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:77%;"><u>{{$sec['fullname']}}</u><br>Barangay Secretary</p>
                    <p style="position:absolute; left:10%; top:83%;"><u>{{$tre['fullname']}}</u><br>Barangay Treasurer</p>

                    <p style="position:absolute; left:50.5%; top:59.7%;" class="exp1"></p>

                    <?php
                    $date1 = date("d");
                    $date2 = date("F");
                    $date3 = date("Y") - 2000;
                    echo '<p style="position:absolute; left:48.8%; top:54%;">'.$date1.'</p>
                        <p style="position:absolute; left:62%; top:54%;">'.$date2.'</p>
                        <p style="position:absolute; left:74%; top:54%;">'.$date3.'</p>';
                    ?>
                </div>
                    <!-- /.panel-body -->
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Business Permit
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="residentsTable">
                                <thead>
                                    <tr>
                                       <th></th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Business Name</th>
                                       <th>Date Issued</th>
                                       <th>Date Expired</th>
                                       <th>Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    @foreach($permit as $permits)
                                    <tr>
                                       <td></td>
                                       <td>{{$permits['permit_id']}}</td>
                                       <td>{{$permits['name']}}</td>
                                       <td>{{$permits['business_name']}}</td>
                                       <td>{{$permits['date_issued']}}</td>
                                       <td>{{$permits['date_expired']}}</td>
                                       <td><button type="button" class="btn btn-success cj" name="issue" id="issue" data-toggle="modal" data-target="#myModal{{$permits['permit_id']}}" value="{{$permits['permit_id']}}"> <span class="glyphicon glyphicon-file"></span>  Renew</button></td>
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
        @foreach($permit as $permit)
        <!-- Modal -->
        <div class="modal fade" id="myModal{{$permit['permit_id']}}" role="dialog" data-keyboard="false" data-backdrop="static">
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
                            <div class="tab-pane fade in active" id="info{{$permit['permit_id']}}">
                                <form id="cert{{$permit['permit_id']}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="title" value="{{$permit['name']}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Business Name</label>
                                                    <input type="text" name="bname" class="form-control" id="title" value="{{$permit['business_name']}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Kind of Business</label>
                                                    <input type="text" name="bkind" class="form-control" id="cname" value="{{$permit['business_kind']}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Business Address</label>
                                                    <input type="text" name="address" class="form-control" id="dname" value="{{$permit['business_address']}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">OR Number</label>
                                                    <input type="number" name="orNum" class="form-control" id="dname">
                                                </div>
                                                <input type="hidden" name="dateExpired" class="form-control exp1" id="dexp1{{$permit['permit_id']}}">
                                            </div>
                                        </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                        <!-- /.panel-body -->
                  <!-- /.panel -->
                </div>
                <div id="printableArea1{{$permit['permit_id']}}" hidden style="position: absolute;">
                    <img src="../assets/images/bpermit.jpg" style="height: 11in; width: 8.5in;">
                    <p style="position:absolute; left:39%; top:31%;">{{$permit['name']}}</p>
                    <p style="position:absolute; left:39%; top:33%;">{{$permit['business_name']}}<p>
                    <p style="position:absolute; left:39%; top:35%;">{{$permit['business_kind']}}</p>
                    <p style="position:absolute; left:39%; top:37%;">{{$permit['business_address']}}</p>
                    <p style="position:absolute; left:10%; top:26.5%;"><u>{{$chairman['fullname']}}</u><br>Barangay Chairman</p>
                    <p style="position:absolute; left:10%; top:33%;"><u>{{$kag1['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:39%;"><u>{{$kag2['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:45%;"><u>{{$kag3['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:52%;"><u>{{$kag4['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:58%;"><u>{{$kag5['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:64%;"><u>{{$kag6['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:70.5%;"><u>{{$kag7['fullname']}}</u><br>Barangay Kagawad</p>
                    <p style="position:absolute; left:10%; top:77%;"><u>{{$sec['fullname']}}</u><br>Barangay Secretary</p>
                    <p style="position:absolute; left:10%; top:83%;"><u>{{$tre['fullname']}}</u><br>Barangay Treasurer</p>

                    <p style="position:absolute; left:50.5%; top:59.7%;" class="exp">'.$date_expired.'</p>

                    <?php
                    $date1 = date("d");
                    $date2 = date("F");
                    $date3 = date("Y") - 2000;
                    echo '<p style="position:absolute; left:48.8%; top:54%;">'.$date1.'</p>
                        <p style="position:absolute; left:62%; top:54%;">'.$date2.'</p>
                        <p style="position:absolute; left:74%; top:54%;">'.$date3.'</p>';
                    ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="print1" class="btn btn-danger print1" value="{{$permit['permit_id']}}"><span class="glyphicon glyphicon-print" ></span> Print</button>
                </div>
              </div>
            </div>
        </div>
        @endforeach 


    </div>
    <!-- /#wrapper -->
    
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.print').click(function(){
            var exp1 = $('#exp').val();
        $('.exp1').html(exp1);
        })
    })
    $('.cj').click(function(){
            var id = $(this).val();
            var exp = $('#dexp1'+id).val();
            $('.exp').html(exp);
    })
    $('.neym').on('keyup',function(){
            $('.name1').html( $(this).val());
    });
    $('.bn').on('keyup',function(){
            $('.bname1').html( $(this).val());
    });
    $('.bk').on('keyup',function(){
            $('.bkind1').html( $(this).val());
    });
    $('.ba').on('keyup',function(){
            $('.badd1').html( $(this).val());
    });
    $('.place1').on('keyup',function(){
            $('.place').html( $(this).val());
    });
    </script>
    <script>
    $(document).ready(function(){
        var mydateStart = new Date();
        var monthStart = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"][mydateStart.getMonth()];
        var start = monthStart + ' ' + mydateStart.getDate() + ', ' + (mydateStart.getFullYear() + 1);
        
        $('#dexp').val(start);

        var mydateStart1 = new Date();
        var monthStart1 = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"][mydateStart1.getMonth()];
        var start1 = monthStart1 + ' ' + mydateStart1.getDate() + ', ' + (mydateStart1.getFullYear() + 1);
        
        $('.exp1').val(start1);

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
             var bp = $("#bp");
             var dataString = bp.serialize();
             if(isConfirm){
               $.ajax({
                 method: 'POST',
                 url: "{{URL::Route('addBusinessPermit')}}",
                 headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                 dataType: 'JSON',
                 processData : false,
                 data: dataString,
                 success: function(data){
                    if(data.success == "Successfully Saved!"){
                        //Get the HTML of div
                        var divElements = document.getElementById('printableArea').innerHTML;
                        //Reset the page's HTML with div's HTML only
                        document.body.innerHTML = 
                          "<html><head><title></title></head><body>" + 
                          divElements + "</body>";

                        //Print Page
                        window.print();
                        window.location.reload();
                        swal("Saved!", "New case has been saved!", "success");
                    }else if(data.error == "OR Number Exists!"){
                                    swal("Error!", "OR number already exists!", "error");
                    }

                 },error: function(data){
                    // window.location.reload();
                    swal("Something went wrong!");
                 }
               });

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
    <script type="text/javascript">
        var oldPage = document.body.innerHTML;
        $('.print1').focus(function(e){
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
                 url: "{{URL::Route('addBusinessPermit')}}",
                 headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                 dataType: 'JSON',
                 processData : false,
                 data: dataString,
                 success: function(data){
                    if(data.success == "Successfully Saved!"){
                        //Get the HTML of div
                        var divElements = document.getElementById('printableArea1'+certID).innerHTML;
                        //Reset the page's HTML with div's HTML only
                        document.body.innerHTML = 
                          "<html><head><title></title></head><body>" + 
                          divElements + "</body>";

                        //Print Page
                        window.print();
                        window.location.reload();
                        swal("Saved!", "New case has been saved!", "success");
                        
                    }else if(data.error == "OR Number Exists!"){
                                    swal("Error!", "OR number already exists!", "error");
                    }

                 },error: function(data){
                    window.location.reload();
                    swal("Something went wrong!");
                 }
               });
               
             }
             else {
               swal("Cancelled", "", "error");
             }
           });


        })
    </script>


</body>

</html>
