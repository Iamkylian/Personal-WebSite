<?php
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
} elseif (preg_match('/edge/', $user_agent)) {
  $browser = 'Microsoft Edge';
} elseif (preg_match('/vivaldi/', $user_agent)) {
  $browser = 'Vivaldi';
} elseif (preg_match('/brave/', $user_agent)) {
  $browser = 'Brave';
} elseif (preg_match('/yandex/', $user_agent)) {
  $browser = 'Yandex Browser';
} elseif (preg_match('/chromium/', $user_agent)) {
  $browser = 'Chromium';
} elseif (preg_match('/seamonkey/', $user_agent)) {
  $browser = 'SeaMonkey';
} elseif (preg_match('/opera neon/', $user_agent)) {
  $browser = 'Opera Neon';
} elseif (preg_match('/avant browser/', $user_agent)) {
  $browser = 'Avant Browser';
} else {
  // Si le user agent ne correspond à aucun navigateur, on définit le navigateur comme "Terminal"
  $browser = 'Terminal';
}


if (preg_match('/windows|win32|win64/', $user_agent)) {
  $os = 'Windows';
} elseif (preg_match('/ubuntu/', $user_agent)) {
  $os = 'Ubuntu';
} elseif (preg_match('/fedora/', $user_agent)) {
  $os = 'Fedora';
} elseif (preg_match('/red hat|redhat/', $user_agent)) {
  $os = 'Red Hat';
} elseif (preg_match('/debian/', $user_agent)) {
  $os = 'Debian';
} elseif (preg_match('/suse/', $user_agent)) {
  $os = 'SUSE';
} elseif (preg_match('/centos/', $user_agent)) {
  $os = 'CentOS';
} elseif (preg_match('/curl/', $user_agent)) {
  $os = 'Curl';
}elseif (preg_match('/linux/', $user_agent)) {
  $os = 'Linux';
} elseif (preg_match('/macintosh|mac os x|mac_powerpc/', $user_agent)) {
  $os = 'Mac OS X';
} else {
  $os = 'Unknown';
}

// Insertion des informations dans la base de données

$query = "INSERT INTO Machine (hostname, navigateur, os) VALUES ('" . mysqli_real_escape_string($conn, $hostname) . "', '" . mysqli_real_escape_string($conn, $browser) . "', '" . mysqli_real_escape_string($conn, $os) . "')";
mysqli_query($conn, $query);


$query = "INSERT INTO Connexion (ip, hostname, date) VALUES ('" . mysqli_real_escape_string($conn, $ip_adress) . "', '" . mysqli_real_escape_string($conn, $hostname) . "', NOW())";
mysqli_query($conn, $query);

header("Location: homepage.html");
exit;
?>

