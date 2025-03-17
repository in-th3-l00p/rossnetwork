<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        "user_id"
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
}
