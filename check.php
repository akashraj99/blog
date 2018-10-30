<?php

$con = mysqli_connect('localhost','root','rootpassword','blog');

$email = $_POST['email'];
$pass = $_POST['pass'];

$query = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$email' && `password` = '$pass'");

$num = mysqli_num_rows($query);

if($num == 0) {
	echo 'Fail';
}
else {
	setcookie('admin',$email,time() + 5400000);
	echo 'Success';
}

?>