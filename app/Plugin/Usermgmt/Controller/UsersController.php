<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/

App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class UsersController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth=$this->UserAuth;
	}
	/**
	 * Used to display all users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->User->unbindModel( array('hasMany' => array('LoginToken')));
		$users=$this->User->find('all', array('order'=>'User.id desc'));
		$this->set('users', $users);
	}
	/**
	 * Used to display detail of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return array
	 */
	public function viewUser($userId=null) {
		if (!empty($userId)) {
			$user = $this->User->read(null, $userId);
			$this->set('user', $user);
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to display detail of user by user
	 *
	 * @access public
	 * @return array
	 */
	public function myprofile() {
		$userId = $this->UserAuth->getUserId();
		$user = $this->User->read(null, $userId);
		$this->set('user', $user);
	}

    /**
     * Autoryzacja oauth przez fb, google... - metoda wywolywana po zakonczeniu
     *
     * Gdy ok - $this->data['validated'] = 1
     * @access public
     * @return void
     */
    public  function opauth_complete(){

        if($this->data['validated']){

            //tzn OK - loguj lub rejestruj i loguj
           $registered = $this->User->find('first', array(
                'conditions' => array(
                    'User.oauth_provider' => $this->data['auth']['provider'],
                    'User.oauth_uid' => $this->data['auth']['uid']
                )
            ));
            if($registered){

                //mamy w db - loguj
                $this->UserAuth->login($registered);
            } else{

                //rejestracja
                $user = array(
                    'user_group_id' => DEFAULT_GROUP_ID,
                    'email' => $this->data['auth']['info']['email'],
                    'username' => $this->data['auth']['uid'],
                    'oauth_provider' => $this->data['auth']['provider'],
                    'oauth_uid' => $this->data['auth']['uid'],
                    'email_verified' => 1,
                    'active' => 1,
                );
                $this->User->save($user);

                //pobieramy z bazy, wraz z zaleznosciami
                $user = $this->User->find('first', array(
                    'conditions' => array('User.id' => $this->User->getLastInsertID())
                ));
                $this->UserAuth->login($user);
            }
            $this->Session->setFlash(__('Logged in with %s',$this->data['auth']['provider']),'good');
            $this->redirect('/');
        } else{
            $this->Session->setFlash(__('Access revoked by User'),'error');
            $this->redirect('/');
        }
    }

    /**
	 * Used to logged in the site
	 *
	 * @access public
	 * @return void
	 */
	public function login() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$password = $this->data['User']['password'];

//				$user = $this->User->findByUsername($email);
//				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username or Password'),'error');
						return;
					}
//				}
				// check for inactive account
				if ($user['User']['id'] != 1 and $user['User']['active']==0) {
					$this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'),'info');
					return;
				}
				// check for verified account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					$this->Session->setFlash(__('Your registration has not been confirmed please verify your email or contact to Administrator'),'info');
					return;
				}
				if(empty($user['User']['salt'])) {
					$hashed = md5($password);
				} else {
					$hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
				}
				if ($user['User']['password'] === $hashed) {
					if(empty($user['User']['salt'])) {
						$salt=$this->UserAuth->makeSalt();
						$user['User']['salt']=$salt;
						$user['User']['password']=$this->UserAuth->makePassword($password, $salt);
						$this->User->save($user,false);
					}
					$this->UserAuth->login($user);
					$remember = (!empty($this->data['User']['remember']));
					if ($remember) {
						$this->UserAuth->persist('2 weeks');
					}
					$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
					$this->Session->delete('Usermgmt.OriginAfterLogin');
					$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
					$this->redirect($redirect);
				} else {
					$this->Session->setFlash(__('Incorrect Email/Username or Password'),'error');
					return;
				}
			}
		}
	}
	/**
	 * Used to logged out from the site
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->UserAuth->logout();
		$this->Session->setFlash(__('You are successfully signed out'),'good');
		$this->redirect(LOGOUT_REDIRECT_URL);
	}
	/**
	 * Used to register on the site
	 *
	 * @access public
	 * @return void
	 */
	public function register() {
		$userId = $this->UserAuth->getUserId();
		if ($userId) {
			$this->redirect("/dashboard");
		}
		if (SITE_REGISTRATION) {
			$userGroups=$this->UserGroup->getGroupsForRegistration();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPost()) {
				if(USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
					$this->request->data['User']['captcha']= (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
				}
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					if (!isset($this->data['User']['user_group_id'])) {
						$this->request->data['User']['user_group_id']=DEFAULT_GROUP_ID;
					} elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
						$this->Session->setFlash(__('Please select correct register as'),'error');
						return;
					}
					$this->request->data['User']['active']=1;
					if (!EMAIL_VERIFICATION) {
						$this->request->data['User']['email_verified']=1;
					}
					$ip='';
					if(isset($_SERVER['REMOTE_ADDR'])) {
						$ip=$_SERVER['REMOTE_ADDR'];
					}
					$this->request->data['User']['ip_address']=$ip;
					$salt=$this->UserAuth->makeSalt();
					$this->request->data['User']['salt'] = $salt;
					$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($this->request->data,false);
					$userId=$this->User->getLastInsertID();
					$user = $this->User->findById($userId);
					if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
						$this->User->sendRegistrationMail($user);
					}
					if (EMAIL_VERIFICATION) {
						$this->User->sendVerificationMail($user);
					}
					if (isset($this->request->data['User']['email_verified']) && $this->request->data['User']['email_verified']) {
						$this->UserAuth->login($user);
						$this->redirect('/');
					} else {
						$this->Session->setFlash(__('Please check your mail and confirm your registration'),'good');
						$this->redirect('/register');
					}
				}
			}
		} else {
			$this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'),'info');
			$this->redirect('/login');
		}
	}
	/**
	 * Used to change the password by user
	 *
	 * @access public
	 * @return void
	 */
	public function changePassword() {
		$userId = $this->UserAuth->getUserId();
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
				$user=array();
				$user['User']['id']=$userId;
				$salt=$this->UserAuth->makeSalt();
				$user['User']['salt'] = $salt;
				$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($user,false);
				$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
				$this->Session->setFlash(__('Password changed successfully'),'good');
				$this->redirect('/dashboard');
			}
		}
	}
	/**
	 * Used to change the user password by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function changeUserPassword($userId=null) {
		if (!empty($userId)) {
			$name=$this->User->getNameById($userId);
			$this->set('name', $name);
			if ($this->request -> isPost()) {
				$this->User->set($this->data);
				if($this->User->RegisterValidate()) {
					$user=array();
					$user['User']['id']=$userId;
					$salt=$this->UserAuth->makeSalt();
					$user['User']['salt'] = $salt;
					$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($user,false);
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->Session->setFlash(__('Password for %s changed successfully', $name),'good');
					$this->redirect('/allUsers');
				}
			}
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to add user on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addUser() {
		$userGroups=$this->UserGroup->getGroups();
		$this->set('userGroups', $userGroups);
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
				$this->request->data['User']['email_verified']=1;
				$this->request->data['User']['active']=1;
				$salt=$this->UserAuth->makeSalt();
				$this->request->data['User']['salt'] = $salt;
				$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($this->request->data,false);
				$this->Session->setFlash(__('The user is successfully added'),'good');
				$this->redirect('/addUser');
			}
		}
	}
	/**
	 * Used to edit user on the site by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function editUser($userId=null) {
		if (!empty($userId)) {
			$userGroups=$this->UserGroup->getGroups();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPut()) {
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$this->User->save($this->request->data,false);
					$this->Session->setFlash(__('The user is successfully updated'),'good');
					$this->redirect('/allUsers');
				}
			} else {
				$user = $this->User->read(null, $userId);
				$this->request->data=null;
				if (!empty($user)) {
					$user['User']['password']='';
					$this->request->data = $user;
				}
			}
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to delete the user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function deleteUser($userId = null) {
		if (!empty($userId)) {
			if ($this->request -> isPost()) {
				if ($this->User->delete($userId, false)) {
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->Session->setFlash(__('User is successfully deleted'),'good');
				}
			}
			$this->redirect('/allUsers');
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to show dashboard of the user
	 *
	 * @access public
	 * @return array
	 */
	public function dashboard() {
		$userId=$this->UserAuth->getUserId();
		$user = $this->User->findById($userId);
		$this->set('user', $user);
	}
	/**
	 * Used to activate or deactivate user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @param integer $active active or inactive
	 * @return void
	 */
	public function makeActiveInactive($userId = null, $active=0) {
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['active']=($active) ? 1 : 0;
			$this->User->save($user,false);
			if($active) {
				$this->Session->setFlash(__('User is successfully activated'),'good');
			} else {
				$this->Session->setFlash(__('User is successfully deactivated'),'good');
			}
		}
		$this->redirect('/allUsers');
	}
	/**
	 * Used to verify email of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function verifyEmail($userId = null) {
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['email_verified']=1;
			$this->User->save($user,false);
			$this->Session->setFlash(__('User email is successfully verified'),'good');
		}
		$this->redirect('/allUsers');
	}
	/**
	 * Used to show access denied page if user want to view the page without permission
	 *
	 * @access public
	 * @return void
	 */
	public function accessDenied() {

	}
	/**
	 * Used to verify user's email address
	 *
	 * @access public
	 * @return void
	 */
	public function userVerification() {
		if (isset($_GET['ident']) && isset($_GET['activate'])) {
			$userId= $_GET['ident'];
			$activateKey= $_GET['activate'];
			$user = $this->User->read(null, $userId);
			if (!empty($user)) {
				if (!$user['User']['email_verified']) {
					$password = $user['User']['password'];
					$theKey = $this->User->getActivationKey($password);
					if ($activateKey==$theKey) {
						$user['User']['email_verified']=1;
						$this->User->save($user,false);
						if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
							$this->User->sendRegistrationMail($user);
						}
						$this->Session->setFlash(__('Thank you, your account is activated now'),'good');
					}
				} else {
					$this->Session->setFlash(__('Thank you, your account is already activated'),'good');
				}
			} else {
				$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'),'error');
			}
		} else {
			$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'),'error');
		}
		$this->redirect('/login');
	}
	/**
	 * Used to send forgot password email to user
	 *
	 * @access public
	 * @return void
	 */
	public function forgotPassword() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
