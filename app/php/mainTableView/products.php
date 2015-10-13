<?php
require_once("SiteConfigVars.php");
$dbserver = getConfigValue("dbHost_w_menu");
$password = getConfigValue("dbPass_w_menu");
$username = "w-menu";
$dbname = "w_menu";

$conn = new PDO("mysql:host=$dbserver;dbname=$dbname", $username, $password);

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare('SELECT * FROM allProducts;');

$stmt->execute();

$result = $stmt->fetchAll();
$i = 0;
$user_array = [];
foreach($result as $row) {
    $i++;
     $temp_array = array('type' => $row['c_type'], 'subtype' => $row['subcat'], 'product' => $row['name'], 'return' => $row['total']);
     array_push($user_array, $temp_array);
}

$conn = null;

echo json_encode($user_array);
?>