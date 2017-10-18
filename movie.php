<?php
/**
 * Created by PhpStorm.
 * User: matwa
 * Date: 10/16/2017
 * Time: 6:22 PM
 */
$mysql = new mysqli('localhost', 'group11', 'fall2017184443','group11', 3306);
$id = isset($_GET['id']) ? $_GET['id'] : null;
echo $id;
$sql = "SELECT * FROM Movies WHERE MovieID = " . $id . ";";
$result = $mysql->query($sql);
$array = $result->fetch_array(MYSQLI_BOTH);
$name = $array['MovieName'];
echo $name;
?>