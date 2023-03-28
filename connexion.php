<?php

// Connexion à la base de données
$dbhost = 'localhost';
$dbname = 'save_connexions';
$dbuser = 'webuser';
$dbpass = 'JeSuisLeBoss$';
$port = '5432';

$db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);

// Récupération des informations de l'utilisateur
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip_adress = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($ip_adress);

// Extraction du navigateur et du système d'exploitation
$browser = '';
$os = '';
$user_agent = strtolower($user_agent);
if (preg_match('/msie|trident/', $user_agent)) {
    $browser = 'Internet Explorer';
} elseif (preg_match('/firefox/', $user_agent)) {
    $browser = 'Firefox';
} elseif (preg_match('/chrome/', $user_agent)) {
    $browser = 'Chrome';
} elseif (preg_match('/opera/', $user_agent)) {
    $browser = 'Opera';
} elseif (preg_match('/safari/', $user_agent)) {
    $browser = 'Safari';
}

if (preg_match('/windows/', $user_agent)) {
    $os = 'Windows';
} elseif (preg_match('/linux/', $user_agent)) {
    $os = 'Linux';
} elseif (preg_match('/macintosh|mac os x/', $user_agent)) {
    $os = 'Mac OS X';
}

// Insertion des informations dans la base de données
$stmt = $conn->prepare("INSERT INTO Machines (hostname, browser, os) VALUES (:hostname, :browser, :os");
$stmt->bindParam(':hostname', $hostname);
$stmt->bindParam(':browser', $browser);
$stmt->bindParam(':os', $os);
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO Connexion (ip_adress, hostname, connection_time) VALUES (:ip_adress, :hostname,NOW())");
$stmt->bindParam(':ip_adress', $ip_adress);
$stmt->bindParam(':hostname', $hostname);
$stmt->execute();

// Redirection vers une page de confirmation
header('Location: confirmation.php');
exit;

?>
