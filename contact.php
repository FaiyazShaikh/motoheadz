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


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Contact</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Contact</h6>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your Name"
                                        required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your Email"
                                        required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" placeholder="Message"
                                    required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
            <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
                <div class="d-flex mb-3">
                    <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-light">Head Office</h5>
                        <p>25, Bandra Street, Maharashtra</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-light">Branch Office</h5>
                        <p>12, Ashram Road, Ahmedabad</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-light">Customer Service</h5>
                        <p>customer@motoheadzauto.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-light">Return & Refund</h5>
                        <p class="m-0">refund@motoheadzauto.com</p>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    <?php
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    ?>
</body>

</html>