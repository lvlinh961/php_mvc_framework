<?php
namespace app\controllers;

use lvl\phpcoremvc\Application;
use lvl\phpcoremvc\Controller;
use lvl\phpcoremvc\Request;
use lvl\phpcoremvc\Response;
use lvl\phpcoremvc\middlewares\AuthMiddleware;

use app\models\User;
use app\models\LoginForm;


class AuthController extends Controller
{
	public function __construct() {
		$this->registerMiddleware(new AuthMiddleware(['profile']));
	}

	public function login(Request $request, Response $response)
	{
		$this->setLayout('auth');

		$loginForm = new LoginForm();

		if ($request->isPost()) {
			$loginForm->loadData($request->getBody());		

			if ($loginForm->validate() && $loginForm->login()) {
				Application::$app->session->setFlash('success', 'Login success');
				$response->redirect('/');
				return;
			}

			return $this->render('login', [
				'model' => $loginForm
			]);
		}
		
		return $this->render('login', [
				'model' => $loginForm
			]);
	}

	public function register(Request $request)
	{
		$this->setLayout('auth');

		$errors = [];

		$user = new User();

		if ($request->isPost()) {
			$user->loadData($request->getBody());		

			if ($user->validate() && $user->save()) {
				Application::$app->session->setFlash('success', 'Thanks for registering');
				Application::$app->response->redirect('/');
			}

			return $this->render('register', [
				'model' => $user
			]);
		}
		return $this->render('register', [
			'model' => $user
		]);
	}

	public static function logout(Request $request, Response $response)
	{
		Application::$app->logout();
		$response->redirect('/');
	}

	public function profile()
	{
		// Application::$app->
		return $this->render('profile');
	}
}