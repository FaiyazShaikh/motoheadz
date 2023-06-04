<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MotoHeadz - Buy, Sell, Rent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<body>
    <?php
    include "__partials/_nav.php";
    include "__partials/_search.php";
    ob_start();
    ?>
    <div class="main">
    <div class="container">
    <!-- gagsvhgmcm -->
    <?php
    // echo $_SESSION['user'];
    // session_start();
    if((isset($_SESSION['user']))&&(isset($_SESSION['upass']))){
        // echo "abc";
        $aaaaa=false;
        if($aaaaa==true){
        echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurray!</strong> '.$_SESSION['ufname'].' '.$_SESSION['ulname'].' Your Profile Updated Successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        $_SESSION['login']=false;
        }
        if($_SESSION['login']==true){
        echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurray!</strong> '.$_SESSION['ufname'].' '.$_SESSION['ulname'].' You are now loggedin.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        $_SESSION['login']=false;
        }
        // $_SESSION['vupload']=true;
        if($_SESSION['vupload']==true){
        echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Vehicle is Successfully added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        $_SESSION['vupload']=false;
        }
        // $_SESSION['loggedin']=false;
    }

    ?>
    </div>
    </div>




    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent Any Vehcle</h4>
                            <h1 class="display-1 text-white mb-md-4">Best Vehicle Rental Services in India</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Buy A Vehicle</h4>
                            <h1 class="display-1 text-white mb-md-4">Quality Cars and Bikes from Verified Seller</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Sell Your Vehicle</h4>
                            <h1 class="display-1 text-white mb-md-4">Get the best available price for your Cars and Bikes</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserve Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">01</h1>
            <?php
            include "__partials/_about.php";
            ?>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">02</h1>
            <?php
            include "__partials/_services.php";
            ?>
        </div>
    </div>
    <!-- Services End -->


    <!-- Banner Start -->
    <?php
    if((!isset($_SESSION['user']))&&(!isset($_SESSION['upass']))){
    echo '<div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-banner py-5 px-4 text-center">
                <div class="py-5">
                    <h1 class="display-1 text-uppercase text-primary mb-4">50% OFF</h1>
                    <h1 class="text-uppercase text-light mb-4">Special Offer For New Members</h1>
                    <p class="mb-4">Only for Sunday from 1st March to 30th March 2023</p>
                    <a class="btn btn-primary mt-2 py-3 px-5" href="register.php">Register Now</a>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
    <!-- Banner End -->


    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">03</h1>
            <?php
            include "__partials/_rent.php";
            ?>
        </div>
    </div>
    <!-- Rent A Car End -->


    <!-- Team Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-1 text-primary text-center">04</h1>
            <?php
            // include "__partials/_team.php";
            ?>
        </div>
    </div> -->
    <!-- Team End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0">
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-secondary d-flex align-items-center justify-content-between"
                        style="height: 350px;">
                        <img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-4" src="img/banner-left.png" alt="">
                        <div class="text-right">
                            <h3 class="text-uppercase text-light mb-3">Want to Go somewhere?</h3>
                            <!-- <p class="mb-4">Lorem justo sit sit ipsum eos lorem kasd, kasd labore</p> -->
                            <a class="btn btn-primary py-2 px-4" href="">Start Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-0">
                    <div class="px-5 bg-dark d-flex align-items-center justify-content-between" style="height: 350px;">
                        <div class="text-left">
                            <h3 class="text-uppercase text-light mb-3">Looking for buying a car?</h3>
                            <!-- <p class="mb-4">Lorem justo sit sit ipsum eos lorem kasd, kasd labore</p> -->
                            <a class="btn btn-primary py-2 px-4" href="">Start Now</a>
                        </div>
                        <img class="img-fluid flex-shrink-0 mr-n5 w-50 ml-4" src="img/banner-right.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    <!-- Testimonial-->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-1 text-primary text-center">04</h1>
            <?php
            include "__partials/_testimonial.php";
            ?>
        </div>
    </div>

    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">05</h1>
            <?php
            include "__partials/_contact.php";
            ?>
        </div>
    </div>
    <!-- Contact End -->


    <?php
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    ob_end_flush();
    ?>
</body>

</html>