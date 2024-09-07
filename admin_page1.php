<?php

@include 'config.php';
if(isset($_POST['add_movie'])){
    $product_name = $_POST['movie_name'];
    $product_price = $_POST['movie_price']; // Changed from movie_description to movie_price
    $product_desc = $_POST['movie_description'];
    $product_cat = $_POST['movie_cat'];
    $product_image = $_FILES['movie_image']['name'];
    $product_image_tmp_name = $_FILES['movie_image']['tmp_name'];
    $product_image_folder = 'img/'.$product_image;

    if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_cat)){
        $message[] = 'Please fill out all fields';
    } else {
        $insert = "INSERT INTO movies(image,name,price,description,category_id) VALUES('$product_image', '$product_name', '$product_price', '$product_desc', $product_cat)";
        $upload = mysqli_query($conn, $insert);
        if($upload){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New movie added successfully';
        } else {
            $message[] = 'Could not add the movie: ' . mysqli_error($conn);
        }
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM movies WHERE id = $id");
    header('Location: admin_page1.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css1/style.css">
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }
}
?>
<a href="logout.php" class="btn btn-danger" style="width:100px; margin-left:90%; ">Logout</a>
<div class="container">
    <div class="admin-product-form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add a New movie</h3>
            <input type="text" placeholder="Enter movie name" name="movie_name" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="movie_image" class="box">
            <input type="text" placeholder="Enter movie description" name="movie_description" class="box">
            <input type="text" placeholder="Enter movie category" name="movie_cat" class="box">
            <input type="number" step="0.01" placeholder="Enter movie price" name="movie_price" class="box">
            <input type="submit" class="btn" name="add_movie" value="Add movie">
        </form>
    </div>

    <?php
    $select = mysqli_query($conn, "SELECT * FROM movies");
    ?>
    <div class="product-display">
        <table class="product-display-table">
            <thead>
            <tr>
                <th>Movie Image</th>
                <th>Movie Name</th>
                <th>Description</th>
                <th>Price</th> <!-- Added Price Column -->
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <tr>
                <td><img src="img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['category_id']; ?></td>
                
                <td>
                    <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                    <a href="admin_page1.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
