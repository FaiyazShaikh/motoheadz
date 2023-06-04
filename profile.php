<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="reg/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="reg/css/style.css">
</head>
<body>
     <?php
    ob_start();
    // session_start();
    include "__partials/_nav.php";
    if((isset($_SESSION['user']))&&(isset($_SESSION['upass']))){
    // include "__partials/_search.php";
    $pr=$_SESSION['up'];
    ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header" style="height:200px">
        <h1 class="display-3 text-uppercase text-white mb-3">Profile</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Profile</h6>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-fluid py-5 d-flex justify-content-center">
            
            <?php
            echo '<img src="up/'.$pr.'" class="rounded-circle border border-primary my-0 p-0" style="height:100px; width: 100px;" />';
            $un=$_SESSION['user'];
            $rutype=$_SESSION['utype'];
            $ufn=$_SESSION['ufname'];
            $uln=$_SESSION['ulname'];
            $uemail=$_SESSION['uemail'];
            $uph=$_SESSION['uph'];
            $ulic=$_SESSION['ulic'];
            if($rutype==1){
                $rutype='User';
            }
            elseif($rutype==2){
                $rutype='Consultancy';
            }
            ?>

            
    </div>
    <div class="signup-form m-auto" style="width:70%">
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="fname">First-Name :</label>
                            <input type="text" name="fname" id="fname" value=<?php echo $ufn?> Disabled/>
                            <!-- <span class="text-warning">Name does not contain Special Characters</span> -->
                        </div>
                        <div class="form-group">
                            <label for="mname">Last-Name :</label>
                            <input type="text" name="lname" id="lname"  value=<?php echo $uln?> Disabled />
                            <!-- <span class="text-warning">Name does not contain Special Characters</span> -->
                        </div>
                        <div class="form-group">
                            <label for="email">Email-Id :</label>
                            <input type="email" name="email" id="email"  value=<?php echo $uemail?> Disabled/>
                            <!-- <span class="text-warning">Enter Valid Email</span> -->
                        </div>
                        <div class="form-group">
                            <label for="mobile">Phone-no :</label>
                            <input type="tel" name="mobile" minlength="10" id="mobile"  value=<?php echo $uph?> Disabled>
                            <!-- <span class="text-warning">Enter Valid Phone Number</span> -->
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile-Photo:</label>
                             <?php
                                echo '<img src="up/'.$pr.'" class="border border-primary my-0 p-0" style="height:150px; width: 150px;" />';
                                ?>
                        </div>
                        <div class="form-group">
                            <label for="uname">Username:</label>
                            <input type="text" name="uname" minlength="5" VALUE="<?php echo $un?>" id="uname" DISABLED>
                            <!-- <span class="text-warning">Username does not contain Special Characters</span> -->
                        </div>
                        <div class="form-group">
                            <label for="licen">License-Number:</label>
                            <input type="text" name="licen" id="licen"  value=<?php echo $ulic?> Disabled>
                            <!-- <span class="text-warning">Cannot contain spaces and Special Characters and must be 15 Characters </span> -->
                        </div>
                        <div class="form-group">
                            <label for="utype">User-type</label>
                            <input type="text" name="uname" minlength="5" VALUE="<?php echo $rutype?>" id="uname" DISABLED>
                        </div>

                        <div class="form-submit">
                            <!-- <input type="reset" value="Reset All" class="submit" name="reset" id="reset" /> -->
                            <!-- <button type="submit" name="submit" class="submit" id="submit">Edit</button> -->
                            <a href="editprofile.php"class="btn btn-primary px-5 py-2">Edit</a>
                        </div>
                    </form>
                </div>
    <?php
    }
    else{
        // $_POST['uname']=7877;
        header("Location:index.php");
    }
    ob_end_flush();
    ?>
</body>
</html>