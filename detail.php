<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MotoHeadz - Buy, Sell, Rent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">

</head>

<body>
    <?php
    ob_start();
        include "__partials/_nav.php";
        include "__partials/_search.php";
        $pid=$_GET['vehicle'];
        if(!$pid){
            header("Location:index.php");
        }
        
        ?>
        <div class="container-fluid page-header">
        <?php
                $sql="SELECT * FROM `product_dtl_tbl` WHERE `Product_Id`=$pid";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $pname=$row['Product_Name'];
                        $bid=$row['Brand_Id'];
                        $pim1=$row['image'];
                        $pdesc=$row['Description'];
                        $ptrans=$row['transmission'];
                        if($ptrans==1){
                            $ptrans="Manual";
                        }
                        else{
                            $ptrans="Automatic";

                        }
                        $ptid=$row['Product_Type_Id'];
                        $sqla="SELECT * FROM `product_brand_tbl` WHERE `Brand_Id`=$bid";
                        $resulta=mysqli_query($conn,$sqla);
                        if($resulta){
                                $rowa=mysqli_fetch_assoc($resulta);
                                $brand=$rowa['Brand'];
                            
                        }
                        $sqlb="SELECT * FROM `product_images` WHERE `product_Id`=$pid";
                        $resultb=mysqli_query($conn,$sqlb);
                        if($resultb){
                                $rowb=mysqli_fetch_assoc($resultb);
                                if(mysqli_num_rows($resultb)==1){

                                    $pim2=$rowb['image_1'];
                                    $pim3=$rowb['image_2'];
                                    $pim4=$rowb['image_3'];
                                }
                                else{
                                    $pim2=1;
                                    $pim3=1;
                                    $pim4=1;
                                }
                            
                        }
                        if($ptid==1){
                            // $sqlc="SELECT * FROM `sell_av_product` WHERE `product_id`=$pid";
                            $sqlc="SELECT * FROM `sell_av_product` WHERE product_id=$pid";
                            $resultc=mysqli_query($conn,$sqlc);
                            $rowc=mysqli_fetch_assoc($resultc);
                            $kmdra=$rowc['price'];
                            $kmpl=$rowc['kmpl'];
                            // $kmpl=$kmpl.'km/L';
                            $fuel=$rowc['fuel'];
                            $kmdr=substr($kmdra, 0, -3);
                            $kmdr=$kmdr.'K';
                            $kmdra=($kmdra*20)/100;
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
                            $kmdr='₹'.$kmdr.'/Day';

                        }
                        

                        
                    }
                }
                echo '<h1 class="display-3 text-uppercase text-white mb-3">'.$brand.' '.$pname.'</h1>';
        ?>

    <!-- Page Header Start -->
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Car Detail</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <?php
               
                
                echo'<div class="col-lg-8 mb-5">
                    <h1 class="display-4 text-uppercase mb-5">'.$brand.' '.$pname.'</h1>
                    <div class="row mx-n2 mb-3">
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="primg/'.$pim1.'" alt="">
                        </div>
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="primg/'.$pim2.'" alt="">
                        </div>
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="primg/'.$pim3.'" alt="">
                        </div>
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="primg/'.$pim4.'" alt="">
                        </div>
                    </div>
                    <p>'.$pdesc.'</p>
                    <div class="row pt-2">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span>Model: 2018</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span>'.$ptrans.'</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-road text-primary mr-2"></i>
                            <span>'.$kmpl.'km/liter</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-eye text-primary mr-2"></i>
                            <span>'.$kmdr.'</span>
                        </div>';
                ?>
                        
                    </div>
                </div>
