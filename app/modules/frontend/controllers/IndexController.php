<?php

namespace FrontEnd\Controller;

use Application\Mvc\Controller;
use FrontEnd\Forms\LoginForm;
use FrontEnd\Forms\UserForm;

class IndexController extends Controller {

	public function indexAction() {
		// $this->helper->cacheExpire(120);
		$this->helper->title()->append( 'Homapge' );

	}

	public function loginAction() {
		$loginForm = new LoginForm();
		if ( $this->request->isPost() ) {
			if ( ! $loginForm->isValid( $_POST ) ) {
				foreach ( $loginForm->getMessages() as $message ) {
					echo $message;
				}
			} else {
				$email    = $this->request->getPost( 'email' );
				$password = $this->request->getPost( 'password' );
				if ( $email == "hoa@gmail.com" && $password == "1234" ) {
					$this->session->set( 'auth', true );
					$this->flash->success( "Login successfully !" );
					$this->response->redirect();
				} else {
					$this->flash->error( "Login fail !" );
				}

			}
		}
		$this->view->loginForm = $loginForm;
	}

	public function handleLoginAction() {
		if ( $this->request->isPost() ) {
			if ( $this->security->checkToken() ) {
				echo "The token is ok";
			} else {
				echo "The token is not ok";
			}
		}

	}

	public function signupAction() {
		$signupForm = new UserForm();
		if ( $this->request->isPost() ) {

			if ( ! $signupForm->isValid( $_POST ) ) {
				foreach ( $signupForm->getMessages() as $message ) {
					echo $message;
				}
			} else {
				$this->flash->success( "Signup successfully !" );
			}
		}
		$this->view->signupForm = $signupForm;
	}

	public function showDayAction() {
		$this->view->disable();
		$month = $this->request->getPost( 'month' );
		$year  = $this->request->getPost( 'year' );
		$day = cal_days_in_month( CAL_GREGORIAN, $month, $year );
		echo ( isset( $day ) ) ? $day : 0;
	}

	public function logoutAction() {
		$this->session->destroy();
		$this->response->redirect();
	}
}
