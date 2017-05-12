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
        @include('standardUser.nav1')
        

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
                        Household Head
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
            <center><label>Household ID: {{$residentinfo['household_id']}}</label>
            <label>Family ID: {{$residentinfo['family_id']}}</label></center>
              <table class="table table-hover mails m-0 table table-actions-bar">
                <thead>
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

  

        </div> <!-- modal content -->
      </div> <!-- modal dialog -->
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
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
      
      $('.bday').change(function(){
          var Bdate =$('.bday').val();
          var Bday = +new Date(Bdate);
          //Q4A = Bdate + ". You are " + ~~ ((Date.now() - Bday) / (31557600000));
          age = ~~ ((Date.now() - Bday) / (31557600000));  
          var theBday = $('.resultBday');
          theBday.innerHTML = age;

          if(age >= 18){
              $('.voter').attr('hidden', false);
          }
          else if(age <18){
              $('.voter').attr('hidden', true);
          }
        })
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
    <script>
      $('.listmember').click(function(){
        var houseId = this.value;
        var resID = this.id;
        $.ajax({
            method: 'GET',
            url: '{{ URL::route("getFamily")}}',
            data:{
              'id' : houseId,
            },
            success:function(data)
            {
              var row = $('.row'+houseId ).find('tr');
              row.remove();

              for(i=0;i<data.length;i++){
                  $('.row'+houseId ).append('<tr><td></td><td><b>'+data[i]["lastname"]+' Family</b></td><td><a class="btn btn-default btn-md waves-effect waves-light m-b-30" id="seeMore'+data[i]["family_id"]+'" name="true" onclick="show('+data[i]["family_id"]+')">Show more</a>&nbsp;&nbsp;<a class="btn btn-default btn-md waves-effect waves-light m-b-30" id="moveFam'+data[i]["family_id"]+'" name="true" onclick="trans('+data[i]["family_id"]+','+resID+')" data-toggle="tooltip" title="Transfer to another household">Transfer Household</a>&nbsp;&nbsp;<a class="btn btn-default btn-md waves-effect waves-light m-b-30" id="other'+data[i]["family_id"]+'" name="true" onclick="other('+data[i]["family_id"]+')" data-toggle="tooltip" title="Transfer to another barangay">Transfer Address</a></td></tr>');
              }
               $('[data-toggle="tooltip"]').tooltip(); 
            }
        })
      })

      function show(id){
        if($('#seeMore'+id).attr('name') == 'true'){
          $('#moveFam'+id).text('Transfer Family');
          $('#moveFam'+id).attr('name','true');
          $('.container'+id).remove();
          $('#seeMore'+id).attr('name','false');
          $('#other'+id).text('Transfer Household');
          $('#other'+id).attr('name','true');
          $('.box'+id).remove();

          $('#seeMore'+id).text('Show less');
          var row = $('#seeMore'+id).closest('tr');
          $.ajax({
              method: 'GET',
              url: '{{ URL::route("getMembers")}}',
              data:{
                'id' : id,
              },
              success:function(data)
              {
                  for(i=0;i<data.length;i++){
                    row.after('<tr class="members'+id+'"><td></td><td>'+data[i]["firstname"]+' '+data[i]["middlename"]+' '+data[i]["lastname"]+'</td><td><a href="update_resident/'+data[i]["id"]+'" class="btn btn-default btn-md waves-effect waves-light m-b-30">Update</a></td></tr>');
                  }
              }
          })
        }
        else{
          $('#seeMore'+id).text('Show more');
          $('#seeMore'+id).attr('name','true');
          $('.members'+id).remove();
        }
      }
      function trans(id,id2){
        if($('#moveFam'+id).attr('name') == 'true'){
          $('#seeMore'+id).text('Show more');
          $('#seeMore'+id).attr('name','true');
          $('.members'+id).remove();
          $('#moveFam'+id).attr('name','false');
          $('#moveFam'+id).text('Cancel');
          $('#other'+id).text('Transfer Household');
          $('#other'+id).attr('name','true');
          $('.box'+id).remove();

          var houseID = $('#house'+id2).val();

          var row = $('#moveFam'+id).closest('tr');
          row.after('<tr class="container'+id+'"><td></td><td>Transfer to which household?</td><td><input type="text"  onchange="getname('+houseID+')" id="name'+houseID+'" placeholder="Input household head name"list="selectHouse">&nbsp;&nbsp;<a class="btn btn-default btn-md waves-effect waves-light m-b-30" data-toggle="tooltip" title="Transfer to an existing household!" onclick="transferExisting('+houseID+','+id+')">Transfer</a>&nbsp;&nbsp;<a class="btn btn-default btn-md waves-effect waves-light m-b-30" data-toggle="tooltip" onclick="transferNew('+id+')" title="Transfer to a new household!">New</a></td><td><b id="toChange'+houseID+'">Household ID:'+houseID+'</b></td></tr>');
          $('[data-toggle="tooltip"]').tooltip(); 
        }
        else{
          $('#moveFam'+id).text('Transfer Household');
          $('#moveFam'+id).attr('name','true');
          $('.container'+id).remove();
        }
      }

      function other(id){
        if($('#other'+id).attr('name') == 'true'){
          $('#seeMore'+id).text('Show more');
          $('#seeMore'+id).attr('name','true');
          $('.members'+id).remove();
          $('#moveFam'+id).text('Transfer Household');
          $('#moveFam'+id).attr('name','true');
          $('.container'+id).remove();
          $('#other'+id).attr('name','false');
          $('#other'+id).text('Cancel');


          var row = $('#other'+id).closest('tr');
          row.after('<tr class="box'+id+'"><td></td><td>Transfer to where?</td><td><input type="text" id="address'+id+'" placeholder="Input place/barangay">&nbsp;&nbsp;<a class="btn btn-default btn-md waves-effect waves-light m-b-30" data-toggle="tooltip" title="Transfer to this address!" onclick="transferAdd('+id+')">Transfer</a></td></tr>');
          $('[data-toggle="tooltip"]').tooltip();
        }
        else{
          $('#other'+id).text('Transfer Household');
          $('#other'+id).attr('name','true');
          $('.box'+id).remove();
        }
      }

      function transferAdd(id){
        var address = $('#address'+id).val();
        swal({
            title: "Are you sure?",
              text: "You are trying to tranfer this family to another place/barangay.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              closeOnConfirm: false,
              closeOnCancel: false
          },
          function(isConfirm){
            if(isConfirm){
              var name = $('#name'+id).val();
               $.ajax({
                method: 'POST',
                url: "{{URL::Route('transferAddress')}}",
                headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                dataType: 'JSON',
                data: {
                  'address': address,
                  'id'  : id,
                },
                success: function(data){
                  console.log(data)
                  if(data.success == "yes"){
                    swal({
                      title:"Saved!", 
                      text: "Family has been transferred!",
                      type: "success"
                    });
                    setTimeout(function(){
                             location.reload();
                        }, 2000); 
                  }
                },error: function(data){
                    swal("Error!", "Something went wrong", "error");
                  }
              });
              
            }
            else {
              swal("Cancelled", "Something went wrong!", "error");
            }
          });
        
      }

      function getname(id){
        var name = $('#name'+id).val();

         $.ajax({
              method: 'GET',
              url: '{{ URL::route("getHouseId")}}',
              data:{
                'name' : name,
                'type' : 'transfer'
              },
              success:function(data)
              {
                  $('#toChange'+id).text('Household ID:'+data.household_id);
              }
          })
      }

      function transferExisting(id,id2){
        swal({
            title: "Are you sure?",
              text: "You are trying to move this family to an existing household.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              closeOnConfirm: false,
              closeOnCancel: false
          },
          function(isConfirm){
            if(isConfirm){
              var name = $('#name'+id).val();
               $.ajax({
                method: 'POST',
                url: "{{URL::Route('transferExisting')}}",
                headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                dataType: 'JSON',
                data: {
                  'name': name,
                  'id'  : id2,
                  'type': 'existing'
                },
                success: function(data){
                  console.log(data)
                  if(data.success == "yes"){
                    swal({
                      title:"Saved!", 
                      text: "Family has been transferred!",
                      type: "success"
                    });
                    setTimeout(function(){
                             location.reload();
                        }, 2000); 
                  }
                },error: function(data){
                    swal("Error!", "Something went wrong", "error");
                  }
              });
              
            }
            else {
              swal("Cancelled", "Something went wrong!", "error");
            }
          });
      }

      function transferNew(id){
        swal({
            title: "Are you sure?",
              text: "You are trying to move this family to a new household.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              closeOnConfirm: false,
              closeOnCancel: false
          },
          function(isConfirm){
            if(isConfirm){
               $.ajax({
                method: 'POST',
                url: "{{URL::Route('transferExisting')}}",
                headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                dataType: 'JSON',
                data: {
                  'type': 'transNew',
                  'id'  : id
                },
                success: function(data){
                  console.log(data)
                  if(data.success == "yes"){
                    swal({
                      title:"Saved!", 
                      text: "Family has been transferred!",
                      type: "success"
                    });
                    setTimeout(function(){
                             location.reload();
                        }, 2000); 
                  }
                },error: function(data){
                    swal("Error!", "Something went wrong", "error");
                  }
              });
              
            }
            else {
              swal("Cancelled", "Something went wrong!", "error");
            }
          });
      }
    </script>
    <script>
      $('.addNewFam').click(function(){
        
        var id = this.value;

      //  $('#resident'+id).formValidation({
      //     framework: 'bootstrap',
      //     // Only disabled elements are excluded
      //     // The invisible elements belonging to inactive tabs must be validated
      //     // excluded: [':disabled'],
      //     excluded: [':hidden'],
      //     icon: {
      //         // valid: 'glyphicon glyphicon-ok',
      //         // invalid: 'glyphicon glyphicon-remove',
      //         // validating: 'glyphicon glyphicon-refresh'
      //     },
      //     fields: {
      //       fname: {
      //           validators: {
      //             notEmpty: {
      //               message: "Firstname is required"
      //              }
      //           }
      //         },
      //         mname: {
      //           validators: {
      //             notEmpty: {
      //               message: "Middlename is required"
      //              }
      //           }
      //         },
      //         lname: {
      //           validators: {
      //             notEmpty: {
      //               message: "Lastname is required"
      //              }
      //           }
      //         },
      //         houseNo: {
      //           validators: {
      //             notEmpty: {
      //               message: "House No is required"
      //              }
      //           }
      //         },
      //         status: {
      //           validators: {
      //             notEmpty: {
      //               message: 'Marital status is required'
      //             }
      //           }
      //         },
      //         street: {
      //           validators: {
      //             notEmpty: {
      //               message: "Street is required"
      //              }
      //           }
      //         },
      //         birthdate: {
      //           validators: {
      //             notEmpty: {
      //               message: "Birthdate is required"
      //              }
      //           }
      //         },
      //         religion: {
      //           validators: {
      //             notEmpty: {
      //               message: "Religion is required"
      //              }
      //           }
      //         },
      //         nationality: {
      //           validators: {
      //             notEmpty: {
      //               message: "Nationality is required"
      //              }
      //           }
      //         },
      //         voter: {
      //           validators: {
      //             notEmpty: {
      //               message: "This is required"
      //              }
      //           }
      //         },
      //         role: {
      //           validators: {
      //             notEmpty: {
      //               message: "Role is required"
      //              }
      //           }
      //         },
      //     }
      // })
      // .on('err.field.fv', function(e, data) {
      //   e.preventDefault();

      //    var $form = $(e.target),
      //      fv    = $form.data('formValidation');
           
        $('#register'+id).focus(function(e){
          e.preventDefault();
          swal({
            title: "Are you sure?",
              text: "You are trying to register new resident.",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              closeOnConfirm: false,
              closeOnCancel: false
          },
          function(isConfirm){
            if(isConfirm){
              var info = $('#resident'+id).serialize()
              $.ajax({
                method: 'POST',
                url: "{{URL::Route('addFamily')}}",
                headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                dataType: 'JSON',
                data: info,
                success: function(data){
                  if(data.success == "yes"){
                    swal({
                      title:"Saved!", 
                      text: "New resident has been registered!",
                      type: "success"
                    });
                  }
                },error: function(data){
                    swal("Error!", "Something went wrong", "error");
                  }
              });
            }
            else {
              swal("Cancelled", "Something went wrong!", "error");
            }
          });
        });
      })  
    </script>
</body>

</html>