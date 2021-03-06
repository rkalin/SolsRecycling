<?php
require_once("SiteConfigVars.php");
$dbserver = getConfigValue("dbHost_w_menu");
$password = getConfigValue("dbPass_w_menu");
$username = "w-menu";
$dbname = "w_menu";

$conn = new PDO("mysql:host=$dbserver;dbname=$dbname", $username, $password);

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare('SELECT * FROM allGroupUsers;');

$stmt->execute();

$result = $stmt->fetchAll();

$temp_user_array = [];
$temp_group_array = [];
$final_array = [];
$i=0;
foreach($result as $row) {
    if ($row['user'] == NULL) {
        $i++;
        $temp = array('place' => ordinal($i), 'group' => $row['groupName'], 'user' => '', 'total' => $row['total']);
        array_push($temp_group_array, $temp);
    } else {
        $temp1 = array('place' => '', 'group' => $row['groupName'], 'user' => $row['user'],'total' => $row['total']);
        array_push($temp_user_array, $temp1);
    }
}
asort($temp_user_array);
asort($temp_group_array);

foreach($temp_group_array as $tg) {
    array_push($final_array, $tg);
    foreach($temp_user_array as $tu) {
        if ($tu['group'] == $tg['group']) {
            $temp = array('place' => '', 'group' => '', 'user' => $tu['user'],'total' => $tu['total']);
            array_push($final_array, $temp);
        }
    }
}

$conn = null;

echo json_encode($final_array);

function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

?>