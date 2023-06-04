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
                                    $pim5=$rowb['image_4'];
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
                            <span>Model: 2016</span>
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
                <span><a href="updateproduct.php?vehicle=<?php echo $pid;?>"class="btn btn-primary px-5 py-2">Accept</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->


   
    <?php
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    ?>
</body>

</html>