<?php
$apiKey = "rzp_test_5JKc1G0p94EQMg";
?>
<!-- // Set your callback URL -->
<!-- $callback_url = "http://localhost:8000/success.html"; -->

<!-- // Include Razorpay Checkout.js library -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>;

<!-- // Create a payment button with Checkout.js -->
<button onclick="startPayment()">Pay with Razorpay</button>;

<!-- // Add a script to handle the payment -->
<script>
    function startPayment() {
        var options = {
            key: "<?php echo $apiKey; ?>", // Enter the Key ID generated from the Dashboard
            amount: " <?php echo $_POST['amount'] * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            currency: "' . $order->INR . '",
            name: "Caregiver",
            description: "Happy booking and happy Family !",
            image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
            order_id: "<?php echo 'OID'.rand(10,100).'END'; ?>", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            prefill: {
                name: "<?php echo $_POST['name']; ?>",
                email: "<?php echo $_POST['email']; ?>",
                contact: "<?php echo $_POST['number']; ?>"
            },
            notes: {
                address: "Razorpay Corporate Office"
            },
            theme: {
                "color": "#3399cc"
            },
            callback_url: "' . $callback_url . '"
        };
        var rzp = new Razorpay(options);
        rzp.open();
    }
</script>;

