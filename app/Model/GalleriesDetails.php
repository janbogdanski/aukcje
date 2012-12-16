<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:11
 */

App::uses('AuthComponent', 'Controller/Component');
/**
 */
class GalleriesDetails extends AppModel {
    public $name = 'GalleriesDetails';
    public $belongsTo = 'Gallery';
//
//    public $hasOne = array(
//        'Gallery' => array(
//            'className' => 'Gallery',
//        )
//    );



}