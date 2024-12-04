<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // * This wil get saved as '[ "Cadeiras", "Palco", "Cerveja Grátis", "Open Food" ]' in the database, in the 'items' field.
    protected $casts = ['items' => 'array']; // Make it so that items, which are sent as strings by the frontend,
}
