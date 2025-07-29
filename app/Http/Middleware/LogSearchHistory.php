<?php

namespace App\Http\Middleware;

use App\Models\History;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class LogSearchHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->isMethod('GET')){
            return $next($request);
        }

        $url = $request ->url();

        if(str_contains($url,'search'))
        {
            match(true){
                Str::contains($url,'menu')=>$this->logSearchMenu($request),
                Str::contains($url,'board')=>$this->logSearchBoard($request),
            };
        }
        // else
        // {
        //     match(true){
        //         str_contains($url,'menu')=>$this->logViewMenu($request),
        //         str_contains($url,'board')=>$this->logViewBoard($request),
        //     };
        // }
        
        return $next($request);
    }

    public function logSearchMenu(Request $request){
        $keyword = $request -> input('search_key');

        Log::debug('searchLog: '.$keyword);
        History::create([
            'table_name' => 'topmenu',
            'record_id' => null,
            'action' => 'searched',
            'meta' => json_encode([
                'keyword' => $request -> input('search_key'),
            ]),
        ]);
    }
    
    public function logSearchBoard(Request $request){
        History::create([
            'table_name' => 'board',
            'record_id' => null,
            'action' => 'searched',
            'meta' => json_encode([
                'keyword' => $request -> input('search_key'),
            ]),
        ]);
    }

    // public function logViewMenu(Request $request)
    // {
    //     History::create([
    //         'table_name' => 'topmenu',
    //         'record_id' => null,
    //         'action' => 'viewed',
    //         'meta' => json_encode([
    //             'url' => $request->fullUrl(),
    //         ]),
    //     ]);
    // }
    // public function logViewBoard(Request $request)
    // {
    //     History::create([
    //         'table_name' => 'board',
    //         'record_id' => null,
    //         'action' => 'viewed',
    //         'meta' => json_encode([
    //             'url' => $request->fullUrl(),
    //         ]),
    //     ]);
    // }
}
