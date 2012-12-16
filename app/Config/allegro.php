<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behavior of Cake.
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * CakePHP Debug Level:
 *
 * Production Mode:
 * 	0: No error messages, errors, or warnings shown. Flash messages redirect.
 *
 * Development Mode:
 * 	1: Errors and warnings shown, model caches refreshed, flash messages halted.
 * 	2: As in 1, but also with full debug messages and SQL output.
 *
 * In production mode, flash messages redirect after a time interval.
 * In development mode, you need to click the flash message to continue.
 */
$config['Allegro'] = array(
//    'login' => 'hallibucik',
//    'password' => '1windsurfing2',
    'login' => 'ekspertagd_pl',
    'password' => 'sadfm!247HSA',
    'api_key' => '56c0d038bb',
    'wsdl' => 'https://webapi.allegro.pl/uploader.php?wsdl',
    'country' => 1,

);

//	Configure::write('Allegro.login', 'hallibucik');
//	Configure::write('Allegro.password', '1windsurfing2');
//	Configure::write('Allegro.api_key', '56c0d038bb');
//	Configure::write('Allegro.wsdl', 'https://webapi.allegro.pl/uploader.php?wsdl');
//	Configure::write('Allegro.country', 1);
