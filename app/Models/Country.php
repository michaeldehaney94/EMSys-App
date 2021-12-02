<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_code',
        'name'
    ];

    //this function is used to create a Many-to-One relationship 
    //between the records in the State and Country tables in the db.
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
