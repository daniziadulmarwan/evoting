<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;


class Voter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }
}
