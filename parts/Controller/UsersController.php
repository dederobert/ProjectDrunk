<?php 
/**
 * File UsersController.php
 *
 * PHP version 7
 * @category Controller
 * @package Controller
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */
namespace App\Controller;

use Drunk\Controller\Controller;
/**
* 
*/
class UsersController extends Controller
{
	
	public function view()
	{
		if (isset($_SESSION['user'])) {
			$user = unserialize($_SESSION['user']);
			if (isset($_POST['maj_pwd'])) {
				$user->password = $_POST['password'];
				$this->Users->save($user);
			}elseif (isset($_POST['submit'])) {
				if (isset($_POST['lastname']))
					$user->lastname = $_POST['lastname'];
				if (isset($_POST['firstname']))
					$user->firstname = $_POST['firstname'];
				if (isset($_POST['sexe']))
					$user->sexe = $_POST['sexe'];
				if (isset($_POST['email']))
					$user->email = $_POST['email'];
				if (isset($_POST['ddn']))
					$user->ddn = $_POST['ddn'];
				if (isset($_POST['address']))
					$user->address = $_POST['address'];
				if (isset($_POST['zipcode']))
					$user->zipcode = $_POST['zipcode'];
				if (isset($_POST['city']))
					$user->city = $_POST['city'];
				if (isset($_POST['phone']))
					$user->phone = $_POST['phone'];
				$this->Users->save($user);
			}
			$this->set('username', $user->username);
			$this->set('lastname', $user->lastname);
			$this->set('firstname', $user->firstname);
			$this->set('sexe', $user->sexe);
			$this->set('email', $user->email);
			$this->set('ddn',$user->ddn);
			$this->set('address', $user->address);
			$this->set('zipcode', $user->zipcode);
			$this->set('city', $user->city);
			$this->set('phone', $user->phone);
		}
	}

	public function login()
	{
		if (isset($_POST['submit'])) {
			 if ($this->Users->connect($_POST['username'], $_POST['password']) === false) {
			 	$this->set('username', $_POST['username']);
			 	$this->set('error', "Mauvais mot de passe ou nom d'utilisateur");
			 }else{
			 	$this->redirect(['controller'=>'pages','action'=>'view','params'=>['home']]);
			 }
		}else
			$this->set('username', '');
	}

	public function logout()
	{
		unset($_SESSION['user']);
		$this->redirect(['controller'=>'pages','action'=>'view','params'=>['home']]);
	}

	public function register()
	{
		$username = '';
		$password = '';
		$lastname = '';
		$firstname = '';
		$sexe = '';
		$email = '';
		$ddn = '';
		$address = '';
		$zipcode = '';
		$city = '';
		$phone = '';
		if (isset($_POST['submit'])) {
			$username = isset($_POST['username'])?$_POST['username']:'';
			$password = isset($_POST['password'])?$_POST['password']:'';
			$lastname = isset($_POST['lastname'])?$_POST['lastname']:'';
			$firstname = isset($_POST['firstname'])?$_POST['firstname']:'';
			$sexe = isset($_POST['sexe'])?$_POST['sexe']:'';
			$email = isset($_POST['email'])?$_POST['email']:'';
			$ddn = isset($_POST['ddn'])?$_POST['ddn']:'';
			$address = isset($_POST['address'])?$_POST['address']:'';
			$zipcode =  isset($_POST['zipcode'])?$_POST['zipcode']:'';
			$city =  isset($_POST['city'])?$_POST['city']:'';
			$phone = isset($_POST['phone'])?$_POST['phone']:'';
			if ($this->Users->register($username, $password, $lastname, $firstname, $sexe, $email, $ddn, $address, $zipcode, $city, $phone)){
				$this->redirect(['controller'=>'pages','action'=>'view','params'=>['home']]);
			}else{
				$this->set('error', "Ce nom d'utilisateur est déjà utilisé");
			}
		}
		$this->set('username', $username);
		$this->set('lastname', $lastname);
		$this->set('firstname', $firstname);
		$this->set('sexe', $sexe);
		$this->set('email', $email);
		$this->set('ddn', $ddn);
		$this->set('address', $address);
		$this->set('zipcode', $zipcode);
		$this->set('city', $city);
		$this->set('phone', $phone);	
	}

	public function favorite($cocktail) {
		$this->renderLayout('ajax');
		// Enregistrer le favorie
		
	}
	
	public function unfavorite($cocktail) {
		$this->renderLayout('ajax');
		$this->renderView('cocktails', 'favorite');
		// Desenregistrer le favorie
	}
	
}
  ?>