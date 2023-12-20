<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    use HasFactory;

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
