
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

// Query to fetch nurses' data
$sql = "SELECT nid, nname, nimage, special, degree, location FROM nurse";
$result = $conn->query($sql);
$nurses = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Check if image data is not empty and encode to base64
        
        $nurses[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Nurses Offline Mode</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./css/Nurse_style.css">
    <link rel="stylesheet" href="../doctor/css/style.css">
    <link rel="stylesheet" href="../doctor/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <!-- Logo -->
        <a href="#" class="logo">
            <img src="./assests/caregiver-logo.png" alt="Logo"> 
        </a>

        <!-- Menu icon for small screens -->
        <div class="menu-icon" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div> <!-- Three-dot menu -->

        <!-- Center Links -->
        <div class="center-links">
            <a href="../main.php">Home</a>
            <a href="../aboutus.php">About Us</a>
            <div class="dropdown">
                <button class="dropbtn">Service <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="../doctor/index.php">Doctor</a>
                    <a href="../labtest/index.php">Lab test</a>
                    <a href="../Nurse/index.php">Nurse</a>
                    <a href="../caretaker/careTakerBook.php">Take care</a>
                    <a href="../phsio/CareGiver application">Physiotherapy</a>
                    <a href="../medicine/medicine.php">Medicine</a>
                </div>
            </div>
            <a href="#contact">Contact Us</a>
        </div>

        <!-- Right Section -->
        <div class="right-section">
        <a href="../sign-up/login.php"><button><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
        </div>
    </div>

    <div class="image-big-div">
       <img class="image-big" src="./assests/big-image.png" alt="Nurse-image">
    </div>

    <!-- Nurse profile  -->
    <h2 id="Specialist-head">Specialist Nurse For Your Family</h2>
    <main>
        <section class="sec-gap doctor">
            <div class="custom-container">
                <h1>Special Nurses Offline Mode</h1>
                <div class="doctor-list-wrap">
                    <div class="selector">
                        <label for="options">Select Type:</label>
                        <select id="options" name="options" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="Staff Nurse">Staff Nurse</option>
                            <option value="Home Nurse">Home Nurse</option>
                            <option value="OT Nurse">OT Nurse</option>
                            <option value="ICU/CCU Nurse">ICU/CCU Nurse</option>
                            <option value="Nursing Supervisor">Nursing Supervisor</option>
                            <option value="Registered Nurse">Registered Nurse</option>
                            <option value="GNM Nurse">GNM Nurse</option>
                        </select>
                    </div>
                    <div class="doctors">
                        <?php foreach ($nurses as $nurse): ?>
                            <div class="list">
                                <div class="doc">
                                    <div class="image">
                                        <img src="./assests/nurse-1.jpg" alt="nurse" />
                                    </div>
                                    <div class="doc-info">
                                        <h3><?php echo htmlspecialchars($nurse['nname']); ?></h3>
                                        <h5><?php echo htmlspecialchars($nurse['special']); ?></h5>
                                        <h5><?php echo htmlspecialchars($nurse['degree']); ?></h5>
                                        <h5><?php echo htmlspecialchars($nurse['location']); ?></h5>
                                    </div>
                                </div>
                                <div class="btn">
                                    <button class="outline-button">
                                        <a href="./public/Nurse_Booking.php?nurse_id=<?php echo htmlspecialchars($nurse['nid']); ?>">Proceed</a>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>


<hr>
    <!-- Footer -->

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <img class="ftr-logo" src="./assests/caregiver-logo.png" alt="Logo">
                <p>Lorem ipsum, dolor sit amet consectetur adipiscing elit. Debitis facilis, nemo expedita, placeat nesciunt
                    repellat laudantium!</p>
                <div class="social-icons">
                 <a href="#"><i class="fab fa-facebook"></i></a>   
                 <a href="#"><i class="fab fa-instagram"></i></a>   
                 <a href="#"><i class="fab fa-twitter"></i></a>  
                 <a href="#"><i class="fab fa-linkedin"></i></a>   
                </div>
            </div>
            <div class="footer-section">
                <h3 class="ftr-header">Quick Links</h3>
                <ul>
                    <li><a href="../aboutus.php">About Us</a></li>
                    <li><a href="../doctor/privacyPolicy.php">Privacy Policy</a></li>
                    <li><a href="../doctor/termscondition.php">Terms & Condition</a></li>
                    <li><a href="../medicine/services.php">Services</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="ftr-header">Caregiver Service</h3>
                <ul>
                    <li><a href="../doctor/index.php">Doctor</a></li>
                    <li><a href="../Nurse/index.php">Nurse</a></li>
                    <li><a href="../phsio/CareGiver application">Physiotherapist</a></li>
                    <li><a href="../labtest/index.php">Lab Test</a></li>
                    <li><a href="../caretaker/careTakerBook.php">Care Taker</a></li>
                    <li><a href="../medicine/medicine.php">Medicine</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="ftr-header">Contact info</h3>
                <p><i class="fas fa-phone"></i> +91-1234567890</p>
                <p><i class="fas fa-envelope"></i> caregiver270@gmail.com</p>
                <p><i class="fa-solid fa-location-dot"></i> Dharampur,near Khadina More,Chinsurah,West Bengal 712101</p>
                <a href="#" class="get-started-btn">Get Started</a>
            </div>
            
        </div>
        <div class="copyright">
        <i class="fa-regular fa-copyright"></i> 2024 Caregiver Web Application. All rights reserved.
        </div>
    </footer>
    
    <script src="./script/main.js"></script>

<?php
    function Nursename() {
      $data = $dom->getElementsByClassName("nurse-name");
    //   $html = $dom->saveHTML($data);
    //   $text = $data->textContent;
    foreach($data as $hed){
        $text = $hed->nodeValue;
    }
    }
  
?>

</body>

</html>