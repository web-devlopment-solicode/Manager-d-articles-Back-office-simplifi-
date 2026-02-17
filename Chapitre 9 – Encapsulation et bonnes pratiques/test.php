<?php
require 'ArticleEncapsule.php' ;
$article = new Article();
$article->setTitre("PDO en PHP");
$article->setContenu("<p>Interdocution à la programmation orientée abjet. </p>");
echo $article->afficher();