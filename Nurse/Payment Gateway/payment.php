<?php
include "../../medicine/config.php";

// Initialize nurse information
$nurse = null;

// Fetch nurse data by ID from URL
if (isset($_GET['nurse_id'])) {
    $nurseId = $_GET['nurse_id'];

    // Query to get nurse data
    $query = "SELECT nname FROM nurse WHERE nid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $nurseId);
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Check if a record is found
    if ($result->num_rows > 0) {
        $nurse = $result->fetch_assoc();
    } else {
        echo "No nurse found with that ID.";
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nid = $nurseId;
    $cfullname = $_POST['name'];
    $mobile = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Insert data into the nursepay table
    $sql = "INSERT INTO nursepay (nid, cfullname, mobile, email, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $nid, $cfullname, $mobile, $email, $address);

    if ($stmt->execute()) {
        // echo "Data stored successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<script>
    const nurse = <?php echo json_encode($nurse); ?>;
    document.addEventListener('DOMContentLoaded', () => {
        if (nurse) {
            document.getElementById('nurse').value = nurse.nname;
        }
    });
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway Form</title>
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>

<div class="payment-form">
    <h2>Payment Details</h2>
    <form action="" method="post">
        <!-- Cardholder Name  -->
        <label for="nurse">Nurse Name</label>
        <input type="text" id="nurse" disabled>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="John Doe" required>

        <label for="number">Mobile Number</label>
        <input type="text" id="card-number" name="number" placeholder="00 00 00 00 00" required>

        <label for="Email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
        
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter Your Address" required>
    
        <button name="submit" type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>
