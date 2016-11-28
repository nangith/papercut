<?php

namespace Kiosco\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ConfigkioscoTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getConfigKiosco($idConfigKiosco)
    {
        $idConfigKiosco = (int) $idConfigKiosco;
        $rowset = $this->tableGateway->select(['id_config_kiosco' => $idConfigKiosco]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $idConfigKiosco
            ));
        }

        return $row;
    }

    public function saveConfigKiosco(Configkiosco $config)
    {
        $data = [
             'id_config_kiosco'	 => $config->idConfigKiosco,
             'nombre_config' 	 => $config->nombreConfig,
             'valor' 	     => $config->valor,
             'id_kiosco'  => $config->idKiosco,
        ];

        $idConfigKiosco = (int) $config->idConfigKiosco;

        if ($idConfigKiosco === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getConfigKiosco($idConfigKiosco)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $idConfigKiosco
            ));
        }

        $this->tableGateway->update($data, ['id_config_kiosco' => $idConfigKiosco]);
    }

    public function deleteConfigKiosco($idConfigKiosco)
    {
        $this->tableGateway->delete(['id_config_kiosco' => (int) $idConfigKiosco]);
    }
}