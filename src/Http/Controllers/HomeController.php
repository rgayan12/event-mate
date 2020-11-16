<?php

namespace Bastiyan\EventMate\Http\Controllers;

use Bastiyan\EventMate\Models\Event;
use Illuminate\Http\Request;
class HomeController extends Controller{

    /**
     * List all the Events
     */
    public function index(){

        $events = Event::active()->orderBy('created_at','DESC')->get();
        return view('eventmate::public.index', compact('events'));
     }

     /**
      * Show an event
      */

      public function show(Request $request, $id, $slug = ''){

        $event = Event::with('slots')->where('id',$id)->active()->get()->firstOrFail();

        if( $slug != $event->slug){
            return redirect()->to($event->url);
        }


        return view('eventmate::public.show',compact('event'));

      }
    
}