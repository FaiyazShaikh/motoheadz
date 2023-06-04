<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultancy Registration Form - MotoHeadz</title>
    <style>
    body {
        padding: 0 !important;
        margin: 0 !important;
    }
    
.register-form {
  padding: 30px 15px !important; }
  .signupimg{
    height:100%;
  }
  .container{
    margin: 25px !important;
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
    $ruser=$_GET['user'];
    if($ruser==null){
        header("Location:register.php");
    }
    // echo $user;
    include "__partials/_nav.php";
    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Consultancy Registeration</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Consultancy Register</h6>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="main mt-3">
        <div class="container m-auto">
            <div class="signup-content" style="display: flex; justify-content: center; align-items: center;">
                <div class="signup-img">
                    <img src="img/signup.jpg" class="signupimg" height="100%" alt="">
                </div>

                <div class="signup-form" style="width:60%">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Consultancy Registration form</h2>

                        <div class="form-group">
                            <label for="conname">Consultancy-Name :</label>
                            <input type="text" name="conname" id="conname" minlength="5" required />
                            <!-- <span class="text-warning">Name does not contain Special Characters and Must be minimum 5 Characters</span> -->
                            
                        </div>
                        <div class="form-group">
                            <label for="congstin">GSTIN :</label>
                            <input type="text" name="congstin" id="congstin" minlength="15" required />
                            <!-- <span class="text-warning">GSTIN Must be 15 Characters</span> -->
                        </div>
                        <div class="form-group">
                            <label for="condesc">Description :</label>
                            <input type="text" name="condesc" minlength="100" id="condesc">
                            <!-- <span class="text-warning">Must be 100 Characters</span> -->
                        </div>
                        <div class="form-group">
                            <label for="conaddress">Address :</label>
                            <input type="text" name="conaddress" minlength="50" id="conaddress">
                        </div>
                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <button type="submit" name="submit" class="submit" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        
    <?php
    if((isset($_POST['submit']))&&(($_POST['conname']&&$_POST['congstin'])!=NULL)){
        // Get all the submitted data from the form
        // echo "abcd";
        $con_name=postres($conn,'conname');
        $con_name = str_replace("<", "&lt;", $con_name);
        $con_name = str_replace(">", "&gt;", $con_name);
        $con_gst=postres($conn,'congstin');
        $con_gst = str_replace("<", "&lt;", $con_gst);
        $con_gst = str_replace(">", "&gt;", $con_gst);
        $con_desc=postres($conn,'condesc');
        $con_desc = str_replace("<", "&lt;", $con_desc);
        $con_desc = str_replace(">", "&gt;", $con_desc);
        $con_Add=postres($conn,'conaddress');
        $con_Add = str_replace("<", "&lt;", $con_Add);
        $con_Add = str_replace(">", "&gt;", $con_Add);
        // echo $ruser;
        $sql="SELECT * FROM `registration_dtl_tbl` WHERE Username="."'$ruser'";
        $result=mysqli_query($conn, $sql);
        if ($result){
            $row=mysqli_fetch_assoc($result);
            $numrow=mysqli_num_rows($result);
            // echo $numrow;
            if($numrow==1){
                // echo $numrow;
                $regid=$row['Registration_Id'];
                $rutype=$row['User_Type'];
                if($rutype==2){
                    $sql="INSERT INTO `consultancy_tbl`(`Consultancy_Name`, `GSTIN`, `Consultancy_Desc`, `Consultancy_Address`, `Registration_Id`) VALUES ('$con_name','$con_gst','$con_desc','$con_Add','$regid')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("Location:login.php");
                    }
                    else{
                        echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> Your Consultancy has been registered.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            
                        }
                    }
                    if($rutype==1){
                    echo '<div class="container alert alert-Warning alert-dismissible fade show" role="alert">
                            <strong>Success</strong> You are not registered as Consultancy.<br> Please select User Type as Consultancy while Register else contact us is you encounter some error
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';

                }
                // echo "RegisId=$regid";
            }
            else if($numrow!=1){
                echo '<div class="container alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
            
        } 
        else{
            echo "Error-> ".mysqli_error($conn);
        }
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