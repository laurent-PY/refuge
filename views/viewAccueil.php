<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$this->_t = 'Accueil MVC';
?>
<div class="container">
    <div class="titre">
        <h1>Garderie du rocher</h1>
    </div>
    <div class="blockContent">
        <div style="padding-top: 150px; height: 70vh; width: 48%; margin: 0 2% 0 0;">
            <div class="colorWhite sizeUp">
                <ul>
                    <li>
                        <p>L'espace de vie commun des compagnons dispose de 10.800m2 ce qui nous permet de leurs proposer un espace de vie agréable.</p>
                    </li>
                    <li>
                        <p>Les compagnons disposent d’une autonomie totale, s'ils sont sages, ou peuvent disposer de leurs propre enclos promenade.</p>
                    </li>
                    <li>
                        <p>Les jeux et activités sont régulièrement organisés tout au long su séjour. </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="colorWhite" style="height: 70vh; width: 48%; margin: 0 0 0 2%">

            <h5>Notre garderie est situé sur le haut plateau de Xouaxange.</h5>
            <h5>Sur l'ancien stade de foot.</h5>
            <iframe style="height: 50vh; width: 100%" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d842.4720721387725!2d7.0001319635406505!3d48.69479872741253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2sfr!4v1623871265466!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
