<?php
$userInfo = array(
    'first' => {$_SERVER['givenName']},
    'last' => {$_SERVER['sn']},
    'userID' => {$_SERVER['uid']}
);

echo json_encode($userInfo);
?>