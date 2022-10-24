<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Event;
use App\Models\EventView;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function allEvents(){
        $events=EventView::get();
        return $events;
    }

    public function singleEvent($id){
        $events=EventView::where('id',$id)->first();
        return $events;
    }
    public function index(){
        $agent=Agent::where('user_id',auth()->user()->id)->first();
        $events=Event::where('company_id',$agent->company_id)->get();
//        return $events;
        return view('event.index',compact('events'));
    }

}
