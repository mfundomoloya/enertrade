<?php
    include_once 'DATABASE/dbConnect.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $username = $_POST['username'];
    
    //
    $hashedPass = password_hash($password,PASSWORD_DEFAULT);


    // Insert the form data into the database
    $sql = "INSERT INTO user (`email`, `password`, `username`, `contacts`, `profilePicture`, `homeAddress`,`workAddress`) VALUES ('$email', '$hashedPass', '$username', '','noProfile.jpg','','')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        // Display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<script>
    function validateForm() {
        /*Funtion to test the password charecters and At least 8 characters long
            Contains at least one uppercase letter
            Contains at least one lowercase letter
            Contains at least one number
            Contains at least one special character (e.g. !@#$%^&*)*/
        
        function validatePassW(password){
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
            return passwordRegex.test(password);
        }

        var password = document.getElementById("password").value;
        var cpassword = document.getElementById("cpassword").value;

        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        
        var lengthReq = 2;

        const btnSubmit = document.getElementById('submit');
        var message = document.getElementById('errorM');
        
        //Checking if password is the same as confirm Password
        if(password !== cpassword){
            message.innerHTML = "Password is not the same";
            document.getElementById('password').style.borderColor = "red";
            document.getElementById('cpassword').style.borderColor = "red";
            return false;
        }
        //checking if the username length is correct
        if (username.length < lengthReq) {
            message.innerHTML = "Username must be at least 2 characters long.";
            document.getElementById('username').style.borderColor = "red";
            return false;
        }
        //checking if the email is correct 
        if (email.length < (lengthReq+4)) {
            message.innerHTML = "Email must be at least 6 characters long.";
            document.getElementById('email').style.borderColor = "red";
            return false;
        }
    //checking if the password is strong
        if(!validatePassW(password)){
            message.innerHTML = "Password strength is not correct use:"+
            ", At least 8 characters long"+
            ", Must contains at least one uppercase letter"+
            ", Must contains at least one lowercase letter"+
            ", Must Contains at least one number"+
            ", Must contains at least one special character (e.g. !@#$%^&*)";
            document.getElementById('password').style.borderColor = "red";
            
            return false;
        }

        return true;
    }
</script>

<html lang="eng">
	<!--HEADER WITH NAVIGATION BAR-->
    <?php include('includes/header.php'); ?>	
	

    
	<div class="container formContainer">
		<h1 class="formHeader">REGISTER AS USER</h1>

		<form method="post" action="signup.php" onsubmit="return validateForm()">
			
			<label for="email">IDENTITY NUMBER:</label>
			<input type="email" id="email" name="email" placeholder="Enter ID here" required>
			
			<div style="display: block;">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password here" required>
                
                <label for="cpassword">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword" placeholder="Retype the Password" required>
			</div>
            
			<br>
			
			<input type="submit" value="REGISTER" id="submit">
			
			<div	>
				<p>Already have an account <a id="signupLink" href="login.php">Login</a></p>
			</div>
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
		</form>
		
		<div class="error">
			<!-- Display error message here if signup fails -->
		</div>
	</div>
		<!--FOOTER-->
		<?php include('includes/footer.php'); ?>
	</body>
	<script src="script.js"></script>
    

</html>    
