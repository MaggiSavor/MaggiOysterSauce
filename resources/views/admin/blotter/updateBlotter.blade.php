<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Update Blotter</title>

    

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
                    <h1 class="page-header">Update Blotter</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                       <div class="panel-heading">
                            Blotter Information
                       </div>
                       <!-- /.panel-heading -->
                       <div class="panel-body">
                           <form id="post_form" class="form-horizontal" method="post">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <div class="form-group col-sm-12">
                                   <label for="case_id" class="col-sm-2 col-sm-offset-2 control-label">Case ID:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="case_id" id="case_id" placeholder="1" value="{{$update->case_id}}" readonly>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label for="case_title" class="col-sm-2 col-sm-offset-2 control-label">Case Title:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="case_title" name="case_title" placeholder="Case Title" value="{{$update->case_title}}" readonly>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-12">
                                    <label for="case_type" class="col-sm-2 col-sm-offset-2 control-label">Case Type:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="case_type" id="case_type" placeholder="Case Type" value="{{$update->case_type}}" readonly>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-12">  
                                   <label for="inputCName" class="col-sm-2 col-sm-offset-2 control-label">Complainant:</label>
                                       <div class="col-sm-6">
                                         <input type="text" name="cname" class="form-control" id="inputCName" name="inputCName" value="{{$update->complainant_fullname}}" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group col-sm-12">  
                                   <label for="inputCAddress" class="col-sm-2 col-sm-offset-2 control-label">Complainant Address:</label>
                                       <div class="col-sm-6">
                                         <input type="text" id="InputCaddress" name="caddress" class="form-control" value="{{$update->complainant_address}}" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group col-sm-12">  
                                   <label for="inputDNmae" class="col-sm-2 col-sm-offset-2 control-label">Defendant:</label>
                                       <div class="col-sm-6">
                                         <input type="text" name="dname" class="form-control" id="inputDName" value="{{$update->defendant_fullname}}" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group col-sm-12">  
                                    <label for="inputDAddress" class="col-sm-2 col-sm-offset-2 control-label">Defendant Address:</label>
                                       <div class="col-sm-6">
                                         <input type="text" name="daddress" class="form-control" value="{{$update->defendant_address}}" id="inputDAddress" readonly>
                                       </div>
                                 </div>
                                 <div class="form-group col-sm-12">  
                                    <label for="status" class="col-sm-2 col-sm-offset-2 control-label">Current Status:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="curstatus" class="form-control" id="curstatus" value="{{$update->case_status}}" readonly>
                                    </div>
                                 </div>
                                <!-- <div id="agree" class="form-group col-sm-12" style="display: none;">  
                                    <label for="inputDesc" class="col-sm-3 col-sm-offset-1 control-label">Agreement:</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" name="desc" placeholder="Brief Description"></textarea>
                                    </div>  
                                </div> -->

                                <div class="form-group col-sm-12">  
                                    <label for="inputStatus" class="col-sm-3 col-sm-offset-1 control-label">Case Status:</label>
                                    <div class="col-sm-6">
                                        <select id="stat" name="casestatus" class="form-control" onchange="status()" required>
                                            <option id="0" value="" >-- Select Case Status --</option>
                                            <option id="1">1st Cycle</option>
                                            <option id="2">2nd Cycle</option>
                                            <option id="3">3rd Cycle</option>
                                            <option id="4">4th Cycle</option>
                                            <option id="5">5th Cycle</option>
                                            <option id="6">6th Cycle</option>
                                            <option>Turn over</option>
                                            <option>Case Closed</option>
                                            <option>Transferred</option>
                                            <option>Dismissed</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="sdate" class="form-group col-sm-12" style="display: none;">  
                                    <label for="inputDate" class="col-sm-3 col-sm-offset-1 control-label">Summon Date:</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="inputDate" name="summondate">
                                    </div>
                                </div>
                                <div id="stime" class="form-group col-sm-12" style="display: none;">
                                    <label for="inputTime" class="col-sm-3 col-sm-offset-1 control-label">Time:</label>
                                    <div class="col-sm-6">
                                        <input type="time" class="form-control" id="inputTime" name="summontime" >
                                    </div>
                                </div>
                                <div class="form-group col-sm-12"" id="options" style="display: none;">
                                    <label for="inputStatus" class="col-sm-3 col-sm-offset-1 control-label">Select Reason:</label>
                                    <div class="col-sm-6">
                                    <select id="reason" name="reason" class="form-control reason" >
                                                <option value="option1">Obey summons or to appear for hearing</option>
                                                <option value="option2">No settlement/conciliation was reached</option>
                                                <option value="option3">Settlement has been repudiated</option>
                                    </select>
                                    </div>
                                   
                                </div>
                                 <br>
                                <button id="button1" type="submit" name="update" class="btn btn-primary btn-small btn pull-right" style="display:none"><span class = "glyphicon oglyphicon-pencil"></span>Update</button>
                
                                <button id="button2" type="submit" name="printsl" class="btn btn-primary btn-small btn pull-right" style="display:none"><span class = "glyphicon oglyphicon-pencil"></span>Summon Letter</button>

                                <button id="button3" type="submit" name="printfal" class="btn btn-primary btn-small btn pull-right" style="display:none"><span class = "glyphicon oglyphicon-pencil"></span>File Action Letter</button>
                           </form> 
                       </div>
                       <!-- /.panel-body -->
                   </div>
                   <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <div id="printableArea" hidden style="position: absolute;">
        <img src="../assets/images/blotter.jpg" style="height: 11in; width: 8.5in;">
        
        <p style="position:absolute; left:7%; top:16.7%;">{{$update['complainant_fullname']}}</p>
        <p style="position:absolute; left:11%; top:29.6%;">{{$update['defendant_fullname']}}</p>
        <p style="position:absolute; left:75.4%; top:16.9%;">{{$update['case_id']}}</p>
        <p style="position:absolute; left:66.6%; top:19%;">{{$update['case_title']}}</p>
        <p style="position:absolute; left:12%; top:40.4%;">{{$update['summon_date']}} at {{$update['summon_time']}}</p>
        <?php
        $date = date("F j, Y");
        echo '<p style="position:absolute; left:24%; top:66%;">'.$date.'</p>';
        ?>
    </div>
    <div id="printableArea2" hidden style="position: absolute;">
       <img src="../assets/images/fileaction.jpg" style="height: 11in; width: 8.5in;">
         <p style="position:absolute; left:30%; top:41.5%;">{{$update['complainant_fullname']}}</p>
         <p style="position:absolute; left:30%; top:44.5%;">{{$update['defendant_fullname']}}</p>
         <p style="position:absolute; left:20%; top:16%;">{{$update['complainant_fullname']}}</p>
         <p style="position:absolute; left:20%; top:25%;">{{$update['defendant_fullname']}}</p>
         <p style="position:absolute; left:11%; top:50%;">{{$update['defendant_fullname']}}</p>
         <p style="position:absolute; left:20%; top:25%;" class="radios"></p>
         <?php
           $date1 = date("d");
           $date2 = date("F");
           $date3 = date("Y") - 2000;
           echo '<p style="position:absolute; left:13%; top:64.2%;">'.$date1.'</p>';
           echo '<p style="position:absolute; left:30%; top:64.2%;">'.$date2.'</p>';
           echo '<p style="position:absolute; left:47.5%; top:64.2%;">'.$date3.'</p>';
           $failed = 'option1';
           if ($failed == 'option1') {
           echo '<p style="position:absolute; left:11%; top:50%;">&#10004;</p>';
           }
           elseif ($failed == 'option2') {
           echo'<p style="position:absolute; left:11%; top:53%;">&#10004;</p>';
           }
           elseif ($failed == 'option3') {
           echo '<p style="position:absolute; left:11%; top:56%;">&#10004;</p>';
           }
         ?>
    </div>

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script type="text/javascript">
        $('#button3').on('click',function(){
            
        });
    </script>
    <script>
      $(".reason").click(function() {
        var reason = $(this).val();
        $('.radios').html(reason);
        var check = '(&#x2713)';
        alert(reason)
        if(reason == "Option1"){
            $('.radios').css({"left": "11%", "top": "49%"});
            $('.radios').html(check);
        }else if(reason == "Option2"){
            $('.radios').css({"left": "11%", "top": "52%"});
            $('.radios').html(check);
        }else if(reason == "Option3"){
            $('.radios').css({"left": "11%", "top": "55%"});
            $('.radios').html(check);
        }
    })
    </script>
    <script type="text/javascript">
        var curstatus = document.getElementById("curstatus").value;
        switch(curstatus){
        case "1st Cycle":
        document.getElementById("3").disabled = true;
        document.getElementById("4").disabled = true;
        document.getElementById("5").disabled = true;
        document.getElementById("6").disabled = true;
        case "2nd Cycle":
        document.getElementById("1").disabled = true;
        document.getElementById("4").disabled = true;
        document.getElementById("5").disabled = true;
        document.getElementById("6").disabled = true;
        break;
        case "3rd Cycle":
        document.getElementById("1").disabled = true;
        document.getElementById("2").disabled = true;
        document.getElementById("5").disabled = true;
        document.getElementById("6").disabled = true;
        break;
        case "4th Cycle":
        document.getElementById("1").disabled = true;
        document.getElementById("2").disabled = true;
        document.getElementById("3").disabled = true;
        document.getElementById("6").disabled = true;
        break;
        case "5th Cycle":
        document.getElementById("1").disabled = true;
        document.getElementById("2").disabled = true;
        document.getElementById("3").disabled = true;
        document.getElementById("4").disabled = true;
        break;
        case "6th Cycle":
        document.getElementById("1").disabled = true;
        document.getElementById("2").disabled = true;
        document.getElementById("3").disabled = true;
        document.getElementById("4").disabled = true;
        document.getElementById("5").disabled = true;
        break;
        case "On-going":
        document.getElementById("2").disabled = true;
        document.getElementById("3").disabled = true;
        document.getElementById("4").disabled = true;
        document.getElementById("5").disabled = true;
        document.getElementById("6").disabled = true;
        break;
    }
    </script>
    <script>
        function status() {
      
        var stat = document.getElementById("stat").value;
        
            switch(stat){
                case "1st Cycle":
                document.getElementById('sdate').style.display='block';
                document.getElementById('stime').style.display='block';
                document.getElementById('button2').style.display='block';
                document.getElementById('button1').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "2nd Cycle":
                document.getElementById('sdate').style.display='block';
                document.getElementById('stime').style.display='block';
                document.getElementById('button2').style.display='block';
                document.getElementById('button1').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "3rd Cycle":
                document.getElementById('sdate').style.display='block';
                document.getElementById('stime').style.display='block';
                document.getElementById('button2').style.display='block';
                document.getElementById('button1').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "4th Cycle":
                document.getElementById('sdate').style.display='block';
                document.getElementById('stime').style.display='block';
                document.getElementById('button2').style.display='block';
                document.getElementById('button1').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "5th Cycle":
                document.getElementById('sdate').style.display='block';
                document.getElementById('stime').style.display='block';
                document.getElementById('button2').style.display='block';
                document.getElementById('button1').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "6th Cycle":
                document.getElementById('sdate').style.display='block';
                document.getElementById('stime').style.display='block';
                document.getElementById('button2').style.display='block';
                document.getElementById('button1').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "Turn over":
                document.getElementById('sdate').style.display='none';
                document.getElementById('stime').style.display='none';
                document.getElementById('button1').style.display='block';
                document.getElementById('button2').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "Case Closed":
                document.getElementById('sdate').style.display='none';
                document.getElementById('stime').style.display='none';
                document.getElementById('button1').style.display='block';
                document.getElementById('button2').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                break;
                case "Transferred":
                document.getElementById('sdate').style.display='none';
                document.getElementById('stime').style.display='none';
                document.getElementById('button1').style.display='none';
                document.getElementById('button2').style.display='none';
                document.getElementById('button3').style.display='block';
                document.getElementById('options').style.display='block';
                document.getElementById('agree').style.display='none';
                break;
                case "Dismissed":
                document.getElementById('sdate').style.display='none';
                document.getElementById('stime').style.display='none';
                document.getElementById('button1').style.display='block';
                document.getElementById('button2').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
                case "":
                document.getElementById('sdate').style.display='none';
                document.getElementById('stime').style.display='none';
                document.getElementById('button3').style.display='none';
                document.getElementById('button2').style.display='none';
                document.getElementById('button1').style.display='none';
                document.getElementById('options').style.display='none';
                document.getElementById('agree').style.display='none';
                break;
            }
        }
      </script>
      <script type="text/javascript">
          var oldPage = document.body.innerHTML;
          $('#button2').focus(function(e){
             // e.preventDefault();
             swal({
               title: "Are you sure?",
                 text: "You are about to update a record.",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Yes",
                 closeOnConfirm: false,
                 closeOnCancel: false
             },
             function(isConfirm){
               var transfer = $("#post_form");
               var dataString = transfer.serialize();
               if(isConfirm){
                 $.ajax({
                   method: 'POST',
                   url: "{{URL::Route('editBlotter', $update['id'])}}",
                   headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                   dataType: 'JSON',
                   processData : false,
                   data: dataString,
                   success: function(data){
                      if(data.success == "Successfully Saved!"){
                          var divElements = document.getElementById('printableArea').innerHTML;
                          //Reset the page's HTML with div's HTML only
                          document.body.innerHTML = 
                            "<html><head><title></title></head><body>" + 
                            divElements + "</body>";

                          //Print Page
                          window.print();

                          window.location.reload();
                          swal("Saved!", "New case has been saved!", "success");
                      }

                   },error: function(data){
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
          $('#button1').focus(function(e){
             // e.preventDefault();
             swal({
               title: "Are you sure?",
                 text: "You are about to update a record.",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Yes",
                 closeOnConfirm: false,
                 closeOnCancel: false
             },
             function(isConfirm){
               var transfer = $("#post_form");
               var dataString = transfer.serialize();
               if(isConfirm){
                 $.ajax({
                   method: 'POST',
                   url: "{{URL::Route('editBlotter', $update['id'])}}",
                   headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                   dataType: 'JSON',
                   processData : false,
                   data: dataString,
                   success: function(data){
                      if(data.success == "Successfully Saved!"){
                         
                          swal("Saved!", "New case has been saved!", "success");
                      }

                   },error: function(data){
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
          $('#button3').focus(function(e){
             // e.preventDefault();
             swal({
               title: "Are you sure?",
                 text: "You are about to update a record.",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#DD6B55",
                 confirmButtonText: "Yes",
                 closeOnConfirm: false,
                 closeOnCancel: false
             },
             function(isConfirm){
               var transfer = $("#post_form");
               var dataString = transfer.serialize();
               if(isConfirm){
                 $.ajax({
                   method: 'POST',
                   url: "{{URL::Route('editBlotter', $update['id'])}}",
                   headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                   dataType: 'JSON',
                   processData : false,
                   data: dataString,
                   success: function(data){
                      if(data.success == "Successfully Saved!"){
                          var divElements = document.getElementById('printableArea2').innerHTML;
                          //Reset the page's HTML with div's HTML only
                          document.body.innerHTML = 
                            "<html><head><title></title></head><body>" + 
                            divElements + "</body>";

                          //Print Page
                          window.print();

                          window.location.reload();
                          swal("Saved!", "New case has been saved!", "success");
                      }

                   },error: function(data){
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
</body>

</html>
