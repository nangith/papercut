<?php

namespace Kiosco\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class KioscoTable
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

    public function getKiosco($idKiosco)
    {
        $idKiosco = (int) $idKiosco;
        $rowset = $this->tableGateway->select(['id_kiosco' => $idKiosco]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $idKiosco
            ));
        }

        return $row;
    }

    public function saveKiosco(Kiosco $kiosco)
    {
        $data = [
             'id_kiosco'	 => $kiosco->idKiosco,
             'nombre' 	     => $kiosco->nombre,
             'ruta' 	     => $kiosco->ruta,
             'id_impresora'  => $kiosco->idImpresora,
             'nombre_impresora'  => $kiosco->nombreImpresora,
             'id_config_papercut' => $kiosco->idConfigPapercut,
        ];

        $idKiosco = (int) $kiosco->idKiosco;

        if ($idKiosco === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getKiosco($idKiosco)) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $idKiosco
            ));
        }

        $this->tableGateway->update($data, ['id_kiosco' => $idKiosco]);
    }

    public function deleteKiosco($idKiosco)
    {
        $this->tableGateway->delete(['id_kiosco' => (int) $idKiosco]);
    }
}