<?php

namespace Kiosco\Form;

use Zend\Form\Form;

class ConfigpapercutForm extends Form
{
    public function __construct($name = null)
    {
      
        parent::__construct('configpapercut');

        $this->add([
            'name' => 'idConfigPapercut',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'ip',
            'type' => 'text',
            'options' => [
                'label' => 'Nombre',
            ],
        ]);
        $this->add([
            'name' => 'puerto',
            'type' => 'text',
            'options' => [
                'label' => 'Valor',
            ],
        ]);
        $this->add([
            'name' => 'releaseStationID',
            'type' => 'text',
            'options' => [
                'label' => 'Release Station ID',
            ],
        ]);
        $this->add([
            'name' => 'authDetails',
            'type' => 'text',
            'options' => [
                'label' => 'Auth Details',
            ],
        ]);
        $this->add([
            'name' => 'releaseStationType',
            'type' => 'text',
            'options' => [
                'label' => 'Release Station Type',
            ],
        ]);
        $this->add([
            'name' => 'protocolVersion',
            'type' => 'text',
            'options' => [
                'label' => 'Protocol Version',
            ],
        ]);
        $this->add([
            'name' => 'rutaReleaseStation',
            'type' => 'text',
            'options' => [
                'label' => 'Ruta Release Station',
            ],
        ]);
        $this->add([
            'name' => 'rutaUserAPI',
            'type' => 'text',
            'options' => [
                'label' => 'Ruta User API',
            ],
        ]);
        $this->add([
            'name' => 'rutaPrinterStatus',
            'type' => 'text',
            'options' => [
                'label' => 'Ruta printer status',
            ],
        ]);
        $this->add([
            'name' => 'adminContrasena',
            'type' => 'text',
            'options' => [
                'label' => 'Admin Contraseña',
            ],
        ]);
        $this->add([
            'name' => 'authorization',
            'type' => 'text',
            'options' => [
                'label' => 'Authorization',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Enviar',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}