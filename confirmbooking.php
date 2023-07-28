
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
                        <a href="GYS.php" class="nav-item nav-link ">กยศ</a>
                        <a href="booking.php" class="nav-item nav-link active">บุคลกรไอที</a>
                        <a href="work.php" class="nav-item nav-link ">หางาน</a>
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
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10"> <br>

                <!-- DataTales Example -->
                <div class="card shadow mb-6">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTable_booking</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <th>no</th>
                                    <th>member</th>
                                    <th>taecher</th>
                                    <th>conitsu</th>
                                    <th>date</th>
                                    <th>quiz_score</th>
                                    <th>reprot</th>
                                </thead>

                                <tbody>
                                    <?php
                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    require_once 'config/db.php';
                                    $stmt = $conn->prepare("SELECT
                                    tbl_booking.*,
                                    tbl_booking_status.s_name,
                                    tbl_teacher.name as t_name,
                                    tbl_member.name as u_name,
                                    tbl_member.quiz_score
                                  FROM tbl_booking
                                  JOIN tbl_teacher
                                    ON tbl_booking.t_id = tbl_teacher.t_id
                                  JOIN tbl_member
                                    ON tbl_booking.u_id = tbl_member.u_id
                                   JOIN tbl_booking_status
                                    ON tbl_booking.status = tbl_booking_status.status_id");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $k) {
                                    ?>
                                        <tr>
                                            <td><?= $k['id']; ?></td>
                                            <td><?= $k['u_name']; ?></td>
                                            <td><?= $k['t_name']; ?></td>
                                            <td><?= $k['conitsu']; ?></td>
                                            <td><?= $k['d_date']; ?></td>
                                            <td><?= $k['quiz_score']; ?></td>
                                            <td><button type="button" class="btn btn-outline-info">ยืนยัน</button>
                                                <button type="button" class="btn btn-outline-warning">ยกเลิก</button>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <br>


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
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php

// print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
// exit();
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['ref_s_id']) && isset($_POST['detail']) && isset($_POST['no'])) {
    // sweet alert 
    echo '
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    //ไฟล์เชื่อมต่อฐานข้อมูล
    //require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $ref_s_id = $_POST['ref_s_id'];
    $detail = $_POST['detail'];
    $no = $_POST['no'];

    //sql update 
    $stmt = $conn->prepare("
              UPDATE  tbl_jobs SET 
              ref_s_id=:ref_s_id,
              detail=:detail
              WHERE no=:no");

    //brndParam ข้อความทั่วไป = PARAM_STR, ตัวเลข = PARAM_INT
    $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);
    $stmt->bindParam(':no', $no, PDO::PARAM_INT);
    $stmt->bindParam(':ref_s_id', $ref_s_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    $conn = null; //close connect db
    if ($result) {
        echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "ปรับปรุงข้อมูลสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "formUpdateJobs.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "formUpdateJobs.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
    }
} //isset 
?>