<?php

namespace Kiosco\Controller;

use Kiosco\Model\KioscoTable;
use Kiosco\Form\KioscoForm;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Papercutapi\releasestation;

class KioscoController extends AbstractActionController
{

    private $table;

    public function testAction()
    {

        $server_url = 'http://localhost:9191/rpc/release/xmlrpc';

        $releaseStationId = "eco-1234";
        $authDetails = "12123";
        $releaseStationType = "API";
        $protocolVersion = 2;

        $a = new releasestation();
        $a = $a->test();

    }

    public function __construct(KioscoTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'kioscos' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new KioscoForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $kiosco = new Kiosco();
        $form->setInputFilter($kiosco->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $kiosco->exchangeArray($form->getData());
        $this->table->saveKiosco($kiosco);
        return $this->redirect()->toRoute('kiosco');
    }

    public function editAction()
    {
        $idKiosco = (int) $this->params()->fromRoute('idKiosco', 0);

        if (0 === $idKiosco) {
            return $this->redirect()->toRoute('kiosco', ['action' => 'add']);
        }

        try {
            $kiosco = $this->table->getKiosco($idKiosco);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('kiosco', ['action' => 'index']);
        }

        $form = new KioscoForm();
        $form->bind($kiosco);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['idKiosco' => $idKiosco, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($kiosco->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveKiosco($kiosco);

        return $this->redirect()->toRoute('kiosco', ['action' => 'index']);
    }

    public function deleteAction()
    {
    }
}