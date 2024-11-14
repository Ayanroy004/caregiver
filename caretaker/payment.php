<?php
include "../medicine/config.php";

// Initialize caretaker information
$caretaker = null;

// Fetch caretaker data by ID from URL
if (isset($_GET['caretaker_id'])) {
    $caretakerId = $_GET['caretaker_id'];

    // Query to get caretaker data
    $query = "SELECT kname FROM caretaker WHERE kid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $caretakerId);
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    // Check if a record is found
    if ($result->num_rows > 0) {
        $caretaker = $result->fetch_assoc();
    } else {
        echo "No caretaker found with that ID.";
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caretakerId = $_POST['caretaker_id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];

    // Insert data into the caretakerpay table
    $sql = "INSERT INTO caretakerpay (kid, name, mobile, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $caretakerId, $name, $number, $address);

    if ($stmt->execute()) {
        // echo "Data stored successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway Form</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>

<div class="payment-form">
    <h2>Payment Details</h2>
    <form action="" method="post">
        <!-- Cardholder Name  -->
        <label for="taker">Care Taker Name</label>
        <input type="text" id="taker" value="<?php echo htmlspecialchars($caretaker['kname']); ?>" disabled>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="John Doe" required>

        <label for="number">Mobile Number</label>
        <input type="text" id="number" name="number" placeholder="00 00 00 00 00" required>

        <label for="Email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
        
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter Your Address" required>
    
        <input type="hidden" name="caretaker_id" value="<?php echo htmlspecialchars($caretakerId); ?>">
        <button name="submit" type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>
