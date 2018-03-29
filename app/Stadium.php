<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $fillable = ['name','city'];
    
    public function matches()
    {
        return $this->hasMany(Match::class);
    }
}
