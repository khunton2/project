<?php 
     
     //เงื่อนตรวจสอบการส่ง method get parameter no 
     if(isset($_GET['id'])){
        require_once 'config/db.php';
      //sql query product detail *คิวรี่แบบ Single row ก็คือแสดงแค่ 1 รายการเท่านั้น
      $stmtPrdD = $conn->prepare("SELECT * FROM tbl_work WHERE id=:id");
      //bindParam str , int
      $stmtPrdD->bindParam(':id', $_GET['id'] , PDO::PARAM_INT);
      $stmtPrdD->execute();
      $row = $stmtPrdD->fetch(PDO::FETCH_ASSOC);

      //แสดงจำนวนการคิวรี่ข้อมูลได้ คิวรี่ได้ต้องได้ 1 
      //echo $stmtPrdD->rowCount(); //เปิดคอมเม้นดูครับ

      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าแสดงสินค้า
      if($stmtPrdD->rowCount() != 1){
          header('Location: financial.php');
          exit();
      }
    }//isset
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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

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


</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i
                                class="bi bi-telephone me-2"></i>1323</a>
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
                        <a class="text-body ps-2" href="login_reg.html">
                            <button type="button" class="btn btn-outline-secondary">login</button>
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
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="GYS.php" class="nav-item nav-link">กยศ</a>
                            <a href="booking.php" class="nav-item nav-link">บุคลกรไอที</a>
                            <a href="work.php" class="nav-item nav-link">หางาน</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item"></a>
                                    <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                    <a href="#" class="dropdown-item">ปํญหาวัยรุ่น</a>
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

    <!-- confirm Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">

                        <h1 class="display-4"><?= $row['w_name']; ?></h1>
                    </div>
                    <h6>รายละเอียดงาน</h6>
                    <p><?= $row['w_desc']; ?></p>
                    <h6>ติดต่อ</h6>
                    <p><?= $row['contact']; ?></p>
                    <a class="btn btn-success rounded-pill py-3 px-5 me-3" href="">confirm</a>
                    <a class="btn btn-outline-danger rounded-pill py-3 px-5" href="financial.php">cancel</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light text-center rounded p-5">
                        <img src="w_img/<?= $row['img_file'];?>" alt="" class="img-fluid rounded">
                        x
                    </div>
                </div>
            </div>
        </div>
        <!-- confirm End -->
        <!-- Tags Start -->
        <div class="container-fluid py-5">
            <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">Tag Cloud</h4>
            <div class="d-flex flex-wrap m-n1">
                <a href="" class="btn btn-primary m-1">Design</a>
                <a href="" class="btn btn-primary m-1">Development</a>
                <a href="" class="btn btn-primary m-1">Marketing</a>
                <a href="" class="btn btn-primary m-1">SEO</a>
                <a href="" class="btn btn-primary m-1">Writing</a>
                <a href="" class="btn btn-primary m-1">Consulting</a>
                <a href="" class="btn btn-primary m-1">Design</a>
                <a href="" class="btn btn-primary m-1">Development</a>
                <a href="" class="btn btn-primary m-1">Marketing</a>
                <a href="" class="btn btn-primary m-1">SEO</a>
                <a href="" class="btn btn-primary m-1">Writing</a>
                <a href="" class="btn btn-primary m-1">Consulting</a>
            </div>
        </div>
        <!-- Tags End -->




     

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