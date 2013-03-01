<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 *
 * @property Post $Post
 * @property Setting $Setting
 * @property Book $Book
 * @property Auction $Auction
 * @property Template $Template
 * @property Gallery $Gallery
 * @property Image $Image
 * @property GalleriesDetails $GalleriesDetails
 * @property UserAuthComponent $UserAuth
 * @property Contact $Contact
 * @property Metum $Metum
 * @property BlogPost $BlogPost
 * @property UploadComponent $Upload
 * @property PicasaComponent $Picasa
 */
class AppController extends Controller {

    public $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth','Metadata.Metadata');
    public $components = array('Session','RequestHandler', 'Usermgmt.UserAuth','Metadata.Metadata');
    function beforeFilter(){
        $this->userAuth();
    }
    public function beforeRender(){
        parent::beforeRender();
        $this->set('user', $this->UserAuth->getUser());
        $this->set('isLogged', $this->UserAuth->isLogged());

    }
    private function userAuth(){
        $this->UserAuth->beforeFilter($this);
    }
}
