<?php
class Article {
    private $titre;
    private $contenu;
    public function setTitre($titre){
        if (!empty($titre) && strlen($titre)> 3){
            $this->titre = $titre;

        }else{
            echo  "titre invalide.";
        }
    }
public function getTitre(){
    return $this->titre;
}
public function setContenu($contenu){
    $this->contenu=htmlspecialchars($contenu);
}
public function getContenu(){
    return $this->contenu;
}
public function afficher(){
    return "titre : {$this->titre} -contenu : {$this->contenu}" ;
}
}