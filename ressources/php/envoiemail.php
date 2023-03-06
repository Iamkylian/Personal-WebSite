<?php

if (isset($_POST['submit'])) {
  // Récupérez les données du formulaire
  $name = $_POST['contactName'];
  $email = $_POST['contactEmail'];
  $subject = $_POST['contactSubject'];
  $message = $_POST['contactMessage'];

  // Validez les données du formulaire
  $errorEmpty = false;
  $errorEmail = false;

  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $errorEmpty = true;
  } else {
    $errorEmpty = false;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmail = true;
  } else {
    $errorEmail = false;
  }

  // Si aucune erreur n'est détectée, envoyez l'email
  if (!$errorEmpty && !$errorEmail) {
    $to = "kyliangachet@gmail.com";
    $subject = "New contact form submission from WebSite Personnal: $subject";
    $message = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $name <$email>";

    mail($to, $subject, $message, $headers);

    // Affichez la page de succès
    header("Location: ../message-sucess.html");
    exit;
  } else {
    if ($errorEmpty) {
      echo "empty";
    } elseif ($errorEmail) {
      echo "invalid";
    }
  }
} else {
  echo "error";
}

?>