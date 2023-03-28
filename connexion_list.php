<?php
// Connexion à la base de données
$dbhost = 'localhost';
$dbname = 'save_connexions';
$dbuser = 'webuser';
$dbpass = 'JeSuisLeBoss$';
$port = '5432';

$db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);

// Récupération des connexions
$stmt_connexions = $db->query("SELECT * FROM Connexion ORDER BY id DESC");
$connexions = $stmt_connexions->fetchAll(PDO::FETCH_ASSOC);

// Récupération des machines
$stmt_machines = $db->query("SELECT * FROM Machine");
$machines = $stmt_machines->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des connexions</title>
</head>
<body>
    <h1>Liste des connexions</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date et heure</th>
                <th>Adresse IP</th>
                <th>Machine</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($connexions as $connexion): ?>
                <tr>
                    <td><?php echo $connexion['id']; ?></td>
                    <td><?php echo $connexion['date_connexion']; ?></td>
                    <td><?php echo $connexion['adresse_ip']; ?></td>
                    <td><?php echo $connexion['hostname']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h1>Liste des machines</h1>

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
</body>
</html>