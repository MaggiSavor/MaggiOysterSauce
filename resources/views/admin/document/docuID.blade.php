<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Barangay ID</title>

    

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
                    <h1 class="page-header">Barangay ID</h1>
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
                                       <th>Name</th>
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
                                            <div class="col-md-12">
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">ID No.</label>
                                                    <input type="text" name="idNo" class="form-control" id="title" value="{{$res['id']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="name" class="form-control" id="title" value="{{$res['fullname']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" name="bday" class="form-control" id="cname" value="{{$res['birthdate']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" name="address" class="form-control" id="dname" value="{{$res['house_no']}} {{$res['street']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Place of Birth</label>
                                                    <input type="text" name="place" class="form-control place1" id="place" placeholder="Place of Birth" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Blood Type</label>
                                                    <input type="text" name="bloodType" class="form-control blood1" id="blood" placeholder="Blood Type" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Height</label>
                                                    <input type="text" name="height" class="form-control height1" id="cname" placeholder="Height" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Weight</label>
                                                    <input type="text" name="weight" class="form-control weight" id="dname" placeholder="Weight" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Status</label>
                                                    <input type="text" name="status" class="form-control" id="title" value="{{$res['status']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Occupation</label>
                                                    <input type="text" name="occupation" class="form-control" id="title" value="{{$res['occupation']}}" readonly="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Tin No.</label>
                                                    <input type="text" name="tin" class="form-control tin" id="cname" placeholder="Tin No." required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Contact</label>
                                                    <input type="text" name="contact" class="form-control contact" id="dname" placeholder="Contact" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>In case of emergency</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="ename" class="form-control name1" onchange="getAdd(this)" id="cname" placeholder="Name" list="resident" autocomplete="off" required="">
                                                </div>
                                                <datalist id="resident">
                                                    @foreach($resi as $resident)
                                                      <option>{{$resident['fullname']}}</option>
                                                    @endforeach
                                                </datalist>
                                                <div class='form-group col-md-6'>
                                                      <label class='col-lg-12 control-label' for='relation'>Relation</label>
                                                      <div class='col-lg-12'>
                                                        <select class="form-control rel" name="relation" id="relation" required="">
                                                            <option value="Guardian">Guardian</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Mother">Mother</option>
                                                            <option value="Sibling">Sibling</option>
                                                            <option value="Relatives">Relatives</option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" name="eaddress" class="form-control add" id="address" placeholder="Address" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                <label>Contact:</label>
                                                    <div class="col-md-12">
                                                        <label class="radio">
                                                            <input type="radio" name="contact1" id="mob" class="mob" value="mobile">Mobile
                                                        </label>
                                                            <input type="text" name="mobile" class="form-control mobile" id="mobile" placeholder="(+63)" minlength="10" maxlength="10" required="">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="radio">
                                                            <input type="radio" name="contact1" id="tel" class="tel" value="telephone">Telephone
                                                        </label>
                                                            <input type="text" name="telephone" class="form-control telephone" id="telephone" placeholder="(2)" minlength="7" maxlength="7" required="">
                                                            <input type="hidden" name="dexp" class="dexp" id="exp{{$res['id']}}">
                                                    </div>
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
                    <img src="../assets/images/barangayID.jpg" style="height: 11in; width: 8.5in;">
                    <p style="position:absolute; left:23%; top:49%; font-size:38px;">{{$res['id']}}</p>
                    <p style="position:absolute; left:6%; top:61%; font-size:28px;">{{$res['fullname']}}</p>
                    <p style="position:absolute; left:14%; top:65%; font-size:28px;">{{$res['house_no']}} {{$res['street']}}</p>
                    
                    <p style="position:absolute; left:63%; top:84%; font-size:22px;">{{$chairman['fullname']}}</p>
                    
                    <p style="position:absolute; left:66%; top:3%; font-size:22px;" class="tin1"></p>
                    <p style="position:absolute; left:70%; top:9%; font-size:22px;">{{$res['birthdate']}}</p>
                    <p style="position:absolute; left:70%; top:14%; font-size:22px;" class="place">place</p>
                    <p style="position:absolute; left:66%; top:19%; font-size:22px;" class="blood"></p>
                    <p style="position:absolute; left:61%; top:23%; font-size:22px;" class="height"></p>
                    <p style="position:absolute; left:83%; top:23%; font-size:22px;" class="weight1"></p>
                    <p style="position:absolute; left:63%; top:29%; font-size:22px;">{{$res['status']}}</p>
                    <p style="position:absolute; left:67%; top:33.5%; font-size:22px;">{{$res['occupation']}}</p>
                    <p style="position:absolute; left:69%; top:39%; font-size:22px;" class="contact1"></p>
                    <p style="position:absolute; left:62%; top:54%; font-size:22px;" class="ename1"></p>
                    <p style="position:absolute; left:65%; top:59.5%; font-size:22px;" class="rel1"></p>
                    <p style="position:absolute; left:65%; top:65%; font-size:22px;" class="add1"></p>
                    <p style="position:absolute; left:67%; top:70%; font-size:22px;" class="econtact"></p>
                    <p style="position:absolute; left:55%; top:74%; font-size:22px;" class="expired">VALID UNTIL: </p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".mobile").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                     // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         // let it happen, don't do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            $(".telephone").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                     // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                     // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         // let it happen, don't do anything
                         return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        function getAdd(name){
          var nam = name.value;
            $.ajax({
              method: 'GET',
              url: '{{ URL::route("getAdd")}}',
              data:{
                'name' : nam
              },
              success:function(data)
              {
                  $('#address').val(data['house_no']+' '+data['street']);
              }
          })
        }
    </script>
    <script type="text/javascript">
    $('.cj').click(function(){
        var id = $(this).val();
        var expired = $('#exp'+id).val();
        $('.expired').html('VALID UNTIL: '+expired);
    })
    $('.place1').on('keyup',function(){
            $('.place').html( $(this).val());
    });
    $('.blood1').on('keyup',function(){
            $('.blood').html( $(this).val());
    });
    $('.height1').on('keyup',function(){
            $('.height').html( $(this).val());
    });
    $('.weight').on('keyup',function(){
            $('.weight1').html( $(this).val());
    });
    $('.tin').on('keyup',function(){
            $('.tin1').html( $(this).val());
    });
    $('.contact').on('keyup',function(){
            $('.contact1').html( $(this).val());
    });
    $('.name1').on('keyup',function(){
            $('.ename1').html( $(this).val());
    });
    $('.add').on('keyup',function(){
            $('.add1').html( $(this).val());
    });
    $('.rel').on('keyup change',function(){
            $('.rel1').html( $(this).val());
    });
    $('.mobile').on('keyup',function(){
            $('.econtact').html( $(this).val());
    });
    $('.telephone').on('keyup',function(){
            $('.econtact').html( $(this).val());
    });
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
    <script>
    $(document).ready(function(){
        var mydateStart = new Date();
        var monthStart = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"][mydateStart.getMonth()];
        var start = monthStart + ' ' + mydateStart.getDate() + ', ' + (mydateStart.getFullYear() + 1);
        
        $('.dexp').val(start);

    })
    </script>
    <script>
        $(document).ready(function() {
            $('.mobile').hide();
            $('.telephone').hide();

            $("input:radio[name=contact1]").click(function() {
                var value = $(this).val();

                if(value == "mobile"){
                    $('.mobile').show();
                    $('.telephone').hide();
                    $('.mobile').attr('required', true);
                    $('.telephone').removeAttr('required');
                }else{
                    $('.mobile').hide();
                    $('.telephone').show();
                    $('.telephone').attr('required', true);
                    $('.mobile').removeAttr('required');
                }
            })

            $('.cancel').click(function(){
                $('.place1').val("");
                $('.blood1').val("");
                $('.height1').val("");
                $('.weight').val("");
                $('.tin').val("");
                $('.contact').val("");
                $('.name1').val("");
                $('.rel').val("Guardian");
                $('.add').val("");
                $('.mobile').val("");
                $('.telephone').val("");
                $('.mobile').hide();
                $('.telephone').hide();
                $('.mob').prop("checked", false);
                $('.tel').prop("checked", false);
            })

        })
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
                 url: "{{URL::Route('addGoodMoral')}}",
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
