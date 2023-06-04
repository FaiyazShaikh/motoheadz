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
        <h1 class="display-3 text-uppercase text-white mb-3">Testimonial</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Testimonial</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <?php
                include "__partials/_testimonial.php";
            ?>
        </div>
    </div>
    <!-- Testimonial End -->


    <?php
    include "__partials/_vendor.php";
    include "__partials/_footer.php";
    include "__partials/_js.php";
    ?>




</body>

</html>