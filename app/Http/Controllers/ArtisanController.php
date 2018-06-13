<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
	public function cacheClear()
	{
		Artisan::call('cache:clear');
		return '<h1>Cache cleared</h1>';
	}
	public function configClear()
	{
		Artisan::call('config:clear');
		return '<h1>Config cleared</h1>';
	}
	public function configCache()
	{
		Artisan::call('config:cache');
		return '<h1>Config cached</h1>';
	}
	public function refresh()
	{
		Artisan::call('migrate:refresh');
		return '<h1>Refreshed</h1>';
	}
	public function dbSeed()
	{
		Artisan::call('db:seed');
		return '<h1>Seeded</h1>';
	}

	public function sendMail()
	{
		Artisan::call('mail:users');
		return 'Done';
	}
}
