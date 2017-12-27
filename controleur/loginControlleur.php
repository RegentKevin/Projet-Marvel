<?php
/**
 *
 */
class LoginControlleur
{

  public function login (array $user): ?string // Typage donné en sortie (Null ou string);
  {
    if (!isset($user['email']) || !isset($user['password'])) // vérification de l'éxistence
      return 'view/no-connect/login.php';
    if (empty(trim($user['email'])) || empty(trim($user['password']))) // trim() enleve tout les espace au DEBUT de la chaine de caractère saisie + verification de remplissage des données
      return 'view/no-connect/login.php';

    $email = htmlspecialchars(trim($user['email'])); // modification des balise html
    $passwords = strip_tags(trim($user['password'])); // suppression des balises html

    if (!$this->validateEmail($email)) // vérification de l'email
      return 'view/no-connect/login.php';

    if ($email = 'toto@toto.toto' && $passwords = 'toto') // connexion
    {
      $_SESSION['user'] = $user;
      return 'view/connect/login.php';
    }else {
      return 'view/no-connect/login.php';
    }

  }

  public function validateEmail(string $email): bool
  {

    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;


  }

}

 ?>
