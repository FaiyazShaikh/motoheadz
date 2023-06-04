<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Form - MotoHeadz</title>
    <style>
    body {
        padding: 0 !important;
        margin: 0 !important;
    }
    
.register-form {
  padding: 30px 15px !important; }
  .signupimg{
    height: 200px;;
  }
  .signup-content{
    /* margin-top:10px !important; */
    width:100% !important;
  }
  .signup-form{
    margin-top:10px !important;
    width:60% !important;
  }
  .container{
    height:auto !important;
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
    $pid=$_GET['vehicle'];
    
    include "__partials/_nav.php";
    $sql="SELECT * FROM `product_dtl_tbl` WHERE `Product_Id`=$pid";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $pname=$row['Product_Name'];
                        $bid=$row['Brand_Id'];
                        $pim1=$row['image'];
                        $pdesc=$row['Description'];
                        $ptid=$row['Product_Type_Id'];
                        }
                        if($ptid==1){
                            // $sqlc="SELECT * FROM `sell_av_product` WHERE `product_id`=$pid";
                            $sqlc="SELECT * FROM `sell_av_product` WHERE product_id=$pid";
                            $resultc=mysqli_query($conn,$sqlc);
                            $rowc=mysqli_fetch_assoc($resultc);
                            $kmdr=$rowc['price'];
                            $kmpl=$rowc['kmpl'];
                            // $kmpl=$kmpl.'km/L';
                            $fuel=$rowc['fuel'];
                            // $kmdr=substr($kmdra, 0, -3);
                            // $kmdr=$kmdr.'K';
                            $kmdr=($kmdr*20)/100;
                        }
                        else if($ptid==2){
                            $sqlc="SELECT * FROM `rent_av_product` WHERE `product_id`= $pid";
                            $resultc=mysqli_query($conn,$sqlc);
                            $rowc=mysqli_fetch_assoc($resultc);
                            $kmdr=$rowc['pricepd'];
                            $kmpl=$rowc['kmpl'];
                            // $kmpl=$kmpl.'km/L';
                            // $kmdr=substr($kmdr, 0, -3);
                            // $kmdr=substr($kmdr, 0, -3);
                            $kmdr=$kmdr+10000;

                        }
                        

                        
                    }
                
    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Payment</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Payment</h6>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="main">
        <div class="container">
            <div class="signup-content" style="display: flex; justify-content: center; align-items: center;">
                <!-- <div class="signup-img">
                    <img src="img/signup.jpg" class="signupimg" height="100%" alt="">
                </div> -->

                <div class="signup-form" style="width:60%">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Enter Payment Details</h2>
                        <?php

                        ?>

                        <div class="form-group">
                            <label for="uname">Amount :</label>
                            <input type="text" name="uname" id="uname" value="<?php echo $kmdr?>" disabled/>
                            <?php
                                if($ptid==2){
                                    echo '<span>Rent amount + ₹10000 Security Deposit</span>';
                                }
                            ?>
                            
                            <!-- <span class="text-warning">Can only Contain @ for Email</span> -->
                            
                        </div>
                        <div class="form-group">
                            <!-- <label for="uname">Card :</label> -->
                            <input type="text" class="form-control p-4" Placeholder="Card Number"
                                    required="required">
                            <!-- <input type="text" name="uname" id="uname" Placeholder="Card Number"/> -->
                            <!-- <span class="text-warning">Can only Contain @ for Email</span> -->
                            
                        </div>
                        <div class="row">
                            <div class="col-6 form-group date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4"
                                        placeholder="Expiry Date" />
                                </div>
                            <div class="col-6 form-group">
                                <input type="Password" Max="3" class="form-control p-4" placeholder="CVV"
                                    required="required">
                            </div>
                            
                        </div>
                        
                        
                        <div class="form-submit mt-0" style="display: flex; justify-content: center; align-items: center;">
                            <!-- <input type="reset" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <button class="btn btn-block btn-primary py-2" name="pay">Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if(isset($_POST['pay'])){
                header("Location:paymentsuccess.php");
                
            }
            ?>
        </div>

    </div>

    <?php
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