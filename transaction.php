<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    table {
        letter-spacing: 1.2px;
    }


    html {
        position: relative;
        min-height: 100%;
    }

    body {

        font-size: 23px;

    }

    .table-responsive-sm {
        margin-left: 25%;
    }

    td,
    th {
        border: 1px solid;
        padding: 10px;
    }

    .tab {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    tr:nth-child(even) {
        background-color: #FFFFCC;
    }

    tr:nth-child(odd) {
        background-color: #FFC0CB;
    }

    .text-center {
        background-color: #87CEEB;
    }
    </style>


</head>

<body>

    <!-- header section starts  -->

    <section class="header">

        <a href="index.php" class="logo">.the Sparks Bank </a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="customers.php">View Customers</a>
            <a href="transaction.php">Transaction History</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>

    </section>

    <!-- header section ends  -->


    <div class="heading"
        style="background-image: linear-gradient(to left bottom, #00d4fb, #4aceff, #85c5ff, #b9baff, #e5adff);">
        <h1>Transaction history</h1>
    </div>



    <!-- history section starts here -->
    <section class="thistory">
        <div class="table-responsive-sm">
            <table class="tab">
                <thead>
                    <tr>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

            include 'connection.php';

            $sql ="select * from transactions";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

                    <tr>

                        <td class="py-2"><?php echo $rows['Sender']; ?></td>
                        <td class="py-2"><?php echo $rows['Receiver']; ?></td>
                        <td class="py-2"><?php echo $rows['Amount']; ?> </td>
                        <td class="py-2"><?php echo $rows['Date and Time']; ?> </td>

                        <?php
            }

        ?>
                </tbody>
            </table>

        </div>

    </section>

    <!-- history section ends here -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="index.php"> <i class="fas fa-angle-right"></i>Home</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i>About</a>
                <a href="customers.php"> <i class="fas fa-angle-right"></i>View Customers</a>
                <a href="transaction.php"> <i class="fas fa-angle-right"></i>Transaction History</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i>ask questions</a>
                <a href="#"> <i class="fas fa-angle-right"></i>about us</a>
                <a href="#"> <i class="fas fa-angle-right"></i>privacy policy</a>
                <a href="#"> <i class="fas fa-angle-right"></i>terms of use</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> tsparksbank@gmail.com </a>
                <a href="#"> <i class="fas fa-map"></i> mumbai, india- 400104 </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"><i class="fab fa-twitter"></i> twitter </a>
                <a href="#"><i class="fab fa-instagram"></i> instagram </a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin </a>
            </div>

        </div>


        <div class="credit">copyright &copy; 2023 by <span>Anjali</span> | all rights reserved! </div>

    </section>

    <!-- footer section ends  -->

    <!-- swiper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <!-- custom js file link -->
    <script src="js/script.js"></script>

</body>

</html>