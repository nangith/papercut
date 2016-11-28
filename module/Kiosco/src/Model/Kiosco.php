<?php

namespace Kiosco\Model;

use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Kiosco implements InputFilterAwareInterface
{
    public $idKiosco;
    public $nombre;
    public $ruta;
    public $idImpresora;
    public $nombreImpresora;
    public $idConfigPapercut;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->idKiosco    		 = !empty($data['id_kiosco']) ? $data['id_kiosco'] : null;
        $this->nombre 	   		 = !empty($data['nombre']) ? $data['nombre'] : null;
        $this->ruta  			 = !empty($data['ruta']) ? $data['ruta'] : null;
        $this->idImpresora       = !empty($data['id_impresora']) ? $data['id_impresora'] : null;
        $this->nombreImpresora   = !empty($data['nombre_impresora']) ? $data['nombre_impresora'] : null;
        $this->idConfigPapercut  = !empty($data['id_config_papercut']) ? $data['id_config_papercut'] : null;
    }

    public function getArrayCopy()
     {
        return [
            'idKiosco'         => $this->idKiosco,
            'nombre'           => $this->nombre,
            'ruta'             => $this->ruta,
            'idImpresora'      => $this->idImpresora,
            'nombreImpresora'  => $this->nombreImpresora,
            'idConfigPapercut' => $this->idConfigPapercut,
        ];
     }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'idKiosco',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'nombre',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'ruta',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'idImpresora',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'nombreImpresora',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'idKiosco',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}