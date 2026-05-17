<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dog;

class AdoptionRequest extends Model
{
    protected $fillable = [
        'dog_id',
        'user_id',
        'name',
        'email',
        'reason',
        'experience',
        'address',
        'phone',
        'status',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}