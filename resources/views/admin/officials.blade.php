<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BRIMS - Officials</title>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.nav')

        <div id="page-wrapper" style="padding-top: 0% ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Current Barangay Officials</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Barangay Officials
                            <a href="{{URL::Route('addOfficials')}}" role="button" style="margin-top: -7px" class="btn btn-warning btn pull-right"><span class = "glyphicon glyphicon-plus"></span> Add New Officials</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                                        <!-- <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#secModal{{$sec['id']}}" type="button"><span class="glyphicon glyphicon-edit"></span></button> --></td>
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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
          <form method="post" action="{{URL::Route('updateSecretary',$sec['id'])}}">
            <div class="modal fade" id="secModal{{$sec['id']}}" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Barangay Officials</h4>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive card-box">
                    <h1 class="pull-left" style="font-size: 24px">Update Secretary</h1>
                      <table class="table table-hover mails m-0 table table-actions-bar">
                        <thead>
                          <tr>
                          </tr>
                        </thead>
                            <tbody>
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Brgy Secretary</label>
                                    <input type="text" name="secretary" class="form-control" id="Secretary" value="{{$sec['fullname']}}" list="selectOfficials" autocomplete="off">
                                </div>
                            </div>
                                <datalist id="selectOfficials">
                                @foreach($officials as $off)
                                  <option>{{$off['fullname']}}</option>
                                @endforeach
                            </datalist>
                            </tbody>
                      </table>
                    </div>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button></a>
                  </div>
                </div>
              </div>
            </div>
          </form>
         
<!-- End of Modal -->
    

    <!-- Morris Charts JavaScript -->
    <script src="../assets/raphael/raphael.min.js"></script>
    <script src="../assets/morrisjs/morris.min.js"></script>
    <script src="../assets/data/morris-data.js"></script>


</body>

</html>
