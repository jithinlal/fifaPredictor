<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['type','home_team','away_team','home_result','away_result','date','stadium','finished'];
    
    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }
}
