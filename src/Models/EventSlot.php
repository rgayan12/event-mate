<?php 
namespace Bastiyan\EventMate\Models;

use Illuminate\Database\Eloquent\Model;

class EventSlot extends Model
{
    protected $table = 'event_slots';

    protected $fillable = ['event_id','date','time'];

    public function event(){
        return $this->belongsTo(Event::class);
    }


}