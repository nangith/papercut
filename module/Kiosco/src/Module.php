<?php

namespace Kiosco;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

     public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\KioscoTable::class => function($container) {
                    $tableGateway = $container->get(Model\KioscoTableGateway::class);
                    return new Model\KioscoTable($tableGateway);
                },
                Model\KioscoTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Kiosco());
                    return new TableGateway('kiosco', $dbAdapter, null, $resultSetPrototype);
                },
                Model\ConfigkioscoTable::class => function($container) {
                    $tableGateway = $container->get(Model\ConfigkioscoTableGateway::class);
                    return new Model\ConfigkioscoTable($tableGateway);
                },
                Model\ConfigkioscoTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Configkiosco());
                    return new TableGateway('config_kiosco', $dbAdapter, null, $resultSetPrototype);
                },
                Model\ConfigpapercutTable::class => function($container) {
                    $tableGateway = $container->get(Model\ConfigpapercutTableGateway::class);
                    return new Model\ConfigpapercutTable($tableGateway);
                },
                Model\ConfigpapercutTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Configpapercut());
                    return new TableGateway('config_papercut', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\KioscoController::class => function($container) {
                    return new Controller\KioscoController(
                        $container->get(Model\KioscoTable::class)
                    );
                },
                Controller\ConfigkioscoController::class => function($container) {
                    return new Controller\ConfigkioscoController(
                        $container->get(Model\ConfigkioscoTable::class)
                    );
                },
                Controller\ConfigpapercutController::class => function($container) {
                    return new Controller\ConfigpapercutController(
                        $container->get(Model\ConfigpapercutTable::class)
                    );
                },
            ],
        ];
    }
}