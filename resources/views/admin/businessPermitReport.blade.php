<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Barangay Permit Report</title>

    

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
        

        <div id="page-wrapper" style="padding-top: 0% ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Issued Business Permit Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Business Permit
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label for="InputStart">Start Date</label>
                                <input type="date" id="dateStart" style="width:300px;" class="form-control" required />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="InputStart">End Date</label>
                                <input type="date" id="dateStart" style="width:300px;" class="form-control" required />
                            </div>
                            <div class="form-group col-md-4">
                            <label for="InputStart">Filter</label>
                                <div class="dropdown">
                                  <button class="btn btn-info dropdown-toggle" type="button" id="filter" data-toggle="dropdown"
                                    aria-haspopup="true" 
                                    aria-expanded="true">
                                    --
                                    Select--
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="selectFilter">
                                        <li id="all" value="All"><a href="#">All</a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                                <button type="button" class="btn btn-warning" >Generate</button>
                            </div>
                    </div>
                    <hr>
                    <!-- /.panel-body -->
                    <div class="panel-body">
                    <h4>Business Permit Report: </h4>
                           <table width="100%" class="table table-hover mails m-0 table table-actions-bar" id="permit">
                               <thead>
                                   <tr>
                                    <th>Permit ID</th>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Business Kind</th>
                                    <th>Date Issued</th>
                                    <th>Date Expired</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>a</td>
                                    <td>s</td>
                                    <td>d</td>
                                    <td>s</td>
                                    <td>d</td>
                                    <td>d</td>
                                </tr> 
                               </tbody>
                           </table>
                           <button type="submit" class="btn btn-danger btn-small btn pull-right">
                            <span class = "glyphicon glyphicon-print"> Print</span>
                           <!-- /.table-responsive -->
                       </div>
                       <!-- /.panel-body -->
                </div>
            </div>        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>
    <script>
        $selectFilter = $('#selectFilter li'),
        $liYear = $selectFilter.find('li');

        $selectFilter.click(function() {
          var filter = $(this);
         $('#filter').html(filter.text()+' <span class="caret"></span>');
         })

    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).ready(function() {
            var t = $('#perm').DataTable({
                responsive: true,
                searchHighlight: true,
                "columnDefs": [
                    { 
                      "sortable" : false, 
                      "searchable": false,
                      "targets": 0
                    }
                ],
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
