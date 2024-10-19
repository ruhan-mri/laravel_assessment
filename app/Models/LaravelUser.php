<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LaravelUser extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'age', 'email', 'address', 'image',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id');
    }
}
