<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Medicine Catalogue</title>
</head>
<body>
    <h2>Admin Panel - Add New Medicine</h2>

    <!-- Form to Upload Medicine with Attributes -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="reference">Reference (Link):</label><br>
        <input type="text" name="reference" id="reference" required><br><br>

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
        if (!empty($_POST['title']) && !empty($_POST['reference']) && !empty($_FILES['image']['tmp_name'])) {
            $title = $conn->real_escape_string($_POST['title']);
            $reference = $conn->real_escape_string($_POST['reference']);
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

            // Insert into medicines table
            $sql = "INSERT INTO medicine (title, reference, image) VALUES ('$title', '$reference', '$image')";
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

    // Display Uploaded Medicines
    echo "<h2>Uploaded Medicines</h2>";
    $sql = "SELECT id, title, reference, image FROM medicine";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" .htmlspecialchars($row['id']) .' : '. htmlspecialchars($row['title']) . "</h3>";
            echo "<p>Reference: " . htmlspecialchars($row['reference']) . "</p>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="100" height="100"/>';
            echo "</div><hr>";
        }
    } else {
        echo "No medicines found!";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
