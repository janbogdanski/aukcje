<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
//Router::connect('/admin/:plugin/:controller/:action/*', array('admin' => true));

Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
//Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
Router::connect('/kontakt', array('controller' => 'pages', 'action' => 'contact'));
Router::connect('/polityka-prywatnosci', array('controller' => 'pages', 'action' => 'display', 'policy'));
Router::connect('/regulamin', array('controller' => 'pages', 'action' => 'display', 'rules'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/aukcje', array('controller' => 'auctions',));
Router::connect('/aukcje/:action/*', array('controller' => 'auctions',));
Router::connect('/galerie', array('controller' => 'galleries',));
Router::connect('/galerie/:action/*', array('controller' => 'galleries',));
Router::connect('/obrazy', array('controller' => 'images',));
Router::connect('/obrazy/:action/*', array('controller' => 'images',));
Router::connect('/sitemap.xml', array('controller' => 'pages', 'action' => 'sitemap'));
Router::connect('/opauth-complete/*', array('plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'opauth_complete'));
Router::connect('/opauth-complete', array('plugin' => 'Usermgmt', 'controller' => 'users', 'action' => 'opauth_complete'));
Router::connect('/pomoc', array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'index','tag' => 'pomoc',));
//Router::redirect(
//    '/auctions/*',
//    array('controller' => 'posts', 'action' => 'view'),
//    array('persist' => true)
//);

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
//Router::connect('/admin/blog/:action/*', array('admin' => true, 'prefix' => 'admin', 'plugin' => 'blog'));
include APP.'Plugin'.DS.'Blog'.DS.'Config'.DS.'routes.php';
CakePlugin::routes();
/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
