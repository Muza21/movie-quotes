<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

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
		$username = $this->askValid('Register your username', 'username', ['required', 'max:255']);
		$email = $this->askValid('provide your email', 'required', 'email', ['min:3', 'max:255']);
		$password = $this->askValid('What is the password?', 'password', ['required', 'min:7', 'max:255']);

		$password = bcrypt($password);

		$this->info('You have registered successfully!');

		User::create([
			'username' => $username,
			'email'    => $email,
			'password' => $password,
		]);

		return 0;
	}

	protected function askValid($question, $field, $rules)
	{
		if ($field === 'password')
		{
			$value = $this->secret($question);
		}
		else
		{
			$value = $this->ask($question);
		}
		if ($message = $this->validateInput($rules, $field, $value))
		{
			$this->error($message);

			return $this->askValid($question, $field, $rules);
		}

		return $value;
	}

	protected function validateInput($rules, $fieldName, $value)
	{
		$validator = Validator::make([
			$fieldName => $value,
		], [
			$fieldName => $rules,
		]);

		return $validator->fails()
			? $validator->errors()->first($fieldName)
			: null;
	}
}
