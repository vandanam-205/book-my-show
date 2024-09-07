<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get movie ID from query parameter
$movieId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prepare and execute the query to get movie details
$query = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$query->bind_param("i", $movieId);
$query->execute();
$result = $query->get_result();

// Check if movie exists
if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
    $title = htmlspecialchars($movie['name']);
    $description = htmlspecialchars($movie['description']);
    $image = htmlspecialchars($movie['image']);
    $i = htmlspecialchars($movie['created_at']);
    // Other movie details if needed
} else {
    echo "<p>Movie not found.</p>";
    exit;
}
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

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: black; /* Light background */
            font-family: Arial, sans-serif; /* Default font family */
            background-image:url("img/<?php echo $image; ?>" );
            background-repeat:no-repeat;
            background-size:100%;
        }
        .movie-detail-container {
            background-color: rgb(43, 43, 43);
            padding: 30px;
             border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #fff; /* Light text color */
            margin-top: 50px; /* Spacing from the top */
            display: flex;
            flex-direction: row; /* Arrange items in a row */
            align-items: center; /* Center align items vertically */
            width: 100%; /* Set container width */
            max-width: 1200px; Maximum width for larger screens
            height:100px;
            margin: 0 auto; /* Center align container*/
            margin-top:50px; 
            margin-bottom:50px;
        }
        .movie-detail-container img {
            border-radius: 8px;
            max-width: 50%;
            height: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-right: 100px; /* Spacing between image and text */
            margin-left: 60px;
        }
        .movie-detail-text {
            flex: 1; /* Take remaining space */
        }
        .movie-detail-container h1 {
            font-size: 2.8rem;
            margin-top: 0; /* Remove default margin */
            margin-bottom: 20px;
            color: #fff; /* Title color */
        }
        .movie-detail-container p {
            font-size: 1.8rem;
            line-height: 1.6;
            color: #ccc; /* Lighter text color for description */
        }
        .movie-detail-container .btn {
            font-size: 1.6rem;
            padding: 12px 24px;
            margin-top: 20px;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .movie-detail-container {
                flex-direction: column; /* Stack items vertically on smaller screens */
                align-items: flex-start; /* Align items to the start */
                text-align: center; /* Center align text */
            }
            .movie-detail-container img {
                max-width: 100%; /* Full width for image on smaller screens */
                margin-right: 0; /* Remove margin on smaller screens */
                margin-bottom: 20px; /* Spacing between image and text */
            }
            .movie-detail-container h1 {
                font-size: 2.2rem;
                margin-bottom: 10px;
            }
            .movie-detail-container p {
                font-size: 1.4rem;
            }
            .movie-detail-container .btn {
                font-size: 1.4rem;
            }
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
                <a href="Stream.php" class="nav-item nav-link ">Streams</a>
                <a href="events.php" class="nav-item nav-link">Events</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="about.php" class="dropdown-item">About Us</a>
                        <a href="feature.php" class="dropdown-item">Features</a>
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="Admin.php" class="dropdown-item">Admin</a>
                        <a href="404.php" class="dropdown-item">404 Page</a>
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="loginsystem/signup.php" class="btn btn-primary px-3 d-none d-lg-block">Sign Up</a>
        </div>
    </nav>
    <!-- Navbar End -->




    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="movie-detail-container">
                <img src="img/<?php echo $image; ?>" class="img-fluid" alt="<?php echo $title; ?>">
                <div class="movie-detail-text">
                    <h1><?php echo $title; ?></h1>
                    <p><?php echo $description; ?>  </p>
                    <div style="font-size:20px;"><?php echo $i; ?></div>                     
                    <!-- <a href="showtime.php" class="btn btn-primary" data-movie-id="
                     <?php echo $movieId; ?>
                     ">Book ticket</a> -->
                     <!-- Book Ticket Button -->
                     <a href="showtime.php?movie_id=<?php echo $movieId; ?>" class="btn btn-primary">Book Ticket</a>


                </div>
            </div>
        </div>
    </div>
</div>

    <!--Premier start-->
    
    <!--Premier end-->
    
    <!-- Video Modal Start -->
     <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- Video Modal End -->
        

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