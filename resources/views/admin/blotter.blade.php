<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blotter List</title>

    

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
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           Blotter Table
                       </div>
                       <!-- /.panel-heading -->
                       <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                               <thead>
                                   <tr>
                                       <th>ID</th>
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
                                    <tr>
                                       <td>{{$blotterList->case_id}}</td>
                                       <td>{{$blotterList->case_type}}</td>
                                       <td>{{$blotterList->case_title}}</td>
                                       <td>{{$blotterList->complainant_fullname}}</td>
                                       <td>{{$blotterList->defendant_fullname}}</td>
                                       <td>{{$blotterList->case_status}}</td>
                                       <td>{{$blotterList->created_at}}</td>
                                       <td></td>
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

    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                searchHighlight: true,
                "columnDefs": [
                    { 
                      "sortable" : false, "targets": [7],
                      "searchable": false, "targets": [7]
                    }
                ]
            });
        });

    </script>

</body>

</html>
