<?php
require_once("SiteConfigVars.php");
$dbserver = getConfigValue("dbHost_w_menu");
$password = getConfigValue("dbPass_w_menu");
$username = "w-menu";
$dbname = "w_menu";

$conn = new PDO("mysql:host=$dbserver;dbname=$dbname", $username, $password);

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare('SELECT * FROM allUsers;');

$stmt->execute();

$result = $stmt->fetchAll();
$i = 0;
$user_array = [];
foreach($result as $row) {
    $i++;
     $temp_array = array('place' => ordinal($i), 'user' => $row['user'], 'total' => $row['total']);
     array_push($user_array, $temp_array);
}

$conn = null;

echo json_encode($user_array);

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

?>