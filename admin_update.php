<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){


   $product_name = $_POST['movie_name'];
   $product_price = $_POST['movie_description'];
   $product_price1 = $_POST['movie_price']; 
   $product_cat = $_POST['movie_cat'];
   $product_image = $_FILES['movie_image']['name'];
   $product_image_tmp_name = $_FILES['movie_image']['tmp_name'];
   $product_image_folder = 'img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_cat) || empty($product_price1)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE movies SET name='$product_name', description='$product_price', image='$product_image',category_id='$product_cat', price='$product_price1'  WHERE id = '$id'";
      $upload = mysqli_query($conn , $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_page1.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM movies WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the movie</h3>
      <input type="text" class="box" name="movie_name" value="<?php echo $row['name']; ?>" placeholder="enter the movie name">
      <input type="text" min="0" class="box" name="movie_description" value="<?php echo $row['description']; ?>" placeholder="enter the movie desription">
      <input type="file" class="box" name="movie_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="text" placeholder="Enter movie category" name="movie_cat" class="box">
      <input type="number" step="0.01" placeholder="Enter movie price" name="movie_price" class="box">
      <input type="submit" value="update product" name="update_product" class="btn">
      
      <a href="admin_page1.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>