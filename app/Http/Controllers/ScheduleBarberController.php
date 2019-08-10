<?php

namespace App\Http\Controllers;

use App\ScheduleBarber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleBarberController extends Controller
{
    public function __construct()
    {

    }

    public function index (Request $request)
    {
        $schedule_at = Carbon::create($request->schedule_at)->subHours(3);

        $user = auth()->user()->id;
        if ($request->user) {
            $user = $request->user;
        }

        $schedules = ScheduleBarber::with('service','barber_user','customer')
                ->whereBetween('schedule_at',[$schedule_at,$schedule_at->clone()->addDay(1)])
                ->where('user_id',$user)
                ->get();
        return $schedules;
    }

    public function show ($scheduleBarber)
    {
        $schedule = ScheduleBarber::with('customer', 'barber_user', 'service')->find($scheduleBarber);
        return $schedule;
    }

    public function store(Request $request)
    {
        $data = $request->only('user_id', 'service_id', 'costumer_id');
        $data['barber_id'] = auth()->user()->barber_id;
        $aux = $request->dia . ' ' . $request->hora;
        $data['schedule_at'] = Carbon::createFromFormat('Y-m-d H:i', $aux, 'UTC');
        return ScheduleBarber::create($data);
    }
}
