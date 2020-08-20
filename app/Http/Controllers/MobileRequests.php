<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class MobileRequests extends Controller
{
    public function all_users()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }
    public function auth(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $pass])) {
            $user = DB::table('users')->select('email', 'id' , 'role')->where('email' , $email)->get();
            return response()->json($user);
            //return 'true';
        }
        return response()->json('?');
    }
    public function all_users_info()
    {
        $users = DB::table('user_info')->get();
        return $users;
    }
     public function userinfo(Request $request)
    {
        $id = $request->id;
        $table = $request->table;

        if($table == 'users')
        {
            $user = DB::table('users')->where('id' , $id)->get();
            return response()->json($user);
        }
        if($table == 'user_info')
        {
            $user = DB::table('user_info')->where('user_id' , $id)->get();
            return response()->json($user);
        }
        

            //return 'true';
        
        //return response()->json('?');
    }
     public function update_user(Request $request)
    {
        $id = $request->id;
        $user = DB::table('users')->where('id', $id)->get();
        $user = $user[0];
        $email = $request->email;
        $fname = $request->fname;
        $lname = $request->lname;
        $city = $request->city;
        $phone = $request->phone;
        $timezone = $request->timezone;

        if ($email !== null && $email !== $user->email) {
            DB::table('users')->where('id', $id)->update(['email' => $email]);
        }
        DB::table('user_info')->where('user_id', $id)->update(['firstname' => $fname, 'lastname' => $lname]);
        DB::table('user_info')->where('user_id', $id)->update(['city' => $city]);
        DB::table('user_info')->where('user_id', $id)->update(['phone' => $phone]);
        DB::table('user_info')->where('user_id', $id)->update(['timezone' => $timezone]);
        return 'true';
    }
    public function all_appointments(Request $request)
    {
         $date = $request->date;
         $appointments = DB::table('booked_appointments')->where('booking_date' , $date)->get();
        return response()->json($appointments);
    }
      public function update_appointment(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $date = $request->date;
        $time = $request->time;
        $duration = $request->duration;

    
        DB::table('booked_appointments')
            ->where('id', $id)
            ->update(['client_name' => $name, 'booking_date' => $date, 'duration' => $duration, 'booking_time'=>$time]);
        return 'true';
    }
     public function cancel_appointment(Request $request)
    {
        $id = $request->id;
         DB::table('booked_appointments')
            ->where('id', $id)
            ->update(['status' => 'cancel']);
        return 'true';
    }
    public function full_table(Request $request)
    {
        $table = $request->table;
        $data = DB::table($table)->get();
        return response()->json($data);
    }
    public function update_booking(Request $request)
    {
        $mon = $request['monday'];
        if($mon === 'true')
        {
            $mon = "on";
        }
        $tue = $request['tuesday'];
        if($tue === 'true')
        {
            $tue = "on";
        }
        $wed = $request['wednesday'];
        if($wed=== 'true')
        {
            $wed = "on";
        }
        $thu = $request['thursday'];
        if($thu=== 'true')
        {
            $thu = "on";
        }
        $fri = $request['friday'];
        if($fri=== 'true')
        {
            $fri = "on";
        }
        $sat = $request['saturday'];
        if($sat=== 'true')
        {
            $sat = "on";
        }
        $sun = $request['sunday'];
        if($sun=== 'true')
        {
            $sun = "on";
        }
        $t15 = $request['15min'];
        if($t15=== 'true')
        {
            $t15 = "on";
        }
        $t30 = $request['30min'];
        if($t30=== 'true')
        {
            $t30 = "on";
        }
        $t45 = $request['45min'];
        if($t45=== 'true')
        {
            $t45 = "on";
        }
        $t60 = $request['60min'];
        if($t60=== 'true')
        {
            $t60 = "on";
        }
        $start = $request['start'];
        $end = $request['start'];

        DB::table('timings')->insert(
            ['start_time' => $start, 'end_time' => $end]
        );
        //  dd($weekdays, $duration, $start, $end);
        DB::table('weekdays')
            ->where('day', 'monday')
            ->update(['status' => $mon]);
        DB::table('weekdays')
            ->where('day', 'tuesday')
            ->update(['status' => $tue]);
        DB::table('weekdays')
            ->where('day', 'wednesday')
            ->update(['status' => $wed]);
        DB::table('weekdays')
            ->where('day', 'thursday')
            ->update(['status' => $thu]);
        DB::table('weekdays')
            ->where('day', 'friday')
            ->update(['status' => $fri]);
        DB::table('weekdays')
            ->where('day', 'saturday')
            ->update(['status' => $sat]);
        DB::table('weekdays')
            ->where('day', 'sunday')
            ->update(['status' => $sun]);

        DB::table('durations')
            ->where('duration', '15 mins')
            ->update(['status' => $t15]);
        DB::table('durations')
            ->where('duration', '30 mins')
            ->update(['status' => $t30]);
        DB::table('durations')
            ->where('duration', '45 mins')
            ->update(['status' => $t45]);
        DB::table('durations')
            ->where('duration', '60 mins')
            ->update(['status' => $t60]);
         return response()->json($request);
    }
    public function newClient(Request $request)
    {
        $email = $request->email;
        $password = bcrypt($request->pass);

        $user = new User();
        $user->email = $email;
        $user->password = $password;

        $user->save();
        $user_id = DB::table('users')->where('email', $email)->pluck('id');

        $fname = $request->fname;
        $lname = $request->lname;
        $timezone = $request->timezone;
        $city = $request->city;
        $phone = $request->phone;
        $recurring = null;
        DB::table('user_info')->insert([
            [
                'firstname' => $fname,
                'user_id' => $user_id[0],
                'phone' => $phone,
                'timezone' => $timezone,
                'lastname' => $lname,
                'city' => $city,
                'recurring' => $recurring
            ]
        ]);
        return $request;
    }
    public function allUserNames()
    {
        $users = DB::table('user_info')->select('user_id','firstname', 'lastname')->get();
        return $users;
    }
    public function book_appointment(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $dur= $request->duration;
        $time= $request->time;
        $date= $request->date;

        DB::table('booked_appointments')->insert([
            [
                'client_name' => $name,
                'client_id' => $id,
                'booking_date' => $date,
                'booking_time' => $time,
                'duration' => $dur,
                'recurring' => null,
                'reccur_until' =>null,
                'reccur_frequency' =>null,
                'status' => 'Active',
            ]
        ]);
        return $request;
    }
    public function change_password(Request $request)
    {
        $pass = $request->pass;
        $id = $request->id;
        if ($pass != null || $pass !='') {
            $pass = bcrypt($request->pass);
                DB::table('users')
                    ->where('id', $id)
                    ->update(['password' => $pass]);
        }

        return $request;
    }
}
    
