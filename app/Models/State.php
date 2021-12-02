<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name'
    ];

    //this function is used to create a One-to-One relationship 
    //between the records in the State and Country tables in the db.
    //This will pass data to the Country ID column in index.blade(state)
    public function country() 
    {
        return $this->belongsTo(Country::class);
    }
    
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    
}