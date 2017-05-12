<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Officials History</title>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.nav')

        <div id="page-wrapper" style="padding-top: 0% ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Barangay Officials</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="padding-bottom: 5%;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Officials History
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class = "row">
                            <div class="btn-group">
                              <div class="col-sm-6">
                                <div class="dropdown">
                                  <button class="btn btn-warning dropdown-toggle" type="button" id="yearFilter" data-toggle="dropdown"
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
                                <tbody id="tbl">
                                    <tr class="rem">
                                        <td>Chairman</td>
                                        <td>{{$chairman['fullname']}}</td>
                                        <td>{{$chairman['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Secretary</td>
                                        <td>{{$sec['fullname']}}</td>
                                        <td>{{$sec['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Treasurer</td>
                                        <td>{{$tre['fullname']}}</td>
                                        <td>{{$tre['term_year']}}</td>
                                    </tr> 
                                    <tr class="rem">
                                        <td>Kagawad 1</td>
                                        <td>{{$kag1['fullname']}}</td>
                                        <td>{{$kag1['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Kagawad 2</td>
                                        <td>{{$kag2['fullname']}}</td>
                                        <td>{{$kag2['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Kagawad 3</td>
                                        <td>{{$kag3['fullname']}}</td>
                                        <td>{{$kag3['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Kagawad 4</td>
                                        <td>{{$kag4['fullname']}}</td>
                                        <td>{{$kag4['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Kagawad 5</td>
                                        <td>{{$kag5['fullname']}}</td>
                                        <td>{{$kag5['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Kagawad 6</td>
                                        <td>{{$kag6['fullname']}}</td>
                                        <td>{{$kag6['term_year']}}</td>
                                    </tr>
                                    <tr class="rem">
                                        <td>Kagawad 7</td>
                                        <td>{{$kag7['fullname']}}</td>
                                        <td>{{$kag7['term_year']}}</td>
                                    </tr> 
                                </tbody>
                              </table> 
                              
                          </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>        
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
                var rem = $('.rem');
                rem.remove();
          var filter = $(this);
         $('#yearFilter').html(filter.text()+' <span class="caret"></span>');
         console.log(filter.text())
                rem.remove();
          $.ajax({
              method: 'GET',
              url: '{{ URL::route("getOfficials")}}',
              data:{
                'year' : filter.text()
              },
              success:function(data)
              {
                 for(i=0;i<data.length;i++){
                    $('#tbl').append('<tr class="rem"><td>'+data[i]['position']+'</td><td>'+data[i]['fullname']+'</td><td>'+data[i]['term_year']+'</td></tr>')
                 }

              }
            })
        })

    </script>


</body>

</html>
