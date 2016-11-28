<?php

namespace Kiosco\Controller;

use Kiosco\Model\ConfigkioscoTable;
use Kiosco\Form\ConfigkioscoForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ConfigkioscoController extends AbstractActionController
{

    private $table;

    public function __construct(ConfigkioscoTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'config' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new ConfigkioscoForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $config = new Configkiosco();
        $form->setInputFilter($config->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $config->exchangeArray($form->getData());
        $this->table->saveConfigkiosco($config);
        return $this->redirect()->toRoute('configkiosco');
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}