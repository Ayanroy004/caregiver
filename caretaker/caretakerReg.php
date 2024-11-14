<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caregiver";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $careTaker_name = $_POST['careTaker_name'];
    $speciality = $_POST['speciality'];
    $degree = $_POST['degree'];
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $Email = $_POST['email'];
    $aadhar_number = $_POST['aadhar_number'];

    // Insert data into the Caretaker table
    $sql = "INSERT INTO caretaker(kname, special, degree, 
            address,mobile,aadher, email)
            VALUES ('$careTaker_name', '$speciality', '$degree', '$address', '$mobile_number', '$aadhar_number','$Email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit; // Use exit after header redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for job</title>
    <style>
        /* Center the form vertically and horizontally */
        body {
            font-family: Arial, sans-serif;
            /* background: linear-gradient(135deg, #4a90e2, #a4c0f4); */
            display: flex;
            flex-direction : column;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: #333;
        }
        
        /* Container for the form */
        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 30px 40px;
            max-width: 450px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
            border:2px solid black;
        }
        
        /* Form title */
        h2 {
            color: #4a90e2;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        /* Styling for labels */
        label {
            font-weight: bold;
            color: #666;
            margin-bottom: 5px;
            display: inline-block;
        }
        
        /* Input fields */
        input[type="text"], input[type="email"], input[type="number"], input[type="submit"]  {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
            transition: border-color 0.3s;
            font-size: 15px;
            box-sizing: border-box;
        }

        /* Input focus effect */
        input[type="text"]:focus, input[type="file"]:focus, input[type="number"]:focus {
            border-color: #4a90e2;
        }
        
        /* Submit button styling */
        input[type="submit"] {
            background-color: #4a90e2;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            padding: 12px;
            border-radius: 30px;
            transition: background-color 0.3s;
            font-size: 16px;
        }
        
        /* Submit button hover effect */
        input[type="submit"]:hover {
            background-color: #357ab8;
        }
        .register-form {
      background-color: #ffffff;
      padding: 20px 30px;
      border-radius: 8px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
    </style>
   
</head>
<body>
    <h2>Register for Care taker</h2>

    <div class="register-form">
    <form action="" method="post" enctype="multipart/form-data"> <!-- Add enctype here -->
        <label>Full Name:</label>
        <input type="text" name="careTaker_name" placeholder="Enter your full name "required><br><br>

        <label>Speciality:</label>
        <input type="text" name="speciality" placeholder="Enter your Speciality " required><br><br>

        <label>Degree:</label>
        <input type="text" name="degree" placeholder="Enter your Degree " required><br><br>

        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter your Address" required><br><br>

        <label>Mobile Number:</label>
        <input type="text" name="mobile_number" placeholder="Enter your Mobile number " required><br><br>
        
        <label>Aadhar Number:</label>
        <input type="text" name="aadhar_number" placeholder="0000 0000 0000" required><br><br>

        <label >Email</label>
        <input type="email"  name="email" placeholder="Enter your Email " required>

        <label>Image:</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>

        <input type="submit" name="apply" value="Apply">
    </form>
    </div>
    </body>
</html>

<?php
$conn->close();
?>