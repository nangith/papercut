<?php

namespace Kiosco;

use Zend\Router\Http\Segment;
use Kiosco\Controller\KioscoController;
use Kiosco\Controller\ConfigKioscoController;
use Kiosco\Controller\ConfigPapercutController;

//use Zend\ServiceManager\Factory\InvokableFactory;

return [
/**
    'controllers' => [
        'factories' => [
            Controller\KioscoController::class => InvokableFactory::class,
            Controller\ConfigkioscoController::class => InvokableFactory::class,
            Controller\ConfigpapercutController::class => InvokableFactory::class,
        ],
    ],
    */

    'router' => [
        'routes' => [
            'home' => [
                'type'    => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\KioscoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'kiosco' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/kiosco[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\KioscoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'configkiosco' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/configkiosco[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ConfigkioscoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'configpapercut' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/configpapercut[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ConfigpapercutController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];