<?php
require_once('views/View.php');
class ControllerAccueil
{
    private $_accueilManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_countable($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->accueil();
    }

    private function accueil()
    {
        $this->_accueilManager = new AccueilManager();
        $accueils = $this->_accueilManager->getAccueil();
        $this->_view = new View('Accueil');
        $this->_view->generate(array('accueil' => $accueils));
    }
}