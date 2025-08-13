<?php

namespace App\Services;

use App\Http\Requests\CalendarRequest;
use App\Models\Calendar;
use Illuminate\Support\Facades\Log;

class CalendarService
{
    public function createEvent(CalendarRequest $calendarRequest)
    {
        Log::debug("calendar request - startDate: ".$calendarRequest['startDate']);
        Log::debug("calendar request - startDate: ".$calendarRequest['startDateText']);
        Log::debug("calendar request - endDate: ".$calendarRequest['endDate']);
        Log::debug("calendar request - endDate: ".$calendarRequest['endDateText']);
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
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
                'type' => $event->type,
                'author' => $event->regist_user_id,
            ];
        });
    }


}