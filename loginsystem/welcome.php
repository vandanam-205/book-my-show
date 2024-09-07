<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <a href="logout.php">Log Out</a>
<?php
    session_start();
    session_unset();
    session_destroy();
    exit;
?>
</body>
</html>

