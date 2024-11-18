<?php
include "../../medicine/config.php";

// Initialize nurse information
$nurse = null;
$nurseid = 0;

// Fetch nurse data by ID from URL
if (isset($_GET['nurse_id'])) {
    $nurseId = $_GET['nurse_id'];
    $nurseid = $nurseId;
    // Query to get nurse data
    $query = "SELECT nid, nname, special, degree, location FROM nurse WHERE nid = ?";
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
$conn->close();
?>

<script>
    const nurse = <?php echo json_encode($nurse); ?>;
    document.addEventListener('DOMContentLoaded', () => {
        if (nurse) {
            document.getElementById('nrs').textContent = nurse.nname;
            document.querySelector('.nurse-type').textContent = nurse.special;
            document.querySelector('.nurse-qualification').textContent = nurse.degree;
            document.querySelector('.nurse-address').textContent = nurse.location;
        }

        // Add event listener to the button
        document.getElementById('next-page-button').addEventListener('click', () => {
            window.location.href = `../Payment Gateway/payment.php?nurse_id=${nurse.nid}`;
        });
    });
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Nurse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../css/nurse_booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <!-- Logo -->
        <a href="#" class="logo">
            <img src="../assests/caregiver-logo.png" alt="Logo">
        </a>
    
        <!-- Menu icon for small screens -->
        <div class="menu-icon" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></div> <!-- Three-dot menu -->
    
        <!-- Center Links -->
        <div class="center-links">
            <a href="../../main.php">Home</a>
            <a href="../../aboutus.php">About Us</a>
            <div class="dropdown">
                <button class="dropbtn">Service <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="../../doctor/index.php">Doctor</a>
                    <a href="../../labtest/index.php">Lab test</a>
                    <a href="../../Nurse/index.php">Nurse</a>
                    <a href="../../caretaker/careTakerBook.php">Take care</a>
                    <a href="../../phsio/CareGiver application">Physiotheraphy</a>
                    <a href="../../medicine/medicine.php">Medicine</a>
    
                </div>
            </div>
            <a href="#contact">Contact Us</a>
        </div>
    
        <!-- Right Section -->
        <div class="right-section">
        <a href="../../sign-up/sign-up.php"><button><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
        </div>
    </div>
    
    <div class="image-big-div">
        <img class="image-big" src="../assests/big-image.png" alt="Nurse-image">
    </div>
    <h2 id="booking-head">Booking</h2>
    <!-- booking section -->
    <div class="booking-section">

     <div class="booking-container">
        <div class="profile">
            <img src="../assests/nurse-1.jpg" alt="Shima Das">
            <div class="profile-info">
                <h2 id="nrs" class="nurse-name1"></h2>
                <p class="nurse-type">Home Nurse</p>
                <p class="nurse-qualification">BSN, MSN</p>
                <p class="nurse-address">Kolkata</p>
            </div>
        </div>
    
        <div class="calendar-schedule">
            <div class="calendar">
                    <div class="date-picker-container">
                        <div class="date-picker-header">Pick Date</div>
                        <div class="month"><button class="month-change lessthan"><i class="fa-solid fa-less-than"></i></button>
                            October 2024 <button class="month-change greaterthan"><i class="fa-solid fa-greater-than"></i></button></div>
                        <div class="calendar">
                            <div class="day">SUN</div>
                            <div class="day">MON</div>
                            <div class="day">TUE</div>
                            <div class="day">WED</div>
                            <div class="day">THU</div>
                            <div class="day">FRI</div>
                            <div class="day">SAT</div>
                    
                            <!-- Empty slots for days before September 1 -->
                            <div class="date"></div>
                            <div class="date"></div>
                            <div class="date"></div>
                            <div class="date"></div>
                            <div class="date"></div>
                            <div class="date"></div>
                    
                            <!-- Dates of September -->
                            <div class="date">1</div>
                            <div class="date">2</div>
                            <div class="date">3</div>
                            <div class="date">4</div>
                            <div class="date">5</div>
                            <div class="date">6</div>
                            <div class="date">7</div>
                            <div class="date">8</div>
                            <div class="date">9</div>
                            <div class="date">10</div>
                            <div class="date">11</div>
                            <div class="date">12</div>
                            <div class="date">13</div>
                            <div class="date">14</div>
                            <div class="date">15</div>
                            <div class="date">16</div>
                            <div class="date">17</div>
                            <div class="date">18</div>
                            <div class="date selected">19</div> <!-- Selected Date -->
                            <div class="date">20</div>
                            <div class="date">21</div>
                            <div class="date">22</div>
                            <div class="date">23</div>
                            <div class="date">24</div>
                            <div class="date">25</div>
                            <div class="date">26</div>
                            <div class="date">27</div>
                            <div class="date">28</div>
                            <div class="date">29</div>
                            <div class="date">30</div>
                        </div>
                    </div>
            </div>
    
            <div class="schedule">
                <h3>Schedule</h3>
                <table>
                    <tr>
                        <th>Time</th>
                        <th>Price</th>
                        
                    </tr>
                    <tr>
                        <td>10:00am - 10:00pm (12 hrs)</td>
                        <td>₹500</td>
                        <td><input type="radio" id="day1" name="day" value="1"></td>
                    </tr>
                    <tr>
                        <td>10:00pm - 10:00am (12 hrs)</td>
                        <td>₹500</td>
                        <td><input type="radio" id="day1" name="day" value="1"></td>
                       
                    </tr>
                    <tr>
                        <td>10:00am - 10:00am (24 hrs)</td>
                        <td>₹900</td>
                        <td><input type="radio" id="day1" name="day" value="1"></td>
                    </tr>
                    
                    <tr>
                        <td class="book-days">Book Up to 5 days</td>
                    </tr>
                    <tr>
                       
                        <td>
                        <input type="radio" id="day1" name="day" value="1">
                        <label for="day1">1</label>
                        <input type="radio" id="day2" name="day" value="2">
                        <label for="day2">2</label>
                        <input type="radio" id="day3" name="day" value="3">
                        <label for="day3">3</label>
                        <input type="radio" id="day4" name="day" value="4">
                        <label for="day4">4</label>
                        <input type="radio" id="day5" name="day" value="5">
                        <label for="day5">5</label>
                        </td>
                        <td> ₹900</td>
                    </tr>
                </table>
                <a id="next-page-button"><button class="pay-button">Pay</button></a>
            </div>
        </div>
    
        <div class="rules">
            <h3>Rules</h3>
            <ul>
                <li>If the nurse arrives some time late, that time will be managed.</li>
                <li>Give honest and detailed answers about your health, symptoms, lifestyle, and any medications you take.
                </li>
                <li>Respect the nurse's duties.</li>
                <li>Avoid lengthy discussions about non-urgent matters to respect the nurse and other patients' time.</li>
                <li>Think of the nurse as your family.</li>
            </ul>
        </div>
    </div>
    </div>
    <hr>
    <!-- footer  -->

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <img class="ftr-logo" src="../assests/caregiver-logo.png" alt="Logo">
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
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="ftr-header">Caregiver Service</h3>
                <ul>
                    <li><a href="#">Doctor</a></li>
                    <li><a href="#">Nurse</a></li>
                    <li><a href="#">Physiotherapist</a></li>
                    <li><a href="#">Lab Test</a></li>
                    <li><a href="#">Care Taker</a></li>
                    <li><a href="#">Medicine</a></li>
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

     <script src="../script/main.js"></script>
</body>
</html>