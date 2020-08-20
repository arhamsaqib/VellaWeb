<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserHomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $info = DB::table('user_info')->where('user_id', $user->id)->get();
        $info = $info[0];
        return view('/users/home-user', compact('info'));
    }
    public function bookappointment(Request $request)
    {
        $u = Auth::user();
        $user = DB::table('user_info')->where('user_id', $u->id)->get();
        $user = $user[0];
        if ($request->has('name')) {
            DB::table('booked_appointments')->insert([
                [
                    'client_name' => $user->firstname,
                    'client_id' => $u->id,
                    'booking_date' => $request['date'],
                    'booking_time' => $request[''],
                    'duration' => $request['duration'],
                    'status' => 'Active',
                ]
            ]);
        }
        return view('users.booknow', compact('user'));
    }
    public function allappointments()
    {
        $u = Auth::user();
        $appointments = DB::table('booked_appointments')->where('client_id', $u->id)->get();
        return view('users.appointments', compact('appointments'));
    }
    public function showappointment(Request $request)
    {
        $id = $request['client'];
        $appt_id = $request['appointment_id'];
        $client = DB::table('users')->where('id', $id)->first();
        $client_info = DB::table('user_info')->where('user_id', $id)->first();
        $appt = DB::table('booked_appointments')->where('id', $appt_id)->first();
        return view('users.showappointment', compact('client', 'appt', 'client_info'));
    }
    public function editappointment(Request $request)
    {
        $id = $request['appointment_id'];
        $appt = DB::table('booked_appointments')->where('id', $id)->first();
        return view('users.editappointment', compact('appt'));
    }
    public function updateappointment(Request $request)
    {
        $id = $request['appointment_id'];
        $c = $request['client'];
        $client = DB::table('user_info')->where('user_id', $c)->get();
        $client = $client[0]->firstname;
        $date = $request['date'];
        // $time = $request[''];
        $status = $request['status'];
        $duration = $request['duration'];
        //   dd($id, $c, $client, $date, $status, $duration);
        DB::table('booked_appointments')
            ->where('id', $id)
            ->update(['client_name' => $client, 'booking_date' => $date, 'status' => $status, 'duration' => $duration]);

        $appointments = DB::table('booked_appointments')->where('client_id', $c)->get();
        return view('users.appointments', compact('appointments'));
    }
    public function calender()
    {
        $user = Auth::User();
        $bookings = DB::table('booked_appointments')->where('client_id', $user->id)->get();
        return view('users.calender', compact('bookings'));
    }
    public function profile()
    {
        $user = Auth::user();
        $info_user = DB::table('user_info')->where('user_id', $user->id)->get();
        $info = $info_user[0];
        return view('users.profilesettings', compact('info', 'user'));
    }
}
