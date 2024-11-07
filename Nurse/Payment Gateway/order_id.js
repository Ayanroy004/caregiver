import Razorpay from "razorpay";
const instance = new Razorpay({
  key_id: "rzp_test_ZgNb5waRWgX3hj",
  key_secret: "id1BSo3mZVzHqFTI2YitsaQb",
});

const createOrder = async () => {
  const options = {
    amount: 50000, // Amount in paise
    currency: "INR",
    receipt: "receipt#1",
  };
  try {
    const order = await instance.orders.create(options);
    console.log(order); // Send order ID to the client
  } catch (error) {
    console.error(error);
  }
};
