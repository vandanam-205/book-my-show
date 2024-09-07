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

// Retrieve parameters and validate them
$cinemaId = isset($_GET['cinema_id']) ? intval($_GET['cinema_id']) : 0;
$movieId = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
$showtime = isset($_GET['showtime']) ? htmlspecialchars($_GET['showtime']) : '';
$price = isset($_GET['price']) ? floatval($_GET['price']) : 0.0;

// Prepare and execute SQL query
$sql = "
    SELECT m.name as movie_name, c.name as cinema_name, s.showtime
    FROM movies m
    JOIN showtimes s ON m.id = s.movie_id
    JOIN cinemas c ON s.cinema_id = c.id
    WHERE s.movie_id = ? AND s.cinema_id = ? AND s.showtime = ?
";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("iis", $movieId, $cinemaId, $showtime);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch details
    $row = $result->fetch_assoc();
    $movieName = htmlspecialchars($row['movie_name']);
    $cinemaName = htmlspecialchars($row['cinema_name']);
    $showtime = htmlspecialchars($row['showtime']);
} else {
    $movieName = $cinemaName = $showtime = $price = null;
    $message = "No details found for the selected movie, cinema, and showtime.";
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedSeats = isset($_POST['seats']) ? array_filter($_POST['seats']) : [];
    $ticketCount = count($selectedSeats);
    $totalPrice = $ticketCount * $price;

    if (!empty($selectedSeats)) {
        $seatsList = implode(',', $selectedSeats); // Convert array to comma-separated string

        // Insert booking
        $stmt = $conn->prepare("
            INSERT INTO bookings (cinema_name, movie_name, showtime, seat_no, total_tickets, total_price) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssis", $cinemaName, $movieName, $showtime, $seatsList, $ticketCount, $totalPrice);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }
        $stmt->close();

        $message = "Seats successfully booked!";
        header("Location: payment.php?cinema_id=$cinemaName&movie_id=$movieName&showtime=$showtime&total_price=$totalPrice");
        exit();

    } else {
        $message = "No seats selected.";
    }
}

// Close connection
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket Booking</title>
    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            background: #d00000;
        }
        .center {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(
                to right,
                rgb(162, 216, 162),
                rgb(102, 194, 102)
            );
        }
        .tickets {
            width: 550px;
            height: fit-content;
            border: 0.4mm solid rgba(0, 0, 0, 0.08);
            border-radius: 3mm;
            box-sizing: border-box;
            padding: 10px;
            font-family: Poppins, sans-serif;
            max-height: 96vh;
            overflow: auto;
            background: white;
            box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .ticket-selector {
            background: rgb(243, 243, 243);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            box-sizing: border-box;
            padding: 20px;
        }
        .head {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }
        .title {
            font-size: 16px;
            font-weight: 600;
        }
        .seats {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            min-height: 150px;
            position: relative;
        }
        .status {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .seats::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 0);
            width: 220px;
            height: 7px;
            background: rgb(141, 198, 255);
            border-radius: 0 0 3mm 3mm;
            border-top: 0.3mm solid rgb(180, 180, 180);
        }
        .item {
            font-size: 12px;
            position: relative;
        }
        .item::before {
            content: "";
            position: absolute;
            top: 50%;
            left: -12px;
            transform: translate(0, -50%);
            width: 10px;
            height: 10px;
            background: rgb(255, 255, 255);
            outline: 0.2mm solid rgb(120, 120, 120);
            border-radius: 0.3mm;
        }
        .item:nth-child(2)::before {
            background: rgb(180, 180, 180);
            outline: none;
        }
        .item:nth-child(3)::before {
            background: #d00000;
            outline: none;
        }
        .all-seats {
            display: grid;
            grid-template-columns: repeat(13, 1fr);
            grid-gap: 15px;
            margin: 60px 0;
            margin-top: 20px;
            position: relative;
        }
        .seat {
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 0.5mm;
            outline: 0.3mm solid rgb(180, 180, 180);
            cursor: pointer;
        }
        .all-seats input:checked + label {
            background: #d00000;
            outline: none;
        }
        .seat.booked {
            background: #d0d0d0;
            outline: none;
        }
        input {
            display: none;
        }
        .timings {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }
        .dates {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dates-item {
            width: 50px;
            height: 40px;
            background: rgb(233, 233, 233);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px 0;
            border-radius: 2mm;
            cursor: pointer;
        }
        .day {
            font-size: 12px;
        }
        .times {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }
        .time {
            font-size: 14px;
            width: fit-content;
            padding: 7px 14px;
            background: rgb(233, 233, 233);
            border-radius: 2mm;
            cursor: pointer;
        }
        .timings input:checked + label {
            background: #d00000;
            color: white;
        }
        .price {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .total {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            font-size: 16px;
            font-weight: 500;
        }
        .total span {
            font-size: 11px;
            font-weight: 400;
        }
        .price button {
            background: #d00000;
            color: white;
            font-family: Poppins, sans-serif;
            font-size: 14px;
            padding: 7px 14px;
            border-radius: 2mm;
            outline: none;
            border: none;
            cursor: pointer;
        }
    </style>

</head>
<body>
    <div class="center">
        <div class="tickets">
            <form id="booking-form" method="post">
                <div class="ticket-selector">
                    <div class="head">
                        <div class="title">
                            <h1>Book Tickets</h1>
                            <?php if (isset($movieName) && isset($cinemaName)): ?>
                                <h2>Movie Name: <?php echo $movieName; ?></h2>
                                <h3>Cinema: <?php echo $cinemaName; ?></h3>
                                <h4>Showtime: <?php echo $showtime; ?></h4>
                                <h4>Price per Ticket: $<?php echo $price; ?></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="seats">
                        <div class="status">
                            <div class="item">Available</div>
                            <div class="item">Booked</div>
                            <div class="item">Selected</div>
                        </div>
                        <div class="all-seats">
                            <?php
                            // Generate seat checkboxes
                            for ($i = 0; $i < 199; $i++) {
                                $randint = rand(0, 1);
                                $booked = $randint == 1 ? "booked" : "";
                                echo '<input type="checkbox" name="seats[]" id="s' . $i . '" value="' . $i . '" />';
                                echo '<label for="s' . $i . '" class="seat ' . $booked . '"></label>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="price">
                        <div class="total">
                            <span><span class="count">0</span> Tickets</span>
                            <div class="amount">0</div>
                        </div>
                        <button type="submit" id="submit-button">Proceed to Payment</button>
                    </div>
                    <?php if (isset($message)): ?>
                        <div class="alert"><?php echo htmlspecialchars($message); ?></div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <script>
    // JavaScript for updating total price and ticket count
    const pricePerTicket = <?php echo json_encode($price); ?>;
    const seats = document.querySelectorAll('.seat');
    const countElement = document.querySelector('.count');
    const amountElement = document.querySelector('.amount');
    const form = document.getElementById('booking-form');
    let ticketCount = 0;

    seats.forEach(seat => {
        seat.addEventListener('click', () => {
            if (seat.classList.contains('booked')) return;

            // Toggle seat selection
            seat.classList.toggle('selected');
            
            // Get all selected seats
            const selectedSeats = document.querySelectorAll('.seat.selected');
            ticketCount = selectedSeats.length;

            // Update ticket count and amount
            countElement.textContent = ticketCount;
            amountElement.textContent = (ticketCount * pricePerTicket).toFixed(2);

            // Update form inputs to include selected seats
            const formSeats = form.querySelectorAll('input[type="checkbox"]');
            formSeats.forEach(input => {
                input.checked = selectedSeats.some(seat => seat.id === input.id);
            });
        });
    });
    </script>
</body>
</html>