<?php

// les modelsManager permettent la récupéretion, le traitement des données
// ils gèrent aussi la partie logique du site.
// Il est issu de ImagesManager (issu de Model), car ImagesManager utiles partout !

require_once("./models/Images.model.php");
class MainManager extends ImagesManager
{
    // récupérer les themes pour faire par exemple les boutons de la barre de menu
    public function getAllThemes()
    {
        $req = "SELECT * FROM themes ORDER BY id_theme asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    // récupère les images des articles
    public function getImagesById($id_article)
    {
        $req = "SELECT * FROM images 
        WHERE id_article = :id_article
        ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    
    
 
}
