<?php
session_start();

//เงื่อนตรวจสอบการส่ง method get parameter no 
if (isset($_GET['id'])) {
  require_once 'config/db.php';
  //sql query product detail *คิวรี่แบบ Single row ก็คือแสดงแค่ 1 รายการเท่านั้น
  $stmtPrdD = $conn->prepare("SELECT *
    FROM tbl_teacher
    WHERE t_id=:id");
  //bindParam str , int
  $stmtPrdD->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmtPrdD->execute();
  $row = $stmtPrdD->fetch(PDO::FETCH_ASSOC);

  //แสดงจำนวนการคิวรี่ข้อมูลได้ คิวรี่ได้ต้องได้ 1 
  //echo $stmtPrdD->rowCount(); //เปิดคอมเม้นดูครับ

  //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าแสดงสินค้า
  if ($stmtPrdD->rowCount() != 1) {
    header('Location: financial.php');
    exit();
  }
} //isset
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
  <link href="css/g.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


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
  <div class="container-fluid py-5">
    <div class="container">
      <div class="mx-auto" style="width: 100%; max-width: 600px;">

        <div class="card">
          <div class="card-header">
            รับคำปรึกษา
          </div>
          <div class="card-body">

            <form id="myForm">
              <div class="msg"></div>
              <h2>ยืนยันการส่ง</h2>

              <span class="form-label">ชื่อของคุณ</span>
              <select class="form-control" name="email" id="u_id" required>
                <option value="" selected hidden>ชื่อของคุณ</option>
                <option><?= $_SESSION['name'] ?></option>
              </select>
              <input type="hidden" id="quiz_score" name="quiz_score" value="15">
              <span class="form-label">เจ้าของงาน</span>
              <select class="form-control" name="email" id="email" required>
                <option value="" selected hidden>ส่งไปยังเจ้าของงาน</option>
                <option><?= $row['email']; ?></option>
              </select>
              <span class="select-arrow"></span><br>
              <span>เบอร์โทรศัพท์</span>
              <div class="form-control">
                <input id="detail" class="text" placeholder="insert tel"></input>
              </div>
              
                <span class="form-label">เลือกเรื่องที่ต้องการจะปรึกษา</span>
                <select class="form-control" name="consuit" id="consuit" required>
                  <option value="" selected hidden>ต้องการจะปรึกษาอะไร</option>
                  <option>การเรียน</option>
                  <option>ความรัก</option>
                  <option>การเงิน</option>
                </select>
                <span class="select-arrow"></span>
             
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <span class="form-label">เลือกวันที่ต้องการนัด</span>
                    <input class="form-control" type="date" name="d_date" id="date" required>
                  </div>
                  <div class="col-md-6">
                    <span class="form-label">เลือกเวลา</span>
                    <input class="form-control" type="time" name="time" id="time" required>
                  </div>
                </div><br>
                
                  <span class="form-label">สถานที่นัดพบ</span>
                  <select class="form-control" required name="l_location" id="location">
                    <option value="" selected hidden>สถานที่นัดพบ</option>
                    <option>ห้องพักอาจารย์</option>
                    <option>สถานที่อื่น</option>
                  </select>
                
                <br>
                <button type="button" onclick="sendEmail()" value="Send an email" class="btn btn-success rounded-pill py-3 px-5">Send</button>
                <a class="btn btn-outline-danger rounded-pill py-3 px-5" onclick="goBack()">cancel</a>
              </div>
            </form>
          </div>
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
  <!-- Back to page -->
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
  <script type="text/javascript">
    function sendEmail() {

      var email = $("#email");
      var detail = $("#detail");
      var consuit = $("#consuit");
      var date = $("#date");
      var time = $("#time");
      var location = $("#location");
      var u_id = $("#u_id");
      var quiz_score = $("#quiz_score");


      if (isNotEmpty(email) && isNotEmpty(detail) && isNotEmpty(consuit) && isNotEmpty(date) && isNotEmpty(time) && isNotEmpty(location) && isNotEmpty(u_id) && isNotEmpty(quiz_score)) {
        $.ajax({
          url: 'sendEmail.php',
          method: 'POST',
          dataType: 'json',
          data: {
            email: email.val(),
            detail: detail.val(),
            consuit: consuit.val(),
            date: date.val(),
            time: time.val(),
            location: location.val(),
            u_id: u_id.val(),
            quiz_score: quiz_score.val()

          },
          success: function(response) {
            // $('#myForm')[0].reset();
            // $('.msg').text("Message send successfully");
            console.log('.post');
            swal("ส่งสำเร็จ", "กรุณารอการติดต่อกลับ", "success")
          },
          eror: function(response) {
            console.log('.erroe');
            swal("เกิดข้อผิดพลาด", "กรุณาติดต่อเจ้าหน้าที่", "error")
          }
        });
      }
    }

    function isNotEmpty(caller) {
      if (caller.val() == "") {
        caller.css('border', '1px solid red');
        return false;
      } else caller.css('border', '');

      return true;
    }
  </script>



</body>

</html>