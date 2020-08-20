@extends('./Layouts/profile')

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
                    <p style="align-self: flex-end; margin-right: 20px">Hello Client</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card" style="display: flex; justify-content: center;">
                    <div class="container" style="margin-top: 20px">
                        <div class="card" style="height: 40px; justify-content: center; background-color: white">
                            <div class="container" style="flex-direction: row; display: flex; align-items: center;">
                                <a href="/home-admin">Home -> </a>
                                <a href="#">Appointment</a>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 20px">
                        <div class="container" style="display: flex;">
                            <p style="font-size: 14px; color: grey; width: 200px">Client</p>
                            <p style="font-size: 14px">{{$client_info->firstname}} {{$client_info->lastname}}</p>
                        </div>
                        <div class="container" style="display: flex;">
                             <p style="font-size: 14px; color: grey; width: 200px">Phone</p>
                             <p style="font-size: 14px">{{$client_info->phone}}</p>
                        </div>
                        <div class="container" style="display: flex;">
                            <p style="font-size: 14px; color: grey; width: 200px">Email</p>
                            <p style="font-size: 14px">{{$client->email}}</p>
                        </div>
                        <div class="container" style="display: flex;">
                            <p style="font-size: 14px; color: grey; width: 200px">Day of Appointment</p>
                            <p style="font-size: 14px">{{$appt->booking_date}}</p>
                        </div>
                        <div class="container" style="display: flex;">
                            <p style="font-size: 14px; color: grey; width: 200px">Time of Appointment</p>
                            <p style="font-size: 14px">{{$appt->booking_time}}</p>
                        </div>
                        <div class="container" style="display: flex;">
                            <p style="font-size: 14px; color: grey; width: 200px">Duration</p>
                            <p style="font-size: 14px">{{$appt->duration}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
