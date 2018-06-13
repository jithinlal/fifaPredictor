<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Meliorate;

class MailUsers extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'mail:users';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Remember the users for what you are signed up for';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$mailer = new Meliorate();
		$mailer->sendMail();
	}
}
