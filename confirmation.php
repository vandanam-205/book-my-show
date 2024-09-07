<?php
// Database connection
$host = 'localhost'; // Replace with your database host
$db = 'movie'; // Replace with your database name
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the last row from bookingdetails table
$sql_bookingdetails = "SELECT * FROM bookingdetails ORDER BY id DESC LIMIT 1";
$result_bookingdetails = $conn->query($sql_bookingdetails);
$bookingdetails = $result_bookingdetails->fetch_assoc();

// Query to get the last row from bookings table
$sql_bookings = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
$result_bookings = $conn->query($sql_bookings);
$bookings = $result_bookings->fetch_assoc();?>

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
    <link rel="stylesheet" href="css/css2/style.css">

    <style>
        .payment-success-icon { 
            display: inline-block; 
            animation: pulse 2s ease-in-out infinite; 
        }

        .payment-success-icon svg { 
            transform-origin: center; 
        }

        @keyframes pulse { 
            0% { 
                transform: scale(0.8); 
            } 
            50% { 
                transform: scale(1.2); 
            } 
            100% { 
                transform: scale(0.8); 
            } 
        }
        /* style for table */
         .thanku h1 {
            color: #34C759; /* Success color */
            font-size: 48px; /* Font size for thank you message */
            margin-top: 20px; /* Margin top for spacing */
            text-align: center; /* Center the thank you message */
        }
        
        .booking-info {
    background-color: #f8f9fa; /* Light background for better contrast */
    border-radius: 8px; /* Rounded corners */
    padding: 20px; /* Padding inside the box */
    margin: 20px 0; /* Margin between sections */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

.booking-info h3 {
    color: #333; /* Darker text for headings */
    margin-bottom: 20px; /* Space below headings */
    text-align: center; /* Center the heading text */
}

.booking-info h4 {
    color: #333; /* Darker text for subheadings */
    margin-top: 20px; /* Space above subheadings */
    margin-bottom: 10px; /* Space below subheadings */
}

.table {
    width: 100%; /* Full width tables */
    margin-bottom: 1rem; /* Space below tables */
    color: #212529; /* Text color */
}

.table th,
.table td {
    padding: 1rem; /* Padding inside table cells */
    vertical-align: top; /* Align table cells to the top */
    border-top: 1px solid #dee2e6; /* Border for table cells */
}

.table thead th {
    vertical-align: bottom; /* Align table headers to the bottom */
    border-bottom: 2px solid #dee2e6; /* Border for table headers */
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6; /* Border between table body sections */
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f2f2f2; /* Alternate row color */
}


    </style>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


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
                    <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="about.php" class="dropdown-item">About Us</a>
                        <a href="feature.php" class="dropdown-item">Features</a>
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="Admin.php" class="dropdown-item">Admin</a>
                        <a href="404.php" class="dropdown-item ">404 Page</a>
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
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url('img/payment_confirm.jpg'); background-size: cover, auto; width: 100%; height: 450px; justify-content: center; padding: 0%; margin-top:10px; padding-top: 25px;">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight" style="margin-top:50px; justify-content: center;">Payment Confirmation</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0 text-white">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Pages</a></li>
                    <li class="breadcrumb-item active"><a href="confirmation.php" aria-current="page">Payment confirmation</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Confirmation Start -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                    <div class="payment-success-icon"> <svg width="120" height="120" viewBox="0 0 120 120" fill="none" stroke="#34C759" stroke-width="8"> <circle cx="60" cy="60" r="54" stroke="#34C759" stroke-width="8" /> <path d="M42 78L60 96L90 60" stroke="#34C759" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" /> </svg> </div>


                        <div class="thanku">
                            <h1 class="text-center">Thank you! For your payment</h1>
                        </div>

                        <!-- Booking Info Box -->
<div class="booking-info">
    <h3>your booking details</h3>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Full Name</th>
                <td><?php echo htmlspecialchars($bookingdetails['full_name']); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($bookingdetails['address']); ?></td>
            </tr>
            <tr>
                <th>Zipcode</th>
                <td><?php echo htmlspecialchars($bookingdetails['zipcode']); ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo htmlspecialchars($bookingdetails['city']); ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo htmlspecialchars($bookingdetails['country']); ?></td>
            </tr>
            <tr>
                <th>Card Number</th>
                <td><?php echo htmlspecialchars($bookingdetails['card_number']); ?></td>
            </tr>
            <tr>
                <th>Card Expiry</th>
                <td><?php echo htmlspecialchars($bookingdetails['card_expiry']); ?></td>
            </tr>
            <tr>
                <th>Card CVC</th>
                <td><?php echo htmlspecialchars($bookingdetails['card_cvc']); ?></td>
            </tr>
            <tr>
                <th>Cinema Name</th>
                <td><?php echo htmlspecialchars($bookingdetails['cinema_name']); ?></td>
            </tr>
            <tr>
                <th>Movie Name</th>
                <td><?php echo htmlspecialchars($bookingdetails['movie_name']); ?></td>
            </tr>
            <tr>
                <th>Showtime</th>
                <td><?php echo htmlspecialchars($bookingdetails['showtime']); ?></td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td>$<?php echo htmlspecialchars(number_format($bookingdetails['total_price'], 2)); ?></td>
            </tr>


            <tr>
                <th>Seat no</th>
                <td><?php echo htmlspecialchars($bookings['seat_no']); ?></td>
            </tr>
            <tr>
                <th>Total Tickets</th>
                <td><?php echo htmlspecialchars($bookings['total_tickets']); ?></td>
            </tr>
        </tbody>
    </table>
                        
                    </divii>
                    <a class="btn btn-primary py-3 px-5" href="index.php">Go Back To Home</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Confirmation End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>bookmyshow@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <a class="btn btn-link" href="term.php">Terms & Condition</a>
                    <a class="btn btn-link" href="#">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Business Hours</h5>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Dear Movie Enthusiasts,

                            <p>We’re thrilled to share the latest Information in our Movie System Project! If You Want to See That Please Join Us:</p>
                    </p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                      <a <button type="button" href="loginsystem/signup.php" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="index.php">BookMyShow</a>, All Right Reserved.</p>
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            <p class="mb-0">Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">BCA Student's</a></p>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
