<?php

namespace App\Services;

use App\Http\Requests\CalendarRequest;
use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CalendarService
{
    public function createEvent(CalendarRequest $calendarRequest)
    {
        $new_event = Calendar::create(
            [
                'title' => $calendarRequest['title'],
                'regist_user_id' => $calendarRequest['author'],
                'board_id' => $calendarRequest['author'],
                'start_date' => $calendarRequest['startDateText'],
                'end_date' => $calendarRequest['endDateText'],
                'type'=> $calendarRequest['type']
            ]
        );
        Log::alert("이벤트 생성");
        Log::alert($new_event);
    }

    public function getEventList() 
    {
        Log::debug("getEventList");
        return Calendar::all()->map(function ($event) {

            $endDate = Carbon::parse($event->end_date)->addDay()->format('Y-m-d');
            
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $endDate,
                'type' => $event->type,
                'author' => $event->regist_user_id,
                'board_id' => $event->board_id,
                'allday' => true,
            ];
        });
    }


}