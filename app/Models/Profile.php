<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'program', 'class_name',
        'bio', 'hobbies', 'skills',
        'education', 'experience', 'organizations', 'photo_url',
    ];

    protected $casts = [
        'hobbies'       => 'array',
        'skills'        => 'array',
        'education'     => 'array',
        'experience'    => 'array',
        'organizations' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
