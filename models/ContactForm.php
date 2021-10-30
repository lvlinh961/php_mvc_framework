<?php
namespace app\models;

use lvl\phpcoremvc\Model;

class ContactForm extends Model
{
	public $subject = '';
	public $email = '';
	public $body = '';

	public function rules()
	{
		return [
			'subject' 	=> [self::RULE_REQUIRES, self::RULE_EMAIL],
			'email' 	=> [self::RULE_REQUIRES],
			'body' 		=> [self::RULE_REQUIRES]
		];
	}

	public function labels()
	{
		return [
			'subject'		=> 'Enter your subject',
			'email'			=> 'Your email',
			'body'			=> 'Body'
		];
	}

	public function send()
	{
		return true;
	}
}