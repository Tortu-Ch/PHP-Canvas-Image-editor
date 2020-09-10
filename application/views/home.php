<?php
    $this->load->helper('url');
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Cropper css -->
    <link href="assets/libs/cropper/cropper.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <!-- <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <style>
        .sticky_custom1 {
            position: -webkit-sticky;
            position: sticky;
            top: 12.5%;
        }

        .sticky_custom2 {
            position: -webkit-sticky;
            position: sticky;
            top: 55.6%;
        }

        #tbl_custom tr th {
            padding: 0.23rem !important;
            text-align:center;
        }
        #tbl_custom tr td {
            padding: 0.25rem !important;
            text-align:center;
        }
        #tbl_custom tr .bs-checkbox{
            text-align:right !important;
        }
        #tbl_custom tr .-autodated{
            text-decoration: line-through;
        }
        
    </style>
</head>

<body class="boxed-layout">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="header-bar" style="height:30px; font-size:15px">
            <div class="row -weight">
                <div class="col -span-9" align="right" style="color:white; top:4px">
                    <b>Today's Special: </b> up to <b>89% OFF </b> - Coupon already activated!
                </div>
                <div class="col -span-3" align="center" style="color:white; top:4px">
                    <strong>
                        <span class="js-countdown" data-until="midnight" data-format="%-Hh %Mmin %Ss">10h 31min
                            14s</span>
                    </strong>
                </div>
            </div>
        </div>
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="fe-shopping-cart noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
                        </a>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo base_url() ?>" class="logo text-center">
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="18">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>
            </div>
            <!-- end container-fluid-->
        </div>
        <!-- end Topbar -->



    </header>

    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2015 - 2018 &copy; UBold theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="assets/libs/cropper/cropper.min.js"></script>

    <!-- Init js -->
<!--    <script src="assets/js/pages/form-imagecrop.init.js"></script>-->

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>
    <script type="text/javascript">
        var $dataX = $("#dataX"),
            $dataY = $("#dataY"),
            $dataHeight = $("#dataHeight"),
            $dataWidth = $("#dataWidth"),
            inputImage = document.getElementById("#inputImage"),
            cropper,
            x,
            y;

        $(document).ready(function(){
            // btnSelectSize(256,384);
            $("#inputImage").on("change", function () {
                if (this.files && this.files[0]) {
                    if (this.files[0].type.match(/^image\//)) {
                        var data = new FormData();
                        var files = $("#inputImage")[0].files[0];
                        data.append("file", files);

                        $.ajax({
                            type:'POST',
                            url: '<?php echo base_url() ?>uploadImage',
                            data: data,
                            contentType: false,
                            processData: false,
                            success: function(result) {
                                if (result=="success") {
                                    parent.location.href = 'configure';
                                } else {
                                    alert("error");
                                }

                            }
                        });
                    } else {
                        alert("Invaild file type! please select an image file.");
                    }

                } else {
                    alert("No file(s) selected.");
                }
            });
            defaultSize(16,24);
        });
         
        function centerSelecter() {
            var image_1 = document.getElementById("uploadImage");
            var rect_1 = image_1.getBoundingClientRect();
            var cx = rect_1.left + rect_1.width * 0.5;
            var cy = rect_1.top + rect_1.height * 0.5;


        }
        //
        // function setDrag() {
        //     $(".fixed-dragger-cropper > img").cropper("setDragMode","move");
        // }

        function btnSelectSize(height,width) {
            // var image_1 = document.getElementById("imageCanvas");
            // var rect_1 = image_1.getBoundingClientRect();
            // var c_width = rect_1.width * 0.5;
            // var c_height = rect_1.height * 0.3;
            // alert(c_width+'_'+c_height);

            // $(".fixed-dragger-cropper > img").cropper("reset");
             $(".fixed-dragger-cropper > img").cropper("setCropBoxData",{width: width * 16, height: height * 16});
            $(".fixed-dragger-cropper > img").cropper("setDragMode", "move");

        }
            
        function defaultSize(height, width) {
            $(".fixed-dragger-cropper > img").cropper({
                data: {
                    x: 0,
                    y: 0,
                    width:width * 16,
                    height:height * 16
                },
                // aspectRatio: width/height,
                preview: ".img-preview",
                done: function(data) {
                    $dataX.val(Math.round(data.x));
                    $dataY.val(Math.round(data.y));
                    $dataHeight.val(Math.round(data.height));
                    $dataWidth.val(Math.round(data.width));
                }
            });
        }


           
    </script>
</body>

</html>