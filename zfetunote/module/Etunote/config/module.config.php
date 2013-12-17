<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Etunote\Controller\Etunote' => 'Etunote\Controller\EtunoteController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'etunote' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/etunote[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Etunote\Controller\Etunote',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'etunote' => __DIR__ . '/../view',
        ),
    ),
);

