<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "first_name",
        "last_name",
        "nickname",
        "birth_date",
        "gender",
        "address",
        "city",
        "state",
        "zip_code",
        "avatar",
        "bio",
        "user_id",
        "profile_picture",
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function isEmpty(): bool {
        return
            $this->first_name == null &&
            $this->last_name == null &&
            $this->nickname == null &&
            $this->birth_date == null &&
            $this->gender == null &&
            $this->address == null &&
            $this->city == null &&
            $this->state == null &&
            $this->zip_code == null &&
            $this->avatar == null &&
            $this->bio == null;
    }

    public function profilePicture(): string {
        if ($this->profile_picture) {
            return Storage::url($this->profile_picture);
        }
        return
            "https://ui-avatars.com/api/?name=" .
            urlencode($this->first_name . " " . $this->last_name) .
            "&color=7d5a50&background=e6dfd7";
    }
}
