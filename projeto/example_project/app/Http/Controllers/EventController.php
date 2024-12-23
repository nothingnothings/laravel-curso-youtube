<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // * Example of model usage:
        // $events = Event::all();

        $search = request('search'); // * this utilizes the url's query parameters. GET request in the form.

        // * Used with the search form.
        if ($search) {
            $events = Event::where(['title', 'LIKE', '%' . $search . '%'])->get();
        } else {
            $events = Event::all();
        }


        return view('events.index', ['events' => $events, 'search' => $search]);
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
        $event->date = $request->date; // Check model for more details (protected $dates = ['date']);
        $event->city = $request->city;
        $event->description = $request->description;
        $event->is_private = $request->is_private;
        $event->items = $request->items; // Check model for more details (protected $casts = ['items' => 'array'];);


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

        // * Add user_id value to the new event record, establishing the relationship between the event and the user.
        $user = Auth::user();

        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Event created successfully!'); // We redirect, and also FLASH A MESSAGE TO THE USER. This message is acessed with '@session', in the blade files.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $eventId)
    {

        $event = Event::findOrFail($eventId);

        $user = Auth::user();

        $hasUserJoined = false;

        if ($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {

                if ($userEvent['id'] == $eventId) {
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard()
    {
        $user = Auth::user();

        $eventsAsOwner = $user->events;


        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['eventsAsOwner' => $eventsAsOwner, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $eventId)
    {
        $event = Event::findOrFail($eventId);

        // Check if the user is the owner of the event:
        if (Auth::user()->id != $event->user_id) {
            return redirect('/')->with('msg', 'Você não pode editar este evento!');
        }

        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $eventId)
    {

        $event = Event::findOrFail($eventId);

        // Check if the user is the owner of the event:
        if (Auth::user()->id != $event->user_id) {
            return redirect('/')->with('msg', 'Você não pode editar este evento!');
        }

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->is_private = $request->is_private;
        $event->items = $request->items;

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
            $request['image'] = $imageName; // We update the image name in the request, so that it can be saved in the database.
        }

        $event->save();

        return redirect('/dashboard')->with('msg', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        // Check if the user is the owner of the event:
        if (Auth::user()->id != $event->user_id) {
            return redirect('/')->with('msg', 'Você não pode excluir este evento!');
        }

        // Detach all users from the event
        $event->users()->detach();

        $event->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    /**
     * Participate in an event.
     */
    public function participate(string $eventId)
    {
        $event = Event::findOrFail($eventId);

        $user = Auth::user();

        $event->users()->attach($user->id);

        return redirect('/dashboard')->with('msg', 'Você agora está participando deste evento!');
    }

    /**
     * Leave an event.
     */
    public function leaveEvent(string $eventId)
    {
        $event = Event::findOrFail($eventId);

        $user = Auth::user();

        $event->users()->detach($user->id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $event->title);
    }
}
