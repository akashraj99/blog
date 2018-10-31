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

	<div style="background:#fff;border-radius:0.2rem;box-shadow:0 1px 2px #333;padding:2rem;width:65%;" class="container-fluid">
	
		<div class="container-fluid">
		
			<div class="row"><p style="font-size:100%;color:#cb2a2a;"><?php echo $row['title']; ?></p></div>
			
			<div class="row"><p style="font-size:80%;color:#999;">by <?php echo $row['email']; ?></p></div>
			
		</div>
		
		<div class="container-fluid">
		
		<?php if($row['text'] != '') { ?><div class="row" style="text-align:left;"><?php echo $row['text']; ?></div>
			
		<?php } if($row['file_name'] != '') { ?>
		
			<br /><div class="row" style="max-width:100%;max-height:25rem;background:#eaf2f7"><?php if($row['file_type'] == 'image/jpeg' || $row['file_type'] == 'image/png') { ?><img style="object-fit:contain;width:100%;height:auto;" src="uploads/<?php echo $row['file_name']; ?>" /><?php } else if($row['file_type'] == 'video/mp4') { ?><video style="max-width:100%;object-fit:contain;" controls><source src="uploads/<?php echo $row['file_name']; ?>" type="video/mp4"></video><?php } ?></div>
			
		<?php } if($row['link'] != '') { ?>
		
			<br /><a style="color:#fff;" target=" " href="<?php echo $row['link']; ?>"><div class="row" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;background:#6d6d6d;border-radius:0.4rem;padding:0.5rem;"><?php echo $row['link']; ?></div></a>
			
		<?php } ?>
		
		</div>
	
	</div>
	
<br />	
	
</center>

<?php
	
	}

}

?>

</body>
</html>