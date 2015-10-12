<?php
require_once("SiteConfigVars.php");
$dbserver = getConfigValue("dbHost_w_menu");
$password = getConfigValue("dbPass_w_menu");
$username = "w-menu";
$dbname = "w_menu";

$input_array = array();
$line = 0;
for($i =1; $i <=10; $i++) {
    $total_items = rand(80, 250);
    for($c = 0; $c <= $total_items; $c++) {
        $line++;
        $item = rand(1,20);
        array_push($input_array, array($line, $item, $i, rand_date()));
    }
}

//$args = array_fill(0, count($input_array[0]), '?');

try {
$conn = new PDO("mysql:host=$dbserver;dbname=$dbname", $username, $password);

//$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qry = "INSERT INTO returned (returned_id, item_id, collection_id, recieved_date) VALUES (?,?,?,?)";
echo "<br>SQL: $qry<br>";
$stmt = $conn->prepare($qry);

$conn->beginTransaction();

foreach($input_array as $ia) {
    $stmt->execute($ia);
}

$conn->commit();
}
catch(PDOException $e) {
    $conn->rollback();
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;

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