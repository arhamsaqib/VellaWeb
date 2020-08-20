@extends('./Layouts/profile')
<?php
    session_start();
   // $name = DB::table('users')->where('email', 'admin')->pluck('email');
   $user = Auth::user()->email;

?>
@section('title')
    VELLA CONSULTING INC.
@endsection

@section('content')

<div class="container-fluid" style="background-color: whitesmoke">
    <div class="row-fluid">
        <div class="span2">
            @extends('./core/navbar-user')
        </div>

        <div class="span10">
            <div style="margin: 10px; margin-bottom: 30px">
                <div class="card" style="width:1100px; height: 30px;">
                    <p style="align-self: flex-end; margin-right: 20px">{{$user}}</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card" style="display: flex; justify-content: center;">
                    <div class="container mt-3">
                        <div class="card" style="background-color: lightgray;">
                            <p style="color black; font-size: 15px;">Home</p>
                        </div>
                        <br><br><br><br>
                        <div style="display: flex;justify-content: center">
                            <h2>VELLA CONSULTING INC.</h2>
                        </div>
                        <div style="display: flex;justify-content: center">
                            <h4>Hi {{$info->firstname}}</h4>
                        </div>
                        <div class="mb-5" style="display: flex;justify-content: center">
                                <a href="/booknow-client" class="btn btn-primary mr-2" style="font-size: 12px;background-color: #d5bdab; border-color: #d5bdab" type="submit">Book Now</a>
                                <a href="/appointments-user" class="btn btn-primary" style="font-size: 12px;background-color: grey; border-color: #d5bdab" type="submit">See Upcoming</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
