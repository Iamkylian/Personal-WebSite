<?php

ini_set('display_errors', 1);

// Connexion à la base de données
$dbhost = 'localhost';
$dbname = 'save_connexions';
$dbuser = 'webuser';
$dbpass = 'JeSuisLeBoss$';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupération des connexions
$query_connexions = "SELECT * FROM Connexion ORDER BY ip DESC;";
$result_connexions = mysqli_query($conn, $query_connexions);
if (!$result_connexions) {
    die("Error in query: " . mysqli_error($conn));
}
$connexions = mysqli_fetch_all($result_connexions, MYSQLI_ASSOC);

// Récupération des machines
$query_machines = "SELECT * FROM Machine ORDER BY hostname DESC;";
$result_machines = mysqli_query($conn, $query_machines);
$machines = mysqli_fetch_all($result_machines, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Liste des connexions</title>
  <style>
    :root {
      --main-color: #6e6e6e;
    }

    table,
    th,
    td {
      border: 1px solid black;
      text-align: center;
    }

    a {
      text-decoration: none;
    }

    .table-container {
      width: 80%;
      max-width: 100%;
      height: 300px;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      overflow-x: scroll;
      margin: 20px auto;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    .ip-container {
      text-align: center;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      margin: 50px auto;
      width: 250px;
      padding: 20px;
    }

    .return {
      display: inline-block;
      color: black;
      margin: 50px auto;
      border-radius: 50px;
      padding: 10px 20px;
      background-color: var(--main-color);
      transition: background-color 0.2s ease-in-out;
    }

    .return:hover {
      background-color: #555;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>Liste des connexions</h1>
  <a href="homepage.html" class="return">Retour à l'accueil</a>
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Adresse IP</th>
          <th>Date et heure</th>
          <th>Machine</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($connexions as $connexion): ?>
          <tr>
            <td><?php echo $connexion['ip']; ?></td>
            <td><?php echo $connexion['date']; ?></td>
            <td><?php echo $connexion['hostname']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <h1>Liste des machines</h1>

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Hostname</th>
          <th>Navigateur</th>
          <th>Système d'exploitation</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($machines as $machine): ?>
          <tr>
            <td><?php echo $machine['hostname']; ?></td>
            <td><?php echo $machine['navigateur']; ?></td>
            <td><?php echo $machine['os']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="ip-container">
    <h2>Votre adresse IP est :</h2>
    <p><?php echo $_SERVER['REMOTE_ADDR'];echo strtolower($_SERVER['HTTP_USER_AGENT']); ?></p>
  </div>
</body>
</html>
