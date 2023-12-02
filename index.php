<?php
// Tous els chemins passent par ce point : "index.php"

// on démarre une SESSION
// A la connexion, l'utilisateur y stockera son login, role, avatar pour validation et utilisation ultérieure

session_start();

// pour toujours repartir de la base du site on ecrira au début de nos liens (image ou autre...) :
// URL dans des balises php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https"  : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER["PHP_SELF"]));

// définition de constantes utilisées dans plusieurs méthodes / fonctions / variables

define("sliderPath", "C:/xampp/htdocs/kiki/barpat_blog_poo/public/assets/sliders/");
define("imgFolder", URL . "public/assets/images/posts/");
define("slidersFolder", URL . "public/assets/sliders/");


require_once("./models/MainManager.model.php");
require_once("./models/Visitor/VisitorArticles.model.php");
require_once("./controllers/Visitor/Visitor.controller.php");
require_once("./controllers/User/User.controller.php");
require_once("./controllers/Editor/Editor.controller.php");
require_once("./controllers/Admin/Administrator.controller.php");
$mainManager = new MainManager();
$visitorArticlesManager = new VisitorArticlesManager();
$visitorArticlesManager = new VisitorArticlesManager();
$visitorController = new VisitorController();
$userController = new UserController();
$editorController = new EditorController();
$administratorController = new AdminstratorController();




// l'index est le point d'entrée du site
// au lieu d'avoir, ex pour page d'accueil
// site/index.php?page=accueil
// on utilise htaccess ( à la réacine du site) pour obtenir :
// site/accueil 
// ce qui est plus convivial et lisible

try {
    if (empty($_GET['page'])) {
        $url[0] = "home";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    // cette partie est accessible aux utilisateurs non inscrits et/ou non connectés.

    switch ($url[0]) {
            // page d'accueil abvec présentation de tous les articles
        case "home":
            $visitorController->homePage();
            break;
            // page avec les post du theme choisi dans la navbar
        case "theme":
            $chosenTheme = Tools::secureHTML($url[1]);
            $visitorController->themePage($chosenTheme);
            break;
            // page de connection à son compte d'un utilisateur
        case "connection":
            $visitorController->connectionPage();
            break;
            //  page de création d'un compte
        case "registration":
            $visitorController->registrationPage();
            break;
            // validation de l'enregistrement d'un nouveau compte
        case "validation_registration":
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mail'])) {
                $login = Tools::secureHTML($_POST['login']);
                $password = Tools::secureHTML($_POST['password']);
                $mail = Tools::secureHTML($_POST['mail']);
                $userController->validationRegistration($login, $password, $mail);
            } else {
                Tools::alertMessage("Il faut remplir les 3 champs !", "orange");
                header('Location: ' . URL . 'registration');
            }
            break;
            // envoi d'un mail pour valider le nouveau compte
        case "mail_validation_account":
            $login = Tools::secureHTML($url[1]);
            $account_key = Tools::secureHTML($url[2]);
            $userController->validationAccountByLinkMail($login, $account_key);
            break;
            // renvoi d'un mail pour valider le nouveau compte
        case "resend_validation_mail":
            $login = Tools::secureHTML($url[1]);
            $userController->resendValidationMail($login);
            break;
            // page pour demande d'un mail avec nouveau mot de passe
        case "forgot_password":
            $userController->forgotPasswordPage();
            break;
            // envoi d'un mail avec nouveau mot de passe
        case "send_forgot_password":
            if (!empty($_POST['login']) && !empty($_POST['mail'])) {
                $login = Tools::secureHTML($_POST['login']);
                $mail = Tools::secureHTML($_POST['mail']);
                $userController->sendForgotPassword($login, $mail);
            } else {
                Tools::alertMessage('Login ou mail non renseigné.', 'red');
                header('location:' . URL . "forgot_password");
                exit;
            }
            break;
            // confirmation de la concordance login / mdp pour sécuriser la connexion
        case "validation_login":
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = Tools::secureHTML($_POST['login']);
                $password = Tools::secureHTML($_POST['password']);
                $userController->validation_login($login, $password);
            } else {
                Tools::alertMessage("Il faut remplir les 2 champs !", "orange");
                header('Location: ' . URL . 'connection');
            }
            break;

            // au clic sur un fiche article : on affiche l'article !
            // vérification entre l'id de l'article et son url qui reflete le contenu de l'article 
        case "article":
            $id_article = Tools::secureHTML($url[2]);
            $url = Tools::secureHTML($url[3]);
            if (!isset($visitorArticlesManager->getInfosPost($id_article)['id_article'])) {
                $visitorController->errorPage("Cet article n'existe pas encore ? <br> Tu es un visiteur du futur ?");
            } else {

                if ($url !== $visitorArticlesManager->getInfosPost($id_article)['url']) {
                    $visitorController->errorPage("Il y a un soucis dans ton url <br> On recommence de l'accueil ?");
                } else {
                    $visitorController->postPage($id_article);
                }
            }
            break;
            // si l'utilisateur est connecté en tant qu'utilisateur ou plus :
            // les accés sont dans le fichier indexComponents/user.index.php
        case "account":
            if (!Tools::isConnected()) {
                Tools::alertMessage("Vous devez vous connecter pour accéder à cet espace.", "red");
                header('Location: ' . URL . 'connection');
            } elseif (!Tools::checkCookieConnection()) {
                Tools::badCookie();
            } else {
                require_once("./indexComponents/user.index.php");
            }
            break;
            // si l'utilisateur est connecté en tant qu'editeur ou plus :
            // les accés sont dans le fichier indexComponents/editor.index.php
        case "editor":
            if (!Tools::isConnected()) {
                Tools::alertMessage("Vous devez vous connecter pour accéder à cet espace.", "red");
                header('Location: ' . URL . 'connection');
            } elseif (!Tools::isEditor()) {
                Tools::alertMessage("Vous n'avez pas le statut requis.", "red");
                header('Location: ' . URL . 'home');
            } elseif (!Tools::checkCookieConnection()) {
                Tools::badCookie();
            } else {
                require_once("./indexComponents/editor.index.php");
            }
            break;
            // si l'utilisateur est connecté en tant qu'administrateurs :
            // les accés sont dans le fichier indexComponents/administrator.index.php
        case "administrator":
            if (!Tools::isConnected()) {
                Tools::alertMessage("Vous devez vous connecter pour accéder à cet espace.", "red");
                header('Location: ' . URL . 'connection');
            } elseif (!Tools::isAdministrator()) {
                Tools::alertMessage("Vous n'avez pas le statut requis.", "red");
                header('Location: ' . URL . 'home');
            } elseif (!Tools::checkCookieConnection()) {
                Tools::badCookie();
            } else {
                require_once("./indexComponents/administrator.index.php");
            }
            break;
        default:
            throw new Exception("La page demandée n'existe pas...");
    }
} catch (Exception $msg) {
    $visitorController->errorPage($msg->getMessage());
}
