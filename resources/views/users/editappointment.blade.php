@extends('/users/menulayout')
@section('title')
    VELLA CONSULTING INC.
@endsection

@section('link')
    -> <a>Appointments</a>
    -> <a>Book Appointment</a>
@endsection

@section('content-rest')
    <form action="{{route('update-appointment-client')}}" method="POST">
        <div class="container" style="margin-top: 20px">
            <p style="font-size: 13px; margin-bottom: 3px">Client</p>
            <div class="card" style="font-size: 12px; border-bottom-width: 2px">
                <div class="card" style="font-size: 12px; border-bottom-width: 2px">
                    <input style="height: 30px; justify-content: center" value="{{$appt->client_name}}" type="text" readonly="readonly" id="name" name="name">
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 20px">
            <div>
                <p style="font-size: 13px; margin-bottom: 3px">Booking Date and Time</p>
            <input class="date form-control" value="{{$appt->booking_date}}" type="text" id="datepicker" name="date">
           </div>
        </div>
        <div class="container" style="margin-top: 20px">
            <p style="font-size: 13px; margin-bottom: 3px">Duration</p>
            <div class="card" style="font-size: 12px; border-bottom-width: 2px">
                <select name="duration" id="duration" class="form-control">
                    {{$dur = DB::table('durations')->select('duration','status')->get()}}
                    @foreach ($dur as $user)
                        @if ($user->status === 'on')
                        <option value="{{ $user->duration }}"{{ $user == old('user') ? ' selected' : '' }}><h6>{{$user->duration}}</h6></option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="container" style="margin-top: 20px">
            <p style="font-size: 13px; margin-bottom: 3px">Status</p>
            <div class="card" style="font-size: 12px; border-bottom-width: 2px">
                <select name="status" id="status" class="form-control">
                        <option value="active"><h6>Active</h6></option>
                        <option value="cancel"><h6>Cancel</h6></option>
                </select>
            </div>
        </div>
        <div class="container" style="margin-top: 20px; margin-bottom: 20px">
            <button class="btn btn-primary" style="font-size: 12px;background-color: #d5bdab; border-color: #d5bdab" type="submit">Update</button>
        </div>
          <input type="hidden" name="_token" value="{{Session::token()}}">
          <input type="hidden" name="appointment_id" value="{{$appt->id}}">
          <input type="hidden" name="client" value="{{$appt->client_id}}">
    </form>
    <script type="text/javascript">
        document.getElementById("frequency").disabled = true;
        document.getElementById("reccur_until").disabled = true;
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
        $('#reccur_until').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
         function change()
         {
            if( !document.getElementById("recurring").checked)
            {
                document.getElementById("frequency").disabled = true;
                document.getElementById("reccur_until").disabled = true;
            }
            else{
                document.getElementById("frequency").disabled = false;
                document.getElementById("reccur_until").disabled = false;
            }
         }
    </script>
@endsection
