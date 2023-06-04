<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form - MotoHeadz</title>
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
        <h1 class="display-3 text-uppercase text-white mb-3">Register</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Register</h6>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="main">
        <div class="container">
            <div class="signup-content" style="display: flex; justify-content: center; align-items: center;">
                <div class="signup-img">
                    <img src="img/signup.jpg" class="signupimg" height="100%" alt="">
                </div>

                <div class="signup-form" style="width:60%">
                    <form method="POST" class="register-form" id="register-form">
                        <h2>Registration form</h2>

                        <div class="form-group">
                            <label for="fname">First-Name :</label>
                            <input type="text" name="fname" id="fname" minlength="3" required />
                            <span class="text-warning">Name does not contain Special Characters</span>
                        </div>
                        <div class="form-group">
                            <label for="mname">Middle-Name :</label>
                            <input type="text" name="mname" id="mname" />
                        </div>
                        <div class="form-group">
                            <label for="mname">Last-Name :</label>
                            <input type="text" name="lname" id="lname" />
                            <span class="text-warning">Name does not contain Special Characters</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email-Id :</label>
                            <input type="email" name="email" id="email" required />
                            <span class="text-warning">Enter Valid Email</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Phone-no :</label>
                            <input type="tel" name="mobile" minlength="10" id="mobile">
                            <span class="text-warning">Enter Valid Phone Number</span>
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile-Photo:</label>
                            <input type="file" name="profile" id="profile">
                        </div>
                        <div class="form-group">
                            <label for="uname">Username:</label>
                            <input type="text" name="uname" minlength="5" id="uname">
                            <span class="text-warning">Username does not contain Special Characters</span>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password:</label>
                            <input type="password" name="pass" minlength="8" id="pass">
                            <span class="text-warning">Password must be minimum 8 characters</span>
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirm-Password:</label>
                            <input type="password" name="cpass" minlength="8" id="cpass">
                        </div>
                        <div class="form-group">
                            <label for="licen">License-Number:</label>
                            <input type="text" name="licen" id="licen">
                            <span class="text-warning">Cannot contain spaces and Special Characters and must be 15 Characters </span>
                        </div>
                        <div class="form-group">
                            <label for="utype">User-type</label>
                            <select name="utype" id="utype">
                                <option value="1">User</option>
                                <option value="2">Consultancy</option>
                            </select>
                        </div>

                        <div class="form-submit">
                            <input type="reset" value="Reset All" class="submit" name="reset" id="reset" />
                            <button type="submit" name="submit" class="submit" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php
    if((isset($_POST['submit']))&&(($_POST['fname']&&$_POST['lname'])!=NULL)){
        // Get all the submitted data from the form
        $f_name=postres($conn,'fname');
        $f_name = str_replace("<", "&lt;", $f_name);
        $f_name = str_replace(">", "&gt;", $f_name);
        $m_name=postres($conn,'mname');
        $m_name = str_replace("<", "&lt;", $m_name);
        $m_name = str_replace(">", "&gt;", $m_name);
        $l_name=postres($conn,'lname');
        $l_name = str_replace("<", "&lt;", $l_name);
        $l_name = str_replace(">", "&gt;", $l_name);
        $email=postres($conn,'email');
        $email = str_replace("<", "&lt;", $email);
        $email = str_replace(">", "&gt;", $email);
        $phone=$_POST['mobile'];
        $phone = str_replace("<", "&lt;", $phone);
        $phone = str_replace(">", "&gt;", $phone);
        // $profile=postres($conn,'profile');
        $u_name=postres($conn,'uname');
        $u_name = str_replace("<", "&lt;", $u_name);
        $u_name = str_replace(">", "&gt;", $u_name);
        $p_ass=postres($conn,'pass');
        $cp_ass=postres($conn,'cpass');
        $lic=postres($conn,'licen');
        $lic = str_replace("<", "&lt;", $lic);
        $lic = str_replace(">", "&gt;", $lic);
        $u_type=$_POST['utype'];
        $spas = str_split($p_ass);
        $sun = str_split($u_name);
        $pcount = count($spas);
        $ucount = count($sun);
        //Image Upload Start
        // $filename = $_FILES["profile"]["name"];
        // $tempname = $_FILES["profile"]["tmp_name"];
        // $folder = "../images/" . $filename;
        if(($ucount>=5&&$pcount>=8)&&($p_ass==$cp_ass)){
            
                // echo "Success";
                $p_ass = "ThePre_".$p_ass."_ThePost";
                $h_pass=hash( 'SHA256',$p_ass);
                // echo $h_pass;

                // Submitting the form

                $sql = "INSERT INTO `registration_dtl_tbl`(`F_Name`, `M_Name`, `L_Name`, `Email_Id`, `Phone_Number`,  `Username`, `Password`, `User_Type`, `License_Number`) VALUES ('$f_name','$m_name','$l_name','$email','$phone','$u_name','$h_pass','$u_type','$lic')";

                // Execute query
                $result=mysqli_query($conn, $sql);
                // Now let's move the uploaded image into the folder: image
                if ($result) {
                     if($u_type==1){
                        header("Location:login.php");
                        $reg=true;
                    }
                    else if($u_type==2){
                        header("Location:consultancy.php?user=$u_name");
                        $reg=true;
                    }
                } else {
                    echo "<h3>Failed!</h3>".mysqli_error($conn);
                }
                


                //Image Upload End
            

        }
        else{
            echo "Error".mysqli_error($conn);
        }
        
    }
    ?>


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