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

class Configkiosco implements InputFilterAwareInterface
{
    public $idConfigKiosco;
    public $nombreConfig;
    public $valor;
    public $idKiosco;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->idConfigKiosco    = !empty($data['id_config_kiosco']) ? $data['id_config_kiosco'] : null;
        $this->nombreConfig 	 = !empty($data['nombre_config']) ? $data['nombre_config'] : null;
        $this->valor  			 = !empty($data['valor']) ? $data['valor'] : null;
        $this->idKiosco          = !empty($data['id_kiosco']) ? $data['id_kiosco'] : null;
    }

    public function getArrayCopy()
    {
        return [
            'idConfigKiosco'  => $this->idConfigKiosco,
            'nombreConfig'    => $this->nombreConfig,
            'valor'           => $this->valor,
            'idKiosco'        => $this->idKiosco,
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
            'name' => 'idConfigKiosco',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'nombreConfig',
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
            'name' => 'valor',
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