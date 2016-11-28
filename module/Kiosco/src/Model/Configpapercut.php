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

class Configpapercut implements InputFilterAwareInterface
{
    public $idConfigPapercut;
    public $ip;
    public $puerto;
    public $releaseStationID;
    public $authDetails;
    public $releaseStationType;
    public $protocolVersion;
    public $rutaReleaseStation;
    public $rutaUserAPI;
    public $rutaPrinterStatus;
    public $adminContrasena;
    public $authorization;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->idConfigPapercut     = (!empty($data['id_config_papercut'])) ? $data['id_config_papercut'] : null;
        $this->ip = (!empty($data['ip'])) ? $data['ip'] : null;
        $this->puerto  = (!empty($data['puerto'])) ? $data['puerto'] : null;
        $this->releaseStationID = (!empty($data['release_station_id'])) ? $data['release_station_id'] : null;
        $this->authDetails  = (!empty($data['authDetails'])) ? $data['authDetails'] : null;
        $this->releaseStationType     = (!empty($data['release_station_type'])) ? $data['release_station_type'] : null;
        $this->protocolVersion = (!empty($data['protocol_version'])) ? $data['protocol_version'] : null;
        $this->rutaReleaseStation = (!empty($data['ruta_release_station'])) ? $data['ruta_release_station'] : null;
        $this->rutaUserAPI = (!empty($data['ruta_user_api'])) ? $data['ruta_user_api'] : null;
        $this->rutaPrinterStatus = (!empty($data['ruta_printer_status'])) ? $data['ruta_printer_status'] : null;
        $this->adminContrasena  = (!empty($data['admin_contrasena'])) ? $data['admin_contrasena'] : null;
        $this->authorization = (!empty($data['authorization'])) ? $data['authorization'] : null;
    }

    public function getArrayCopy()
     {
        return [
            'idConfigPapercut'     => $this->idConfigPapercut,
            'ip' => $this->ip,
            'puerto'  => $this->puerto,
            'releaseStationID'     => $this->releaseStationID,
            'authDetails' => $this->authDetails,
            'releaseStationType'  => $this->releaseStationType,
            'protocolVersion'     => $this->protocolVersion,
            'rutaReleaseStation'     => $this->rutaReleaseStation,
            'rutaUserAPI'     => $this->rutaUserAPI,
            'rutaPrinterStatus'     => $this->rutaPrinterStatus,
            'adminContrasena' => $this->adminContrasena,
            'authorization'  => $this->authorization,
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
            'name' => 'idConfigPapercut',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'ip',
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
            'name' => 'puerto',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'releaseStationID',
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
            'name' => 'authDetails',
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
            'name' => 'releaseStationType',
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
            'name' => 'protocolVersion',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'rutaReleaseStation',
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
            'name' => 'rutaUserAPI',
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
            'name' => 'rutaPrinterStatus',
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
            'name' => 'adminContrasena',
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
            'name' => 'authorization',
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

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}