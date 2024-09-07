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

// SQL query
$sql = "SELECT * FROM bookingdetails";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each row
    echo "<h1>Booking Details</h1>";
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Zipcode</th>
            <th>City</th>
            <th>Country</th>
            <th>Card Number</th>
            <th>Card Expiry</th>
            <th>Card CVC</th>
            <th>Cinema Name</th>
            <th>Movie Name</th>
            <th>Showtime</th>
            <th>Total Price</th>
            <th>Created At</th>
       
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["full_name"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["zipcode"] . "</td>
                <td>" . $row["city"] . "</td>
                <td>" . $row["country"] . "</td>
                <td>" . $row["card_number"] . "</td>
                <td>" . $row["card_expiry"] . "</td>
                <td>" . $row["card_cvc"] . "</td>
                <td>" . $row["cinema_name"] . "</td>
                <td>" . $row["movie_name"] . "</td>
                <td>" . $row["showtime"] . "</td>
                <td>" . $row["total_price"] . "</td>
                <td>" . $row["created_at"] . "</td>
     
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
    </body>
