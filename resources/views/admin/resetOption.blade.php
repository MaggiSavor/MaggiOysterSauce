@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-success">
                <div class="panel-heading">Account Help</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="" >
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="12">
                                    <img src="../assets/images/logo1.png" style="margin: 0 auto; display: block; width:205px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a href="{{ url('/password/reset') }}"><button type="button" class="btn btn-success" style="width:100%;">
                                        <i class="fa fa-btn fa-envelope"></i> Send Link to Email
                                    </button></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a href="{{URL::Route('resetPass')}}"><button type="button" class="btn btn-success" style="width:100%;">
                                        <i class="fa fa-btn fa-question"></i> Security Question
                                    </button></a>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="panel-footer">
                    Please select an option to reset your password.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
