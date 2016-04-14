<html>
<!-- Main screen for logging in.  -->
<head>
	<meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
	<?php include "style/header.php"; ?>
</head>


<body>

	<h1>Package Tracker Lite</h1>
<!-- The login box is a div that holds the input spaces-->
	<div class="loginBox" id='loginBox' style="background: height: 200px; width: 200px; position: relative;">
		<h3>Enter your login information</h3>
		Email:
		<input class="email" id="email" />
		<br>
		Password:
		<input class="password" id="pw" type = "password"/>
 		<div>    
 			<br>
 		<button id = "submit" >submit</button> <a href="createAccount.html">Create New Account</a>
		</div>      
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			/*on click will send the user input to a class to check if its valid. If so it will send the username to the session and redirect to the user portal*/
			$("#submit").click(function() {
				var account = {};
				//Get email
				account.email = $("#email").val();
				//Get Password
				account.password = $("#pw").val();
				
				console.log(account);
				
				//Create Post for new Account
				$.post("php/checkUser.php", account, function(data, status) {
						console.log(data);
						//Check for Account Type
						
						if (data == "false") {
							//document.location.href = "CustomerPortal.php";
							//Send Username for Session Storage
							$.post("php/setUserName.php", account, function(data, status) {
								document.location.href = "CustomerPortal.php";
							});
						}
						else if (data == "true") {
							// document.location.href = "EmployeePortal.php";
							$.post("php/setUserName.php", account,
								function(data, status) {
									document.location.href = "EmployeePortal.php";
							});
						}
						else {
							alert(data);
						}
				});
			});
		});
	</script>
</body>
</body>

</html>
