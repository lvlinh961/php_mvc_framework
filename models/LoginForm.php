<?php
namespace app\models;

use lvl\phpcoremvc\Model;
use lvl\phpcoremvc\Application;

class LoginForm extends Model
{
	public $email = '';
	public $password = '';

	public function rules()
	{
		return [
			'email' 	=> [self::RULE_REQUIRES, self::RULE_EMAIL],
			'password' 	=> [self::RULE_REQUIRES],
		];
	}

	public function login()
	{
		$user = User::findOne(['email' => $this->email]);

		if (!$user) {
			$this->addError('email', 'User does not exists with this email');
			return false;
		}

		if (!password_verify($this->password, $user->password)) {
			$this->addError('password', 'Password is incorrect');
			return false;
		}

		return Application::$app->login($user);
	}

	public function labels()
	{
		return [
			'email'				=> 'Your email',
			'password'			=> 'Password'
		];
	}
}