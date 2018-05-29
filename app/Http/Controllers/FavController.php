<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavController extends Controller
{
	public function index(Request $request)
	{
		$teamId = $request->team;
		return redirect('/');
	}
}
