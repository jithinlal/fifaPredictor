<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = ['name', 'iso2'];

	public function players()
	{
		return $this->hasMany(Player::class);
	}
}
