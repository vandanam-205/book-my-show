<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Showtimes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .showtime-entry {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <a href="admin.php" class="btn btn-danger" style="width:100px; margin-left:90%; margin-top:20px; font-size:20px; color:black; ">Logout</a>
    <div class="container mt-5">
        <h1 class="mb-4">Add Showtime</h1>
        <form action="admin_showtime1.php" method="post">
            <div class="form-group">
                <label for="movie_id">Select Movie:</label>
                <select id="movie_id" name="movie_id" class="form-control" required>
                    <!-- Options will be populated by PHP -->
                    <?php
                    // Connect to the database
                    $conn = new mysqli("localhost", "root", "", "movie");

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch movies from the database
                    $result = $conn->query("SELECT id, name FROM movies");
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                    }

                    $conn->close();
                    ?>
                </select>
            </div>

            <h3>Cinemas and Showtimes:</h3>
            <div id="showtimes-container">
                <div class="form-group showtime-entry">
                    <label for="cinema_name">Cinema Name:</label>
                    <input type="text" name="cinema_name[]" class="form-control" required>
                </div>
                <div class="form-group showtime-entry">
                    <label for="showtime">Showtime:</label>
                    <input type="datetime-local" name="showtime[]" class="form-control" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary" onclick="addEntry()">Add Another Showtime</button><br><br>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function addEntry() {
            const container = document.getElementById('showtimes-container');
            const entry = document.createElement('div');
            entry.classList.add('form-group', 'showtime-entry');
            entry.innerHTML = `
                <label for="cinema_name">Cinema Name:</label>
                <input type="text" name="cinema_name[]" class="form-control" required>
                <label for="showtime">Showtime:</label>
                <input type="datetime-local" name="showtime[]" class="form-control" required>
                <button type="button" class="btn btn-danger mt-2" onclick="removeEntry(this)">Remove</button>
            `;
            container.appendChild(entry);
        }

        function removeEntry(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
