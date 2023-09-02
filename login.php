<?php
	include_once 'DATABASE/dbConnect.php';
	//checking if there is a session running then if there is no session start the session
    if(session_status() == PHP_SESSION_NONE){
      include_once 'DATABASE/session.php';
    }

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		
	
		// Perform input validation
		if (empty($email)) {
			$error = "Email is required";
		} else if (empty($password)) {
			$error = "Password is required";
		} else {
			// Check if the user exists in the database
			$sql = "SELECT * FROM user WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) == 1) {
				$row = $result->fetch_assoc();
				$hashed_password = $row["password"];
				
				if(password_verify($password, $hashed_password)){
					
					//remembering the infor of the user
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					
					header("location: pages/userDashB.php");
                    exit();
				}else{
					$error = "Invalid username or password";
				}
				// Start the session and redirect the user to the dashboard
			
			
			} else {
				// Display an error message if the user doesn't exist in the database
				
				$error = "Invalid username or password.";
			}
		}
	}

	// close the database connection
	mysqli_close($conn);


?>



<html lang="eng">
	<!--HEADER WITH NAVIGATION BAR-->
    <?php include('includes/header.php'); ?>	
	
	<div class="container formContainer">
		<h1 class="formHeader">LOGIN</h1>

		<form method="post" action="login.php">
			
			<label for="email">IDENTITY NUMBER:</label>
			<input type="email" id="email" name="email">
			
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
			
			<div class="forgotPass">
				<p><a href="passwordReset.php">Forgot Password?</a></p>
			</div>
			<br>
			
			<input type="submit" value="Login">
			
			<div>
				<p>Don't have an account? <a id="signupLink" href="signup.php">Register</a></p>
			</div>
		</form>
		
		
		<div class="error" 
			style="
				color: var(--error-color);
				font-size: 15px !important;
				font-weight: bold;
				text-transform: uppercase !important;
				margin-bottom: 20px;
				text-align: center;
				">
			<!-- Display error message here if login fails -->
        	<p id="errorM"><?php echo $error; ?></p>
        
    	</div>
	</div>
		<!--FOOTER-->
		<?php include('includes/footer.php'); ?>
	</body>
</html>    
