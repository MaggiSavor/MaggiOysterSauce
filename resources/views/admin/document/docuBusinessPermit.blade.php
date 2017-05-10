<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Permit</title>

    

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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Business Name</label>
                                    <input type="text" name="bname" class="form-control" id="title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Kind of Business</label>
                                    <input type="text" name="bkind" class="form-control" id="cname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Business Address</label>
                                    <input type="text" name="address" class="form-control" id="dname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">OR Number</label>
                                    <input type="text" name="orNum" class="form-control" id="dname">
                                </div>
                            </div>
                        </div> 
                        <div class="pull-right">
                            <button id="print" type="submit" name="tryy" class="btn btn-danger"><span class="glyphicon glyphicon-print"> </span> Save and Print</button>
                        </div>  
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
                                       <td><a href="{{URL::Route('bPermitPrint', $permits['permit_id'])}}"><button type="button" class="btn btn-success" name="issue" id="issue"> <span class="glyphicon glyphicon-file"></span> Renew</button></a></td>
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

</body>

</html>