//				$user = $this->User->findByUsername($email);
//				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username'),'error');
						return;
					}
//				}
				// check for inactive account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					$this->Session->setFlash(__('Your registration has not been confirmed yet please verify your email before reset password'),'info');
					return;
				}
				$this->User->forgotPassword($user);
				$this->Session->setFlash(__('Please check your mail for reset your password'),'good');
				$this->redirect('/login');
			}
		}
	}
	/**
	 *  Used to reset password when user comes on the by clicking the password reset link from their email.
	 *
	 * @access public
	 * @return void
	 */
	public function activatePassword() {
		if ($this->request -> isPost()) {
			if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
				$this->set('ident',$this->data['User']['ident']);
				$this->set('activate',$this->data['User']['activate']);
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$userId= $this->data['User']['ident'];
					$activateKey= $this->data['User']['activate'];
					$user = $this->User->read(null, $userId);
					if (!empty($user)) {
						$password = $user['User']['password'];
						$thekey =$this->User->getActivationKey($password);
						if ($thekey==$activateKey) {
							$user['User']['password']=$this->data['User']['password'];
							$salt=$this->UserAuth->makeSalt();
							$user['User']['salt'] = $salt;
							$user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
							$this->User->save($user,false);
							$this->Session->setFlash(__('Your password has been reset successfully'),'good');
							$this->redirect('/login');
						} else {
							$this->Session->setFlash(__('Something went wrong, please send password reset link again'),'error');
						}
					} else {
						$this->Session->setFlash(__('Something went wrong, please click again on the link in email'),'error');
					}
				}
			} else {
				$this->Session->setFlash(__('Something went wrong, please click again on the link in email'),'error');
			}
		} else {
			if (isset($_GET['ident']) && isset($_GET['activate'])) {
				$this->set('ident',$_GET['ident']);
				$this->set('activate',$_GET['activate']);
			}
		}
	}
	/**
	 * Used to send email verification mail to user
	 *
	 * @access public
	 * @return void
	 */
	public function emailVerification() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
//				$user = $this->User->findByUsername($email);
//				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username'),'error');
						return;
					}
//				}
				if($user['User']['email_verified']==0) {
					$this->User->sendVerificationMail($user);
					$this->Session->setFlash(__('Please check your mail to verify your email'),'good');
				} else {
					$this->Session->setFlash(__('Your email is already verified'),'info');
				}
				$this->redirect('/login');
			}
		}
	}
}