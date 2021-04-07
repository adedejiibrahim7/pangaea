<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = ['topic', 'created_at'];

    public function Subscriber()
    {
        return $this->hasMany(Subscriber::class);
    }
}
