<?php
CakePlugin::load('Environments');

App::uses('Environment', 'Environments.Lib');




Environment::configure('production',
    array(
        'server' => array(
            'www.proaukcje.eu',
            'proaukcje.eu',
            'www.production.proaukcje.eu',
            'production.proaukcje.eu',
        )
    ),
    array(
//        'Settings.FULL_BASE_URL'  => 'http://example.com',

        'debug'                   => 0,
    )
);
Environment::configure('stage',
    array(
        'server' => array(
            'www.stage.proaukcje.eu',
            'stage.proaukcje.eu',
        )
    ),
    array(
        'debug'                   => 2,
    )
);

Environment::configure('jbogdanski',
    array(
        'server' => array(
            'cake.jbogdanski.pub.dynamap.pl',
            'www.cake.jbogdanski.pub.dynamap.pl',

        )
    ),    array(
//        'Settings.FULL_BASE_URL'  => 'http://example.dev',
//
//        'Email.username'          => 'email@example.com',
//        'Email.password'          => 'password',
//        'Email.test'              => 'email@example.com',
//        'Email.from'              => 'email@example.com',
//
//        'logQueries'              => true,

        'debug'                   => 2,
        'Cache.disable'           => true,
    )
);

Environment::configure('development',
    true, //default
    array(
        'debug'                   => 1,
        'Cache.disable'           => true,
    )
);
Environment::start();
