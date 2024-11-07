<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Upload Services</title>
</head>
<body>
    <h2>Admin Panel - Upload Service</h2>

    <!-- Form to Upload Image with Attributes -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" required><br><br>
        
        <label for="reference">Reference:</label><br>
        <input type="text" name="reference" id="reference" required><br><br>

        <label for="image">Select image to upload:</label><br>
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
        $title = $conn->real_escape_string($_POST['title']);
        $reference = $conn->real_escape_string($_POST['reference']);  // Treat reference as text
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        // Insert into services table with reference as text
        $sql = "INSERT INTO services (title, reference, image) VALUES ('$title', '$reference', '$image')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page to prevent resubmission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit; // Stop further script execution after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Display Uploaded Services with Title and Reference
    echo "<h2>Uploaded Services</h2>";
    $sql = "SELECT id, title, reference, image FROM services";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>ID: " . $row['id'] . " - Title: " . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>Reference: " . htmlspecialchars($row['reference']) . "</p>";  // Display reference as plain text
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="300" height="200"/>';
            echo "</div><hr>";
        }
    } else {
        echo "No services found!";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
