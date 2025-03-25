<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "description_short",
        "description",
        "start_date",
        "end_date",
        "location",
        "city",
        "state",
        "zip_code",
        "image",
        "url",
        "status",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPicture(): string
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return
            "https://ui-avatars.com/api/?name=" .
            urlencode($this->name) .
            "&color=7d5a50&background=e6dfd7";
    }
}
