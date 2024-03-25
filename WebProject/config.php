<?php

$con = mysqli_connect('localhost', 'root', '', 'webproject_sugarrush')
or die("Error detected" . mysqli_error($con));

$db_name = 'mysql:host=localhost;dbname=webproject_sugarrush';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);
