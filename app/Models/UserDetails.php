<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'welcome_message',
        'about_me',
        'current_work',
        'past_work',
        'skills',
        'profile_image_path',
        'user_id'
    ];

    protected $casts = [
        'skills' => 'array'
    ];

    //each detail entry belongs to one user
    public function user(){
        return $this->belongsTo(User::class);
    }
}