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

    // Prepare and execute deletion
    $stmt = $conn->prepare("DELETE FROM showtimes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Showtime deleted successfully.";
        header('location:admin_showtime1.php');
    } else {
        echo "Failed to delete showtime.";
    }
    $stmt->close();
} else {
    echo "";
}

$conn->close();
?><?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "movie"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if required POST variables are set
    if (isset($_POST['movie_id']) && isset($_POST['cinema_name']) && isset($_POST['showtime'])) {
        // Get selected movie ID
        $movie_id = $_POST['movie_id'];
        

        // Prepare statement for inserting showtimes
        $stmt = $conn->prepare("INSERT INTO showtimes (movie_id, cinema_id, showtime) VALUES (?, ?, ?)");

        // Get cinema names and showtimes
        $cinema_names = $_POST['cinema_name'];
        $showtimes = $_POST['showtime'];

        if (is_array($cinema_names) && is_array($showtimes)) {
            // Fetch existing cinema IDs or insert new cinemas
            foreach ($cinema_names as $index => $cinema_name) {
                // Check if cinema exists
                $stmt_check = $conn->prepare("SELECT id FROM cinemas WHERE name = ?");
                $stmt_check->bind_param("s", $cinema_name);
                $stmt_check->execute();
                $stmt_check->bind_result($cinema_id);
                if ($stmt_check->fetch()) {
                    // Cinema exists
                    $stmt_check->close();
                } else {
                    // Insert new cinema
                    $stmt_check->close();
                    $stmt_check = $conn->prepare("INSERT INTO cinemas (name) VALUES (?)");
                    $stmt_check->bind_param("s", $cinema_name);
                    $stmt_check->execute();
                    $cinema_id = $stmt_check->insert_id;
                    $stmt_check->close();
                }
                
                // Insert showtime
                $stmt->bind_param("iis", $movie_id, $cinema_id, $showtimes[$index]);
                $stmt->execute();
            }

            $stmt->close();
            echo "Showtimes added successfully.";
        } else {
            echo "Invalid cinema names or showtimes.";
        }
    } else {
        echo "Required form data is missing.";
    }
} else {
    echo "Invalid request method.";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="admin_showtime.php"><button style="background-color:red; border-radius:3px; width:80px; margin-left:90%; color:white; height:40px;">go back!</button></a>
</body>
</html>

<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "movie"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the SQL query with JOINs
$sql = "SELECT s.id, m.name AS movie_name, c.name AS cinema_name, s.showtime
        FROM showtimes s
        JOIN movies m ON s.movie_id = m.id
        JOIN cinemas c ON s.cinema_id = c.id";

// Execute the query
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showtimes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
        .btn-action {
            margin-right: 5px;
        }
        .btn-edit {
            background-color: #ffc107;
            border: none;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
        }
        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
  
        <h1 class="mt-4">All Showtimes</h1>
        
        <div class="table-container">
            <?php if ($result->num_rows > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Movie Name</th>
                            <th>Cinema Name</th>
                            <th>Showtime</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['movie_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['cinema_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['showtime']); ?></td>
                                <td>
                                    <a href="admin_updateshowtime.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-edit btn-action">Edit</a>
                                    <a href="admin_showtime1.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-delete btn-action">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No showtimes available.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
