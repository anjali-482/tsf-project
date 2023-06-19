<?php
include 'connection.php';


if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    

    if (($amount)<0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Current Balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Ohh! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }


    else {
        
                
        $newbalance = $sql1['Current Balance'] - $amount;
        $sql = "UPDATE `customers` SET `Current Balance`=$newbalance where id=$from";
        mysqli_query($conn,$sql);
             
        $newbalance = $sql2['Current Balance'] + $amount;
        $sql = "UPDATE `customers` SET `Current Balance`=$newbalance where id=$to";
        mysqli_query($conn,$sql);
                
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $sql = "INSERT INTO `transactions` (`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
            echo "<script> alert('Transaction Successful');
                window.location = 'customers.php';
                </script>";
                }

            $newbalance= 0;
             $amount =0;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    body {
        background: black;
    }

    div.transfer {
        margin: auto;
        position: relative;
        background-color: lightgreen;
        padding: 50px;
        font-family: Arial, sans-serif;
        border-radius: 20px;
        box-shadow: 0 2px 8px black;
    }


    div table {
        font-family: arial, sans-serif;
        display: table;
        margin: auto;
        background-color: rgb(250, 252, 251);
        color: whitesmoke;
        border-collapse: collapse;

    }

    table th {
        background-color: black;
        color: whitesmoke;
    }

    tr {
        color: black;
        font-weight: bold;
        height: 50px;

    }

    td,
    th {
        border: 1px solid #b8a6a6;
        text-align: left;
        padding: 30px;
        font-size: 15px;

    }

    .form {
        margin-left: 23%;
        font-size: 15px;
    }

    #receiver {
        height: 40px;
        padding: 8px 10px;
        border: 2px;
    }

    #amount {
        height: 36px;
        border: 2px;
        padding: 1px 2px;
    }

    button {
        position: relative;
        margin-left: 30%;
        border: none;
        padding: 15px;
        color: black;
        font-weight: bold;
        border-radius: 5px;
        background-color: skyblue;
        font-family: Arial, Helvetica, sans-serif;
        transition: 0.25s;
    }

    button:hover {
        color: whitesmoke;
        background-color: blue;
        transform: translate(0, -3px);
        box-shadow: 0 2px 6px black;
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


    <div class="heading" style="background:url(images/gradient02.jpg)no-repeat">
        <h1>Transfer Money</h1>
    </div>


    <!-- transfer section  -->

    <section class="sendMoney">

        <div class="transfer">

            <?php
                include 'connection.php';
                
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit"><br>
                <div>
                    <table>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Current Balance</th>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $rows['id'] ?>
                            </td>
                            <td>
                                <?php echo $rows['Name'] ?>
                            </td>
                            <td>
                                <?php echo $rows['E-mail'] ?>
                            </td>
                            <td>
                                <?php echo $rows['Current Balance'] ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <br><br><br>
                <div class="form">
                    <label for="receiver" style="font-weight:bold">Transfer To:</label>
                    <select id="receiver" name="to" required>
                        <option value="" disabled selected>Choose</option>
                        <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                        <option value="<?php echo $rows['id'];?>">

                            <?php echo $rows['Name'] ;?> (Balance:
                            <?php echo $rows['Current Balance'] ;?> )

                        </option>
                        <?php 
                } 
            ?>
                    </select>
                    <br>
                    <br>
                    <label style="font-weight:bold" for="amount">Amount in &#x20B9;
                        :</label>
                    <input id="amount" type="number" name="amount" required>
                    <br><br><br>
                    <div>
                        <button name="submit" type="submit">Transfer</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- transfer ends  -->

    <!-- footer section starts -->

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