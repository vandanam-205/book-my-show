<?php
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

// Check if ID is set in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the existing showtime details
    $stmt = $conn->prepare("SELECT s.movie_id, c.name as cinema_name, s.showtime
                            FROM showtimes s
                            JOIN cinemas c ON s.cinema_id = c.id
                            WHERE s.id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $showtime = $result->fetch_assoc();
        $cinema_name = $showtime['cinema_name'];
        $showtime_value = $showtime['showtime'];
        $movie_id = $showtime['movie_id'];
    } else {
        die("Showtime not found.");
    }
    $stmt->close();

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['cinema_name']) && isset($_POST['showtime'])) {
            $cinema_name = $_POST['cinema_name'];
            $showtime_value = $_POST['showtime'];

            // Check if cinema exists or get its ID
            $stmt_check = $conn->prepare("SELECT id FROM cinemas WHERE name = ?");
            $stmt_check->bind_param("s", $cinema_name);
            $stmt_check->execute();
            $stmt_check->bind_result($cinema_id);
            if ($stmt_check->fetch()) {
                $stmt_check->close();
            } else {
                $stmt_check->close();
                $stmt_check = $conn->prepare("INSERT INTO cinemas (name) VALUES (?)");
                $stmt_check->bind_param("s", $cinema_name);
                $stmt_check->execute();
                $cinema_id = $stmt_check->insert_id;
                $stmt_check->close();
            }

            // Update showtime
            $stmt_update = $conn->prepare("UPDATE showtimes SET cinema_id = ?, showtime = ? WHERE id = ?");
            $stmt_update->bind_param("isi", $cinema_id, $showtime_value, $id);
            $stmt_update->execute();
            $stmt_update->close();

            echo "Showtime updated successfully.";
            header('location:admin_showtime1.php');
        } else {
            echo "Required form data is missing.";
        }
    }
} else {
    die("");
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Showtime</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Showtime</h1>
        <form action="p1.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
            <div class="form-group">
                <label for="cinema_name">Cinema Name</label>
                <input type="text" class="form-control" id="cinema_name" name="cinema_name" value="<?php echo htmlspecialchars($cinema_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="showtime">Showtime</label>
                <input type="text" class="form-control" id="showtime" name="showtime" value="<?php echo htmlspecialchars($showtime_value); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Showtime</button>
        </form>
        <a href="admin_showtime.php" class="btn btn-secondary mt-3">Back to Showtimes</a>
    </div>
</body>
</html>
---------------------------


