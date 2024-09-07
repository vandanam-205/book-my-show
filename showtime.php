<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Select Showtime - BookMyShow</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
            background:
            linear-gradient(red, transparent),
            linear-gradient(to top left, lime, transparent),
            linear-gradient(to top right, blue, transparent);
            background-blend-mode: screen;
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
        .price-box {
    display: inline-flex;
    align-items: center;
    background-color: red; /* Box color */
    color: white; /* Text color */
    padding: 3px 8px; /* Padding inside the box */
    border-radius: 4px; /* Rounded corners */
    font-weight: bold;
    margin-left: 10px; /* Space between showtime and price box */
    font-size: 0.8rem; /* Slightly smaller font size */
    text-align: center; /* Center text inside the box */
    height: auto; /* Adjust height based on padding and font size */
}

.price-label {
    margin-right: 5px; /* Space between label and value */
    font-size: 0.8rem; /* Slightly smaller font size */
}

        .form-check-label {
            display: flex;
            align-items: center; /* Align items in the center */
            margin-bottom: 10px; /* Space between showtime options */
        }
        .form-check-input {
            margin-right: 10px; /* Space between radio button and label */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Select Showtime</h1>
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

        // Get movie ID from query parameter
        $movieId = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;

        // Fetch cinemas and showtimes for the movie
        $sql = "
            SELECT c.id as cinema_id, c.name as cinema_name, s.showtime, m.price
            FROM cinemas c
            JOIN showtimes s ON c.id = s.cinema_id
            JOIN movies m ON s.movie_id = m.id
            WHERE s.movie_id = ?
            ORDER BY c.name, s.showtime
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $movieId);
        $stmt->execute();
        $result = $stmt->get_result();

        $cinemas = [];

        if ($result->num_rows > 0) {
            // Organize showtimes by cinema
            while ($row = $result->fetch_assoc()) {
                $cinemaId = $row['cinema_id'];
                $cinemaName = htmlspecialchars($row['cinema_name']);
                $showtime = htmlspecialchars($row['showtime']);
                $price = htmlspecialchars($row['price']);

                if (!isset($cinemas[$cinemaId])) {
                    $cinemas[$cinemaId] = [
                        'name' => $cinemaName,
                        'showtimes' => []
                    ];
                }

                $cinemas[$cinemaId]['showtimes'][] = [
                    'showtime' => $showtime,
                    'price' => $price
                ];
            }

            // Display cinemas and showtimes
            foreach ($cinemas as $cinemaId => $cinema) {
                $cinemaName = $cinema['name'];
                $showtimes = $cinema['showtimes'];

                echo "
                    <div class='card cinema-card'>
                        <div class='card-header'>
                            Cinema: $cinemaName
                        </div>
                        <div class='card-body'>
                            <form action='book.php' method='GET'>
                                <input type='hidden' name='cinema_id' value='$cinemaId'>
                                <input type='hidden' name='movie_id' value='$movieId'>
                                <div class='form-group'>
                                    <label>Select Showtime:</label>
                                    <div class='form-check'>
                ";

                foreach ($showtimes as $index => $showtimeData) {
                    $showtime = $showtimeData['showtime'];
                    $price = $showtimeData['price'];
                    echo "
                        <input class='form-check-input' type='radio' name='showtime' id='showtime$cinemaId$index' value='$showtime' required>
                        <label class='form-check-label' for='showtime$cinemaId$index'>
                            $showtime
                            <span class='price-box'>
                                <span class='price-label'>Price:</span> $$price
                            </span>
                        </label>
                        <br>
                    ";
                }

                echo "
                                    </div>
                                </div>
                                 <button type='submit' class='btn btn-primary'>Book Now</button>


                            </form>
                        </div>
                    </div>
                ";
            }
        } else {
            echo "<p>No showtimes available for this movie.</p>";
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
