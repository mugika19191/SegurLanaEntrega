<?php

$servername ="db";
$dBUsername ="admin";
$dBPassword ="test";
$dBName ="gureweb";

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if (!$conn){
	die("connection failed" . mysqli_connect_error());
}