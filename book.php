<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book Ticket - BookMyShow</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: black;
            color: black;
            background-image: url('img/showtime.jpg');
            background-size: cover;
        }
        .showtime {
            font-weight: 700;
            justify-content: center;
            margin-left: 200px;
            color: #ede0d4;
            text-decoration: underline;
        }
        .container {
            max-width: 800px;
        }
        .cinema-card {
            margin-bottom: 20px;
        }
        /* additional css */
        body {
    padding-top: 20px;
    padding-bottom: 20px;
    background-color: black;
    color: #ede0d4; /* Updated color for better contrast */
    background-image: url('img/showtime.jpg');
    background-size: cover;
    background-blur: 8px; /* Slightly blur the background for better readability */
}

.container {
    max-width: 900px;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top:100px;
}

h1 {
    color: #333; /* Darker color for headings */
    font-size: 2.5rem;
    text-align: center;
}

.alert-info {
    background-color: #e9f7ff; /* Light blue background for info alerts */
    border-color: #d1ecf1; /* Light blue border color for info alerts */
    color: #0c5460; /* Darker text color for better readability */
    border-radius: 8px;
}

.alert-info h4 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.alert-info p {
    font-size: 1.1rem;
}

.btn-primary {
    background-color: #007bff; /* Primary button color */
    border-color: #007bff; /* Border color for the button */
    padding: 10px 20px; /* Increased padding for the button */
    border-radius: 5px; /* Rounded corners for the button */
    font-size: 1rem; /* Font size for the button */
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker shade on hover */
    border-color: #004085; /* Darker border color on hover */
}

.showtime {
    font-weight: 700;
    justify-content: center;
    margin-left: 200px;
    color: #ede0d4;
    text-decoration: underline;
    font-size: 1.25rem; /* Slightly larger font size */
    text-align: center; /* Center the text */
}

    </style>
</head>
<body>


    <div class="container">
        <h1 class="mb-4">Booking Details</h1>

        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "movie";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get parameters
        $cinemaId = isset($_GET['cinema_id']) ? intval($_GET['cinema_id']) : 0;
        $showtime = isset($_GET['showtime']) ? htmlspecialchars($_GET['showtime']) : '';
        $movieId = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;

        // Fetch movie, cinema, and showtime details
        $sql = "
            SELECT m.name as movie_name, c.name as cinema_name, s.showtime, m.price
            FROM movies m
            JOIN showtimes s ON m.id = s.movie_id
            JOIN cinemas c ON s.cinema_id = c.id
            WHERE s.movie_id = ? AND s.cinema_id = ? AND s.showtime = ?
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $movieId, $cinemaId, $showtime);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Display details
            $row = $result->fetch_assoc();
            $movieName = htmlspecialchars($row['movie_name']);
            $cinemaName = htmlspecialchars($row['cinema_name']);
            $showtime = htmlspecialchars($row['showtime']);
            $price = htmlspecialchars($row['price']); // Fetch price

            echo "<div class='alert alert-info'>";
            echo "<h4>Movie Name: $movieName</h4>";
            echo "<p>Cinema: $cinemaName</p>";
            echo "<p>Showtime: $showtime</p>";
            echo "<p>Price: $price</p>"; // Display price
            echo "</div>";

            // Pass the parameters to seat.php
            echo "<a href='seat.php?movie_id=" . urlencode($movieId) . "&cinema_id=" . urlencode($cinemaId) . "&showtime=" . urlencode($showtime) . "&price=" . urlencode($price) . "'>
                <button type='button' class='btn btn-primary'>Book Now</button>
            </a>";
        } else {
            echo "<div class='alert alert-danger'>No details found for the selected movie, cinema, and showtime.</div>";
        }

        // Close connection
        $conn->close();
        ?>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
