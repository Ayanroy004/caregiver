
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
    <form action="checkout.php" method="post">
        <!-- Cardholder Name  -->
        <label for="nurse">Nurse Name</label>
        <input type="text" id="nurse" disabled>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="John Doe" required>

        <label for="number">Mobile Number</label>
        <input type="number" id="card-number" name="number" placeholder="00 00 00 00 00" required>

        <label for="Email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
        
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter Your Address" required>
    
        
        <button name="submit" type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>
