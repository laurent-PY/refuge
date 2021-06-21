<?php
require_once('views/View.php');
class ControllerPensionnaire
{
    private $_pensionnaireManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_countable($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->activite();
    }

    private function activite()
    {
        $this->_pensionnaireManager = new PensionnaireManager;
        $pensionnaires = $this->_pensionnaireManager->getPensionnaire();
        $this->_view = new View('Pensionnaire');
        $this->_view->generate(array('pensionnaire' => $pensionnaires));
    }

}
