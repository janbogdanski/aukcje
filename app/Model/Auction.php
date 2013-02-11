<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:11
 */

App::uses('AuthComponent', 'Controller/Component');
/**
 */
class Auction extends AppModel {
    public $name = 'Auction';
    public $cleanData = true;
    public $cleanDataLeave = array(
        'contents',
        'field_1_content',
        'field_2_content',
        'field_3_content',
    );


}