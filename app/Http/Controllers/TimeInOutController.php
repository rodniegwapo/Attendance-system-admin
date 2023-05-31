<?php

namespace App\Http\Controllers;

use App\Models\TimeInOut;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeInOutController extends Controller
{
    public function setTimeIn(Request $request)
    {

        $request->validate([
            'student_id' => 'required',
            'event_id' => 'required',
        ]);

        if ($this->find($request->all())) {
            return;
        }

        TimeInOut::create([
            'student_id' => $request->student_id,
            'event_id' => $request->event_id,
            'time_in' => Carbon::now(),
        ]);

        return response()->noContent(200);
    }

    public function find($data)
    {
        $data = TimeInOut::where('student_id', $data['student_id'])->where('event_id', $data['event_id'])->first();

        if ($data) {
            $data->update(['time_in' => Carbon::now()]);

            return true;
        }

        return false;
    }

    public function setTimeOut(Request $request)
    {

        $request->validate([
            'student_id' => 'required',
            'event_id' => 'required',
        ]);

        if ($this->findTimeOut($request->all())) {
            return;
        }

        TimeInOut::create([
            'student_id' => $request->student_id,
            'event_id' => $request->event_id,
            'time_out' => Carbon::now(),
        ]);

        return response()->noContent(200);
    }

    public function findTimeOut($data)
    {
        $data = TimeInOut::where('student_id', $data['student_id'])->where('event_id', $data['event_id'])->first();

        if ($data) {
            $data->update(['time_out' => Carbon::now()]);

            return true;
        }

        return false;
    }
}
