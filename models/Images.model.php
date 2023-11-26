 <?php

//   Class de gestion des images, utiles pour tous les niveaux d'utilisateur
//  Donc mainManager sera issu de cette classe

require_once("./models/pdo.model.php");

class ImagesManager extends Model
{


    // récupère l'avatar d'un utilisateur si générique du site
    public function getImageSiteUser($login)
    {
        $req = "SELECT avatar_site FROM users WHERE login = :login";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['avatar_site'];
    }
    // récupère l'avatar d'un utilisateur si image perso
    public function getImageUser($login)
    {
        $req = "SELECT avatar FROM users WHERE login = :login";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['avatar'];
    }
    // modifie l'avatar en bdd
    public function ModifyAvatarDB($login, $avatar, $avatar_site)
    {
        $req = "UPDATE users set avatar = :avatar, avatar_site = :avatar_site
                    WHERE login = :login
                    ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":avatar", $avatar, PDO::PARAM_STR);
        $stmt->bindValue(":avatar_site", $avatar_site, PDO::PARAM_INT);
        $stmt->execute();
        $validationOk = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $validationOk;
    }
    // ajoute une image en bdd
    public function addImageDB($login, $avatar, $avatar_site)
    {
        $req = "UPDATE users set avatar = :avatar, avatar_site = :avatar_site
                WHERE login = :login
                ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":avatar", $avatar, PDO::PARAM_STR);
        $stmt->bindValue(":avatar_site", $avatar_site, PDO::PARAM_INT);
        $stmt->execute();
        $validationOk = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $validationOk;
    }
}
