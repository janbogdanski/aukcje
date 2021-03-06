<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Contact', 'Blog.BlogPost','Auction', 'Gallery');
    public $helpers = array('Text','Time');
    public $components = array('RequestHandler');


    public function contact(){
//        print_r($this->Contact->validationErrors);
//        var_dump($this->Contact->validates());
        if(!empty($this->data)) {
            $this->Contact->set($this->data);
            if($this->Contact->validates()) {


                $email = new CakeEmail();
                try {
                    $email->config('contact');
                } catch(Exception $e) {
                    echo 'Config in email.php not found';
                    exit;
                }
                $this->Contact->set($this->request->data['Contact']);
                $data = $this->request->data['Contact'];

                $email->from($data['Mail'])
                    ->replyTo($data['Mail'])
                    ->subject(__d('contact', 'contact form request'))
                    ->send(
                    __d('contact', 'name').': '.Sanitize::clean($data['Name'])."\n".
                        __d('contact', 'email').': '.Sanitize::clean($data['Mail'])."\n\n".
                        __d('contact', 'message').":\n".
                        Sanitize::html($data['Message'])."\n\n".
                        "----------------------------\n".
                        __d('contact', 'sent from').' '.Router::url('/', true)
                );

                //kopia do nadawcy
                $email->to($data['Mail'])
                    ->subject(__d('contact', 'Copy - contact form request'))
                    ->send(
                    __d('contact', 'name').': '.Sanitize::clean($data['Name'])."\n".
                        __d('contact', 'email').': '.Sanitize::clean($data['Mail'])."\n\n".
                        __d('contact', 'message').":\n".
                        Sanitize::html($data['Message'])."\n\n".
                        "----------------------------\n".
                        __d('contact', 'this is copy of your message sent to proaukcje admin')."\n".
                        __d('contact', 'sent from').' '.Router::url('/', true)
                );

                $this->Session->setFlash(__d('contact', 'Message sent!'), 'good');
                $this->redirect(array('controller' => 'pages', 'action' => 'contact'));
            } else {
                $this->Session->setFlash(__d('contact', 'Message not sent!'), 'error');
                $this->render('contact');
            }
        }
    }
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
    public  function  index(){

        $options = array(
            'conditions' => array('BlogPost.published' => 1),
            'limit' => 2,
            'order' => 'BlogPost.id DESC'
        );

        $blogPosts = $this->BlogPost->find('all', $options);
        $this->set('blogSettings', ClassRegistry::init('Blog.BlogSetting')->getSettings());
        $this->set(compact('blogPosts'));


    }



    function sitemap(){
        $this->RequestHandler->respondAs('xml');
//        print_r($this->Page->find('all', array( 'conditions' => array('Page.status' => 1 ), 'fields' => array('modified','id','slug'))));

        $this->layout = "xml/sitemap";
        $this->set('blogPosts', $this->BlogPost->find('all',array('fields' => array('modified','id','slug'), 'recursive' => 0)));
        $this->set('auctions', $this->Auction->find('all',array('fields' => array('modified','id'), 'recursive' => 0, 'order' => 'id desc')));
        $this->set('galleries', $this->Gallery->find('all',array('fields' => array('modified','id'), 'recursive' => 0, 'order' => 'id desc')));
//        $this->set('pages', '');
//debug logs will destroy xml format, make sure were not in drbug mode
//        Configure::write ('debug', 0);
    }

}
