<?php
namespace FrontEnd\Controller;

use Application\Mvc\Controller;
use FrontEnd\Forms\OfficeForm;
use FrontEnd\Model\Offices;

class OfficesController extends Controller
{
    public function indexAction()
    {
        $offices = Offices::find(array("state", "country"));
        $form = new OfficeForm();
        $this->view->form = $form;
    }
}