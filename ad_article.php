<?php session_start();
require_once 'config/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin vokse</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'navbar/nav.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <?php require_once 'navbar/topbar.php'; ?>
                <div class="container-fluid">

                    <?php
                    //ถ้ามีการอัพเดทข้อมูล แสดงฟอร์ม
                    if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['id'])) {

                        //คิวรี่ข้อมูลมาแสดงมาในฟอร์มแบบ single row
                        $stmt = $conn->prepare(
                            "
            SELECT * from
            tbl_article
              WHERE id=?"
                        );
                        $stmt->execute([$_GET['id']]);
                        $rowJob = $stmt->fetch(PDO::FETCH_ASSOC);
                        //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าหลัก
                        if ($stmt->rowCount() < 1) {
                            header('Location: ad_work.php');
                            exit();
                        }
                    ?>
                        <h4>Job No. <?= $rowJob['id']; ?></h4>
                        <form action="ad_edit_work.php" method="post">
                            <div class="mb-2 row">

                                <div class="col-sm-6">
                                    ชื่อผู้เพิ่ม:
                                    <input type="text" name="title" class="form-control" required value="<?= $_SESSION['name'] ?>">
                                </div>

                                <div class="col-sm-6">
                                    หัวข้อหลัก:
                                    <input type="text" name="title" class="form-control" required value="<?= $rowJob['title']; ?>">
                                </div>

                                <div class="col-sm-6">
                                    หัวข้อรอง:
                                    <input type="text" name="titledetail" class="form-control" required value="<?= $rowJob['titledetail']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    ส่วนขยาย:
                                    <textarea class="form-control" name="detail" required><?= $rowJob['content']; ?></textarea>
                                </div>

                                <div class="col-sm-6">
                                    เนื้อหาย่อย1:
                                    <input type="text" name="tag" class="form-control" required value="<?= $rowJob['title2']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    ส่วนขยาย1:
                                    <textarea class="form-control" name="detail" required><?= $rowJob['content2']; ?></textarea>
                                </div>
                                <div class="col-sm-6">
                                    เนื้อหาย่อย2:
                                    <input type="text" name="tag" class="form-control" required value="<?= $rowJob['title3']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    ส่วนขยาย2:
                                    <textarea class="form-control" name="detail" required><?= $rowJob['content3']; ?></textarea>
                                </div>
                                <div class="col-sm-6">
                                    ลิงค์:
                                    <input type="text" name="link" class="form-control" required value="<?= $rowJob['link']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    แทค
                                    <select name="status" class="form-control" required>

                                        <?php
                                        //คิวรี่ข้อมูลตำแหน่ง เพื่อมาแสดงใน select/option
                                        $stmtstatus = $conn->prepare("SELECT* FROM tbl_article_type");
                                        $stmtstatus->execute();
                                        $result = $stmtstatus->fetchAll();
                                        foreach ($result as $row) {
                                        ?>
                                            <option value="<?= $row['type_id']; ?>">-<?= $row['type_name']; ?></option>
                                        <?php } ?>
                                    </select>
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



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTable_adticle</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">เพิ่มบทความ</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>id</th>
                                            <th>หัวข้อ</th>
                                            <th>รายละเอียด</th>
                                            <th>แท็ค</th>
                                            <th width="20%"></th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody> <?php
                                            //คิวรี่ข้อมูลมาแสดงในตาราง
                                            require_once 'config/db.php';
                                            $stmt = $conn->prepare("SELECT* FROM tbl_article JOIN tbl_article_type ON tbl_article.tag = tbl_article_type.type_id");
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $k) {
                                            ?>
                                            <tr>

                                                <td><?= $k['id']; ?></td>
                                                <td><?= $k['title']; ?></td>
                                                <td><?= $k['titledetail']; ?></td>
                                                <td><?= $k['type_name']; ?></td>
                                                <td>
                                                    <a href="ad_article.php?id=<?= $k['id']; ?>&act=edit" class="btn btn-outline-warning">จัดการ</a>
                                                    <a href="ad_delete_article.php?id=<?= $k['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!--modal addwork-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มบทความ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">หัวข้อใหญ่</label>
                                    <input type="text" class="form-control" name="title" id="" placeholder="">

                                    <label for="exampleInputEmail1">รายละเอียด</label>
                                    <input type="text" class="form-control" name="titledetail" id="" placeholder="">
                                     
                                    <label for="exampleInputEmail1">ส่วนขยาย</label>
                                    <font color="red">ไม่มีใส่ - </font>
                                    <input type="text" class="form-control" name="content" id="" placeholder="">
                                     
                                    <label for="exampleInputEmail1">เนื้อหาย่อย1</label>
                                    <font color="red">ไม่มีใส่ - </font>
                                    <input type="text" class="form-control" name="title2" id="" placeholder="">
                                     
                                    <label for="exampleInputEmail1">เนื้อหาย่อย1</label>
                                    <font color="red">ไม่มีใส่ - </font>
                                    <input type="text" class="form-control" name="content2" id="" placeholder="">
                                     
                                    <label for="exampleInputEmail1">เนื้อหาย่อย1</label>
                                    <font color="red">ไม่มีใส่ - </font>
                                    <input type="text" class="form-control" name="title3" id="" placeholder="">
                                     
                                    <label for="exampleInputEmail1">เนื้อหาย่อย1</label>
                                    <font color="red">ไม่มีใส่ - </font>
                                    <input type="text" class="form-control" name="content3" id="" placeholder="">
                                    
                                    <label for="exampleInputEmail1">ลิงค์คลิป</label>
                                    <font color="red">ไม่มีใส่ - </font>
                                    <input type="text" class="form-control" name="link" id="" placeholder="">
                                </div>
                                <label for="exampleInputEmail1">ชื่อภาพ</label>
                                <font color="red">ไม่มีใส่ - </font>
                                <input type="text" name="img_name" required class="form-control" placeholder="ชื่อภาพ">
                                <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                                <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg">

                                <span class="form-label">แท็ค</span>
                                <select class="form-control" name="tag" id="tag" required>

                                    <?php
                                    require_once 'config/db.php';
                                    $stmtPrd = $conn->prepare("SELECT *,tbl_article_type.type_name as type_name FROM `tbl_article` JOIN tbl_article_type on tbl_article.tag = tbl_article_type.type_id");
                                    $stmtPrd->execute();
                                    $rsPrd = $stmtPrd->fetchAll();
                                    foreach ($rsPrd as $row) {
                                    ?>
                                        <option><?= $row['tag']; ?>-<?= $row['type_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-success">Upload</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">cancal</button>


                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">'

</body>

</html>
<?php
print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 

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
            $path = "img/";
            //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
            $newname = $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            //คัดลอกไฟล์ไปยังโฟลเดอร์
            move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

            //ประกาศตัวแปรรับค่าจากฟอร์ม
            $title = $_POST['title'];
            $titledetail = $_POST['titledetail'];
            $content = $_POST['content'];
            $title2 = $_POST['title2'];
            $content2 = $_POST['content2'];
            $title3 = $_POST['title3'];
            $content3 = $_POST['content3'];
            $link = $_POST['link'];
            $tag = $_POST['tag'];
            $img_name = $_POST['img_name'];



            //sql insert
            $stmt = $conn->prepare("INSERT INTO tbl_article (title, titledetail,content,title2,content2,title3,content3,link,img_name, img_file,tag)
    VALUES (:title, :titledetail,:content,:title2,:content2,:title3,:content3,:link,:img_name, '$newname',:tag)");
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':titledetail', $titledetail, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':title2', $title2, PDO::PARAM_STR);
            $stmt->bindParam(':content2', $content2, PDO::PARAM_STR);
            $stmt->bindParam(':title3', $title3, PDO::PARAM_STR);
            $stmt->bindParam(':content3', $content3, PDO::PARAM_STR);
            $stmt->bindParam(':link', $link, PDO::PARAM_STR);
            $stmt->bindParam(':img_name', $img_name, PDO::PARAM_STR);
            $stmt->bindParam(':tag', $tag, PDO::PARAM_STR);
            $result = $stmt->execute();
            //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if ($result) {
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดภาพสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "ad_article.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "ad_article.php"; //หน้าที่ต้องการให้กระโดดไป
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
                              window.location = "ad_article.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์

    } // if($upload !='') {

    $conn = null; //close connect db
} //isset
?>