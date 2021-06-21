<?php


class ControllerDetail
{
    private $_detailManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_countable($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->detail();
    }

    private function detail()
    {
        $this->_detailManager = new DetailManager;
        $details = $this->_detailManager->getDetail();
        $this->_view = new View('Detail');
        $this->_view->generate(array('details' => $details));
    }
}