<?php
if($ptid==2){
                echo '<div class="col-lg-4 mb-5">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary text-center mb-4">Check Availability</h3>
                        <form method="POST" action="">
                        <div class="form-group">
                            <select class="custom-select px-4" name="Location" style="height: 50px;">
                                <option selected>Pickup Location</option>
                                <option value="1">Gita-Mandir</option>
                                <option value="2">Nehru-Nagar</option>
                                <option value="3">CTM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="date" id="date1" data-target-input="nearest">
                                <input type="text" name="Date" class="form-control p-4 datetimepicker-input"
                                    placeholder="Pickup Date" data-target="#date1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" name="Time" class="form-control p-4 datetimepicker-input"
                                    placeholder="Pickup Time" data-target="#time1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            
                                <button class="btn btn-primary btn-block" name="get" type="submit" style="height: 50px;">'.$kmdr.'</button>  
                        </div>
                        </form>
                    </div>';}
                    else{
                        echo '<div class="col-lg-4 mb-5">
                    <div class="bg-secondary p-5">
                    <h2 class="text-primary text-center mb-4">Pay Now only 20%</h2>
                        <h3 class="text-primary text-center mb-4">Select Pickup</h3>
                        <form method="POST" action="">
                        <div class="form-group">
                            <select class="custom-select px-4" name="Location" style="height: 50px;">
                                <option selected>Pickup Location</option>
                                <option value="1">Gita-Mandir</option>
                                <option value="2">Nehru-Nagar</option>
                                <option value="3">CTM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="date" id="date1" data-target-input="nearest">
                                <input type="text" name="Date" class="form-control p-4 datetimepicker-input"
                                    placeholder="Pickup Date" data-target="#date1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" name="Time" class="form-control p-4 datetimepicker-input"
                                    placeholder="Pickup Time" data-target="#time1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            
                                <button class="btn btn-primary btn-block" name="get" type="submit" style="height: 50px;">₹'.$kmdra.'/-</button>  
                        </div>
                        </form>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Related Car Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <h2 class="mb-4">Related Vehicles</h2>
            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                <?php
                $sqld="SELECT * FROM `product_dtl_tbl` Where `Product_Type_Id`=$ptid LIMIT 5";
                $resultd=mysqli_query($conn,$sqld);
                if($result){
                    // echo "A";
                    while($rowa=mysqli_fetch_assoc($resultd)){
                        $prid=$rowa['Product_Id'];
                        $pname=$rowa['Product_Name'];
                        $pimg=$rowa['image'];
                        // $rowa['Category_Id'];
                        $trans=$rowa['transmission'];
                        if($trans==1){
                            $trans="Manual";
                        }
                        else{
                            $trans="Auto";
                            
                        }
                        // $rowa['Description'];
                        // $prtype=$rowa['Product_Type_Id'];
                        // $rowa['Brand_Id'];
                        if($ptid==1){
                            $sqlb="SELECT `kmdr`, `kmpl`, `fuel` FROM `sell_av_product` WHERE product_id=$prid";
                            $resultb=mysqli_query($conn,$sqlb);
                            $rowb=mysqli_fetch_assoc($resultb);
                            $kmdr=$rowb['kmdr'];
                            $kmpl=$rowb['kmpl'];
                            $kmpl=$kmpl.'km/L';
                            // echo $kmpl;
                            $fuel=$rowb['fuel'];
                            // echo $kmdr;
                            $kmdr=substr($kmdr, 0, -3);
                            $kmdr=$kmdr.'K';
                            // echo $kmdr;
                        }
                        elseif($ptid==2){
                            $sqlb="SELECT `pricepd`, `kmpl`, `fuel` FROM `rent_av_product` WHERE `product_id`= $prid";
                            $resultb=mysqli_query($conn,$sqlb);
                            $rowb=mysqli_fetch_assoc($resultb);
                            $kmdr=$rowb['pricepd'];
                            $kmpl=$rowb['kmpl'];
                            $kmpl=$kmpl.'km/L';
                            // $kmdr=substr($kmdr, 0, -3);
                            $kmdr=substr($kmdr, 0, -3);
                            $kmdr='₹'.$kmdr.'k';
                            
                        }

                        echo'<div class="rent-item">
                            <img class="img-fluid mb-4" src="primg/'.$pimg.'" alt="">
                            <h4 class="text-uppercase mb-4">'.$pname.'</h4>
                            <div class="d-flex justify-content-center mb-4">
                                <div class="px-2">
                                    <i class="fa fa-car text-primary mr-1"></i>
                                    <span>'.$kmpl.'</span>
                                </div>
                                <div class="px-2 border-left border-right">
                                    <i class="fa fa-cogs text-primary mr-1"></i>
                                    <span>'.$trans.'</span>
                                </div>
                                <div class="px-2">
                                    <i class="fa fa-road text-primary mr-1"></i>
                                    <span>'.$kmdr.'</span>
                                </div>
                            </div>
                            <a class="btn btn-primary px-3" href="detail.php?vehicle='.$prid.'">Detail &gt</a>
                        </div>';
                    }
                }

                if(isset($_POST['get'])){
                    $date=$_POST['Date'];
                    $time=$_POST['Time'];
                    $loc=$_POST['Location'];
                    header("Location:booking.php?vehicle=$pid");
                    // echo $loc;
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Related Car End -->
    <?php
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    ?>
</body>

</html>