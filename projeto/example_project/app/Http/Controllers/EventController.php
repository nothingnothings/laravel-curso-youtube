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


        // * Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            // $requestImage->store('public/img/events'); // * This is the easy way to do it, but we want to have unique names for each img file.

            $extension = $requestImage->extension();

            // * This name is used for storing it in the database, and also for saving in a folder.
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            // * This will save the file in the folder.
            $requestImage->move('img/events', $imageName);

            // * This will save the file in the database.
            $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Event created successfully!'); // We redirect, and also FLASH A MESSAGE TO THE USER. This message is acessed with '@session', in the blade files.
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
