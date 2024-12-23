<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // * This wil get saved as '[ "Cadeiras", "Palco", "Cerveja Grátis", "Open Food" ]' in the database, in the 'items' field.
    protected $casts = ['items' => 'array']; // Make it so that items, which are sent as strings by the frontend, are saved as an array in the database.

    protected $dates = ['date']; // This will make it so that fields passed to the 'date' field are considered as 'dateTime' data type...

    // Used with the 'owner of an event' feature.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Used with the PARTICIPANTS feature. An event can have multiple users as participants.
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $guarded = [];
}
