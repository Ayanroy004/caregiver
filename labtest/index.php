<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #1A3636;
    color: #FFFFFF;
}

header {
    width: 100%;
    background-color: #181717;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
}

.logo img {
    max-width: 100px;
}

nav {
    display: flex;
    align-items: center;
    gap: 20px;
}

nav ul {
    list-style-type: none;
    display: flex;
    gap: 20px;
}

nav ul li {
position: relative;
}

nav ul li a {
    color: #FFFFFF;
    text-decoration: none;
    font-size: 16px;
}

nav ul li a:hover {
    color: #ff4b4b;
}      

.dropdown:hover .dropdown-menu {
display: block;
}

.background-image {
    background: url(lab\ test\ bg\ image.png);
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}

.background-content h2 {
    font-size: 40px;
    text-align: center;
}

.auth-buttons {
display: flex;
align-items: center;
gap: 10px;
}

button {
padding: 10px 20px;
border: none;
cursor: pointer;
border-radius: 5px;
font-size: 16px;
color: white;
background-color: #A02334;
transition: background-color 0.3s;
}

button:hover {
background-color: #ff4d4d;
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.dropdown-menu {
display: none;
color: #000;
position: absolute;
top: 100%;
left: 0;
background-color: white;
border-radius: 5px;
box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
z-index: 1;
}

.dropdown-menu li {
width: 100%;
}

.dropdown-menu li a {
display: block;
padding: 10px 20px;
color: black;
text-decoration: none;
transition: background-color 0.3s;
}

.dropdown-menu li a:hover {
background-color: #ff4b4b;
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.user-icon {
font-size: 24px;
color: #f5f5f5;
margin-right: 10px;
cursor: pointer;
}

.form-container {
width: 60%;
margin: 0 auto;
}

.input-field {
display: block;
width: 80%;
padding: 10px;
margin: 10px auto;
border: none;
border-radius: 5px;
}

.auth-buttons {
display: flex;
align-items: center;
gap: 10px;
}

button {
padding: 10px 20px;
border: none;
cursor: pointer;
border-radius: 5px;
font-size: 16px;
color: white;
background-color: #A02334;
transition: background-color 0.3s;
}

button:hover {
background-color: #ff4d4d;
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.dropdown-menu {
display: none;
color: #000;
position: absolute;
top: 100%;
left: 0;
background-color: white;
border-radius: 5px;
box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
z-index: 1;
}

.dropdown-menu li {
width: 100%;
}

.dropdown-menu li a {
display: block;
padding: 10px 20px;
color: black;
text-decoration: none;
transition: background-color 0.3s;
}

.dropdown-menu li a:hover {
background-color: #ff4b4b;
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.user-icon {
font-size: 24px;
color: #f5f5f5;
margin-right: 10px;
cursor: pointer;
}

.packages-section {
background-color: #1A3636;
padding: 40px;
text-align: center;
color: white;
border-radius: 8px;
width: 100%;
max-width: 100%;
}

.packages-section h2 {
font-size: 28px;
margin-bottom: 10px;
}

.subtitle {
font-size: 16px;
margin-bottom: 20px;
color: #c7d0d9;
}

.button-container {
text-align: right;
margin-bottom: 20px;
}

.package-button {
text-decoration: none;
background-color: #A02334;
color: white;
padding: 8px 16px;
border-radius: 4px;
font-size: 14px;
transition: background-color 0.3s, transform 0.3s, border-radius 0.3s;
}

.package-button:hover {
background-color: #ff4d4d; 
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}


.package-cards {
display: flex;
justify-content: space-around;
gap: 20px;
margin-top: 20px;
}

.package-card {
background-color: #1c2c3a;
padding: 20px;
border-radius: 8px;
text-align: center;
width: 30%;
min-width: 180px;
}

.icon {
width: 60px;
height: 60px;
border-radius: 50%;
background-color: #ff8c42;
display: flex;
justify-content: center;
align-items: center;
margin: 0 auto 15px;
font-size: 30px;
color: white;
}

.medical::before {
content: "👨‍⚕️";
}

.wellness::before {
content: "❤️";
}

.emergency::before {
content: "🚑";
}

.package-card h3 {
font-size: 18px;
color: white;
margin-bottom: 8px;
}

.package-card p {
font-size: 14px;
color: #c7d0d9;
}

.popular-section {
background-color: #1A3636;
padding: 40px;
text-align: center;
color: white;
border-radius: 8px;
width: 100%;
max-width: 100%;
}

.popular-section h2 {
font-size: 28px;
margin-bottom: 10px;
}

.subtitle {
font-size: 16px;
margin-bottom: 20px;
color: #c7d0d9;
}

.package-button {
text-decoration: none;
background-color: #A02334;
color: white;
padding: 8px 16px;
border-radius: 4px;
font-size: 14px;
transition: background-color 0.3s, transform 0.3s, border-radius 0.3s;
}

.package-button:hover {
background-color: #ff4d4d; 
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.popular-cards {
display: flex;
justify-content: space-around;
gap: 20px;
margin-top: 20px;
}

.popular-card {
background-color: #1c2c3a;
padding: 20px;
border-radius: 8px;
text-align: center;
width: 30%;
min-width: 180px;
}

.icon {
width: 60px;
height: 60px;
border-radius: 50%;
background-color: #ff8c42;
display: flex;
justify-content: center;
align-items: center;
margin: 0 auto 15px;
font-size: 30px;
color: white;
}

.health-care::before {
content: "👨‍⚕️";
}

.senior-care::before {
content: "❤️";
}

.mental-wellness::before {
content: "🚑";
}

.popular-card h3 {
font-size: 18px;
color: white;
margin-bottom: 8px;
}

.popular-card p {
font-size: 14px;
color: #c7d0d9;
}

/* Main popular categories */
.main-popular {
padding-top: 4rem;
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
gap: 15px;
}

.inner-popular-content {
flex: 1 1 300px;
padding: 1rem 3rem;
text-align: center;
}

.inner-popular-content h2 {
font-size: 25px;
margin-bottom: 10px;
}

.inner-popular-content p {
font-size: 1.5rem;
line-height: 2;
}

.popular-icon i {
font-size: 4rem;
width: 8rem;
height: 8rem;
border-radius: 50%;
text-align: center;
line-height: 8rem;
background: var(--mainafterclr);
color: var(--mainclr);
margin-bottom: 15px;
cursor: pointer;
transition: .3s;
}

.popular-icon i:hover {
color: white;
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.gallery {
padding: 4rem 7%;
}

.gallery h2 {
font-size: 28px;
margin-bottom: 10px;
text-align: center;
}

.gallery-button {
text-decoration: none;
background-color: #A02334;
color: white;
padding: 10px 20px;
border-radius: 4px;
font-size: 16px;
display: block;
text-align: center;
margin: 20px auto;
transition: background-color 0.3s, transform 0.3s, border-radius 0.3s;
}

.gallery-button:hover {
background-color: #ff4d4d;
background: var(--mainclr);
transform: scale(1.1);
border-radius: 20px;
}

.main-gallery {
display: grid;
grid-template-columns: repeat(3, 1fr);
gap: 20px;
margin-bottom: 20px;
}

.inner-gallery {
width: 100%;
}

.inner-gallery img {
width: 100%;
height: auto;
border-radius: 10px;
transition: .3s;
}

.inner-gallery img:hover {
transform: scale(1.1);
border-radius: 15px;
}

.right-gallery-content {
display: flex;
justify-content: center;
align-items: center;
}

.wall-of-love {
background-color: #1A3636;
padding: 40px;
text-align: center;
color: white;
border-radius: 8px;
width: 100%;
max-width: 100%;
}

.wall-of-love h2 {
font-size: 28px;
margin-bottom: 10px;
}
/*.wall-of-love { 
padding: 50px;
background-color: #1A3636;
border-radius: 8px;
margin-top: -90px;
}*/

/*.main-wall-of-love {
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
gap: 50px;
width: 100%;
max-width: 100%;
border-radius: 8px;
color: white;
text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}*/

.inner-wall-of-love {
flex: 1 1 45rem;
}

.inner-wall-of-love h1 {
font-size: 40px;
color: #ff4b4b;
margin-bottom: 20px;
text-align: center;
text-transform: uppercase;
}

.inner-wall-of-love-content {
margin-top: 30px;
display: flex;
justify-content: space-between;
flex-wrap: wrap;
gap: 30px;
}

.main-inner-wall-of-love {
display: flex;
align-items: center;
justify-content: center;
width: 30%;
min-width: 250px;
background-color: #1c2c3a;
padding: 20px;
border-radius: 8px;
box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 10px;
transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.main-inner-wall-of-love:hover {
transform: translateY(-10px);
box-shadow: rgba(0, 0, 0, 0.35) 0px 10px 20px;
}

.wall-of-love-icon, .chose-icon {
width: 60px;
height: 60px;
line-height: 60px;
background: #ff4b4b;
color: white;
font-size: 30px;
text-align: center;
border-radius: 50%;
margin-right: 15px;
box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
transition: transform 0.3s ease;
}

.wall-of-love-icon i, .chose-icon i {
display: inline-block;
vertical-align: middle;
}

.main-inner-wall-of-love:hover .wall-of-love-icon, .main-inner-wall-of-love:hover .chose-icon {
transform: scale(1.2);
}

.icon-content p {
font-size: 1rem;
line-height: 1.5;
color: #c7d0d9;
flex: 1;
margin-left: 15px;
}

.footer {
background-color: #1A3636;
color: white;
padding: 0px;
padding-top: 30px;
}

.footer-container {
display: flex;
justify-content: space-between;
gap: 20px;
flex-wrap: wrap;
}

.footer-logo {
flex: 1;
margin-bottom: 30px;
}

.footer-logo img {
    max-width: 100px;
}

.social-icons {
margin-bottom: 10px;
padding-top: 20px;
}

.social-icons i {
margin-right: 10px;
color: white;
font-size: 20px;
cursor: pointer;
}

.footer-links, .footer-services, .footer-contact {
flex: 1;
}

.footer-links h3, .footer-services h3, .footer-contact h3 {
margin-bottom: 15px;
}

.footer-links a, .footer-services a, .footer-contact p {
display: block;
color: white;
margin-bottom: 8px;
text-decoration: none;
}

.footer-contact button {
background-color: #A02334;
color: white;
border: none;
padding: 10px 15px;
border-radius: 5px;
cursor: pointer;
}

.footer-bottom {
background-color: #A02334;
padding: 10px 0;
text-align: center;
font-size: 14px;
color: #888;
}

@media (max-width: 768px) {
    nav ul {
        flex-direction: column;
    }

    .packages-content, .popular-content {
        flex-direction: column;
        align-items: center;
    }

    .background-content h1 {
        font-size: 36px;
    }

    button {
        padding: 8px 16px;
        font-size: 14px;
    }

    .main-packages, .main-popular, .main-gallery {
        flex-direction: column;
        align-items: center;
    }

    .footer-logo {
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .background-content h1 {
        font-size: 28px;
    }

    button {
        width: 100%;
    }

}
@media (min-width: 768px) {
nav {
flex-direction: row;
}
.footer-container {
flex-direction: row;
justify-content: space-between;
max-width: 1200px;
margin: 0 auto;
}
.footer-links, .footer-services, .footer-contact {
flex: 1;
text-align: left;
}
}
    </style>
</head>
<body>
  <header>
    <div class="logo">
        <img src="../labtest/images/caregiver logo.png">
    </div>
    <nav>
        <ul>
            <li><a href="../main.php">Home</a></li>
            <li><a href="../aboutus.php">About Us</a></li>
            <li class="dropdown">
                <a href="#">Service ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="../doctor/index.php">Doctor</a></li>
                    <li><a href="../Nurse/index.php">Nurse</a></li>
                    <li><a href="../phsio/CareGiver application">Physiotherapist</a></li>
                    <li><a href="../labtest/index.php">Lab Test</a></li>
                    <li><a href="../caretaker/careTakerBook.php">Care Taker</a></li>
                </ul>
            </li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <div class="auth-buttons">
        <a href="../sign-up/login.php"><button><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
        </div>
    </nav>
</header>
    <div class="background-image">
        <div class="background-content">
            <h2>Hey there, trailblazers! 🚀<br>Your amazing journey begins now 👋</h2>
            <p>Greetings, pioneers! 🌍✨ Buckle up, because your extraordinary adventure is about to unfold-let's make it legendary! 💥.</p>
            <form action="#" method="post" class="form-container" style="position: relative; padding: 20px; margin-top: 50px; text-align: center;"> 
                <label style="display: block; text-align: left; margin-bottom: 5px;">
                    Full Name<span style="color: red;">*</span>
                    <input type="text" placeholder="Full Name" class="input-field" style="width: 100%; margin-bottom: 10px;">
                </label>
                
                <label style="display: block; text-align: left; margin-bottom: 5px;">
                    Your Phone No or Email<span style="color: red;">*</span>
                    <input type="text" placeholder="Your Phone No or Email" class="input-field" style="width: 100%; margin-bottom: 10px;">
                </label>
            
                <label style="display: block; text-align: left; margin-bottom: 5px;">
                    Location<span style="color: red;">*</span>
                    <input type="text" placeholder="Location" class="input-field" style="width: 100%; margin-bottom: 20px;">
                </label>
            
                <button type="submit">Submit & View</button>
            </form>            
            
            <div style="position: absolute; top: 90px; right: 20px;">
                <a href="#">
                    <button style="background-color: white; text-align: center; padding: 10px 20px; border: none; border-radius: 5px; color: black; font-size: 16px;">
                        <i class="fas fa-search" style="margin-right: 8px;"></i>What Are You Looking For ?
                    </button>
                </a>
            </div>            
        </div>
    </div>

    <section class="packages-section">
        <h2>Our Special Packages</h2>
        <p class="subtitle">We offer a variety of tailored packages to meet your unique needs.</p>
        <div class="button-container">
            <a href="../labtest/html/our packages.html" class="package-button">See All Packages</a>
        </div>
        <div class="package-cards">
            <div class="package-card">
                <div class="icon medical"></div>
                <h3>Medical Services Package</h3>
                <p>Comprehensive medical care packages designed for your health and well-being.</p>
            </div>
            <div class="package-card">
                <div class="icon wellness"></div>
                <h3>Wellness Programs Package</h3>
                <p>Join our wellness programs for a more balanced and healthy lifestyle.</p>
            </div>
            <div class="package-card">
                <div class="icon emergency"></div>
                <h3>Emergency Services Package</h3>
                <p>24/7 emergency support with our specialized care packages.</p>
            </div>
        </div>
    </section>

    <section class="popular-section">
        <h2>Our Popular Categories</h2>
        <p class="subtitle">Explore a variety of categories that match your interests and needs.</p>
        <div class="button-container">
            <a href="../labtest/html/popular categories.html" class="package-button">See All Categories</a>
        </div>
        <div class="popular-cards">
            <div class="popular-card">
                <div class="icon health-care"></div>
                <h3>Health Care</h3>
                <p>Explore our top health care packages designed to ensure well-being.</p>
            </div>
            <div class="popular-card">
                <div class="icon senior-care"></div>
                <h3>Senior Care</h3>
                <p>Specialized services dedicated to elderly care and comfort.</p>
            </div>
            <div class="popular-card">
                <div class="icon mental-wellness"></div>
                <h3>Mental Wellness</h3>
                <p>Take care of your mind with programs and resources for mental well-being.</p>
            </div>
        </div>
    </section>
    
    <div class="gallery">
        <h2>Our Gallery</h2>
        <div class="main-gallery">
            <div class="inner-gallery">
                <img src="../labtest/images/g1.jpg">
            </div>
            <div class="inner-gallery">
                <img src="../labtest/images/g2.jpg">
            </div>
            <div class="inner-gallery">
                <img src="../labtest/images/g3.jpg">
            </div>
            <div class="inner-gallery">
                <img src="../labtest/images/g4.jpg">
            </div>
            <div class="inner-gallery">
                <img src="../labtest/images/g5.jpg">
            </div>
            <div class="inner-gallery">
                <img src="../labtest/images/g6.jpg">
            </div>
        </div>
        <!-- The "See All Photos" button placed after the gallery -->
        <div class="right-gallery-content">
            <a href="../labtest/html/gallery.html" class="gallery-button">See All Photos</a>
        </div>
    </div>    

    <div class="wall-of-love"> 
    
            <div class="inner-wall-of-love">
                <h2>WALL OF LOVE 💓</h2>
    
                <div class="inner-wall-of-love-content">
                    <!-- First Icon and Content -->
                    <div class="main-inner-wall-of-love">
                        <div class="wall-of-love-icon">
                            <i class="fas fa-notes-medical"></i>
                        </div>
                        <div class="icon-content">
                            <p>We believe that every act of kindness, no matter how small, can make the world a better place. Thank you for spreading love and care wherever you go!</p>
                        </div>
                    </div>
    
                    <!-- Second Icon and Content -->
                    <div class="main-inner-wall-of-love">
                        <div class="chose-icon">
                            <i class="fas fa-hospital-user"></i>
                        </div>
                        <div class="icon-content">
                            <p>In moments of hardship, it is the love and support of others that can heal us. We are endlessly grateful for the compassionate souls who bring light during dark times.</p>
                        </div>
                    </div>
    
                    <!-- Third Icon and Content -->
                    <div class="main-inner-wall-of-love">
                        <div class="wall-of-love-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div class="icon-content">
                            <p>Our heroes wear many faces – from doctors and caregivers to everyday friends and family. Their unwavering dedication to others' well-being is the greatest form of love.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<footer>
  <div class="footer-container">
      <div class="footer-logo">
          <img src="../labtest/images/caregiver logo.png">
          <p>“Caregiver: Enveloping You in Dazzling Compassionate Care—Dazzling Support 24/7, Always by Your Side.”</p>
          <div class="social-icons">
            <img src="../labtest/images/fb.png" alt="Facebook">
            <img src="../labtest/images/insta.png" alt="Instagram">
            <img src="../labtest/images/twitter.png" alt="Twitter">
            <img src="../labtest/images/linkdin.png" alt="LinkedIn">
        </div>
      </div>
      <div class="footer-links">
          <h3><u>Quick Links</u></h3>
          <a href="#">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Our Team</a>
          <a href="#">Services</a>
      </div>
      <div class="footer-services">
          <h3><u>Caregiver Service</u></h3>
          <a href="#">Doctor</a>
          <a href="#">Nurse</a>
          <a href="#">Physiotherapist</a>
          <a href="#">Lab Test</a>
          <a href="#">Care Taker</a>
      </div>
      <div class="footer-contact">
          <h3><u>Contact info</u></h3>
          <p><img src="../labtest/images/Phone call.png">+91-1234567890</p>
          <p><img src="../labtest/images/mail.png">caregiver270@gmail.com</p>
          <p><img src="../labtest/images/Phone call.png">+033-2569-3125</p>
          <button>Get Started</button>
      </div>
  </div>
  <div class="footer-bottom">
      <p>&copy;2024 Caregiver Web Application. All rights reserved.</p>
  </div>
</footer>
</body>
</html>