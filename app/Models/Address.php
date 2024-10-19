<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Address extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['user_id', 'address_line'];

    protected $dates = [
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(LaravelUser::class, 'user_id');
    }
}
