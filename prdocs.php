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
    $pid=$_GET['pid'];
    $rid=$_SESSION['userid'];
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
                    <form method="POST" action="" class="register-form" id="register-form">
                        <h2>Vehicle-Documents</h2>

                        <div class="form-group">
                            <label for="vimg1">Registration Certificate</label>
                            <input type="file" name="vimg1" id="vimg1"/>
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                        </div>                     
                        <div class="form-group">
                            <label for="vimg2">PUC Certificate</label>
                            <input type="file" name="vimg2" id="vimg2"/>
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                        </div>                     
                        <div class="form-group">
                            <label for="vimg3">Insurance</label>
                            <input type="file" name="vimg3" id="vimg3"/>
                            <!-- <span class="text-warning">Vehicle-Name does not contain Special Characters</span> -->
                        </div>                     
                     
                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <button type="submit" name="upload" class="submit" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
    <?php
    
    if(isset($_POST['upload'])){
        echo $pid;
        $vimg1=$_POST['vimg1'];
        $vimg2=$_POST['vimg2'];
        $vimg3=$_POST['vimg3'];
        $_SESSION['vupload']=true;
        if($_SESSION['utype']==1){
            header("Location:index.php");
        }
        elseif($_SESSION['utype']==2){
            header("Location:consecondary.php");

        }
        

    }
    else{
        // echo "Error".mysqli_error($conn);
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