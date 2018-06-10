<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	protected $fillable = ['name', 'gk'];

	public function teams()
	{
		return $this->belongsTo(Team::class);
	}
}
