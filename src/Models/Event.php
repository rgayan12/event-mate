<?php

namespace Bastiyan\EventMate\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    protected $fillable = ['name','description','venue','main_image','thumbnail_image','booking_link','is_active'];

    
    public function getSlugAttribute(): string{
        return str_slug($this->name);
    }

    public function getUrlAttribute(): string{
        return action('HomeController@show',[$this->id, $this->slug]);
    }

    /**
     * event slots 
     * Multiple Event Slots
     */
    public function slots(){
        return $this->hasMany(EventSlot::class);
    }

    /**
     * Local Scope
     */
    public function scopeActive($query){
        return $query->where('is_active', 1);
    }
        


}