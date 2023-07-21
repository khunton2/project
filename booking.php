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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--  Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


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
                            <i class="bi bi-envelope"></i>
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
                        </a>
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
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="GYS.php" class="nav-item nav-link">กยศ</a>
                        <a href="booking.php" class="nav-item nav-link active">บุคลกรไอที</a>
                        <a href="work.php" class="nav-item nav-link">หางาน</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item"></a>
                                <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                <a href="#" class="dropdown-item">ปํญหาวัยรุ่น</a>
                                <a href="#" class="dropdown-item">ฟังก่อนนอน</a>
                                <a href="logout.php" class="dropdown-item">ออกจากระบบ</a>
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
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">รายชื่ออาจารย์-ที่ปรึกษา
                </h5>
                <h1 class="display-4">หัวหน้าภาควิชา</h1>
            </div>


            <div class="row g-5">
                <?php
                require_once 'config/db.php';
                $stmtPrd = $conn->prepare("SELECT * FROM tbl_teacher WHERE t_id= 13");
                $stmtPrd->execute();
                $rsPrd = $stmtPrd->fetchAll();
                foreach ($rsPrd as $row) {
                ?>
                    <div class="col-xl-4 col-lg-6">

                        <div class="team-item">

                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="t_img/<?= $row['t_img']; ?>" style="object-fit: auto ;  ">


                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3><?= $row['name']; ?></h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4"><?= $row['Position']; ?></h6>
                                        <p class="m-0">รายวิชาที่สอน</p>
                                        <p class="m-0">- ปราบผี</p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" data-toggle="popover" title="<?= $row['email']; ?>"><i class="bi bi-envelope"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" data-toggle="popover" title="<?= $row['tel']; ?>"><i class="bi bi-telephone-fill"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-calendar-check"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>

            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">รายชื่ออาจารย์-ที่ปรึกษา
                </h5>
                <h1 class="display-6">อาจารย์ประจำภาคเทคโนโลยีสารสนเทศ</h1>
            </div>

            <div class="row g-5">
                <?php
                require_once 'config/db.php';
                $stmtPrd = $conn->prepare("SELECT* FROM tbl_teacher");
                $stmtPrd->execute();
                $rsPrd = $stmtPrd->fetchAll();
                foreach ($rsPrd as $row) {
                ?>
                    <div class="col-xl-4 col-lg-6">

                        <div class="team-item">

                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100" src="t_img/<?= $row['t_img']; ?>" style="object-fit: auto ;  ">


                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3><?= $row['name']; ?></h3>
                                        <h6 class="fw-normal fst-italic text-primary mb-4"><?= $row['Position']; ?></h6>
                                        <p class="m-0">รายวิชาที่สอน</p>
                                        <p class="m-0">- ปราบผี</p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" data-toggle="popover" title="<?= $row['email']; ?>"><i class="bi bi-envelope"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" data-toggle="popover" title="<?= $row['tel']; ?>"><i class="bi bi-telephone-fill"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-calendar-check"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>

            </div>
            <br>
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">บุลลากรที่ปรึกษาประจำสาขา
                </h5>
                <h1 class="display-4">เลขา</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="t_img/team-1.jpg" style="object-fit: cover;">

                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3>อาจารย์ คง</h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4">ตำแหน่ง</h6>
                                    <p class="m-0">รายวิชาที่สอน</p>
                                    <p class="m-0">- ปราบผี</p>
                                </div>
                                <div class="d-flex mt-auto border-top p-4">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="bi bi-envelope"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="bi bi-telephone-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="t_img/team-1.jpg" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3>อาจารย์ คง</h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4">ตำแหน่ง</h6>
                                    <p class="m-0">รายวิชาที่สอน</p>
                                    <p class="m-0">- ปราบผี</p>
                                </div>
                                <div class="d-flex mt-auto border-top p-4">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="bi bi-envelope"></i></a>

                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="bi bi-telephone-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">เจ้าหนา้ที่กยศ
                </h5>
                <h1 class="display-4">เจ้าหนี้</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="t_img/team-1.jpg" style="object-fit: cover;">

                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3>อาจารย์ คง</h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4">ตำแหน่ง</h6>
                                    <p class="m-0">รายวิชาที่สอน</p>
                                    <p class="m-0">- ปราบผี</p>
                                </div>
                                <div class="d-flex mt-auto border-top p-4">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="bi bi-envelope"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="bi bi-telephone-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="t_img/team-1.jpg" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3>อาจารย์ คง</h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4">ตำแหน่ง</h6>
                                    <p class="m-0">รายวิชาที่สอน</p>
                                    <p class="m-0">- ปราบผี</p>
                                </div>
                                <div class="d-flex mt-auto border-top p-4">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="bi bi-envelope"></i></a>

                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="bi bi-telephone-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- Blog End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">บทความของเรา</h5>
                <h1 class="display-4">หัวข้อที่เราอยากแนะนำ</h1>
            </div>



            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="detail.html">Dolor clita vero elitr sea stet dolor justo
                                diam</a>
                            <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                rebum clita rebum dolor stet amet justo</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="detail.html">Dolor clita vero elitr sea stet dolor justo
                                diam</a>
                            <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                rebum clita rebum dolor stet amet justo</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="detail.html">Dolor clita vero elitr sea stet dolor justo
                                diam</a>
                            <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                rebum clita rebum dolor stet amet justo</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="detail.html">Dolor clita vero elitr sea stet dolor justo
                                diam</a>
                            <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                rebum clita rebum dolor stet amet justo</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="detail.html">Dolor clita vero elitr sea stet dolor justo
                                diam</a>
                            <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                rebum clita rebum dolor stet amet justo</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="detail.html">Dolor clita vero elitr sea stet dolor justo
                                diam</a>
                            <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                rebum clita rebum dolor stet amet justo</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Blog End -->

    <!-- modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">จองคิวเพื่อเข้าปรึกษา</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <span class="form-label">เลือกเรื่องที่ต้องการจะปรึกษา</span>
                            <select class="form-control" name="consuit" required>
                                <option value="" selected hidden>ต้องการจะปรึกษาอะไร</option>
                                <option>การเรียน</option>
                                <option>ความรัก</option>
                                <option>การเงิน</option>
                            </select>
                            <span class="select-arrow"></span>

                        </div>
                        <br>

                       

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                        <span class="form-label">เลือกวันที่ต้องการนัด</span>
                                        <input class="form-control" type="date" name="d_date" required>
                                    
                                    
                                </div>
                                <div class="col-md-6">
                                    <span class="form-label">เลือกเวลา</span>
                                    <input class="form-control" type="time" name="time" required>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <span class="form-label">สถานที่นัดพบ</span>
                                <select class="form-control" required name="l_location">
                                    <option value="" selected hidden>สถานที่นัดพบ</option>
                                    <option>ห้องพักอาจารย์</option>
                                    <option>สถานที่อื่น</option>
                                </select>


                            </div><br>

                            <button type="submit" class="btn btn-primary" id=<?= $row['t_id']; ?> <?= $_SESSION['u_id'] ?>>send</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--end modal-->

    <!-- modal Start -->
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--end modal-->



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
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>

</html>

<?php
   echo '<pre>';
       print_r($_POST);
 echo '</pre>';
 exit();
//ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
if (isset($_POST['consuit']) && isset($_POST['d_date']) && isset($_POST['time']) && isset($_POST['l_location'])  && isset($_POST['t_id']) && isset($_POST['u_id']) ) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'config/db.php';
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_booking
  (
    conitsu, d_date, time, l_location, t_id, u_id
  )
  VALUES
  (
  :conitsu,:d_date,:time, :l_location,:t_id,:u_id
  )
  ");
    //bindParam data type
    $stmt->bindParam(':conitsu', $_POST['conitsu'], PDO::PARAM_STR);
    $stmt->bindParam(':d_date', $_POST['d_date'], PDO::PARAM_STR);
    $stmt->bindParam(':time', $_POST['time'], PDO::PARAM_STR);
    $stmt->bindParam(':l_location', $_POST['l_location'], PDO::PARAM_STR);
    $stmt->bindParam(':t_id', $_POST['t_id'], PDO::PARAM_STR);
    $stmt->bindParam(':u_id', $_POST['u_id'], PDO::PARAM_STR);
    $result = $stmt->execute();
    $conn = null; //close connect db
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
    if ($result) {
        echo '<script>
    setTimeout(function() {
      swal({
      title: "เพิ่มข้อมูลสำเร็จ",
      type: "success"
      }, function() {
      window.location = "formAddUniversity.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
    } else {
        echo '<script>
    setTimeout(function() {
      swal({
      title: "เกิดข้อผิดพลาด",
      type: "error"
      }, function() {
      window.location = "formAddUniversity.php"; //หน้าที่ต้องการให้กระโดดไป
      });
    }, 1000);
  </script>';
    } //else ของ if result

} //isse