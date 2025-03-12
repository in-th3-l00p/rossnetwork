<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "link",
        "icon",
        "description",
        "user_id"
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
