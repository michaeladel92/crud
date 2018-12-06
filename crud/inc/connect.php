<?php

$host 		= 'localhost';
$user 		= 'root';
$pass 		= '';
$dbname 	= 'a_crud';


$connect    = mysqli_connect($host,$user,$pass,$dbname);


if (!$connect) {
 		
 		echo mysqli_errno();	
 } else{
 	// echo "Connected Successfully";
 }


