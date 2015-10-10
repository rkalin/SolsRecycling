<?php
require_once("SiteConfigVars.php");
$dbserver = getConfigValue("dbHost_w_menu");
$password = getConfigValue("dbPass_w_menu");
$username = "w-menu";
$dbname = "w_menu";

$input_array = array();

for($i =1; $i <=10; $i++) {
    $total_items = rand(80, 250);
    for($c = 0; $c <= $total_items; c++) {
        $item = rand(1,20);
        $input_array = array('item' => $item, 'collection' => $i, 'date' => rand_date())
    } 
}

$dbConnection = new PDO('mysql:dbname=$dbname;host=$dbserver;charset=utf8', '$username', '$password');

$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qry = "INSERT INTO returned (item_id, collection_id, date_recieved) VALUES (:val1, :val2, :val3)";
$dbConnection->prepare($qry);

$dbConnection->beginTransaction();

foreach ($values as $value) {
    $stmt->execute([
        ':val1' => $value['item'],
        ':val2' => $value['collection'],
        ':val3' => $value['date'],
    ]);
}

$dbConnection->commit();

function rand_date() {
    /* Gets 2 dates as string, earlier and later date.
       Returns date in between them.
    */

    $min_epoch = strtotime("11/1/2015");
    $max_epoch = strtotime("12/1/2015");

    $rand_epoch = rand($min_epoch, $max_epoch);

    return date('Y-m-d H:i:s', $rand_epoch);
}

?>