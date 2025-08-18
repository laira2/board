<?php

namespace App\Services;

use App\Http\Requests\CalendarRequest;
use App\Models\Calendar;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Log;

class CalendarService
{

    public function __construct(
        private BoardService $boardService,
    )
    {
        
    }
    public function createEvent(CalendarRequest $calendarRequest)
    {
        $new_event = Calendar::create(
            [
                'title' => $calendarRequest['title'],
                'regist_user_id' => $calendarRequest['author'],
                'board_id' => $calendarRequest['board_id'],
                'start_date' => Carbon::parse($calendarRequest['startDateText'] . ' ' . $calendarRequest['startTime']),
                'end_date' => Carbon::parse($calendarRequest['endDateText'] . ' ' . $calendarRequest['endTime']),
                'type'=> $calendarRequest['type']
            ]
        );
        Log::alert("이벤트 생성");
        Log::alert($new_event);
        $board = $this -> boardService -> getBoard($calendarRequest['board_id']);
        $board->calendar_id = $new_event->id;
        $board->save();

        Log::alert("Board에 calendar_id 추가");
        Log::alert($board);

    }

    public function getEventList() 
    {
        Log::debug("getEventList");
        return Calendar::all()->map(function ($event) {

            $endDate = Carbon::parse($event->end_date)->addDay()->format('Y-m-d H:i');

            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $endDate,
                'type' => $event->type,
                'author' => $event->regist_user_id,
                'board_id' => $event->board_id,
            ];
        });
    }

    public function deleteEvent($id)
    {
        try{
            $event = Calendar::find($id);
            $board = $this -> boardService -> getBoard($event->board_id);
            
            $event ->delete();

            $board->calendar_id = null;
            $board->save();
        }catch(Exception $e){
            Log::error($e);
        }
        
    }

    public function updateEvent($id, CalendarRequest $calendarRequest)
    {
        try{
            $event = Calendar::find($id);

            $event->start_date = Carbon::parse($calendarRequest['startDateText'] . ' ' . $calendarRequest['startTime']);
            $event->end_date   = Carbon::parse($calendarRequest['endDateText'] . ' ' . $calendarRequest['endTime']);

            $event->fill($calendarRequest->except(['startDateText','startTime','endDateText','endTime']));

$event->save();


            return $event;
        }catch(Exception $e){
            Log::error($e);
        }
    }

}