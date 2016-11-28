<?php

namespace Kiosco\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ConfigpapercutTable
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

    public function getConfigPapercut($idConfigPapercut)
    {
        $idConfigPapercut = (int) $idConfigPapercut;
        $rowset = $this->tableGateway->select(['id_config_papercut' => $idConfigPapercut]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $idConfigPapercut
            ));
        }

        return $row;
    }

    public function saveConfigPapecut(Configpapercut $config)
    {
        $data = [
             'id_config_papercut' => $config->idConfigPapercut,
             'ip'  => $config->ip,
             'puerto' => $config->puerto,
             'release_station_id'  => $config->releaseStationID,
             'auth_details'  => $config->authDetails,
             'release_station_type' => $config->releaseStationType,
             'protocol_version'  => $config->protocolVersion,
             'ruta_release_station'  => $config->rutaReleaseStation,
             'ruta_user_api'  => $config->rutaUserAPI,
             'ruta_printer_status'  => $config->rutaPrinterStatus,
             'admin_contrasena' => $config->adminContrasena,
             'authorization'  => $config->authorization,
        ];

        $idConfigPapercut = (int) $config->idConfigPapercut;

        if ($idConfigPapercut === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getConfigPapercut($idConfigPapercut)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $idConfigPapercut
            ));
        }

        $this->tableGateway->update($data, ['id_config_papercut' => $idConfigPapercut]);
    }

    public function deleteConfigPapercut($idConfigPapercut)
    {
        $this->tableGateway->delete(['id_config_papercut' => (int) $idConfigPapercut]);
    }
}