<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    08.02.13 20:06
 */

class EmailConfig {

    public $default = array(
        'from' => array('proaukcje@gmail.com' => 'Proaukcje'),
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'proaukcje@gmail.com',
        'password' => 'jan180388',
        'transport' => 'Smtp',
    );
    public $contact = array(
        'to' => 'proaukcje@gmail.com',
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'proaukcje@gmail.com',
        'password' => 'jan180388',
        'transport' => 'Smtp',
    );

    public $register = array(
        'from' => array('proaukcje@gmail.com' => 'Proaukcje'),
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'proaukcje@gmail.com',
        'password' => 'jan180388',
        'transport' => 'Smtp',
    );

    public $smtp = array(
        'transport' => 'Smtp',
        'from' => array('proaukcje@gmail.com' => 'Proaukcje'),
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'timeout' => 30,
        'username' => 'proaukcje@gmail.com',
        'password' => 'jan180388',
        'client' => null,
        'log' => false,
        //'charset' => 'utf-8',
        //'headerCharset' => 'utf-8',
    );

    public $fast = array(
        'from' => 'you@localhost',
        'sender' => null,
        'to' => null,
        'cc' => null,
        'bcc' => null,
        'replyTo' => null,
        'readReceipt' => null,
        'returnPath' => null,
        'messageId' => true,
        'subject' => null,
        'message' => null,
        'headers' => null,
        'viewRender' => null,
        'template' => false,
        'layout' => false,
        'viewVars' => null,
        'attachments' => null,
        'emailFormat' => null,
        'transport' => 'Smtp',
        'host' => 'localhost',
        'port' => 25,
        'timeout' => 30,
        'username' => 'user',
        'password' => 'secret',
        'client' => null,
        'log' => true,
        //'charset' => 'utf-8',
        //'headerCharset' => 'utf-8',
    );

}
