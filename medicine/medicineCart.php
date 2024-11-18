<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicine | Product Cart</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <header>
      <nav>
        <div class="custom-container">
          <div class="wrapper">
            <div class="logo">
              <a href="#"><img src="../assets/logo.png" alt="Company Logo" /></a>
            </div>

            <div class="navigation cont">
              <ul class="first-ul ">
                <li><a href="../main.php">Home</a></li>
                <li><a href="../aboutus.php">About Us</a></li>
                <li class="nav2">
                  <div class="wrap">
                    <p class="service">Services</p>
                    <div class="dropdown">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="10"
                        height="5"
                        viewBox="0 0 10 5"
                        fill="none"
                      >
                        <path d="M5 5L0 0H10L5 5Z" fill="#1D1B20" />
                        <path d="M5 5L0 0H10L5 5Z" fill="white" />
                      </svg>
                    </div>
                  </div>

                  <ul class="effect menu-toggle">
                    <li><a href="../doctor/index.php">Doctor</a></li>
                    <li><a href="../Nurse/index.php">Nurse</a></li>
                    <li><a href="../caretaker/careTakerBook.php">Care Taker</a></li>
                    <li><a href="../phsio/CareGiver application">Physiotherapist</a></li>
                    <li><a href="../labtest/index.php">Lab Test</a></li>
                    <li>
                      <a href="../medicine/medicine.php" target="_blank">Medicine</a>
                    </li>
                  </ul>
                </li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>

            <div class="log-sign-btn-wrapper">
            <a href="../sign-up/login.php"><button><i class="fa-solid fa-right-from-bracket"></i> Logout</button></a>
              <div class="hamburger">
                <img src="../assets/menu.png" alt="hamburger" />
                <img class="none" src="../assets/categories.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="progress divider">
      <div class="custom-container">
        <div class="progress-wrap">
          <p class="active">Product Cart</p>
          <div class="line"></div>
          <p>Checkout</p>
          <div class="line"></div>
          <p>Payment</p>
        </div>
      </div>
    </section>

    <?php
include "config.php";
// Handle deletion
if (isset($_POST['delete']) && isset($_POST['delete_item_id'])) {
    $productIdToDelete = intval($_POST['delete_item_id']);
    $sql_delete = "DELETE FROM orders WHERE mid='$productIdToDelete'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
    echo "<script>window.location.href='medicineCart.php';</script>";
    exit;
}

// Handle checkout button click
if (isset($_POST['checkout'])) {
    foreach ($_POST['quantities'] as $product_id => $quantity) {
        $quantity = intval($quantity);
        $sql_update = "UPDATE orders SET mitems='$quantity' WHERE mid='$product_id'";
        $conn->query($sql_update);
    }
    $totalamount = floatval($_POST['totalamount']);
    echo "<script>window.location.href='medicineAddress.php?totalamount=$totalamount';</script>";
    exit;
}

