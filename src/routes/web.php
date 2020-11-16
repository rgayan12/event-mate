<?php

use Bastiyan\EventMate\Http\Controllers\EventController;
use Bastiyan\EventMate\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/events',[EventController::class,'index'])->name('manage.events.index')->middleware('web');

//Create and Store
Route::get('/events/create',[EventController::class,'create'])->name('manage.events.create')->middleware('web');
Route::post('/events',[EventController::class,'store'])->name('manage.events.store')->middleware('web');


//Edit and Update
Route::get('/event/edit/{event}',[EventController::class,'edit'])->name('manage.events.edit')->middleware('web');
Route::put('/event/update/{event}',[EventController::class, 'update'])->name('manage.events.update')->middleware('web');

//Show Route
Route::get('/event/{event}',[EventController::class,'show'])->name('manage.events.show')->middleware('web');

//Delete Event
Route::delete('/event/delete/{eventId}',[EventController::class,'delete'])->name('manage.events.destroy')->middleware('web');



/**
 * Public Routes
 */

 Route::get('/events/list',[HomeController::class,'index'])->name('list.events')->middleware('web');
 Route::get('/events/show/{id}/{slug?}',[HomeController::class,'show'])->name('show.event')->middleware('web');

