<?php

namespace Kiosco\Form;

use Zend\Form\Form;

class ConfigkioscoForm extends Form
{
    public function __construct($name = null)
    {
      
        parent::__construct('configkiosco');

        $this->add([
            'name' => 'idConfigKiosco',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nombreConfig',
            'type' => 'text',
            'options' => [
                'label' => 'Nombre',
            ],
        ]);
        $this->add([
            'name' => 'valor',
            'type' => 'text',
            'options' => [
                'label' => 'Valor',
            ],
        ]);
        $this->add([
            'name' => 'idKiosco',
            'type' => 'text',
            'options' => [
                'label' => 'ID Kiosco',
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