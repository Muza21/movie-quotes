<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Register a user';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$username = $this->ask('Register your username');
		$email = $this->ask('provide your email');
		$password = bcrypt($this->secret('What is the password?'));
		$this->info('You have registered successfully!');
		error_log($username);
		error_log($email);
		error_log($password);
		return 0;
	}
}
