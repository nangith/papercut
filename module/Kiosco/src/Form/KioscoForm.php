<?php

namespace Kiosco\Form;

use Zend\Form\Form;

class KioscoForm extends Form
{
    public function __construct($name = null)
    {
      
        parent::__construct('kiosco');

        $this->add([
            'name' => 'idKiosco',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nombre',
            'type' => 'text',
            'options' => [
                'label' => 'Nombre',
            ],
        ]);
        $this->add([
            'name' => 'ruta',
            'type' => 'text',
            'options' => [
                'label' => 'Ruta',
            ],
        ]);
        $this->add([
            'name' => 'idImpresora',
            'type' => 'text',
            'options' => [
                'label' => 'ID Impresora',
            ],
        ]);
        $this->add([
            'name' => 'nombreImpresora',
            'type' => 'text',
            'options' => [
                'label' => 'ID Impresora',
            ],
        ]);
        $this->add([
            'name' => 'idConfigPapercut',
            'type' => 'text',
            'options' => [
                'label' => 'ID Config Papercut',
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