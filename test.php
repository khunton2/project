<?php
//ไฟล์เชื่อมต่อฐานข้อมูล
require_once 'config/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
  
  <title>Basic PHP PDO ระบบเพิ่มปรับปรุงสถานะ</title>
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
        <h5>ex testtable</h5>
        <?php
        //ถ้ามีการอัพเดทข้อมูล แสดงฟอร์ม
        if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['id'])) {

          //คิวรี่ข้อมูลมาแสดงมาในฟอร์มแบบ single row
          $stmt = $conn->prepare(
            "
            SELECT
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
            ON tbl_booking.status = tbl_booking_status.status_id
              WHERE id=?"
          );
          $stmt->execute([$_GET['id']]);
          $rowJob = $stmt->fetch(PDO::FETCH_ASSOC);
          //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าหลัก
          if ($stmt->rowCount() < 1) {
            header('Location: test.php');
            exit();
          }
        ?>
          <h4>Job No. <?= $rowJob['id']; ?></h4>
          <form action="" method="post">
            <div class="mb-2 row">
              <div class="col-sm-6">
                สถานะ
                <select name="status" class="form-control" required>
                  <option value="<?= $rowJob['status']; ?>"> สถานะปัจจุบัน : <?= $rowJob['s_name']; ?></option>
                  <option disabled>-เปลี่ยนสถานะ-</option>
                  <?php
                  //คิวรี่ข้อมูลตำแหน่ง เพื่อมาแสดงใน select/option
                  $stmtstatus = $conn->prepare("SELECT* FROM tbl_booking_status");
                  $stmtstatus->execute();
                  $result = $stmtstatus->fetchAll();
                  foreach ($result as $row) {
                  ?>
                    <option value="<?= $row['status_id']; ?>">-<?= $row['s_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                ชื่อเรื่อง:
                <input type="text" name="consult" class="form-control" required value="<?= $rowJob['consult']; ?>">
              </div>
              <div class="col-sm-6">
                ชื่ออาจารย์ที่รับคำปรึกษา:
                <select name="t_id" class="form-control" required>
                  <option value="<?= $rowJob['t_id']; ?>"> ชื่ออาจารย์ : <?= $rowJob['t_name']; ?></option>
                  <option disabled>-เปลี่ยนที่ปรึกษา-</option>
                  <?php
                  //คิวรี่ข้อมูลตำแหน่ง เพื่อมาแสดงใน select/option
                  $stmtstatus = $conn->prepare("SELECT* FROM tbl_teacher");
                  $stmtstatus->execute();
                  $result = $stmtstatus->fetchAll();
                  foreach ($result as $row) {
                  ?>
                    <option value="<?= $row['t_id']; ?>">-<?= $row['name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6">
                วันที่:
                <input type="text" name="date" class="form-control" required value="<?= $rowJob['date']; ?>">
              </div>
              <div class="col-sm-6">
                เวลา:
                <input type="text" name="time" class="form-control" required value="<?= $rowJob['time']; ?>">
              </div>
              <div class="col-sm-6">
                สถานที่:
                <input type="text" name="location" class="form-control" required value="<?= $rowJob['location']; ?>">
              </div>
            </div>
            <div class="mb-2 row">
              <div class="col-sm-12">
                รายละเอียด :
                <textarea class="form-control" name="detail" required><?= $rowJob['detail']; ?></textarea>
              </div>
            </div>
            <div class="mb-2 row">
              <div class="d-grid gap-2 col-sm-12 mb-3">
                <input type="hidden" name="id" value="<?= $rowJob['id']; ?>">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
              </div>
            </div>
          </form>
        <?php }  ?>

        <h5>test</h5>
        <table class="table table-striped  table-hover table-responsive table-bordered">
          <thead>
            <tr>
              <th width="5%">ลำดับ</th>
              <th width="20%">สถานะ</th>
              <th width="65%">รายละเอียด</th>
              <th width="10%">จัดการ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stmJobs = $conn->prepare("
                            SELECT
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
            $stmJobs->execute();
            $resultEmp = $stmJobs->fetchAll();
            foreach ($resultEmp as $rowEmp) {
            ?>
              <tr>
                <td align="center"><?= $rowEmp['id']; ?></td>
                <td><?= $rowEmp['s_name']; ?></td>
                <td>
                  <b><?= $rowEmp['consult']; ?></b> <br>
                  ว/ด/ป เวลาที่แจ้ง : <?= $rowEmp['date']; ?>
                </td>
                <td>
                  <!--ส่งไป 2 พารามิเตอร์ ไอดีที่จะส่งไปแก้ไข และ act=edit เพื่อเรียกฟอร์มมาแสดง -->
                  <a href="test.php?id=<?= $rowEmp['id']; ?>&act=edit" class="btn btn-danger btn-sm">จัดการ</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>
<?php
//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//exit();
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['status']) && isset($_POST['consult'])  && isset($_POST['t_id'])  && isset($_POST['date'])  && isset($_POST['time'])  && isset($_POST['location'])  && isset($_POST['detail']) && isset($_POST['id'])) {
  // sweet alert 
  echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  //ไฟล์เชื่อมต่อฐานข้อมูล
  //require_once 'connect.php';
  //ประกาศตัวแปรรับค่าจากฟอร์ม
  $status = $_POST['status'];
  $consult = $_POST['consult'];
  $t_id = $_POST['t_id'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $location = $_POST['location'];
  $detail = $_POST['detail'];
  $id = $_POST['id'];

  //sql update 
  $stmt = $conn->prepare("
                UPDATE  tbl_booking SET 
                status=:status,
                consult=:consult,
                t_id=:t_id,
                date=:date,
                time=:time,
                location=:location,
                detail=:detail
                WHERE id=:id");

  //brndParam ข้อความทั่วไป = PARAM_STR, ตัวเลข = PARAM_INT
  $stmt->bindParam(':consult', $consult, PDO::PARAM_STR);
  $stmt->bindParam(':t_id', $t_id, PDO::PARAM_INT);
  $stmt->bindParam(':consult', $consult, PDO::PARAM_STR);
  $stmt->bindParam(':date', $date, PDO::PARAM_STR);
  $stmt->bindParam(':time', $time, PDO::PARAM_STR);
  $stmt->bindParam(':location', $location, PDO::PARAM_STR);
  $stmt->bindParam(':detail',$location,PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->bindParam(':status', $status, PDO::PARAM_INT);
  $result = $stmt->execute();
  $conn = null; //close connect db
  if ($result) {
    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ปรับปรุงข้อมูลสำเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "test.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "test.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
  }
} //isset 

?>