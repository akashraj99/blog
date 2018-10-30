<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style type="text/css">
body {
	margin:auto;
	background:#2aa4ac !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#content').load('content.php');
});
$(document).ready(function() {
	$('#login_form').on('submit',function(a) {
		a.preventDefault();
		var email = $('#email').val();
		var pass = $('#pass').val();
		if(email == '' || pass == '') {
			alert('Please fill in all the fields');
		}
		else {
			$.ajax({
				type: "POST",
				url: "check.php",
				data: "email=" + email + "&pass=" + pass,
				success: function(duh) {
					if(duh == 'Fail') {
						alert("Wrong Credentials! Please try again!");
						$('#login_form').trigger('reset');
					}
					else {
						window.location.reload();
					}
				}
			});
		}
	});
});
$(document).ready(function() {
	$('#upload_form').on('submit',function(u) {
		u.preventDefault();
		if($('.query').val() == '' && $("#file_name").val() == '') {
			alert('Post is empty!');
		}
		else {
			$.ajax({
				url: "post.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(response) {
					alert(response);
					window.location.reload();
				}
			});
		}
	});
});
</script>
</head>
<body>

	<div class="screen"></div>
	
	<div class="upload_holder">
	
		
	
	</div>
	
	<div class="container-fluid">
	
		<div class="row my-auto" style="margin:none;padding-bottom:0.5rem;padding-top:0.5rem;box-shadow:0 1px 2px #777;background:#fff;">
		
			<div class="col-md-8"></div>
			
			<div class="col-md-4 my-auto">
			
			<?php

				if(ISSET($_COOKIE['admin']) && $_COOKIE['admin'] != '') {
				
			?>
				<div class="row">
				
					<div class="col-md-12 my-auto">Welcome, <?php echo $_COOKIE['admin']; ?></div>
					
				</div>
					
			<?php
				
				}
				
				else {
				
			?>
			
				<form id="login_form" class="login_form my-auto">
				
					<input type="text" name="email" id="email" class="box" placeholder="Email..." />
					
					<input type="password" name="pass" id="pass" class="box" placeholder="Password..." />
					
					<input type="submit" value="Log In" />
				
				</form>
				
			<?php

				}
			
			?>
			
			</div>
		
		</div>
	
	</div>
	
	<div class="container" style="align-content:center;background:#fff;padding:1rem;">
	
<center>

		<div class="upload_holder" style="width:60%;">
		
			<form id="upload_form" style="width:100%;">
			
				<div class="query_holder" style="width:100%;">
				
					<div class="row">
					
						<textarea class="query" name="query" style="width:100%;resize:none;overflow-y:scroll;" rows="4" placeholder="Type something..."></textarea>
						
					</div>
					
					<div class="row" style="background:#ccc;">
					
						<div class="col-md-2 my-auto">
						
							<div class="row">
							
								<div class="col-md-6" title="Attach Image/Video"><input id="file_name" type="file" name="att_file"></div>
								
								<div class="col-md-6" title="Attach Link"><input type="hidden" name="link" value="" /></div>
							
							</div>
						
						</div>
						
						<div class="col-md-8"></div>
						
						<div class="col-md-2 my-auto">
						
							<div class="row">
							
<center>
							
								<div class="col-md-8"></div>
								
								<div class="col-md-4">
								
									<input type="submit" value="POST" id="upload_submit" />
									
								</div>
								
</center>
					
							</div>
						
						</div>
					
					</div>
						
				</div>
			
			</form>
		
		</div>
		
<br /><br />
	
		<div id="content"></div>
		
</center>		
	
	</div>

</body>
</html>