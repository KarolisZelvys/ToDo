<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'status_id', 'user_id'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
