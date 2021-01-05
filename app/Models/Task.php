<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'end_time',
      'user_id',
    ];

    protected $hidden = [
      'user_id',
      'created_at',
      'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
