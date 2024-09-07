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
                <a href="Stream.php" class="nav-item nav-link active">Streams</a>
                <a href="events.php" class="nav-item nav-link">Events</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="about.php" class="dropdown-item">About Us</a>
                        <a href="feature.php" class="dropdown-item">Features</a>
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="Admin.php" class="dropdown-item">Admin</a>
                        <a href="404.php" class="dropdown-item">404 Page</a>
                        <a href="index.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="login.php" class="btn btn-primary px-3 d-none d-lg-block">login </a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <!-- <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-image: url('img/stream.jpg'); background-size: cover, auto; width: 100%; height: 450px; justify-content: center; padding: 0%; margin-top:10px; padding-top: 25px;">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight" style="margin-top:50px; justify-content: center;">Streams</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Streams</li>
                </ol>
            </nav>
        </div>
    </div>
    Page Header End -->


    
    <!--Streams Start-->
    
    <div class="container-fluid px-0 mb-5" style="border-radius: 50px;  padding: 10px 10px 10px 10px;">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <!--carousal-1-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/kalki1.jpg" style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">Kalki
                                        2898 AD
                                    </h3>
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>

                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                            3h 1m • Action , Sci-Fi , Thriller • UA • 27 Jun, 2024</p>
                                            <br>
                                            When the world is taken over by darkness. A force will rise.
                                    </h6>

                                    <!-- <a href="" style="margin-top: 7px;" class="btn btn-primary py-3 px-5 animated slideInRight">Book Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--carousal-2-->
                <div class="carousel-item">
                    <img class="w-100" src="img/zamkudi.jpg"
                    style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">
                                        Zamkudi </h3>
                                    
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>
                                    
                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                           2h 32m • Comedy , Horror , Mystery • UA • 31 May, 2024</p>
                                            <br>

                                            While Gujarat is celebrating Navratri, the village of Raniwada is forbidden to play Garba due to the curse of an evil witch named Jhamkudi.<br> But when the rules are broken, the haunting begins. Will Bablo and Kumud be able to solve the mystery and save Raniwada from the curse of Jhamkudi?

                                    </h6>
                                     <!-- <a href="" style="margin-top: 7px;" class="btn btn-primary py-3 px-5 animated slideInRight">Book Now</a> -->
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            <!--carousal-3-->
                <div class="carousel-item">
                    <img class="w-100" src="img/dragon_str.jpg"
                    style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">
                                        Dragon : The Bruce Lee Story </h3>
                                    
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>
                                    
                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                           2h • Drama • A • 7 May, 1993</p>
                                            <br>

                                            Based on true events, Dragon: The Bruce Lee Story is the incredible journey of the life, love and <br> unconquerable spirit of the martial arts legend.

                                    </h6>
                                    <!-- <a href="" style="margin-top: 7px;" class="btn btn-primary py-3 px-5 animated slideInRight">Book Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--carousal-4-->
                <div class="carousel-item">
                    <img class="w-100" src="img/garfield_str.jpg"
                    style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">
                                        The Garfield Movie </h3>
                                    
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>
                                    
                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                            1h 41m  •  Adventure , Animation , Comedy•U•17 May, 2024</p>
                                            <br>

                                            Garfield is about to go on a wild outdoor adventure. After an unexpected reunion with his long-lost father - the cat <br> Vic - Garfield and Odie are forced to abandon their pampered life to join Vic in a hilarious, high-stakes heist.
                                    </h6>
                                    <!-- <a href="" style="margin-top: 7px;" class="btn btn-primary py-3 px-5 animated slideInRight">Book Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--carousal-5-->
                <div class="carousel-item">
                    <img class="w-100" src="img/dune_str.jpg"
                    style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">
                                        Dune : Part Two </h3>
                                    
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>
                                    
                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                           2h 46m • Action , Adventure , Drama , Sci-Fi • UA • 1 Mar, 2024</p>
                                            <br>

                                            Dune: Part Two will explore the mythic journey of Paul Atreides as he unites with Chani and the Fremen while on a warpath of revenge <br>against the conspirators who destroyed his family. Facing a choice between the love and the fate of the known universe, he endeavors to prevent a terrible future only he can foresee.

                                    </h6>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--carousal-6-->
                <div class="carousel-item">
                    <img class="w-100" src="img/if_str.jpg"
                    style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">
                                        If (2024)</h3>
                                    
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>
                                    
                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                           1h 44m • Comedy , Drama , Family , Fantasy • U • 17 May, 2024</p>
                                            <br>

                                            IF is about a girl who discovers that she can see everyone`s imaginary friends - and what she does with that <br>superpower - as she embarks on a magical adventure to reconnect forgotten IFs with their kids.
                                    </h6>
                                    <!-- <a href="" style="margin-top: 7px;" class="btn btn-primary py-3 px-5 animated slideInRight">Book Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--carousal-7-->
                <div class="carousel-item">
                    <img class="w-100" src="img/furiso_str.jpg"
                    style="background-size: cover; width: 850px; height: 500px;" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 text-start">
                                    <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">Premier</p>
                                    <h3 class="display-1 text-white mb-5 animated slideInRight" style="font-size: 50px;">
                                        Furiosa : A Mad Max Saga </h3>
                                    
                                    <h5 class="animated slideInRight" style="font-size: 15px; color: #f5f5f5; text-decoration: underline; margin-bottom: 25px;">2D,IMAX 2D,3D,IMAX3D</h5>
                                    
                                    <h6 class="animated slideInRight" style="color : #f5f5f5;">
                                           <p style="font-size: 15px; font-weight: 900;">
                                           2h 28m • Action , Sci-Fi , Thriller • A • 23 May, 2024</p>
                                            <br>

                                            As the world fell, young Furiosa is snatched from the Green Place of Many Mothers and falls into the hands <br> of a great Biker Horde led by the Warlord Dementus. Sweeping through the Wasteland, they come across <br> the Citadel presided over by The Immortan Joe.

                                    </h6>
                                    <!-- <a href="" style="margin-top: 7px;" class="btn btn-primary py-3 px-5 animated slideInRight">Book Now</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    

    <!--Streams End-->


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
function displayMovies($categoryName, $conn) {
    // Prepare and execute the query to get category ID
    $categoryQuery = $conn->prepare("SELECT id FROM category WHERE name = ?");
    $categoryQuery->bind_param("s", $categoryName);
    $categoryQuery->execute();
    $categoryResult = $categoryQuery->get_result();
    
    // Check if category exists
    if ($categoryResult->num_rows > 0) {
        $category = $categoryResult->fetch_assoc();
        $categoryId = $category['id'];
        
        // Prepare and execute the query to get movies for the category
        $query = $conn->prepare("SELECT * FROM movies WHERE category_id = ?");
        $query->bind_param("i", $categoryId);
        $query->execute();
        $result = $query->get_result();
        
        // Check if movies exist
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = htmlspecialchars($row['name']);
                $description = htmlspecialchars($row['description']);
                $image = htmlspecialchars($row['image']);
                $movieId = $row['id']; // Assuming your movie table has an 'id' field
                
                $link = "movie1.php?id={$movieId}"; // Link to movie detail page

                echo "<a class='project-item' href='{$link}'>
                        <img class='img-fluid' src='img/{$image}' alt=''>
                        <div class='project-title'>
                            <h5 class='text-primary mb-0'>{$title}</h5>
                        </div>
                    </a>";
            }
        } else {
            echo "<p>No movies found for this category.</p>";
        }
    } else {
        echo "<p>Category not found.</p>";
    }
}
?>
<html><body>
<div class="container-fluid bg-dark pt-5 my-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2" style="font-size: 40px; font-weight: 900; color: #a4161a;">Recommaded Movies</p>
        <h1 class="display-5 text-white mb-5"></h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        <?php displayMovies('movie', $conn); ?>
    </div>
</div>
    <!-- Premiere Start -->
    <div class="container-fluid bg-dark pt-5 my-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2" style="font-size: 40px; font-weight: 900; color: #a4161a; ">Premier Of The Week</p>
        <h1 class="display-5 text-white mb-5"></h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        <?php displayMovies('premiere', $conn); ?>
    </div>
</div>
    <!-- Premiere End -->
</body></html>



 

    
    
    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
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
                        <a <button type="button" href="register.php" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">login</button></a>
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