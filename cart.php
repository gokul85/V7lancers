<?php

session_start();

if(!isset($_SESSION["user_id"]))
{
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php

$connect = mysqli_connect("localhost","root","","task1");

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./cart.css">
    <title>index</title>
</head>

<body>
<div class="header">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
            <div class="input-group m-4">
          <input type="text" class="form-control" placeholder="Search product" >
          <button class="btn search" >S</button>
        </div>
            </div>
            <div class="col-4 header-icons">
                <i class="fa-solid fa-bell" id="bell-icon"></i>
                <a class="cart-link" href="./cart.php"><i class="fa-solid fa-cart-shopping" id="cart-icon"></i></a>
                <i class="fa-solid fa-heart" id="heart-icon"></i>
                <a class="user-link" href="./logout.php"><i class="fa-solid fa-user" id="user-icon"></i><?php echo $_SESSION["user_name"] ?></a>
            </div>
        </div>
    </div>
    <div class="header2">
        <div class="row">
            <div class="col-3">
            <a class="home-link" href="./index.php"><i class="fa-solid fa-house" id="home-icon"></i></a>
            </div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3 header-bar">
                <i class="fa-solid fa-bars" id="bar-icon"></i>
            </div>
        </div>
    </div>
    <div class="main">
    <div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Shopping Cart</h3>
   	   	<h5 class="Action">Remove all</h5>
   	   </div>

   	   <!-- <div class="Cart-Items">
   	   	  <div class="image-box">
   	   	  	<img src="images/apple.png" style={{ height="120px" }} />
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title">Apple Juice</h1>
   	   	  	<h3 class="subtitle">250ml</h3>
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count">2</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount">$2.99</div>
   	   	  	<div class="save"><u>Save for later</u></div>
   	   	  	<div class="remove"><u>Remove</u></div>
   	   	  </div>
   	   </div> -->
          <?php
    $total_amount = 0;
    $query = "SELECT * FROM cart WHERE cart_user_id='".$_SESSION["user_id"]."'";
    $statement=mysqli_query($connect,$query);
    $total_row = mysqli_num_rows($statement);
    ?>
    <?php
            while($row = mysqli_fetch_assoc($statement)){
                $query2 = "SELECT * FROM products WHERE product_id=".$row["product_id"]."";
                $statement2=mysqli_query($connect,$query2);
                $row2 = mysqli_fetch_assoc($statement2);
            ?>
   	   <div class="Cart-Items pad">
   	   	  <div class="image-box">
   	   	  	<img src="products/<?php echo $row2["product_image"]; ?>.jpeg" style={{ height="120px" }} />
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title"><?php echo $row2["product_name"]; ?></h1>
   	   	  	<!-- <h3 class="subtitle">250ml</h3> -->
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count"><?php echo $row["qnty"]; ?></div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount"><?php $total_amount+=$row2["product_prize"]; echo $row2["product_prize"]; ?></div>
   	   	  	<div class="save"><u>Save for later</u></div>
   	   	  	<div class="remove" id="<?php echo $row["product_id"] ?>"><u>Remove</u></div>
   	   	  </div>
   	   </div>
          <?php } ?>
   	 <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Sub-Total</div>
   	 		<div class="items"><?php echo $total_row; ?> items</div>
   	 	</div>
   	 	<div class="total-amount"><?php echo $total_amount; ?></div>
   	 </div>
   	 <button class="button">Checkout</button></div>
   </div>
    </div>
    <footer>
        <div class="container">
                    <div class="footer-links">
                        <div class="social-links">
                            <a href="https://www.linkedin.com/company/v7-lancers/" class="linkedin">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                            </a>
                            <a href="https://www.instagram.com/v7_lancers/" class="instagram">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                            </a>
                            <a href="https://www.facebook.com/v7lancersOfficial" class="facebook">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                            </a>
                            <a href="https://twitter.com/VLancers" class="twitter">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="icon" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                            </a>
                        </div>
                        <hr />
                    </div>
                </div>
            </footer>
    <script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>

</script>

</html>