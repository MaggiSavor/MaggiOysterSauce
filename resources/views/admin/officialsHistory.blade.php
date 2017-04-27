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
                <!-- <div id="search-input">
                    <div class="input-group col-md-6">
                        <input type="text" name="termyear" class="search-query form-control" placeholder="Input Term Year" />
                        <span class="input-group-btn">
                            <button name="searchterm" class="btn btn-primary" type="submit">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div> -->
                <div class="btn-group">
                  <div class="col-sm-6">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="yearFilter" data-toggle="dropdown"
                        aria-haspopup="true" 
                        aria-expanded="true">
                        Select Term Year
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="selectYear">
                        @foreach($terms as $term)
                            <li id="{{$term['term_year']}}" value="{{$term['term_year']}}"><a href="#">{{$term['term_year']}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            <br>
            <br>
            <div class="table-responsive">
                  <table id="history" class="table table-hover mails m-0 table table-actions-bar">
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
                            <td>{{$chairman['fullname']}}</td>
                            <td>{{$chairman['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Secretary</td>
                            <td>{{$sec['fullname']}}</td>
                            <td>{{$sec['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Treasurer</td>
                            <td>{{$tre['fullname']}}</td>
                            <td>{{$tre['term_year']}}</td>
                        </tr> 
                        <tr>
                            <td>Kagawad 1</td>
                            <td>{{$kag1['fullname']}}</td>
                            <td>{{$kag1['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 2</td>
                            <td>{{$kag2['fullname']}}</td>
                            <td>{{$kag2['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 3</td>
                            <td>{{$kag3['fullname']}}</td>
                            <td>{{$kag3['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 4</td>
                            <td>{{$kag4['fullname']}}</td>
                            <td>{{$kag4['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 5</td>
                            <td>{{$kag5['fullname']}}</td>
                            <td>{{$kag5['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 6</td>
                            <td>{{$kag6['fullname']}}</td>
                            <td>{{$kag6['term_year']}}</td>
                        </tr>
                        <tr>
                            <td>Kagawad 7</td>
                            <td>{{$kag7['fullname']}}</td>
                            <td>{{$kag7['term_year']}}</td>
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
    <script>
        $selectYear = $('#selectYear li'),
        $liYear = $selectYear.find('li');

        $selectYear.click(function() {
          var filter = $(this);
         $('#yearFilter').html(filter.text()+' <span class="caret"></span>');
         console.log(filter.text())
         })

    </script>


</body>

</html>
