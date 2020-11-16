<?php 
namespace Bastiyan\EventMate\Http\Controllers;

use Bastiyan\EventMate\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('eventmate::admin.index', compact('events'));
    }

    //Show method
    public function show($id)
    {       

        if(! auth()->check() ){
            abort(403);
        } 

        $event = Event::findOrFail($id);
        return view('eventmate::admin.show', compact('event'));
}


    // Create method
    public function create(){
       
        return view('eventmate::admin.create');       
    }

    /* Edit Method
     *  
     * 
     **/
    public function edit(Request $request, $id){

        if(! auth()->check()){
            abort(403);
        }

        $event = Event::findOrFail($id);
        return view('eventmate::admin.edit',compact('event'));


    }

    //Update the Event
    public function update(Request $request, $id){

        $this->letsValidate($request);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('manage.events.index');
    }


    public function store(Request $request)
    {
        // Let's assume we need to be authenticated
        // to create a new event
        $this->letsValidate($request);
        $event = Event::create($request->all());
        return redirect(route('manage.events.show',$event));
    }

    /**
     * Destroy Method
     */
    public function delete($id){

        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('manage.events.index');
    }

    /**
     * Validate User Input
     */
    public function letsValidate($request){

       return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'venue' => 'required',
        ]);

    }
}