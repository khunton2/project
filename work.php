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
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="GYS.php" class="nav-item nav-link">กยศ</a>
                        <a href="booking.php" class="nav-item nav-link ">บุคลกรไอที</a>
                        <a href="work.php" class="nav-item nav-link active">หางาน</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item"></a>
                                <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                <a href="depression_test.php" class="dropdown-item">แบบประเมินความเครียด</a>
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
    <!-- Search Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="d-inline-block text-primary text-uppercase border-bottom border-5">หางาน จ้างงาน</h1>
                <h5 class="fw-normal">คุณสามารถจ้างงาน หรือรับทำงานได้ที่นี้</h5>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">จ้างงาน</button>


            </div>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <form action="" method="get">
                    <input type="search" name="q" required class="form-control" placeholder="ค้นหางานที่ต้องการ"> <br>
                    <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                    <a href="work.php" class="btn btn-warning">เคลียร์ข้อมูล</a>
                </form>
            </div>

            <?php
            //ถ้ามีการส่ง $_GET['q'] 
            if (isset($_GET['q'])) {
                //คิวรี่ข้อมูลมาแสดงในตาราง
                require_once 'config/db.php';
                //ประกาศตัวแปรรับค่าจากฟอร์ม
                $q = "%{$_GET['q']}%";
                $stmt = $conn->prepare("SELECT * FROM tbl_work WHERE w_name LIKE ?");
                $stmt->execute([$q]);
                $result = $stmt->fetchAll(); //แสดงข้อมูลทั้งหมด

                //ถ้าเจอข้อมูลมากกว่า 0
                if ($stmt->rowCount() > 0) {
            ?>
                    <br>
                    <h3>รายการชื่อหนังที่ค้นพบ </h3>


                    <?php foreach ($result as $row) { ?>
                        <div class="col-xl-4 col-lg-6">
                            <div class="bg-light rounded overflow-hidden">
                                <img src="w_img/<?= $row['img_file']; ?>" width="200px" height="300" alt="">
                                <div class="p-4">
                                    <a class="h3 d-block mb-3" href="detailwork.php?id=<?= $row['id']; ?>"><?= $row['w_name']; ?></a><br>
                                    <a class="h3 d-block mb-3" href="detailwork.php?id=<?= $row['id']; ?>"> </a><br>
                                    <br>
                                    <a href="detailwork.php?id=<?= $row['id']; ?>" class="btn btn-primary">ดูเพิ่มเติม</a>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                    <br>
            <?php } // if ($stmt->rowCount() > 0) {
                else {
                    echo '<center> -ไม่พบข้อมูล !! </center>';
                }
            } //isset 
            ?>

        </div>
    </div>
    <!-- Search End -->

    <!-- Blog Start -->
    <div class="container-fluid py-5">

        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
                <h1 class="display-4">งานทั้งหมด</h1>
            </div>

            <div class="row g-5">
                <?php
                require_once 'config/db.php';
                $stmtPrd = $conn->prepare("SELECT* FROM tbl_work");
                $stmtPrd->execute();
                $rsPrd = $stmtPrd->fetchAll();
                foreach ($rsPrd as $row) {
                ?>
                    <div class="col-xl-4 col-lg-6">
                        <div class="bg-light rounded overflow-hidden">
                            <img src="w_img/<?= $row['img_file']; ?>" width="200px" height="300" alt="">
                            <div class="p-4">
                                <a class="h3 d-block mb-3" href="detailwork.php?id=<?= $row['id']; ?>"><?= $row['w_name']; ?></a><br>
                                <a class="h3 d-block mb-3" href="detailwork.php?id=<?= $row['id']; ?>"> </a><br>
                                <br>
                                <a href="detailwork.php?id=<?= $row['id']; ?>" class="btn btn-primary">ดูเพิ่มเติม</a>
                            </div>

                        </div>
                    </div>

                <?php } ?>
            </div>

        </div>

    </div>
    <!-- Blog End -->

    <!--modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มการว่าจ้างงาน</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ชื่องาน</label>
                            <input type="text" class="form-control" name="w_name" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">รายละเอียด</label>
                            <input type="text" class="form-control" name="w_desc" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">เบอร์โทรติดต่อ</label>
                            <input type="text" class="form-control" name="contact" id="" placeholder="">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">แท็ค</label>
                            <input type="text" class="form-control" name="tag" id="" placeholder="">
                        </div><br>
                        <label for="exampleInputEmail1">ชื่อภาพ</label>
                        <input type="text" name="img_name" required class="form-control" placeholder="ชื่อภาพ"> <br>
                        <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <button type="submit" class="btn btn-success">Upload</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">cancal</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>




    <!-- Footer Start -->

    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">_ khunton_</a>.designer and developer.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">VOKSE <a class="text-primary"></a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


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

<?php

if (isset($_POST['img_name'])) {
    require_once 'config/db.php';
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $img_file = (isset($_POST['img_file']) ? $_POST['img_file'] : '');
    $upload = $_FILES['img_file']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['img_file']['name'], ".");

        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if ($typefile == '.jpg' || $typefile  == '.jpeg' || $typefile  == '.png') {

            //โฟลเดอร์ที่เก็บไฟล์
            $path = "w_img/";
            //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
            $newname = $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            //คัดลอกไฟล์ไปยังโฟลเดอร์
            move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

            //ประกาศตัวแปรรับค่าจากฟอร์ม
            $w_name = $_POST['w_name'];
            $w_desc = $_POST['w_desc'];
            $contact = $_POST['contact'];
            $tag = $_POST['tag'];
            $img_name = $_POST['img_name'];
            $u_id = $_SESSION['u_id'];


            //sql insert
            $stmt = $conn->prepare("INSERT INTO tbl_work (w_name, w_desc,contact,tag,img_name, img_file,u_id)
    VALUES (:w_name, :w_desc,:contact,:tag,:img_name, '$newname',:u_id)");
            $stmt->bindParam(':w_name', $w_name, PDO::PARAM_STR);
            $stmt->bindParam(':w_desc', $w_desc, PDO::PARAM_STR);
            $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
            //     $stmt->bindParam(':u_id',$u_id,PDO::PARAM_STR);
            $stmt->bindParam(':u_id', $_SESSION['u_id']);
            $result = $stmt->execute();
            //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if ($result) {
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดภาพสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "work.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "work.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result


        } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "financial.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์

    } // if($upload !='') {

    $conn = null; //close connect db
} //isset
?>