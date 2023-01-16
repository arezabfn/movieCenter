<?php

$localhost = "localhost";
$username = "root";
$databaseName = "movie";
$password = "";
    $con = mysqli_connect($localhost,$username,$password,$databaseName);
if(!$con)
{
    echo " Connection Fail ".mysqli_error();
}
