<?php

// testno polje za POST request
$post_polje = array(
    "title" => "test",
    "content" => "test",
    "file_path" => "test",
    "user_id" => "test",
    "topic_id" => "test"
);

$sql_insert = "INSERT INTO post (";
$sql_values = "VALUES(";

// kreiranje stringa za upit
foreach ($post_polje as $key => $value) {
    $sql_insert .= $key . ", ";
    $sql_values .= "'" . $value . "', ";
}

$sql_insert = substr($sql_insert, 0, -2); // brise zadnji zarez
$sql_values = substr($sql_values, 0, -2); // brise zadnji zarez

// dodavanje zagrada na kraj stringa
$sql_insert .= ") ";
$sql_values .= ");";

// spajanje stringova u jedan upit
$sql = $sql_insert . $sql_values;

echo $sql;
