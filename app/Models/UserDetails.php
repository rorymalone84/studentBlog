<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'welcome-message',
        'about-me',
        'current-work',
        'past-work',
        'skills',
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