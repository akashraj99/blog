<?php

$con = mysqli_connect('localhost','root','rootpassword','blog');

$query = mysqli_query($con, "SELECT * FROM `content` ORDER BY `id` DESC");

$num = mysqli_num_rows($query);

?>

<html>
<head>

</head>
<body>

<?php

if($num == 0) {

	echo 'No content to be displayed';
	
}

else {

	while($row = mysqli_fetch_array($query)) {
	
?>

<center>

	<div style="padding:2rem;text-align:center;" class="container">
	
		<div class="row"><?php echo $row['email']; ?></div>
		
		<?php if($row['text'] != '') { ?>
		
			<div class="row"><?php echo $row['text']; ?></div>
			
		<?php } if($row['file_name'] != '') { ?>
		
			<div class="row"><?php if($row['file_type'] == 'image/jpeg' || $row['file_type'] == 'image/png') { ?><img style="width:100%;max-height:400px;max-width:100%;height:auto;" src="uploads/<?php echo $row['file_name']; ?>" /><?php } else if($row['file_type'] == 'video/mp4') { ?><video controls><source src="<?php echo $row['file_name']; ?>" /></video><?php } ?></div>
			
		<?php } if($row['link'] != '') { ?>
		
			<div class="row"><a href="<?php echo $row['link']; ?>"><?php echo $row['link']; ?></a></div>
			
		<?php } ?>
	
	</div>
	
</center>

<?php
	
	}

}

?>

</body>
</html>