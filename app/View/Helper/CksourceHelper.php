<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 * @source http://bakery.cakephp.org/articles/wernerhp/2010/08/31/cksource-helper-for-ckeditor - w komentarzu jest tez jakis kod
 * @todo - ma byc prosto ->ckeditor('duzy') //lub maly, bez zbednych opcji
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class CksourceHelper extends Helper {

    var $helpers = array('Html');

    function ckeditor($fieldName, $options = array()) {
        //CakePHP 1.2.4.8284
        $options = $this->_initInputField($fieldName, $options);
        
        //If you have probelms, try adding a second underscore to _initInputField.  I haven't tested this, but some commenters say it works.
        //$options = $this->__initInputField($fieldName, $options);
        $value = null;
        $config = null;
        $events = null;

        if (array_key_exists('value', $options)) {
            $value = $options['value'];
            if (!array_key_exists('escape', $options) || $options['escape'] !== false) {
                $value = h($value);
            }
            unset($options['value']);
        }
        if (array_key_exists('config', $options)) {
            $config = $options['config'];
            unset($options['config']);
        }
        if (array_key_exists('events', $options)) {
            $events = $options['events'];
            unset($options['events']);
        }

        require_once WWW_ROOT.DS.'js'.DS.'ckeditor'.DS.'ckeditor.php';
        $CKEditor = new CKEditor();
        $CKEditor->basePath = $this->webroot.'js/ckeditor/';

        return $CKEditor->editor($options['name'], $value, $config, $events);
    }
} 