<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Product Catalogue</title>
</head>
<body>
    <h2>Admin Panel - Add New Product</h2>

    <!-- Form to Upload Product with Attributes -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="mtype">Product Type:</label><br>
        <input type="text" name="mtype" id="mtype" required><br><br>

        <label for="mname">Product Name:</label><br>
        <input type="text" name="mname" id="mname" required><br><br>

        <label for="mrp">MRP:</label><br>
        <input type="number" step="0.01" name="mrp" id="mrp" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="4" required></textarea><br><br>

        <label for="image">Select Image to Upload:</label><br>
        <input type="file" name="image" id="image" required><br><br>

        <input type="submit" name="submit" value="Upload">
    </form>

    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'caregiver');

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle Image Upload and Store in Database
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Ensure all fields are filled before submission
        if (!empty($_POST['mtype']) && !empty($_POST['mname']) && !empty($_POST['mrp']) && 
            !empty($_POST['description']) && !empty($_FILES['image']['tmp_name'])) {

            $mtype = $conn->real_escape_string($_POST['mtype']);
            $mname = $conn->real_escape_string($_POST['mname']);
            $mrp = $conn->real_escape_string($_POST['mrp']);
            $description = $conn->real_escape_string($_POST['description']);
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

            // Insert into products table
            $sql = "INSERT INTO products (mtype, mname, mrp, image, description) 
                    VALUES ('$mtype', '$mname', '$mrp', '$image', '$description')";
            if ($conn->query($sql) === TRUE) {
                // Redirect to prevent resubmission on refresh
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Please fill in all fields before submitting.";
        }
    }

    // Display Uploaded Products
    echo "<h2>Uploaded Products</h2>";
    $sql = "SELECT id, mtype, mname, mrp, description, image FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['id'] . " : " . htmlspecialchars($row['mname']) . " (" . htmlspecialchars($row['mtype']) . ")</h3>";
            echo "<p>MRP: ₹" . htmlspecialchars($row['mrp']) . "</p>";
            echo "<p>Description: " . htmlspecialchars($row['description']) . "</p>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="100" height="100"/>';
            echo "</div><hr>";
        }
    } else {
        echo "No products found!";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
