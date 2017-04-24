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
                    <h1 class="page-header">Add Officials</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <form class="form-horizontal" method="POST" action="{{URL::Route('addOfficials')}}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group" >
                            <div class="col-xs-3">
                                <label for="InputStart">Term Start Year:&nbsp;&nbsp;</label>
                                    <input type="text" name="startyear" class="form-control input-xs"  id="InputStart" placeholder="Term Start Year" value="<?php echo date('Y'); ?>">
                            </div>
                            <div class="col-xs-3">
                                    <label for="InputEnd">Term End Year:&nbsp;&nbsp;</label>
                                        <input type="text" name="endyear" class="form-control input-xs" id="InputEnd" placeholder="Term End Year" value="<?php echo date('Y')+3; ?>">
                            </div>
                        </div>
                    </div>
                        <br>
                    <div class="col-lg-12">
                        <h3>Barangay Officials</h3>
                        <div class="form-group">
                            <label for="inputChairman" class="col-sm-2 control-label">Brgy Chairman:</label>
                            <div class="col-sm-6">
                                <input type="text" name="chairman" class="form-control" id="Chairman" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSecretary" class="col-sm-2 control-label">Brgy Secretary:</label>
                            <div class="col-sm-6">
                                <input type="text" name="secretary" class="form-control" id="Secretary" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTreasurer" class="col-sm-2 control-label">Brgy Treasurer:</label>
                            <div class="col-sm-6">
                                <input type="text" name="treasurer" class="form-control"  id="Treasurer" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag1" class="col-sm-2 control-label">Brgy Kagawad1:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag1" class="form-control" id="Kag1" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag2" class="col-sm-2 control-label">Brgy Kagawad2:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag2" class="form-control" id="Kag2" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag3" class="col-sm-2 control-label">Brgy Kagawad3:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag3" class="form-control" id="Kag3" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag4" class="col-sm-2 control-label">Brgy Kagawad4:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag4" class="form-control" id="Kag4" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag5" class="col-sm-2 control-label">Brgy Kagawad5:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag5" class="form-control" id="Kag5" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag6" class="col-sm-2 control-label">Brgy Kagawad6:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag6" class="form-control" id="Kag6" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputKag7" class="col-sm-2 control-label">Brgy Kagawad7:</label>
                            <div class="col-sm-6">
                                <input type="text" name="kag7" class="form-control" id="Kag7" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-primary btn-small btn pull-right"><span class = "glyphicon glyphicon-plus"></span> Add Officials</button>
                        </div>
                    </div>
                </div>
            </form>
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