// Query to fetch cart items and corresponding product details
$sql = "SELECT o.mid, o.mitems, p.image, p.mname, p.mrp FROM orders o JOIN products p ON o.mid = p.id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<section class="sec-gap divider product-cart">
            <div class="custom-container">
                <div class="row">
                    <div class="col">
                        <div class="left-sec">
                            <div class="show-items">
                                <h4>Your Cart :</h4>
                                <h4>Items: ' . $result->num_rows . '</h4>
                            </div>
                            <form method="post" action="medicineCart.php">
                            <input type="hidden" name="totalPayableAmount" id="totalPayableAmountInput"> <!-- Hidden input for total payable amount -->
                            <div class="items-list">';
    // Loop through each cart item
    $totalSubtotal = 0;
    while ($row = $result->fetch_assoc()) {
        $imageData = base64_encode($row["image"]);
        $src = 'data:image/jpeg;base64,' . $imageData;
        $subtotal = $row["mitems"] * $row["mrp"];
        $totalSubtotal += $subtotal;
        echo '<div class="list">
    <div class="wrap">
        <div class="img-wrap">
            <img src="' . $src . '" alt="items" />
        </div>
        <div class="item-info">
            <p>' . $row["mname"] . '</p>
            <label for="options">Items:</label>
            <select id="options" name="quantities[' . $row["mid"] . ']">
                <option value="1" ' . ($row["mitems"] == 1 ? "selected" : "") . '>1</option>
                <option value="2" ' . ($row["mitems"] == 2 ? "selected" : "") . '>2</option>
                <option value="3" ' . ($row["mitems"] == 3 ? "selected" : "") . '>3</option>
                <option value="4" ' . ($row["mitems"] == 4 ? "selected" : "") . '>4</option>
            </select>
        </div>
          <div class="delete-button">
    <input type="hidden" name="delete_item_id" value="' . $row["mid"] . '">
    <button class="d-btn" type="button" onclick="deleteItem(' . $row["mid"] . ')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
            <path d="M3 18C2.45 18 1.97917 17.8042 1.5875 17.4125C1.19583 17.0208 1 16.55 1 16V3H0V1H5V0H11V1H16V3H15V16C15 16.55 14.8042 17.0208 14.4125 17.4125C14.0208 17.8042 13.55 18 13 18H3ZM13 3H3V16H13V3ZM5 14H7V5H5V14ZM9 14H11V5H9V14Z" fill="white"/>
        </svg>
    </button>
</div>

      </div>
    <div class="price">
        <div class="org-price">
            <div class="rupees">
                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_137_622)">
                        <path d="M0 0.500043C0 0.500043 1.74264 0.500043 3.5 0.500043M8 16.5L1 9.50004C1 9.50004 2.5 9.50004 3.5 9.50004C4.5 9.50004 9 9.56183 9 5.00004C9 0.438253 4.5 0.500043 3.5 0.500043M12 0.500043C12 0.500043 6.42893 0.500043 3.5 0.500043M0 4.50004H12" stroke="#CECECE"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_137_622">
                            <rect width="12" height="16" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h5 class="item-price">' . number_format($row["mrp"], 2) . '</h5>
        </div>
        <div class="org-price">
            <div class="rupees">
                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_137_622)">
                        <path d="M0 0.500043C0 0.500043 1.74264 0.500043 3.5 0.500043M8 16.5L1 9.50004C1 9.50004 2.5 9.50004 3.5 9.50004C4.5 9.50004 9 9.56183 9 5.00004C9 0.438253 4.5 0.500043 3.5 0.500043M12 0.500043C12 0.500043 6.42893 0.500043 3.5 0.500043M0 4.50004H12" stroke="#CECECE"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_137_622">
                            <rect width="12" height="16" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h5 class="subtotal-price">' . number_format($subtotal, 2) . '</h5>
        </div>
    </div>
