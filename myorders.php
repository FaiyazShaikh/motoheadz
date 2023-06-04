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
    ?>
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h3 class="display-3 text-primary text-center">My Orders</h3>
            <div class="row">
                <?php
                $regid=$_SESSION['userid'];
                $sqla="SELECT * FROM `product_dtl_tbl` WHERE Registration_Id = 25 Limit 2";
                $resulta=mysqli_query($conn,$sqla);
                if($resulta){
                    while($rowa=mysqli_fetch_assoc($resulta)){
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
                        $prtype=$rowa['Product_Type_Id'];
                        // $rowa['Brand_Id'];
                        if($prtype==1){
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
                            $dtl="Details &gt";
                            // echo $kmdr;
                            $txt='You Bought';
                        }
                        elseif($prtype==2){
                            $sqlb="SELECT `pricepd`, `kmpl`, `fuel` FROM `rent_av_product` WHERE `product_id`= $prid";
                            $resultb=mysqli_query($conn,$sqlb);
                            $rowb=mysqli_fetch_assoc($resultb);
                            $kmdra=$rowb['pricepd'];
                            $kmpl=$rowb['kmpl'];
                            $kmpl=$kmpl.'km/L';
                            // $kmdr=substr($kmdr, 0, -3);
                            $kmdr=substr($kmdra, 0, -3);
                            $kmdr='₹'.$kmdr.'k';
                            $dtl='₹'.$kmdra.'/Day';
                            $dtl="Details &gt";
                            $txt='You Rented';
                            $txt='You Bought';
                            
                        }
                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                <div class="rent-item mb-4">
                                <span class="text-primary mb-2" style="
                                    /* padding-bottom: 172px; */
                                    position: absolute;
                                    top: 5px;
                                    right: 145px;
                                ">'.$txt.'</span>
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
                                    <a class="btn btn-primary px-3" href="myproductdetails.php?vehicle='.$prid.'">'.$dtl.'</a>
                                </div>
                            </div>';

                    }
                }
                ?>     
                
    
        </div>
            <h3 class="display-3 text-primary text-center">Received Order</h3>
            <div class="row">
                <?php
                $regid=$_SESSION['userid'];
                $sqla="SELECT * FROM `product_dtl_tbl` WHERE Product_Id = 12";
                $resulta=mysqli_query($conn,$sqla);
                if($resulta){
                    while($rowa=mysqli_fetch_assoc($resulta)){
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
                        $prtype=$rowa['Product_Type_Id'];
                        // $rowa['Brand_Id'];
                        if($prtype==1){
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
                            $dtl="Details &gt";
                            // echo $kmdr;
                            $txt='You Bought';
                        }
                        elseif($prtype==2){
                            $sqlb="SELECT `pricepd`, `kmpl`, `fuel` FROM `rent_av_product` WHERE `product_id`= $prid";
                            $resultb=mysqli_query($conn,$sqlb);
                            $rowb=mysqli_fetch_assoc($resultb);
                            $kmdra=$rowb['pricepd'];
                            $kmpl=$rowb['kmpl'];
                            $kmpl=$kmpl.'km/L';
                            // $kmdr=substr($kmdr, 0, -3);
                            $kmdr=substr($kmdra, 0, -3);
                            $kmdr='₹'.$kmdr.'k';
                            $dtl='₹'.$kmdra.'/Day';
                            $dtl="Details &gt";
                            $txt='You Rented';
                            $txt='Rent Request';
                            
                        }
                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                <div class="rent-item mb-4">
                                <span class="text-primary mb-2" style="
                                    /* padding-bottom: 172px; */
                                    position: absolute;
                                    top: 5px;
                                    right: 145px;
                                ">'.$txt.'</span>
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
                                    <a class="btn btn-primary px-3" href="myproductdetails.php?vehicle='.$prid.'">'.$dtl.'</a>
                                </div>
                            </div>';

                    }
                }
                ?>     
                
    
        </div>
    </div>
      <?php
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    ?>
</body>

</html>