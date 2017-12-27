<?php
  // require('view/no-connect/login.php');
  require_once 'config.php';
  $view = 'view/no-connect/login.php';
  if ($_GET)
  {
    if (isset($_GET['page']))
    {
      foreach (PAGE_SITE as $key => $value)
      {
        if ($key == $_GET['page'])
        {
          $view = $value;
          break;
        }
      }
    }
  }

  if ($_POST)
  {
    require('controleur/loginControlleur.php');
    $controlleurLogin = new LoginControlleur();
    $view = $controlleurLogin->login($_POST);
  }

  require $view;


?>
