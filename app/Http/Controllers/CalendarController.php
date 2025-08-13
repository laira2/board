<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarRequest;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CalendarController extends Controller
{
    //
    public function __construct(
        protected CalendarService $calendarService
    )
    {
    }
    public function index()
    {
        $events = $this->calendarService->getEventList(); 
        Log::alert("calendar index 함수");
        Log::alert($events);
        return Inertia::render('Calendar/Index', [
            'events' => $events,
        ]);
    }

    public function store (CalendarRequest $request)
    {
        $this -> calendarService -> createEvent($request);
        $events = $this -> calendarService -> getEventList();

        return Inertia::location('/calendar');
        Log::debug("일정 저장 완료");
    }

    public function getEvents()
    {
        return $this -> calendarService -> getEventList();
    }
}
