<?php
include "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
    html {
        position: relative;
        min-height: 100%;
    }

    body {

        font-size: 23px;

    }

    .viewcustomers {
        padding-top: 10px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }

    td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #Table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        margin-bottom: 15px;
    }

    #Table tr:nth-child(even) {
        background-color: #FFFFCC;
    }

    #Table tr:nth-child(odd) {
        background-color: #FFC0CB;
    }

    #Table tr:hover {
        background-color: #b5d0eb;
    }

    #Table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #87CEEB;
        color: white;
    }

    table a button {
        border: none;
        font-weight: bold;
        border-radius: 5px;
        font-size: 15px;
        padding: 10px;
        color: black;
        background-color: lightgreen;
        transition: 0.25s;
    }

    table a button:hover {
        color: whitesmoke;
        background-color: rgb(0, 175, 0);
        transform: translate(0, -2px);
        box-shadow: 0 1px 2px black;
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
        <h1>Current Balance</h1>
    </div>

    <!-- table starts here   -->
    <section class="viewcustomers">
        <table id="Table">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <?php
                //$sql = "SELECT * FROM customerinfo" ;
                $sql = "SELECT * FROM customers" ;
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) { 
               
                  echo "<tr>";
                  echo "<td>"; echo $row["id"]; echo "</td>";
                  echo "<td>"; echo $row["Name"]; echo "</td>";
                  echo "<td>"; echo $row["E-mail"]; echo "</td>";
                  echo "<td>"; echo $row["Current Balance"]; echo "</td>";
                  echo "</tr>";
                }
                $conn->close();
                ?>
        </table>
    </section>
    <!-- table ends here -->


    <!-- footer section starts here  -->
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