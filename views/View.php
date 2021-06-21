<?php
class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'views/view'.$action.'.php';
    }
    //Génére et affiche la vue
    public function generate($data)
    {
        //Partie spécifique de la vue(-->views/viewAccueil.php)
        $content = $this->generateFile($this->_file, $data);
        //Template
        $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
        echo $view;
    }
    //Génére un fichier vue et renvoie le resultat produit
    public function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            // Inclut le fichier vue
            return ob_get_clean();
        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }
}