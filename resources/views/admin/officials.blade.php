<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Officials</title>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.nav')

        <div id="page-wrapper" style="padding-top: 3%">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Current Barangay Officials</h1>
                    <a href="{{URL::Route('addOfficials')}}" role="button" class="btn btn-info btn-small btn pull-right"><span class = "glyphicon glyphicon-plus"></span> Add New Officials</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <section class="card-box">
              <div class="table-responsive">
                  <table id="datatable" class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                      <tr>
                        <th>Barangay Officials</th>
                        <th>Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chairman</td>
                            <td>{{$chairman['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Secretary</td>
                            <td>{{$sec['fullname']}}
                            <!-- <button class="btn btn-primary btn-sm" type="button"><span class="glyphicon glyphicon-edit"></span></button> --></td>
                        </tr>
                        <tr>
                            <td>Treasurer</td>
                            <td>{{$tre['fullname']}}</td>
                        </tr> 
                        <tr>
                            <td>Kagawad 1</td>
                            <td>{{$kag1['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 2</td>
                            <td>{{$kag2['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 3</td>
                            <td>{{$kag3['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 4</td>
                            <td>{{$kag4['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 5</td>
                            <td>{{$kag5['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 6</td>
                            <td>{{$kag6['fullname']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 7</td>
                            <td>{{$kag7['fullname']}}</td>
                        </tr> 
                    </tbody>
                  </table> 
                  
              </div>
            </section>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>


</body>

</html>
