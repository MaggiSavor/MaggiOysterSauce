<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agreement Letter</title>

    

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
                            Agreement Letter
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="agreement">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Case ID</th>
                                        <th>Case Title</th>
                                        <th>Complainant Name</th>
                                        <th>Defendant Name</th>
                                        <th>Case Status</th>
                                        <th>Case Date</th>
                                        <th>Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    @foreach($agreement as $agreements)
                                    <tr>
                                       <td></td>
                                       <td>{{$agreements['case_id']}}</td>
                                       <td>{{$agreements['case_title']}}</td>
                                       <td>{{$agreements['complainant_fullname']}}</td>
                                       <td>{{$agreements['defendant_fullname']}}</td>
                                       <td>{{$agreements['case_status']}}</td>
                                       <td>{{$agreements['case_date']}}</td>
                                       <td><a href="{{URL::Route('agreementPrint', $agreements['case_id'])}}"><button type="button" class="btn btn-success" name="issue" id="issue"> <span class="glyphicon glyphicon-file"></span> Create Agreement Letter</button></a></td>
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

    </div>
    <!-- /#wrapper -->

    
    <script src="../assets/js/bootstrap-toggle.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).ready(function() {
            var t = $('#agreement').DataTable({
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

</body>

</html>
