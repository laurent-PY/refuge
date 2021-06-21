<?php
require_once('views/View.php');

class ControllerMembre
{
    private $_membreManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_countable($url) > 1)
            throw new Exception('Page introuvable'); 
        else
            $this->membres();
    }

    private function membres()
    {
        $this->_membreManager = new MembreManager;
        $membres = $this->_membreManager->getMembres();
        $this->_view = new View('Membre');
        $this->_view->generate(array('membres' => $membres));
    }
}