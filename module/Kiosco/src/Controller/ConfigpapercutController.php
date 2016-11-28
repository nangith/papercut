<?php

namespace Kiosco\Controller;

use Kiosco\Model\ConfigpapercutTable;
use Kiosco\Form\ConfigpapercutForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ConfigpapercutController extends AbstractActionController
{
    private $table;

    public function __construct(ConfigpapercutTable $table)
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
        $form = new ConfigpapercutForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $configpapercut = new Configpapercut();
        $form->setInputFilter($config->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $config->exchangeArray($form->getData());
        $this->table->saveConfigpapercut($config);
        return $this->redirect()->toRoute('configpapercut');
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}