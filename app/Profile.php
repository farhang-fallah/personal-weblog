<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'biography' , 'email', 'images',
    ];

    protected $casts = ['images' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
