<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form - MotoHeadz</title>
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
    // $user=$_GET['user'];
    // echo $user;
    include "__partials/_nav.php";
    // $sql1="SELECT * FROM `registration_dtl_tbl` Where `Username`= '.$user.'";
    //     $result1=mysqli_query($conn, $sql1);
    //     if ($result1){
    //         while(mysqli_num_rows($result1)==1){
    //             $row=mysqli_fetch_assoc($result1);
    //             echo $row['Registration_Id'];
    //         }
           
    //     }
    //     else{
    //         echo "a".mysqli_error($conn);
    //     }
    // include "__partials/_search.php";
    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Forgot Password</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Reset Password</h6>
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
                        <h2>Reset Password</h2>

                        <div class="form-group">
                            <label for="uname">Email :</label>
                            <input type="text" name="uname" id="uname" Placeholder="Enter Email" minlength="5" required />
                            <!-- <span class="text-warning">Can only Contain @ for Email</span> -->
                            
                        </div>
                        <div class="d-flex justify-content-between">

                            <span>Not Registered? <a href="register.php">Signup</a> Now</span>
                        </div>
                        
                        <div class="form-submit" style="display: flex; justify-content: center; align-items: center;">
                            <!-- <input type="reset" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <button type="login" name="login"  class="submit btn-primary"  style="width:300px;" id="login">Request OTP</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if((isset($_POST['login']))&&(($_POST['upass'])&&$_POST['uname'])!=null){
                $uname=$_POST['uname'];
                // $sql="SELECT * FROM `registration_dtl_tbl` WHERE Username="."'$uname'";
                $sql="SELECT * FROM `registration_dtl_tbl` WHERE `Username`='$uname' OR `Email_Id`='$uname' OR `Phone_Number`='$uname'";
                $result=mysqli_query($conn, $sql);
                if ($result){
                    $row=mysqli_fetch_assoc($result);
                    $numrow=mysqli_num_rows($result);
                    // echo $numrow;
                    if($numrow==1){
                        $upass=$row['Password'];
                        $un=$row['Username'];
                        $ufn=$row['F_Name'];
                        $uln=$row['L_Name'];
                        $rutype=$row['User_Type'];
                        $upas=$_POST['upass'];
                        $upas="ThePre_".$upas."_ThePost";
                        $h_pass=hash( 'SHA256',$upas);
                        if($upass==$h_pass){
                            // echo "Success";
                            session_start();
                            $_SESSION['user']=$un;
                            $_SESSION['upass']=$upass;
                            $_SESSION['utype']=$rutype;
                            $_SESSION['ufname']=$ufn;
                            $_SESSION['ulname']=$uln;
                            $_SESSION['login']=true;
                            if($rutype==1){
                                header("Location:index.php");
                            }
                            else if($rutype==2){
                                header("Location:consecondary.php");
                            }
                            else if($rutype==3){
                                header("Location:admindex.php");
                            }
                        }

                    }
                    else{
                        echo "Username Not found";
                    }
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