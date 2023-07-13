<!DOCTYPE html>
<html lang="en">

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />



    <title>admin</title>
</head>

<body>

    </a>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require_once 'navbar/navbaradmin.php'; ?>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php require_once 'navbar/Header.php' ?>

            <main class="py-6 bg-surface-secondary">
                <div class="card">
                    <div class="container-fluid">

                        <div class="row g-6 mb-6">
                            <table id="example" class="display" cellspacing="0">
                                <!--ส่วนหัว-->
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>member</th>
                                        <th>taecher</th>
                                        <th>เรื่องที่ปรึกษา</th>
                                        <th>reprot</th>



                                    </tr>
                                </thead>

                                <!-- ส่วนท้าย -->
                                <tfoot>
                                    <tr>
                                        <th>นิสิต</th>
                                        <th>อาจารย์</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>-</th>

                                    </tr>
                                </tfoot>
                                <!--ส่วนเนื้อหา -->
                                <tbody>
                                    
                                <?php
                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    require_once 'config/db.php';
                                    $stmt = $conn->prepare("SELECT * FROM tbl_booking");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $k) {
                                    ?>

                                        <td><?= $k['u_id']; ?></td>
                                        <td><?= $k['t_id']; ?></td>
                                        <td><?= $k['d_date']; ?></td>
                                        <td><?= $k['time']; ?></td>
                                        <td><button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">view</button>
                                            <button type="button" class="btn btn-outline-warning">edit</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
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
                              window.location = "financial.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์

    } // if($upload !='') {

    $conn = null; //close connect db
} //isset
?>
</body>

</html>