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
                                <a href="#">Clients</a>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 20px">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col" style="font-size: 12px">Client</th>
                                    <th scope="col" style="font-size: 12px">Date</th>
                                    <th scope="col" style="font-size: 12px">Time</th>
                                    <th scope="col" style="font-size: 12px">Slot Size</th>
                                    <th scope="col" style="font-size: 12px">Status</th>
                                    <th scope="col" style="font-size: 12px"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $client)
                                    <tr>
                                        <td>{{$client->client_name}}</td>
                                        <td>{{$client->booking_date}}</td>
                                        <td>{{$client->booking_time}}</td>
                                        <td>{{$client->duration}}</td>
                                        <td>{{$client->status}}</td>
                                        <td>
                                            <div style="display: flex">
                                                <form action="{{route('show-appointment-user')}}" method="POST">
                                                    <div class="mr-1">
                                                        <button class="btn btn-primary" style="font-size: 12px;background-color:black; border-color: black" type="submit">View</button>
                                                    </div>
                                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                                    <input type="hidden" name="client" value="{{$client->client_id}}">
                                                    <input type="hidden" name="appointment_id" value="{{$client->id}}">
                                                </form>
                                                <form action="{{route('edit-appointment-client')}}" method="POST">
                                                    <div class="mr-1">
                                                        <button href="#" class="btn btn-primary" style="font-size: 12px;background-color: #d5bdab; border-color: #d5bdab" type="submit">Edit</button>
                                                    </div>
                                                    <input type="hidden" name="_token" value="{{Session::token()}}">
                                                    <input type="hidden" name="appointment_id" value="{{$client->id}}">
                                                </form>
                                                <form action="">
                                                    <div>
                                                        <a href="#" class="btn btn-primary" style="font-size: 12px;background-color: #b63939; border-color: #b63939" type="submit">Cancel</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                              </table>
                          </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
