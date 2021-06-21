<?php


class ControllerGalerie
{
    private $_galerieManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_countable($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->galerie();
    }

    private function galerie()
    {
        $this->_galerieManager = new GalerieManager;
        $galerie = $this->_galerieManager->getGalerie();
        $this->_view = new View('Galerie');
        $this->_view->generate(array('gameries' => $galerie));

    }

}