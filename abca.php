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
    // include "__partials/_search.php";
    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Add Your Vehicle</h1>
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
                    <form method="POST" action="addproduct.php" class="register-form" id="register-form">
                        <h2>Add Vehicle</h2>

                        <div class="form-group">
                            <label for="vname">Customer-Name :</label>
                            <input type="text" name="vname" id="vname" required />
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                            
                        </div>
                        <div class="form-group">
                            <label for="vname">From Date :</label>
                            <input type="Date" name="vname" id="vname" required />
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                            
                        </div>
                        <div class="form-group">
                            <label for="vname">To Date :</label>
                            <input type="Date" name="vname" id="vname" required />
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                            
                        </div>
                        <div class="form-group">
                            <label for="vname">License Number :</label>
                            <input type="text" name="vname" id="vname" required />
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                            
                        </div>

                    
                        <div class="form-group">
                            <label for="Avfor">Available-For :</label>
                            <!-- Product-Type -->
                            <?php
                            if($_SESSION['utype']==1){
                            echo '<Select name="Avfor" id="Avfor" Value="1" disabled>
                                <option value="1">Sell</option>
                            </Select>';
                        }
                        elseif($_SESSION['utype']==2){
                                echo '<Select name="Avfor" id="Avfor">
                                    <option value="1">Sell</option>
                                    <option value="2">Rent</option>
                                </Select>';

                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="vdesc">Vehicle-Description :</label>
                            <input type="text" name="vdesc" id="vdesc" placeholder="Enter short description of product" />
                            <!-- <span class="text-warning">Must be atleast 100 Characters</span> -->
                        </div>
                        <div class="form-group">
                            <label for="email">Vehicle-Registration-Number :</label>
                            <input type="text" name="regno" id="regno" placeholder="Ex: GJ01XY1234"  required />
                            <!-- <span class="text-warning">Must be atleast 8 Characters</span> -->
                        </div>
                        <!-- <div class="form-group">
                            <label for="email">Vehicle-RC Book :</label>
                            <input type="file" name="email" id="email"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Vehicle-PUC :</label>
                            <input type="file" name="email" id="email"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Vehicle-Insurance :</label>
                            <input type="file" name="email" id="email"/> 
                        </div>-->
                        
                        
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
    if(isset($_POST['submit'])&&((($_POST['vname'])&&($_POST['regno']))!="")){
        $vname=$_POST['vname'];
        $vtype=$_POST['vtype'];
        $vbrand=$_POST['brand'];
        if($_SESSION['utype']==1){
            $avfor=1;
        }
        else{
            $avfor=$_POST['Avfor'];

        }
        $vdesc=$_POST['vdesc'];
        $vreg=$_POST['regno'];
        $trans=$_POST['trans'];
        $regid=$_SESSION['userid'];

        $sqlc="INSERT INTO `product_dtl_tbl`(`Product_Name`, `Category_Id`, `transmission`, `Description`, `Product_Type_Id`, `Brand_Id`, `Reg_No`, `Registration_Id`) VALUES ('$vname','$vtype','$trans','$vdesc','$avfor','$vbrand','$vreg','$regid')";
        $resultc=mysqli_query($conn,$sqlc);
        if($resultc){
            if($avfor==1){
                header("Location:sellpr.php?vehicle=$vname");
            }
            elseif($avfor==2){
                header("Location:rentpr.php?vehicle=$vname");
            }
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