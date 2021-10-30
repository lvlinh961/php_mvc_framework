<?php
namespace app\models;

use lvl\phpcoremvc\DbModel;
use lvl\phpcoremvc\UserModel;

class User extends UserModel
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	const STATUS_DELETED = 2;

	public $firstname = '';
	public $lastname = '';
	public $email = '';
	public $status = self::STATUS_INACTIVE;
	public $password = '';
	public $passwordConfirm = '';

	public function tableName()
	{
		return 'users';
	}

	public function primaryKey()
	{
		return 'id';
	}

	public function save()
	{
		$this->status = self::STATUS_INACTIVE;
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);

		return parent::save();
	}

	public function rules()
	{
		return [
			'firstname' 		=> [self::RULE_REQUIRES],
			'lastname' 			=> [self::RULE_REQUIRES],
			'email' 			=> [self::RULE_REQUIRES, self::RULE_EMAIL, [
				self::RULE_UNIQUE, 'class' => self::class
			]],
			'password' 			=> [self::RULE_REQUIRES, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
			'passwordConfirm' 	=> [self::RULE_REQUIRES, [self::RULE_MATCH, 'match' => 'password']],
		];
	}

	public function attributes()
	{
		return ['firstname', 'lastname', 'email', 'status', 'password'];
	}

	public function labels()
	{
		return [
			'firstname'			=> 'First name',
			'lastname'			=> 'Last name',
			'email'				=> 'Email',
			'password'			=> 'Password',
			'passwordConfirm'	=> 'Password Confirm',
		];
	}

	public function getDisplayName()
	{
		return $this->firstname . ' ' . $this->lastname;
	}
}