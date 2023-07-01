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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">






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
                <a href="index.html" class="navbar-brand">
                    <h1 classgrowth="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>
                        vokse</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link ">Home</a>
                        <a href="couple_life.html" class="nav-item nav-link">จิตวิทยาชีวิตคู่</a>
                        <a href="learning.html" class="nav-item nav-link">ต้องเรียนยังไง</a>
                        <a href="financial.html" class="nav-item nav-link active">การเงินมีปัญหา</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
                            <div class="dropdown-menu m-0">
                                <a href="blog.html" class="dropdown-item"></a>
                                <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                <a href="#" class="dropdown-item">ปํญหาวัยรุ่น</a>
                                <a href="#" class="dropdown-item">ฟังก่อนนอน</a>
                                <a href="#" class="dropdown-item">Search</a>
                                <a href="logout.php" class="dropdown-item">ออกจากระบบ</a>
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
           

            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="fw-normal">ค้นหางาน</h5>
            </div>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">

                    <select class="form-select border-primary w-25" style="height: 50px;">
                        <option selected>Department</option>
                        <option value="1">Department 1</option>
                        <option value="2">Department 2</option>
                        <option value="3">Department 3</option>
                    </select>
                    <input type="text" class="form-control border-primary w-50" placeholder="Keyword">
                    <button class="btn btn-dark border-0 w-25">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->
    <!-- Tags Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">Tag Cloud</h4>
            <div class="d-flex flex-wrap m-n1">x
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
    </div>
    <!-- Tags End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
    <?php
                    require_once 'config/db.php';
                    $stmtPrd = $conn->prepare("SELECT* FROM tbl_work");
                    $stmtPrd->execute();
                    $rsPrd = $stmtPrd->fetchAll();
                    foreach ($rsPrd as $row) {
                    ?>
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
                <h1 class="display-4">Our Latest Medical Blog Posts</h1>
            </div>

            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                        <div class="p-4">
                        <a class="h3 d-block mb-3" href="detailfinancial.php?id=<?=$row['id'];?>"><?= $row['name']; ?></a><br>
                            <a class="h3 d-block mb-3" href="detailfinancial.php?id=<?=$row['id'];?>"><?= $row['w_desc']; ?></a><br>
                            <br>
                            <a href="detailfinancial.php?id=<?=$row['id'];?>" class="btn btn-primary">Go somewhere</a>
                        </div>

                    </div>
                </div>
                

            </div>
        </div>
        <?php } ?>
    </div>
    <!-- Blog End -->
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
                        <input type="file" name="img_file" required   class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
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
    $upload=$_FILES['img_file']['name'];

    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['img_file']['name'],".");

    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpg' || $typefile  =='.jpeg' || $typefile  =='.png'){

    //โฟลเดอร์ที่เก็บไฟล์
    $path="w_img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['img_file']['tmp_name'],$path_copy); 

     //ประกาศตัวแปรรับค่าจากฟอร์ม
     $w_name = $_POST['w_name'];
     $w_desc = $_POST['w_desc'];
     $contact = $_POST['contact'];
     $tag = $_POST['tag'];
    $img_name = $_POST['img_name'];
    
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_work (w_name, w_desc,contact,tag,img_name, img_file)
    VALUES (:w_name, :w_desc,:contact,:tag,:img_name, '$newname')");
      $stmt->bindParam(':w_name', $w_name, PDO::PARAM_STR);
      $stmt->bindParam(':w_desc', $w_desc , PDO::PARAM_STR);
      $stmt->bindParam(':contact', $contact , PDO::PARAM_STR);
      $stmt->bindParam(':tag', $tag , PDO::PARAM_STR);
    $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดภาพสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "g.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            }else{
               echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เกิดข้อผิดพลาด",
                          type: "error"
                      }, function() {
                          window.location = "financial.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result

        
        }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
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