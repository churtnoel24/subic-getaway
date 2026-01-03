<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Room extends Model
{
    protected $guarded = [
    ];

    public function getImageUrlAttribute()
    {
        if($this->roomimage) {
            return Storage::url('rooms/' . $this->roomimage);
        }

        return asset('images/default-hotel.png');
    }
}
