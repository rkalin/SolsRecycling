<?php
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