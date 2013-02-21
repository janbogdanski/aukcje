<?php
/**
 * Routing for Opauth
 */
Router::connect('/oauth/callback', array('plugin' => 'Opauth', 'controller' => 'Opauth', 'action' => 'callback'));
Router::connect('/oauth/*', array('plugin' => 'Opauth', 'controller' => 'Opauth', 'action' => 'index'));
