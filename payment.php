<?php
// Database connection
$host = 'localhost'; // Change to your database host
$db = 'movie'; // Change to your database name
$user = 'root'; // Change to your database username
$pass = ''; // Change to your database password

// Create connection
$pdo = new mysqli($host, $user, $pass, $db);

// Check connection
if ($pdo->connect_error) {
    die("Connection failed: " . $pdo->connect_error);
}

$message = '';

// Predefined cities and countries
$cities = ['morbi','rajkot','New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'];
$countries = ['United States', 'Canada', 'United Kingdom', 'Australia', 'Germany','india'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $fullName = $_POST['full_name'];
    $address = $_POST['user_address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $cardNumber = $_POST['card_number'];
    $cardExpiry = $_POST['card_expiry'];
    $cardCvc = $_POST['card_cvc'];

    // Basic validation
    if (empty($fullName) || empty($address) || empty($zipcode) || empty($city) || empty($country) || empty($cardNumber) || empty($cardExpiry) || empty($cardCvc)) {
        $message = "Please fill in all fields.";
    } else {
        // Remove non-numeric characters for zip code and card number
        $zipcode = preg_replace('/\D/', '', $zipcode);
        $cardNumber = preg_replace('/\D/', '', $cardNumber);
        $cardCvc = preg_replace('/\D/', '', $cardCvc);

        // Check if the modified zip code and card number are numeric and have the correct length
        if (!is_numeric($zipcode) || strlen($zipcode) < 5 || strlen($zipcode) > 10) {
            $message = "Zipcode should be numeric and between 5 to 10 digits.";
        } elseif (!is_numeric($cardNumber) || strlen($cardNumber) < 13 || strlen($cardNumber) > 19) {
            $message = "Card number should be numeric and between 13 to 19 digits.";
        } elseif (!is_numeric($cardCvc) || strlen($cardCvc) < 3 || strlen($cardCvc) > 4) {
            $message = "Card CVC should be numeric and between 3 to 4 digits.";
        } elseif (!preg_match("/^\d{2}\/\d{2}$/", $cardExpiry)) {
            $message = "Card expiry should be in MM/YY format.";
        } else {
            // Retrieve the last row from the bookings table
            $lastBookingQuery = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
            $lastBookingResult = $pdo->query($lastBookingQuery);

            if ($lastBookingResult && $lastBookingResult->num_rows > 0) {
                $lastBooking = $lastBookingResult->fetch_assoc();

                $cinemaName = $lastBooking['cinema_name'];
                $movieName = $lastBooking['movie_name'];
                $showtime = $lastBooking['showtime'];
                $totalPrice = $lastBooking['total_price'];

                // Prepare SQL query to insert data into bookingdetails
                $stmt = $pdo->prepare("INSERT INTO bookingdetails (full_name, address, zipcode, city, country, card_number, card_expiry, card_cvc, cinema_name, movie_name, showtime, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                if ($stmt) {
                    // Bind parameters
                    $stmt->bind_param('sssssssssssd', $fullName, $address, $zipcode, $city, $country, $cardNumber, $cardExpiry, $cardCvc, $cinemaName, $movieName, $showtime, $totalPrice);

                    // Execute the query
                    if ($stmt->execute()) {
                        $message = "Booking details have been recorded successfully!";
                        // Redirect to avoid resubmission
                        // header("Location: " . $_SERVER['PHP_SELF']);
                        include 'confirmation.php';
                        exit();
                    } else {
                        $message = "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    $message = "Error preparing statement: " . $pdo->error;
                }
            } else {
                $message = "No booking records found.";
            }
        }
    }
}

$pdo->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BookMyShow</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/css2/style.css" rel="stylesheet">
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-white">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                    <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                    <span class="fs-5 fw-bold">+012 345 6789</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.php" class="navbar-brand ps-5 me-0">
            <h1 class="text-white m-0">BookMyShow</h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="Stream.php" class="nav-item nav-link">Stream</a>
                <a href="events.php" class="nav-item nav-link">Events</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="about.php" class="dropdown-item">About Us</a>
                        <a href="feature.php" class="dropdown-item">Features</a>
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="Admin.php" class="dropdown-item">Admin</a>
                        <a href="404.php" class="dropdown-item">404 Page</a>
                        <a href="loginsystem/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="loginsystem/login.php" class="btn btn-primary px-3 d-none d-lg-block">Log In</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url('img/card.jpg'); background-size: cover, auto; width: 100%; height: 450px; justify-content: center; padding: 0%; margin-top:10px; padding-top: 25px;">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight" style="margin-top:50px; justify-content: center;">Payment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                   
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Booking Form Start -->
    <div class="container">
        <h2 class="text-center mb-4">Payment Form</h2>
        <form method="POST" action="">
            <div class="form-group mb-3">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group mb-3">
                <label for="user_address">Address</label>
                <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Enter your address" required>
            </div>
            <div class="form-group mb-3">
                <label for="zipcode">Zipcode</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter your zipcode" required>
            </div>
            <div class="form-group mb-3">
                <label for="city">City</label>
                <select id="city" name="city" class="form-control" required>
                    <option value="">Select your city</option>
                    <?php foreach ($cities as $cityOption): ?>
                        <option value="<?= htmlspecialchars($cityOption) ?>"><?= htmlspecialchars($cityOption) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="country">Country</label>
                <select id="country" name="country" class="form-control" required>
                    <option value="">Select your country</option>
                    <?php foreach ($countries as $countryOption): ?>
                        <option value="<?= htmlspecialchars($countryOption) ?>"><?= htmlspecialchars($countryOption) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="card_number">Card Number</label>
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Enter your card number between 13 to 19 digit" required>
            </div>
            <div class="form-group mb-3">
                <label for="card_expiry">Card Expiry (MM/YY)</label>
                <input type="text" class="form-control" id="card_expiry" name="card_expiry" placeholder="Enter card expiry date" required>
            </div>
            <div class="form-group mb-3">
                <label for="card_cvc">Card CVC</label>
                <input type="text" class="form-control" id="card_cvc" name="card_cvc" placeholder="Enter card CVC between 3 to 4 digit" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if ($message): ?>
            <div class="alert alert-info mt-3">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- Booking Form End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 6789</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#">Home</a>
                    <a class="btn btn-link" href="#">Stream</a>
                    <a class="btn btn-link" href="#">Events</a>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Subscribe to our newsletter to get the latest updates and offers.</p>
                    <div class="position-relative">
                        <input class="form-control border-0 py-3 pe-5" type="text" placeholder="Your email">
                        <button class="btn btn-primary py-2 px-4 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Customized Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Template JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>
