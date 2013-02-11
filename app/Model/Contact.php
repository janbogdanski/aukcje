<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    08.02.13 19:26
 */

class Contact extends AppModel {
    var $name = 'Contacts';
    public $useTable = false;

    public $_schema = array(
        'Name' => array('type' => 'string' , 'null' => false, 'default' => '', 'length' => '50'),
        'Mail' => array('type' => 'string' , 'null' => false, 'default' => '', 'length' => '80'),
        'Message' => array('type' => 'text' , 'null' => false, 'default' => ''),
    );
    public $validate = array(
        'Name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true
            )
        ),
        'Mail' => array(
            'email' => array(
                'rule' => array('email'),
                'required' => true
            )
        ),
        'Message' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required' => true
            )
        ),
    );

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);

        $this->validate['Name']['notempty']['message'] = __d('contact', 'please insert your name');
        $this->validate['Mail']['email']['message'] = __d('contact', 'please insert your email address');
        $this->validate['Message']['notempty']['message'] = __d('contact', 'please enter your message');
    }

}