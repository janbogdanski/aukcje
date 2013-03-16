<?php
/**
 * AppShell file
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
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Shell', 'Console');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Shell
 *
 * Add your application-wide methods in the class below, your shells
 * will inherit them.
 *
 * @package       app.Console.Command
 */
class MailShell extends AppShell
{
    public $uses = array('Mail');
    public function main()
    {
        set_time_limit(0);
        $result = '';
//        $users = $this->Mail->find('all', array('conditions' => array('login' => 'halibucik')));
        $users = $this->Mail->find('all', array('conditions' => array('sent' => 0)));

        foreach ($users as $user) {
            if (!filter_var($user['Mail']['email'], FILTER_VALIDATE_EMAIL)) {
//                echo 'aaaaa';
//                var_dump(filter_var($user['Mail']['email'], FILTER_VALIDATE_EMAIL));
                continue;
            }
//            echo 'bbbb';
            $email = new CakeEmail('register');
            $email->to($user['Mail']['email']);
            $email->subject('Proaukcje.eu zastąpiło proaukcje.pl');
            $email->template('mailing1');
            $email->emailFormat('both');
            try {
                $result = $email->send();
                $this->Mail->id = $user['Mail']['id'];
                $this->Mail->save(array('sent' => 1));
                $this->out('Hello mail. ' . $user['Mail']['email']);
                sleep(1);
            } catch (Exception $ex) {
                // we could not send the email, ignore it
                $result = "Could not send registration email to userid-" . $user['Mail']['id']. ' '.$ex->getMessage();
                $this->log($result, LOG_DEBUG);
            }
//            sleep(1);
        } //end foreach
    }
}