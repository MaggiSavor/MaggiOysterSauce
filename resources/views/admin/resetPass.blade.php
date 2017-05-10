@extends('layouts.app')

<!-- Main Content -->
@section('content')
<script src="{!! asset('assets/sweetalert-master/dist/sweetalert.min.js') !!}"></script>
<link rel="stylesheet" href="{!! asset('assets/sweetalert-master/dist/sweetalert.css') !!}">

<div class="container">
    <div class="row">   
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <form id="email_check" class="form-horizontal" role="form" method="POST" action="{{URL::Route('resetPassword')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Username or Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" placeholder="" name="email" value="" required>
                                <input id="submit_handle" type="submit" style="display: none">
                            </div>
                            <button type="button" id="check" class="btn btn-success" >
                                <i class="glyphicon glyphicon-ok"></i>
                            </button>
                        </div>
                        <div class="form-group" class="xij">
                            <label for="question" class="col-md-4 control-label">Security Question</label>
                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control" name="question" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group" class="xij">
                            <label for="answer" class="col-md-4 control-label">Security Answer</label>
                            <div class="col-md-6">
                                <input id="answer" type="text" class="form-control" placeholder="" name="answer" value="" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group" class="xij">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="submit" type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-envelope"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif

<!-- jQuery -->
<script src="../assets/jquery/jquery.min.js"></script>
<script>
        $('#check').on('click',function(){
            if($('#email').val() == ''){
                $('#submit_handle').click();
            }else{
                var email = $('#email').val();
                $.ajax({
                    type: "GET",
                    url: "{{URL::Route('checkUser')}}",
                    headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                    dataType: 'JSON',
                    data: {
                        'email': email
                    },
                    success: function(data) {
                        console.log(data)
                        $('#question').val(data.data[0]['security_question'])
                        $('.xij').show()
                    },
                    error: function(){
                        swal('User not found!');
                        $('#question').val('')
                    }
                });
            }   
        })
</script>
<script type="text/javascript">
    $('#proceed').on('click',function(){
            
            var email = $('#email').val();
            var question = $('#question').val();
            var answer = $('#answer').val();
            $.ajax({
                type: "POST",
                url: "{{URL::Route('checkUser')}}",
                headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                dataType: 'JSON',
                data: {
                    'email': email,
                    'answer': answer
                },
                success: function(data) {
                    console.log(data)
                    $('#question').val(data.data[0]['security_question'])
                    
                },
                error: function(){
                    swal('User not found!');
                    $('#question').val('')
                }
            });
               
    })
</script>
@endsection
