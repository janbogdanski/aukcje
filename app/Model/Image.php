<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:11
 */

App::uses('AuthComponent', 'Controller/Component');
/**
 */
class Image extends AppModel {
    public $name = 'Image';
    public $cleanData = false;
}