<?php

$id = $_COOKIE['admin'];
	
if(isset($_FILES["att_file"]["type"]) && $_FILES["att_file"]["name"] != '') {

	$valid_extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "Jpg", "Jpeg", "mp4", "wmv");
	
	$temporary = explode(".", $_FILES["att_file"]["name"]); 
	
	$file_extension = end($temporary);
	
	if(in_array($file_extension,$valid_extensions)) {
	
		if($_FILES['att_file']['size'] > 5242880) {
		
			echo 'File size is too big';
			
		}
		
		else {
		
			$name = $_FILES['att_file']['name'];
			
			$size = $_FILES['att_file']['size'];
			
			$name = str_replace('#', '_', $name);
			
			$name = str_replace('-', '_', $name);
			
			$type = $_FILES['att_file']['type'];
			
			if(empty($type) != false) {
			
				$type = 'image/jpeg';
				
			}
			$extension = strtolower($type);
			
			$file = $_FILES['att_file']['tmp_name'];
			
			$time = time('hh:mm:ss');
			
			$final = $time . '_' . $name;
			
			$final = htmlspecialchars($final);
			
			$target = 'uploads/' . $final;
			
			move_uploaded_file($file,$target);
		
		}
		
	}
	
	else {
	
		echo 'Invalid file';
		
	}
	
}

else {

	$final = '';
	
	$size = '';
	
	$extension = '';

}

$text = $_POST['query'];
$text = trim($text);

$link = $_POST['link'];

$title = $_POST['title'];
$title = trim($title);

if($text != '') {

	$special = array(":", "'");
	
	$replace = array("\:", "\'");
	
	$text = str_replace($special, $replace, $text);

}

$date = date("Y-m-d");

if($text == '' && $link == '' && $final == '') {

	echo 'No can do';
	
}

else {

	if($size <= 524288000) {

		$con = mysqli_connect('localhost','root','rootpassword','blog');
		
		mysqli_query($con, "INSERT INTO `content` (`id`,`email`,`title`,`text`,`file_name`,`file_type`,`link`,`date`) VALUES (`id`,'$id','$title','$text','$final','$extension','$link','$date')");
		
		echo 'Successfully uploaded!';
		
	}
	
	else {
	
		echo 'File size too big!';
		
	}
	
}

?>