<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventDetail;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function index()
    {
        return view('calendar');
    }

    protected function add()
    {

        $event = new Event();
        $event->name = $this->request->name;
        $event->from = $this->request->from;
        $event->to = $this->request->to;
        $event->weekDays = implode(",", $this->request->weekDays);
        $result = $event->save();
        $date_time = new \DateTime();

        if ($result && $this->request->events)
        {
            $events = $this->request->events;

            foreach ($events as $key => $val)
            {
                $eventDate = str_replace("-", "/", $val['event_date']);
                EventDetail::create([
                    'event_date' => Carbon::parse($eventDate),
                    'event_id' => $event->id,
                    'created_at' => $date_time,
                    'updated_at' => $date_time
                ]);
                //$events[$key]['event_id'] = $event->id;
            }
        }

        dd($events);
    }

    protected function get()
    {
        $latestEvent = Event::orderBy('id', 'desc')->with('details')->first();

        return Response()->json([
            'latest_event' => $latestEvent
        ], 200);
    }
}
