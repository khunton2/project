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


                <?php require_once 'navbar/topbar.php' ?>
                <div class="container-fluid">

                    <?php
                    //ถ้ามีการอัพเดทข้อมูล แสดงฟอร์ม
        if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['lo_id'])) {

            //คิวรี่ข้อมูลมาแสดงมาในฟอร์มแบบ single row
            $stmt = $conn->prepare("SELECT * from tbl_booking_location WHERE lo_id=?"
            );
            $stmt->execute([$_GET['lo_id']]);
            $rowJob = $stmt->fetch(PDO::FETCH_ASSOC);
            //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าหลัก
            if ($stmt->rowCount() < 1) {
              header('Location: ad_add_cat.php');
              exit();
            }
          ?>
            <h4>room No. <?= $rowJob['lo_id']; ?></h4>
            <form action="cat_edit_room.php" method="post">
              <div class="mb-2 row">
                
                <div class="col-sm-6">
                  ชื่อสถานที่:
                  <input type="text" name="lo_name" class="form-control" required value="<?= $rowJob['lo_name']; ?>">
                </div>
                
              </div>
              
              <div class="mb-2 row">
                <div class="d-grid gap-2 col-sm-12 mb-3">
                  <input type="hidden" name="lo_id" value="<?= $rowJob['lo_id']; ?>">
                  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                </div>
              </div>
            </form>
          <?php }  ?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTable_booking</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-header">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">เพิ่มการนัด</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <th>no</th>
                                        <th>member</th>
                                        <th width=20%></th>
                                        
                                    </thead>

                                    <tbody>
                                        <?php
                                        //คิวรี่ข้อมูลมาแสดงในตาราง
                                        require_once 'config/db.php';
                                        $stmt = $conn->prepare("SELECT * from tbl_booking_location ");
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        foreach ($result as $k) {
                                        ?>
                                            <tr>
                                                <td><?= $k['lo_id']; ?></td>
                                                <td><?= $k['lo_name']; ?></td>
                                                
                                                <td><a href="ad_add_cat.php?lo_id=<?= $k['lo_id']; ?>&act=edit" class="btn btn-outline-warning">จัดการ</a>
                                                <a href="cat_room_del.php?lo_id=<?= $k['lo_id']; ?>" class="btn btn-outline-danger" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a>
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
    <!--modal addbookimg-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มการนัด</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                            <span class="form-label">ชื่อสถานที่</span>
                            <input type="text" class="form-control" name="lo_name" id="lo_name" placeholder="insert location"><br>
                            <button type="submit" class="btn btn-success">Upload</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">cancal</button>
                    </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['lo_name'])  ){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'config/db.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $lo_name = $_POST['lo_name'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_booking_location (`lo_name`)
    VALUES (:lo_name)");
    $stmt->bindParam(':lo_name', $lo_name, PDO::PARAM_STR);
    $result = $stmt->execute();
     // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "ad_add_cat.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //isset
    ?>