</div>';

    }
    echo '        </div>
                        </div>
                    </div>
                    <div class="col-40 col-100">
                        <div class="right-sec">
                            <div class="subtotal">
                                <h4>Subtotal</h4>
                                <div class="org-price">
                                    <div class="rupees"><svg
                          width="12"
                          height="16"
                          viewBox="0 0 12 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g clip-path="url(#clip0_137_622)">
                            <path
                              d="M0 0.500043C0 0.500043 1.74264 0.500043 3.5 0.500043M8 16.5L1 9.50004C1 9.50004 2.5 9.50004 3.5 9.50004C4.5 9.50004 9 9.56183 9 5.00004C9 0.438253 4.5 0.500043 3.5 0.500043M12 0.500043C12 0.500043 6.42893 0.500043 3.5 0.500043M0 4.50004H12"
                              stroke="#CECECE"
                            />
                          </g>
                          <defs>
                            <clipPath id="clip0_137_622">
                              <rect width="12" height="16" fill="white" />
                            </clipPath>
                          </defs>
                        </svg></div>
                                    <h5 id="subtotal-value">' . number_format($totalSubtotal, 2) . '</h5>
                                </div>
                            </div>
                            <div class="subtotal">
                                <h4>Your Saving</h4>
                                <div class="org-price">
                                    <div class="rupees"><svg
                          width="12"
                          height="16"
                          viewBox="0 0 12 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g clip-path="url(#clip0_137_622)">
                            <path
                              d="M0 0.500043C0 0.500043 1.74264 0.500043 3.5 0.500043M8 16.5L1 9.50004C1 9.50004 2.5 9.50004 3.5 9.50004C4.5 9.50004 9 9.56183 9 5.00004C9 0.438253 4.5 0.500043 3.5 0.500043M12 0.500043C12 0.500043 6.42893 0.500043 3.5 0.500043M0 4.50004H12"
                              stroke="#CECECE"
                            />
                          </g>
                          <defs>
                            <clipPath id="clip0_137_622">
                              <rect width="12" height="16" fill="white" />
                            </clipPath>
                          </defs>
                        </svg></div>
                                    <h5 id="saving-value">' . number_format($totalSubtotal * 0.15, 2) . '</h5>
                                </div>
                            </div>
                            <div class="subtotal">
                                <h4>Shipping Cost</h4>
                                <div class="org-price">
                                    <div class="rupees"><svg
                          width="12"
                          height="16"
                          viewBox="0 0 12 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g clip-path="url(#clip0_137_622)">
                            <path
                              d="M0 0.500043C0 0.500043 1.74264 0.500043 3.5 0.500043M8 16.5L1 9.50004C1 9.50004 2.5 9.50004 3.5 9.50004C4.5 9.50004 9 9.56183 9 5.00004C9 0.438253 4.5 0.500043 3.5 0.500043M12 0.500043C12 0.500043 6.42893 0.500043 3.5 0.500043M0 4.50004H12"
                              stroke="#CECECE"
                            />
                          </g>
                          <defs>
                            <clipPath id="clip0_137_622">
                              <rect width="12" height="16" fill="white" />
                            </clipPath>
                          </defs>
                        </svg></div>
                                    <h5 id="shipping-value">50.00</h5>
                                </div>
                            </div>
                            <p class="shipping-cost">
                                Get Free Shipping for orders over 1000.00
                            </p>
                            <hr />
                            <div class="subtotal">
                                <h4>Total Payable Amount</h4>
                                <div class="org-price">
                                    <div class="rupees"><svg
                          width="12"
                          height="16"
                          viewBox="0 0 12 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <g clip-path="url(#clip0_137_622)">
                            <path
                              d="M0 0.500043C0 0.500043 1.74264 0.500043 3.5 0.500043M8 16.5L1 9.50004C1 9.50004 2.5 9.50004 3.5 9.50004C4.5 9.50004 9 9.56183 9 5.00004C9 0.438253 4.5 0.500043 3.5 0.500043M12 0.500043C12 0.500043 6.42893 0.500043 3.5 0.500043M0 4.50004H12"
                              stroke="#CECECE"
                            />
                          </g>
                          <defs>
                            <clipPath id="clip0_137_622">
                              <rect width="12" height="16" fill="white" />
                            </clipPath>
                          </defs>
                        </svg></div>
                                    <h5 id="payable-amount-value"> </h5>
                                    <input type="hidden" id="totalAmountInput" name="totalamount" readonly />
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit" name="checkout">Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>';
} else {
    echo '<p>Your cart is empty.</p>';
}

$conn->close();
?>

<script>
    function deleteItem(mid) {
        if (confirm('Are you sure you want to delete this item?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = 'medicineCart.php';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_item_id';
            input.value = mid;
            form.appendChild(input);

            var actionInput = document.createElement('input');
            actionInput.type = 'hidden';
            actionInput.name = 'delete';
            actionInput.value = 'true';
            form.appendChild(actionInput);

            document.body.appendChild(form);
            form.submit();
        }
    }
</script>


<div class="footer-part">
      <footer>
        <div class="custom-container">
          <div class="row">
            <div class="col-25 col-6 col-100">
              <div class="left-sec">
                <a href="#">
                  <div class="logo-wrap">
                    <img src="../assets/logo.png" alt="company logo" />
                  </div>
                </a>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. A
                  iste dolores animi alias libero, perferendis cum pariatur rem,
                  quidem quo molestiae. Facere enim quod labore ea ab, ut error
                  tempora.
                </p>
                <div class="social-media-logo">
                  <a href="#">
                    <div class="social">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="10"
                        height="16"
                        viewBox="0 0 10 16"
                        fill="none"
                      >
                        <path
                          d="M9.5 0.5H7.25C6.25544 0.5 5.30161 0.895088 4.59835 1.59835C3.89509 2.30161 3.5 3.25544 3.5 4.25V6.5H1.25V9.5H3.5V15.5H6.5V9.5H8.75L9.5 6.5H6.5V4.25C6.5 4.05109 6.57902 3.86032 6.71967 3.71967C6.86032 3.57902 7.05109 3.5 7.25 3.5H9.5V0.5Z"
                          stroke="white"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </a>
                  <a href="#">
                    <div class="social">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        style="&#10;    font-family: -webkit-body;&#10;"
                      >
                        <path
                          d="M12.125 3.875H12.1325M4.25 0.5H11.75C13.8211 0.5 15.5 2.17893 15.5 4.25V11.75C15.5 13.8211 13.8211 15.5 11.75 15.5H4.25C2.17893 15.5 0.5 13.8211 0.5 11.75V4.25C0.5 2.17893 2.17893 0.5 4.25 0.5ZM11 7.5275C11.0926 8.15168 10.9859 8.78916 10.6953 9.34926C10.4047 9.90936 9.94486 10.3636 9.38122 10.6473C8.81758 10.931 8.17884 11.0297 7.55584 10.9294C6.93284 10.8292 6.35732 10.5351 5.91113 10.0889C5.46494 9.64268 5.1708 9.06716 5.07055 8.44416C4.9703 7.82116 5.06905 7.18242 5.35274 6.61878C5.63644 6.05514 6.09064 5.59531 6.65074 5.30468C7.21084 5.01406 7.84832 4.90744 8.4725 5C9.10919 5.09441 9.69864 5.3911 10.1538 5.84623C10.6089 6.30136 10.9056 6.89081 11 7.5275Z"
                          stroke="white"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </a>
                  <a href="#">
                    <div class="social">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="16"
                        viewBox="0 0 18 16"
                        fill="none"
                      >
                        <path
                          d="M17.25 1.25C16.5318 1.75661 15.7366 2.14409 14.895 2.3975C14.4433 1.87814 13.843 1.51002 13.1753 1.34295C12.5076 1.17587 11.8046 1.2179 11.1616 1.46334C10.5185 1.70879 9.96633 2.1458 9.57974 2.71529C9.19314 3.28478 8.99077 3.95926 9 4.6475V5.3975C7.68198 5.43168 6.37596 5.13936 5.19826 4.54659C4.02056 3.95381 3.00774 3.07898 2.25 2C2.25 2 -0.75 8.75 6 11.75C4.4554 12.7985 2.61537 13.3242 0.75 13.25C7.5 17 15.75 13.25 15.75 4.625C15.7493 4.41609 15.7292 4.2077 15.69 4.0025C16.4555 3.24762 16.9956 2.29454 17.25 1.25Z"
                          stroke="white"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </a>
                  <a href="#">
                    <div class="social">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                      >
                        <path
                          d="M11 5C12.1935 5 13.3381 5.47411 14.182 6.31802C15.0259 7.16193 15.5 8.30653 15.5 9.5V14.75H12.5V9.5C12.5 9.10218 12.342 8.72064 12.0607 8.43934C11.7794 8.15804 11.3978 8 11 8C10.6022 8 10.2206 8.15804 9.93934 8.43934C9.65804 8.72064 9.5 9.10218 9.5 9.5V14.75H6.5V9.5C6.5 8.30653 6.97411 7.16193 7.81802 6.31802C8.66193 5.47411 9.80653 5 11 5Z"
                          stroke="white"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M3.5 5.75H0.5V14.75H3.5V5.75Z"
                          stroke="white"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          d="M2 3.5C2.82843 3.5 3.5 2.82843 3.5 2C3.5 1.17157 2.82843 0.5 2 0.5C1.17157 0.5 0.5 1.17157 0.5 2C0.5 2.82843 1.17157 3.5 2 3.5Z"
                          stroke="white"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="mid-sec">
                <div class="quick-link">
                  <h5>Quick Links</h5>
                  <ul>
                    <li>
                      <a href="../aboutus.php" target="_blank" target="_blank">About Us</a>
                    </li>
                    <li><a href="../doctor/privacyPolicy.php" target="_blank">Privacy Policy</a></li>
                    <li><a href="../doctor/termscondition.php" target="_blank">Terms & Condition </a></li>
                    <li><a href="../medicine/services.php" target="_blank">Services</a></li>
                  </ul>
                </div>

                <div class="services">
                  <h5>CareGiver Services</h5>
                  <ul>
                    <li>
                      <a href="../doctor/index.php" target="_blank" target="_blank">Doctor</a>
                    </li>
                    <li>
                      <a href="../Nurse/index.php" target="_blank" target="_blank">Nurse</a>
                    </li>
                    <li>
                      <a href="../phsio/CareGiver application" target="_blank" target="_blank"
                        >Physiotherapist
                      </a>
                    </li>
                    <li>
                      <a href="../labtest/index.php" target="_blank" target="_blank">Lab test</a>
                    </li>
                    <li>
                      <a href="../medicine/medicine.php" target="_blank">Medicine</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col right-sec">
              <div class="contact-info">
                <h5>Contact Info</h5>
                <ul>
                  <li>
                    <div class="icon">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                      >
                        <path
                          d="M10.0336 3.33332C10.6848 3.46037 11.2832 3.77883 11.7523 4.24795C12.2214 4.71707 12.5399 5.3155 12.6669 5.96666M10.0336 0.666656C11.3865 0.816947 12.648 1.42277 13.6111 2.38466C14.5742 3.34655 15.1816 4.60733 15.3336 5.95999M14.6669 11.28V13.28C14.6677 13.4657 14.6297 13.6494 14.5553 13.8196C14.4809 13.9897 14.3718 14.1424 14.235 14.2679C14.0982 14.3934 13.9367 14.489 13.7608 14.5485C13.5849 14.6079 13.3985 14.63 13.2136 14.6133C11.1622 14.3904 9.19161 13.6894 7.46028 12.5667C5.8495 11.5431 4.48384 10.1774 3.46028 8.56666C2.3336 6.82746 1.63244 4.84732 1.41361 2.78666C1.39695 2.6023 1.41886 2.4165 1.47795 2.24107C1.53703 2.06565 1.63199 1.90445 1.75679 1.76774C1.88159 1.63103 2.03348 1.5218 2.20281 1.447C2.37213 1.37221 2.55517 1.3335 2.74028 1.33332H4.74028C5.06382 1.33014 5.37748 1.44471 5.62279 1.65568C5.8681 1.86665 6.02833 2.15962 6.07361 2.47999C6.15803 3.12003 6.31458 3.74847 6.54028 4.35332C6.62998 4.59194 6.64939 4.85127 6.59622 5.10058C6.54305 5.34989 6.41952 5.57873 6.24028 5.75999L5.39361 6.60666C6.34265 8.27569 7.72458 9.65762 9.39361 10.6067L10.2403 9.75999C10.4215 9.58075 10.6504 9.45722 10.8997 9.40405C11.149 9.35088 11.4083 9.37029 11.6469 9.45999C12.2518 9.68569 12.8802 9.84224 13.5203 9.92666C13.8441 9.97234 14.1399 10.1355 14.3513 10.385C14.5627 10.6345 14.6751 10.953 14.6669 11.28Z"
                          stroke="white"
                          stroke-width="1.2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                    <p>+91-1234567890</p>
                  </li>
                  <li>
                    <div class="icon">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="14"
                        height="12"
                        viewBox="0 0 14 12"
                        fill="none"
                      >
                        <path
                          d="M6.99967 6.07703L2.16634 3.0562V2.90211L6.73468 5.75732L6.99967 5.92295L7.26467 5.75732L12.598 2.42399L13.1663 2.06878V9.99999C13.1663 10.233 13.0892 10.42 12.9211 10.5881C12.753 10.7562 12.566 10.8333 12.333 10.8333H1.66634C1.43334 10.8333 1.24632 10.7562 1.07823 10.5881C0.910137 10.42 0.833008 10.233 0.833008 9.99999V2.06878L1.16634 2.27711V2.4312V3.33332V9.99999V10.5H1.66634H12.333H12.833V9.99999V3.33332V2.4312L12.068 2.90932L6.99967 6.07703ZM12.9995 1.49999H12.333H1.66634H0.999839C1.02335 1.46997 1.04946 1.44065 1.07823 1.41188C1.24632 1.24379 1.43334 1.16666 1.66634 1.16666H12.333C12.566 1.16666 12.753 1.24379 12.9211 1.41188C12.9499 1.44065 12.976 1.46997 12.9995 1.49999Z"
                          fill="#1D1B20"
                          stroke="white"
                        />
                      </svg>
                    </div>
                    <p>caregiver270@gmail.com</p>
                  </li>
                  <li>
                    <div class="icon loc">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="20"
                        viewBox="0 0 18 20"
                        fill="none"
                      >
                        <path
                          d="M14.8792 13.9635C17.8944 10.5 17.5613 6.21998 14.5461 3.28544C11.4191 0.242081 6.35378 0.237621 3.23241 3.27548C0.22266 6.20471 0.394389 11 2.91916 13.953C5.10829 16.5134 6.94658 18.001 7.39658 18.3512C7.46708 18.406 7.53318 18.4643 7.60108 18.5222C8.33258 19.1451 9.41078 19.159 10.1577 18.5637C10.2613 18.481 10.3632 18.3956 10.4699 18.3169C10.9405 17.97 12.4279 16.7793 14.8792 13.9635Z"
                          stroke="white"
                          stroke-width="1.4"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                        <path
                          opacity="0.4"
                          d="M8.89453 12C10.5514 12 11.8945 10.6569 11.8945 9C11.8945 7.34315 10.5514 6 8.89453 6C7.23763 6 5.89453 7.34315 5.89453 9C5.89453 10.6569 7.23763 12 8.89453 12Z"
                          stroke="white"
                          stroke-width="1.4"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                    <p>
                      Dharampur,near Khadina More,Chinsurah,West Bengal 712101
                    </p>
                  </li>
                </ul>
                <button class="outline-button">Get Started</button>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <section>
        <div class="copy-rights">
          <p>© 2024 Caregiver Web Application. All rights reserved.</p>
        </div>
      </section>
    </div>

    <script src="../script/index.js"></script>
  </body>
</html>
