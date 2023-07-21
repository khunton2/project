<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if (empty($_SESSION['id']) && empty($_SESSION['name'])) {
    echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้กรุณาเข้าสู่ระบบ",
                
                type: "error"
                }, function() {
                window.location = "login_reg.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VOKSE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--  Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v17.0" nonce="KJSfgxO1"></script>


</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>1323</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>see
                            you soon</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="text-body ps-2"> สวัสดีคุณ <?= $_SESSION['name'] ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <h1 classgrowth="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>
                        vokse</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="GYS.php" class="nav-item nav-link">กยศ</a>
                        <a href="booking.php" class="nav-item nav-link">บุคลกรไอที</a>
                        <a href="work.php" class="nav-item nav-link">หางาน</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item"></a>
                                <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                <a href="depression_test.php" class="dropdown-item">แบบประเมินความเครียด</a>
                                <a href="#" class="dropdown-item">ฟังก่อนนอน</a>
                                <a href="#" class="dropdown-item">ว่าจะใส่อะไรสักอย่าง</a>
                                <a href="#" class="dropdown-item">Search</a>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">กยศ</h5>
                <h1 class="display-4">ข่าวประชาสัมพันธ์</h1>
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">ติดต่อและรับข่าวสาร</button>
            </div>
            <br>

            <div class="row g-5">
                <?php
                require_once 'config/db.php';
                $stmtPrd = $conn->prepare("SELECT* FROM tbl_gys");
                $stmtPrd->execute();
                $rsPrd = $stmtPrd->fetchAll();
                foreach ($rsPrd as $row) {
                ?>
                    <div class="col-xl-4 col-lg-6">
                        <div class="bg-light rounded overflow-hidden">
                            <!--รูปภาพ ยังไม่ใส่-->
                            <div class="p-4">
                                <a class="h3 d-block mb-3" href="detailGYS.php?id=<?= $row['id']; ?>"><?= $row['name']; ?></a>
                                <p class="m-0"><?= $row['gys_desc']; ?></p>
                            </div>
                            <div class="d-flex justify-content-between border-top p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25" alt="">
                                    <small><?= $row['t_id']; ?></small>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <br>

            </div>
            <div class="row g-5">

                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/GYS_logo.png" alt="">
                        <div class="p-4">

                            <a class="h3 d-block mb-3" href="https://wsa.dsl.studentloan.or.th/#/rms/rms-login">ลงทะเบียน</a><br>
                            </a>
                            <p class="m-0">ลงทะเบียนกยศ ผ่านเว็บ dsl </p>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/GYS_logo.png" alt="">
                        <div class="p-4">

                            <a class="h3 d-block mb-3" href="https://elearning.set.or.th/SETStudentLoan">เก็บชั่วโมงกยศ</a><br>
                            </a>
                            <p class="m-0">เก็บชั่วโมงจิตกยศ ออนไลน์ ผ่านเว็บ E-learning.</p>
                        </div>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/GYS_logo.png" alt="">
                        <div class="p-4">

                            <a class="h3 d-block mb-3" href="https://www.studentloan.or.th/th/knowledgemedia/1623312446">การใช้งาน กยศ. Connect</a><br>
                            </a>
                            <p class="m-0">กยศ. Connect คือ แอปที่ใช้อำนวยความสะดวกสำหรับผู้กู้กยศ</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <!--offcanva-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">ช่องทางรับข่าวสารหลัก</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <div class="card" style="width: auto;">
                    <img src="img/qr_group.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p>เข้าร่วมกลุ่ม งานกิจการนิสิต คณะวิทยาการสารสนเทศ เพื่อรับข่าวสาร กยศ ภายในคณะวิทยาการสารสนเทศ</p>
                        <a href="https://www.facebook.com/groups/it.studentloan" class="btn btn-primary">เข้าร่วมกล่ม</a>
                    </div>
                </div><br><br>
                <div class="card" style="width:auto;">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FITMSUCenter&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>

            </div>
        </div>

        <!--    
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                   
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSAmahasarakhamUniversity&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>
            </div>
        </div> -->



        <br>



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>


</body>

</html>