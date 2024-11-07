<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./css/Nurse_style.css">
    <!-- <script>
       
    </script> -->
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
            <a href="../sign-up/sign-up.html" class="button signup">Sign Up</a>
            <a href="#login" class="button login">Login</a>
        </div>
    </div>

    <div class="image-big-div">
       <img class="image-big" src="./assests/big-image.png" alt="Nurse-image">
    </div>

    <!-- Nurse profile  -->
                <h2 id="Specialist-head">Specialist Nurse For Your Family</h2>
    <div class="container">

            <div class="dropdown-2">
                <button class="dropbtn-2">Select type <i class="fa-solid fa-caret-down"></i></button>
                <div class="dropdown-content-2">
                    <a href="#staff-nurse">Staff Nurse</a>
                    <a href="#home-nurse">Home Nurse</a>
                    <a href="#ot-nurse">OT Nurse</a>
                    <a href="#icu/ccu-nurse">ICU/CCU Nurse</a>
                    <a href="#supervisor-nurse">Nursing Supervisor</a>
                    <a href="#register-nurse">Registered Nurse</a>
                    <a href="#gnm-nurse">GNM Nurse</a>
                </div>
            </div>

        <div class="scrollable-container">
         <!-- <div class="nurse-list"> -->
        <!-- <form action="" method="POST"> -->
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse" >
                
                <div class="nurse-details">
                    <h3 name="" class="nurse-name">Tina Roy <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">Staff Nurse</p>
                    <p class="nurse-qualification">BSC Nursing</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                   <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a> 
                </div>
            </div>
            
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg" alt="Nurse">
                <div class="nurse-details">
                    <h3 class="nurse-name">Awnessa Mondal <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">Home Nurse</p>
                    <p class="nurse-qualification">Diploma</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a>
                </div>
            </div>
            
            <!-- <div class="nurse-list"> -->
                <div class="nurse-card">
                    <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                    <div class="nurse-details">
                        <h3 name="nurse_name" class="nurse-name">Aparna Roy <i class="fa-solid fa-circle"></i></h3>
                        <p class="nurse-type">OT Nurse</p>
                        <p class="nurse-qualification">BSN,MSN</p>
                        <p class="nurse-address">Kolkata</p>
                    </div>
                    <div class="actions">
                        <!-- <button class="visit-btn">Visit</button> -->
                    <a href="./public/Nurse_Booking.php"><button name="proceed" class="proceed-btn">Proceed</button></a>
                    </div>
                </div>
            <!-- </div> -->

            <!-- <div class="nurse-list"> -->
                <div class="nurse-card">
                    <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                    <div class="nurse-details">
                        <h3 id="nurseNM" class="nurse-name">Ankita Paul <i class="fa-solid fa-circle"></i></h3>
                        <p class="nurse-type">ICU/CCU Nurse</p>
                        <p class="nurse-qualification">BSC Nursing</p>
                        <p class="nurse-address">Kolkata</p>
                    </div>
                    <div class="actions">
                        <!-- <button class="visit-btn">Visit</button> -->
                        <a href="./public/Nurse_Booking.php"><button onclick="Nursename()" class="proceed-btn">Proceed</button></a>
                    </div>
                </div>
            <!-- </div> -->
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                <div class="nurse-details">
                    <h3 class="nurse-name">Shima Das  <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">OT Nurse</p>
                    <p class="nurse-qualification">BSN</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                <a href="./public/Nurse_Booking.php"> <button onclick="nurseName()" class="proceed-btn">Proceed</button></a>   
                </div>
            </div>
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                <div class="nurse-details">
                    <h3 class="nurse-name">Soumye Ghosh <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">Registered Nurse</p>
                    <p class="nurse-qualification">HS</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                    <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a>
                </div>
            </div>

            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                <div class="nurse-details">
                    <h3 class="nurse-name">Kamrun Nessa <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">OT Nurse</p>
                    <p class="nurse-qualification">BSC Nursing</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                    <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a>
                </div>
            </div>
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                <div class="nurse-details">
                    <h3 class="nurse-name">Afrin Khatun <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">Home Nurse</p>
                    <p class="nurse-qualification">BSC Nursing</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                    <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a>
                </div>
            </div>
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                <div class="nurse-details">
                    <h3 class="nurse-name">Krishna Banerjee <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">Nursing Supervisor</p>
                    <p class="nurse-qualification">BSC Nursing</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                    <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a>
                </div>
            </div>
            <div class="nurse-card">
                <img src="./assests/nurse-1.jpg " alt="Nurse">
            
                <div class="nurse-details">
                    <h3 class="nurse-name">Ms. Jesmin Khatun <i class="fa-solid fa-circle"></i></h3>
                    <p class="nurse-type">GNM Nurse</p>
                    <p class="nurse-qualification">HS</p>
                    <p class="nurse-address">Kolkata</p>
                </div>
                <div class="actions">
                    <!-- <button class="visit-btn">Visit</button> -->
                    <a href="./public/Nurse_Booking.php"><button class="proceed-btn">Proceed</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
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