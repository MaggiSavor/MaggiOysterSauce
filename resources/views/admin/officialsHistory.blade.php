<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Officials</title>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.nav')

        <div id="page-wrapper" style="padding-top: 3%">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barangay Officials</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <section class="card-box">
              <div class = "row">
                <div id="search-input">
                    <div class="input-group col-md-6">
                        <input type="text" name="termyear" class="search-query form-control" placeholder="Input Term Year" />
                        <span class="input-group-btn">
                            <button name="searchterm" class="btn btn-primary" type="submit">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                <br>
                
            </div>
            <div class="table-responsive">
                  <table id="datatable" class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                      <tr>
                        <th>Barangay Officials</th>
                        <th>Name</th>
                        <th>Term Year</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chairman</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Secretary</td>
                            <td>Name Name Name
                            <!-- <button class="btn btn-primary btn-sm" type="button"><span class="glyphicon glyphicon-edit"></span></button> --></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Treasurer</td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td>Kagawad 1</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kagawad 2</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kagawad 3</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kagawad 4</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kagawad 5</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kagawad 6</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Kagawad 7</td>
                            <td></td>
                            <td></td>
                        </tr> 
                    </tbody>
                  </table> 
                  
              </div>
            </section>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <br>
    <br>
    <br>
    <br>
    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>


</body>

</html>
