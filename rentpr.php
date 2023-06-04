<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MotoHeadz</title>
    <style>
    body {
        padding: 0 !important;
        margin: 0 !important;
    }
    
.register-form {
  padding: 50px 20px !important; }
  .signupimg{
    height:100%;
  }
  .page-header{
    height: 240px !important;
  }
  
  /* .register-form > .form-group > input, select {
    border: 2px solid var(--primary);
    outline: var(--primary);
  } */
    
    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="reg/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="reg/css/style.css">
</head>

<body>
    <!-- Register -->
    <?php
    ob_start();
    include "__partials/_nav.php";
    $veh=$_GET['vehicle'];
    $rid=$_SESSION['userid'];
    $sqld="SELECT * FROM `product_dtl_tbl` WHERE `Product_Name`='".$veh."' AND `Registration_Id`=$rid";
    // $sqld="SELECT * FROM `product_dtl_tbl` WHERE `Product_Name`='"."Apache RTR 350."' AND `Registration_Id`=24;";
    $resultd=mysqli_query($conn,$sqld);
    // echo "Success2";
    if($resultd){
        $row=mysqli_fetch_assoc($resultd);
        // echo "Success1";
        if(mysqli_num_rows($resultd)==1){
            // echo "Success";
            $pid=$row['Product_Id'];
        }
    }
    else{
        echo "Error".mysqli_error($conn);
    }
    // echo $pid;
    // include "__partials/_search.php";
    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Add Vehicle Details</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Add Product</h6>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="main">
        <div class="container mt-3">
            <div class="signup-content" style="display: flex; justify-content: center; align-items: center;">
                <div class="signup-img">
                    <img src="img/signup.jpg" class="signupimg" height="100%" alt="">
                </div>

                <div class="signup-form" style="width:60%">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Vehicle-Details</h2>

                        <div class="form-group">
                            <label for="vprice">Vehicle-Price/Day:</label>
                            <input type="number" name="vprice" id="vprice" required />
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                            
                        </div>
                        <div class="form-group">
                            <label for="vseat">Select-Seats :</label>
                            <Select name="vseat" id="vseat">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </Select>
                        </div>
                        <div class="form-group">
                            <label for="milage">Enter Milage:</label>
                            <input type="number" name="milage" id="milage" placeholder="KMPL" required />
                        </div>
                        <div class="form-group">
                            <label for="ftype">Fuel-Type:</label>
                            <Select name="ftype" id="ftype">
                                <option value="1">Petrol</option>
                                <option value="2">Diesel</option>
                            </Select>
                            
                        </div>                     
                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <button type="submit" name="submit" class="submit" id="submit">Next &gt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
    <?php
    
    if(isset($_POST['submit'])&&((($_POST['vprice'])&&($_POST['milage']))!="")){
        $vprice=$_POST['vprice'];
        $ftype=$_POST['ftype'];
        if($ftype==1){
            $ftype="Petrol";
        }
        else{
            $ftype="Diesel";

        }
        $kmpl=$_POST['milage'];
        // $kmdr=$_POST['kmdr'];
        $seat=$_POST['vseat'];

        // $sqle="INSERT INTO `sell_av_product`(`price`, `seater`, `kmdr`, `kmpl`, `fuel`, `product_id`) VALUES ('$vprice','$seat','$kmdr','$kmpl','$ftype','$pid')";
        $sqle="INSERT INTO `rent_av_product`(`pricepd`, `kmpl`, `seater`, `fuel`, `product_id`) VALUES ('$vprice','$kmpl','$seat','$ftype','$pid')";
        $resulte=mysqli_query($conn,$sqle);
        if($resulte){
            header("Location:product_images.php?pid=$pid");
        }

    }



    include "__partials/_footer.php";
    include "__partials/_js.php";
    function postres($conn, $var)
        {
            return mysqli_real_escape_string($conn, $_POST[$var]);
        }
        ob_end_flush();
    ?>

    <!-- Register End -->
    <!-- JS -->
    <script src="reg/vendor/jquery/jquery.min.js"></script>
    <script src="reg/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>