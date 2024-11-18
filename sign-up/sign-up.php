<?php
session_start();
?>

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

    <?php
    $message1='';
    $message2='';

    ?>
    
    
    <!-- sign up portion -->
    <div class="container" >
        <div class="sign-up-form" id="cont">
        <h1>Welcome To CareGiver Application</h1>
        <p>Already have an account? <a href="login.php">Login</a></p>
        <form action="sign-up.php" method="POST">
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
            <label   for="mobile">Mobile no <span>* (+91)</span><span id="mobile-message"></span></label>
                <input name="mobileNo" type="text" id="mobile" placeholder="Enter your mobile no "
                onkeyup="checkMobileLength()"  required></div>
            </div>
            <div class="input-group full-width">
                <label for="email">Email id <span>*</span></label>
                <input name="email" type="email" id="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
            <div class="input-group">
                <label for="password">Password <span>*</span></label>
                <input name="password" type="password" id="password" placeholder="Enter your password" required>
            </div>
            <div class="input-group right-sec">
            <label id="con-pass-text" for="confirmPassword">Confirm Password <?php $message1 ?> </label> 
                <input name="confirm-password" type="password" id="confirmPassword" 
                placeholder="Confirm password" onkeyup="checkPasswordMatch()" required>
                <span id="match-message"></span>
            </div>
            </div>
            <button name="submit" type="submit" class="submit-btn" onclick="openPopUp() ">Next →</button>
			<input id="otpstore" type="hidden" value="helo" >
        </form>
        </div>

    <form action="" method="POST">
        <div class="otp-container" id="popup">
            <div class="otp-box">
                <h2>OTP Verification</h2>
                <div class="otp-inputs">
                    <input name="first" type="text" maxlength="1">
                    <input name="second" type="text" maxlength="1">
                    <input name="third" type="text" maxlength="1">
                    <input name="fourth" type="text" maxlength="1">
                    <input name="five" type="text" maxlength="1">
                    <input name="six" type="text" maxlength="1">
                </div>
                <button name="register" class="register-btn" onclick="closePopUp()">Register</button>
            
            </div>
        </div>  
    </form>

    </div>
	<script src="../sign-up/script/sign-up.js"></script>
<?php


$pdo = new PDO("mysql:host=localhost;dbname=caregiver", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to generate OTP
function generateOTP($length = 6) {
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= mt_rand(0, 9);
    }
    return $otp;
}

// Step 1: Handle Registration Form Submission
if (isset($_POST["submit"])) {
    $first_name = $_POST["firstName"];
    $middle_name = isset($_POST["middleName"]) ? $_POST["middleName"] : null;
    $last_name = $_POST["lastName"];
    $mobile_no = $_POST["mobileNo"];
    $email_id = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if ($password === $confirm_password && strlen($mobile_no) == 10) {
        $encpass = md5($password);

        // Save user details to the database
        $sql = "INSERT INTO customers (first_name, middle_name, last_name, mobile_no, email_id, password)
                VALUES (:first_name, :middle_name, :last_name, :mobile_no, :email_id, :encpass)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':first_name' => $first_name,
            ':middle_name' => $middle_name,
            ':last_name' => $last_name,
            ':mobile_no' => $mobile_no,
            ':email_id' => $email_id,
            ':encpass' => $encpass,
        ]);

        // Generate OTP and save it in the session
        $otp = generateOTP();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email_id;

        // Send OTP via email
        $mail_sent = mail($email_id, "Caregiver Verification", "Your OTP is: " . $otp, "From: caregiverindia6@gmail.com");
        if ($mail_sent) {
            echo "<script>alert('OTP has been sent to your email.');</script>";
        } else {
            echo "<script>alert('Failed to send OTP.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match or mobile number is invalid!');</script>";
    }

?>
<script>
openPopUp();
</script>
<?php
}

// Step 2: Handle OTP Verification
if (isset($_POST["register"])) {
    $inp_otp = $_POST["first"] . $_POST["second"] . $_POST["third"] . $_POST["fourth"] . $_POST["five"] . $_POST["six"];

    // Compare the submitted OTP with the session OTP
    if ($inp_otp == $_SESSION['otp']) {
        echo "<script>alert('Thank You, Your registration is successful.');</script>";

        // Clear OTP from the session after successful verification
        unset($_SESSION['otp']);
        unset($_SESSION['email']);
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
    }
}
?>

</body>
</html>
