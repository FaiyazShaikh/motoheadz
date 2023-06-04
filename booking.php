<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MotoHeadz - Buy, Sell, Rent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <style>
        .page-header{
    height: 240px !important;
  }
    </style>
</head>

<body>
    <?php
    ob_start();
    $pid=$_GET['vehicle'];
        if(!$pid){
            header("Location:index.php");
        }
        include "__partials/_nav.php";
        // include "__partials/_search.php";
        ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <?php
        $sql="SELECT * FROM `product_dtl_tbl` WHERE `Product_Id`=$pid";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $pname=$row['Product_Name'];
                        // $prid=$row['Product_Id'];
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
                            $kmdr=$rowc['price'];
                            $kmpl=$rowc['kmpl'];
                            // $kmpl=$kmpl.'km/L';
                            $fuel=$rowc['fuel'];
                            // $kmdr=substr($kmdr, 0, -3);
                            $kmdr='₹'.$kmdr.'/-';
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
        <!-- <h1 class="display-3 text-uppercase text-white mb-3">Car Booking</h1> -->
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Car Booking</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5 pb-3">
            <?php
            echo '<h1 class="display-4 text-uppercase mb-5">'.$brand.' '.$pname.'</h1>';
            echo '<div class="row align-items-center pb-2">
                <div class="col-lg-6 mb-4">
                    <img class="img-fluid" src="primg/'.$pim1.'" alt="">
                </div>';
                echo '
            
                <div class="col-lg-6 mb-4">
                    <h4 class="mb-2">'.$kmdr.'</h4>
                    
                    <p>'.$pdesc.'</p>
                    <div class="d-flex pt-1">
                        <h6>Share on:</h6>
                        <div class="d-inline-flex">
                            <a class="px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="px-2" href=""><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>';
                echo '
                </div>
                <div class="row mt-n3 mt-lg-0 pb-4">
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
                <span>GPS Navigation</span>
                </div>
                
                </div>';
                ?>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Car Booking Start -->
    <div class="container-fluid pb-5">
        <div class="container">
            <div class="row">
                <?php
                if($ptid==2){
                    echo '<div class="col-lg-8">
                    <h2 class="mb-4">Personal Detail</h2>
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="First Name"
                                    required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Last Name" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" placeholder="Your Email"
                                    required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Mobile Number"
                                    required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" placeholder="License Number"
                                    required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Alternate Number"
                                    required="required">
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-4">Booking Detail</h2>
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;">
                                    <option selected>Pickup Location</option>
                                    <option value="1">Location 1</option>
                                    <option value="2">Location 2</option>
                                    <option value="3">Location 3</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <div class="time" id="time2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input"
                                        placeholder="Pickup Time" data-target="#time2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input"
                                        placeholder="Pickup Date" data-target="#date2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input"
                                        placeholder="Return Date" data-target="#date2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;">
                                    <option selected>Select Adult</option>
                                    <option value="1">Adult 1</option>
                                    <option value="2">Adult 2</option>
                                    <option value="3">Adult 3</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;">
                                    <option selected>Select Child</option>
                                    <option value="1">Child 1</option>
                                    <option value="2">Child 2</option>
                                    <option value="3">Child 3</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <textarea class="form-control py-3 px-4" rows="3" placeholder="Special Request"
                                required="required"></textarea>
                        </div>
                    </div>
                </div>';
                }
                else{
                    echo '<div class="col-lg-8">
                    <h2 class="mb-4">Personal Detail</h2>
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="First Name"
                                    required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Last Name" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" placeholder="Your Email"
                                    required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Mobile Number"
                                    required="required">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <textarea class="form-control py-3 px-4" rows="3" placeholder="Special Request"
                                required="required"></textarea>
                        </div>
                        </div>
                        </div>';
                
                }
                ?>
                <div class="col-lg-4">
                    <div class="bg-secondary p-5 mb-5">
                        <h2 class="text-primary mb-4">Payment</h2>
                        <form action="" method="GET">
                
                       
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="Credit Card" name="payment" id="Credit Card">
                                <label class="custom-control-label" for="Credit Card">Credit Card</label>
                            </div>
                        </div>
                        <?php
                        if($ptid==1){

                            echo '<div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="check" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>';
                        }
                        ?>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="bank" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <?php
                        // echo '<a href="payment.php?vehicle='.$pid.'">Reserve Now</a>';
                        // echo '<a  type="submit" name="reserve" href="">Reserve Now</a>';
                        // echo '<button class="btn btn-block btn-primary py-3" name="reserve" type="Submit">Reserve Now</button>'
                        echo '<a class="btn btn-block btn-primary py-3" href="payment.php?vehicle='.$pid.'">Reserve Now</a>'
                        ?>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Car Booking End -->




    <?php
    // $prid=$pid;
    // echo $prid;
    // if(isset($_GET['reserve'])){
    //     $pay=$_GET['payment'];
        // $amt=$kmdr;
        // header("Location:payment.php?vehicle=$pid");
        // echo $pay;
        // echo "abc";
    // }
    
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    
    ?>
</body>

</html>