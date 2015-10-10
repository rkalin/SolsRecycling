<?php
/*
require_once("SiteConfigVars.php");
$dbserver = getConfigValue("dbHost_w_menu");
$password = getConfigValue("dbPass_w_menu");
$username = "w-menu";
$dbname = "w_menu";

$dbConnection = new PDO('mysql:dbname=$dbname;host=$dbserver;charset=utf8', '$username', '$password');

$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $dbConnection->prepare('SELECT * FROM employees WHERE name = ?');

$stmt->bind_param('s', $name);

$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    // do something with $row
}

$stmt = null;
$dbConnection = null;
/*
 * <td>{{item.place}}</td>
 * <td>{{item.group}}</td>
 * <td ng-if="ShowBy != 'group'">{{item.user}}</td>
 * <td>{{item.total}}</td>
*/
$test = array(
    array(
     "place" => "1st",
     "group" => "Staff",
     "user" => "Rich K.",
     "total" => 300
    ),
    array(
     "place" => "2nd",
     "group" => "Engineering House",
     "user" => "Sara S.",
     "total" => 297
    ),
    array(
     "place" => "3rd",
     "group" => "Sigma Sigma Sigma",
     "user" => "Beth T.",
     "total" => 296
    ),
    array(
     "place" => "4th",
     "group" => "",
     "user" => "Nick I.",
     "total" => 290
    ),
    array(
     "place" => "5th",
     "group" => "Art House",
     "user" => "Tim P.",
     "total" => 280
    ),
    array(
     "place" => "6th",
     "group" => "",
     "user" => "Mark T.",
     "total" => 179
    )
);

echo json_encode($test);
?>