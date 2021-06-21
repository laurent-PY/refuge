<?php
require_once('views/View.php');

class ControllerLogin
{
    private $_loginManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_countable($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->logins();
    }

    private function logins()
    {
        $this->_loginManager = new LoginManager;
        $logins = $this->_loginManager->getlogin();
        $this->_view = new View('Login');
        $this->_view->generate(array('logins' => $logins));
    }

}