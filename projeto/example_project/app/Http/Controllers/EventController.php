<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // * Example of model usage:
        $events = Event::all();


        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->is_private = $request->is_private;
        $event->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
