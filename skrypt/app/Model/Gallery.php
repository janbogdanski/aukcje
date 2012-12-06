<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:11
 */

App::uses('AuthComponent', 'Controller/Component');
/**
 */
class Gallery extends AppModel {
    public $name = 'Gallery';

    const STATUS_NEW = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_DISABLED = 3;

    public $hasMany = array(
        'GalleriesDetails' => array(
            'className'     => 'GalleriesDetails',
            'foreignKey'    => 'gallery_id',
//            'conditions'    => array('Comment.status' => '1'),
            'order'         => 'GalleriesDetails.order ASC',
//            'limit'         => '5',
            'dependent'     => true
        )
    );


}