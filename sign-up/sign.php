<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./css/sign-up.css">
</head>
<body>
    <div class="navbar">
        <!-- Logo -->
        <a href="#" class="logo">
            <img src="./assets/caregiver-logo.png" alt="Logo">
        </a>
    
        <!-- Menu icon for small screens -->
        <div class="menu-icon" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div> <!-- Three-dot menu -->
    
        <!-- Center Links -->
        <div class="center-links">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <div class="dropdown">
                <button class="dropbtn">Service <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="#doctor">Doctor</a>
                    <a href="#labtest">Lab test</a>
                    <a href="#nurse">Nurse</a>
                    <a href="#takecare">Take care</a>
                    <a href="#physiotheraphy">Physiotheraphy</a>
                    <a href="#medicine">Modicine</a>
    
                </div>
            </div>
            <a href="#contact">Contact Us</a>
        </div>
    
        <!-- Right Section -->
        <div class="right-section">
            <a href="#user"><i class="fa-solid fa-user"></i></a>
            <a href="#signup" class="button signup">Sign Up</a>
            <a href="#login" class="button login">Login</a>
        </div>
    </div>
    
    <!-- sign up portion -->
    <div class="container" >
        <div class="sign-up-form" id="cont">
        <h1>Welcome To CareGiver Application</h1>
        <p>Already have an account? <a href="#">Login</a></p>
        <form action="" method="POST">
            <div class="input-box">
            <div class="input-group">
                <label for="firstName">First Name <span>*</span></label>
                <input name="firstName" type="text" id="firstName" placeholder="Enter your first name" required>
            </div>
            <div class="input-group right-sec">
                <label for="middleName">Middle Name</label>
                <input name="middleName" type="text" id="middleName" placeholder="Enter your middle name">
            </div>
            </div>
            <div class="input-box">
            <div class="input-group">
                <label for="lastName">Last Name <span>*</span></label>
                <input name="lastName" type="text" id="lastName" placeholder="Enter your last name" required>
            </div>
            <div class="input-group right-sec">
                <label   for="mobile">Mobile no <span>*</span></label>
                <input name="mobileNo" type="text" id="mobile" placeholder="Enter your mobile no " required>
            </div>
            </div>
            <div class="input-group full-width">
                <label for="email">Email id (optional)</label>
                <input name="email" type="email" id="email" placeholder="Enter your email">
            </div>
            <div class="input-box">
            <div class="input-group">
                <label for="password">Password <span>*</span></label>
                <input name="password" type="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="input-group right-sec">
                <label  for="confirmPassword">Confirm Password</label>
                <input name="confirm-password" type="password" id="confirmPassword" placeholder="Confirm password" required>
            </div>
            </div>
            <button name="submit" type="submit" class="submit-btn" onclick="openPopUp()">Next →</button>
			
        </form>
        </div>

        <div class="otp-container" id="popup">
            <div class="otp-box">
                <h2>OTP Verification</h2>
                <div class="otp-inputs">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                    <input type="text" maxlength="1">
                </div>
                <button class="register-btn" onclick="closePopUp()">Register</button>

            </div>
        </div>
    </div>

    <script src="./script/sign-up.js"></script>
	
<?php
/*
$pdo = new pdo("mysql:host=localhost;dbname=Caregiver","ashim_04","ashim123");
$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if($pdo == TRUE){
	echo "Connected";
}

$sql = "create table if not exists customer(
		first_name VARCHAR(50) NOT NULL,
		middle_name VARCHAR(50),
		last_name VARCHAR(50) NOT NULL,
		mobile_no INTEGER NOT NULL,
		email_id VARCHAR(50),
		password VARCHAR(50) NOT NULL,
		confirm_password VARCHAR(50) NOT NULL,
		PRIMARY KEY(mobile_no,password)
		)";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();*/

/*	
if(isset($_POST["submit"]))
	//print_r($_GET[0])
	$first_name = $_POST["firstName"];
	$middle_name = $_POST["middleName"];
	$last_name = $_POST["lastName"];
	$mobile_no = $_POST["mobile_No"];
	$email_id = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm-password"];

//VALUES('$first_name','$middle_name','$last_name','$mobile_no','$email_id','$password','$confirm_password')";
$sql = "INSERT INTO customer (first_name,middle_name,last_name,mobile_no,email_id,password,confirm_password,)
		VALUES('Ashim','NA','Mondal','1111111111','xxxxxxxxxx12@gmail.com','fake data','fake data')";
		
$sql = "INSERT INTO customer(first_name,middle_name,last_name,mobile_no,email_id,password,confirm_password)
		VALUES('$first_name','$middle_name','$last_name','$mobile_no','$email_id','$password','$confirm_password')";

$stmt = $pdo -> prepare($sql);
$stmt -> execute();
*/



$pdo = new PDO("mysql:host=localhost;dbname=Caregiver","ashim_04","ashim123");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["submit"])) {
    // Assign form data to variables with corrected array keys
    $first_name = $_POST["firstName"];
    $middle_name = isset($_POST["middleName"]) ? $_POST["middleName"] : null; // Optional field, can be null
    $last_name = $_POST["lastName"];
    $mobile_no = $_POST["mobileNo"];
    $email_id = isset($_POST["email"]) ? $_POST["email"] : null; // Optional field, can be null
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // SQL Insert statement
    $sql = "INSERT INTO customer (first_name, middle_name, last_name, mobile_no, email_id, password, confirm_password)
            VALUES (:first_name, :middle_name, :last_name, :mobile_no, :email_id, :password, :confirm_password)";
    
    // Prepare and execute statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':first_name' => $first_name,
        ':middle_name' => $middle_name,
        ':last_name' => $last_name,
        ':mobile_no' => $mobile_no,
        ':email_id' => $email_id,
        ':password' => $password,
        ':confirm_password' => $confirm_password,
    ]);
}


?>


	
</body>
</html>