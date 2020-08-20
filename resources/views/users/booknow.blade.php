@extends('/users/menulayout')
@section('title')
    VELLA CONSULTING INC.
@endsection

@section('link')
    -> <a>Appointments</a>
    -> <a>Book Appointment</a>
@endsection

@section('content-rest')
    <form action="{{route('savebooking-client')}}" method="POST">
        <div class="container" style="margin-top: 20px">
            <p style="font-size: 13px; margin-bottom: 3px">Name</p>
            <div class="card" style="font-size: 12px; border-bottom-width: 2px">
                <input style="height: 30px; justify-content: center" value="{{$user->firstname}} {{$user->lastname}}" type="text" readonly="readonly" id="name" name="name">
            </div>
        </div>
        <div class="container" style="margin-top: 20px">
            <div>
                <p style="font-size: 13px; margin-bottom: 3px">Booking Date and Time</p>
            <input class="date form-control" type="text" id="datepicker" name="date">
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
        <div class="container" style="margin-top: 20px; margin-bottom: 20px">
            <button class="btn btn-primary" style="font-size: 12px;background-color: #d5bdab; border-color: #d5bdab" type="submit">Book Appointment</button>
        </div>
          <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
        $('#reccur_until').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
    </script>
@endsection
