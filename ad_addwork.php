<!DOCTYPE html>
<html lang="en">
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

            //sql insert
            $stmt = $conn->prepare("INSERT INTO tbl_work (w_name, w_desc,contact,tag,img_name, img_file)
    VALUES (:w_name, :w_desc,:contact,:tag,:img_name, '$newname')");
            $stmt->bindParam(':w_name', $w_name, PDO::PARAM_STR);
            $stmt->bindParam(':w_desc', $w_desc, PDO::PARAM_STR);
            $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
            $result = $stmt->execute();
            //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if ($result) {
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดภาพสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "financial.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "financial.php"; //หน้าที่ต้องการให้กระโดดไป
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
                              window.location = "admin_work.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์

    } // if($upload !='') {

    $conn = null; //close connect db
} //isset
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Stylesheet -->
    <link href="css/admin.css  " rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"> </script>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require_once 'navbar/navbaradmin.php'; ?>
        <!-- Main content -->
        <main class="py-6 bg-surface-secondary">
            <div class="card">
                <div class="container-fluid">

                    <div class="center">
                        <div class="body">
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
        </main>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <script>
        function goBack() {
            window.history.back();
        }
    </script>

     <!-- Template Javascript -->
     <script src="js/main.js"></script>
</body>

</html>