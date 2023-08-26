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
                        <h4>booking No. <?= $rowJob['id']; ?></h4>
                        <form action="ad_edit_booking.php" method="post">
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
                                        <th>taecher</th>
                                        <th>conitsu</th>
                                        <th>date</th>
                                        <th>quiz_score</th>
                                        <th>status</th>
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
                                                <td><?= $k['consult']; ?></td>
                                                <td><?= $k['date']; ?></td>
                                                <td><?= $k['quiz_score']; ?></td>
                                                <td><?= $k['s_name']; ?></td>
                                                <td><a href="ad_booking.php?id=<?= $k['id']; ?>&act=edit" class="btn btn-outline-warning">จัดการ</a>
                                                    <a href="ad_delete_booking.php?id=<?= $k['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a>
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

                        <span class="form-label">ชื่อของสมาชิก</span>
                        <select class="form-control" name="u_id" id="u_id" required>
                            
                            <?php
                            require_once 'config/db.php';
                            $stmtPrd = $conn->prepare("SELECT *,tbl_member.name as membername FROM tbl_member");
                            $stmtPrd->execute();
                            $rsPrd = $stmtPrd->fetchAll();
                            foreach ($rsPrd as $row) {
                            ?>
                                <option><?=$row['u_id'];?>-<?= $row['membername']; ?></option>
                            <?php } ?>
                        </select>
                        
                        <span class="form-label">ชื่อของอาจารย์</span>
                        <select class="form-control" name="t_id" id="t_id" required>
                            
                            <?php
                            require_once 'config/db.php';
                            $stmtPrd = $conn->prepare("SELECT *,tbl_teacher.name as teachername FROM tbl_teacher");
                            $stmtPrd->execute();
                            $rsPrd = $stmtPrd->fetchAll();
                            foreach ($rsPrd as $row) {
                            ?>
                                <option><?=$row['t_id'];?>-<?= $row['teachername']; ?></option>
                            <?php } ?>
                        </select>
                        <!-- <span class="select-arrow"></span><br>
                        <label for="exampleInputEmail1">เบอร์โทรติดต่อ</label>
                        <input type="text" class="form-control" name="contact" id="" placeholder="">  detail -->

                        <span class="form-label">เลือกเรื่องที่ต้องการจะปรึกษา</span>
                        <select class="form-control" name="consult" id="consult" required>
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
                            <span class="form-label">รายละเอียด</span>
                            <textarea class="form-control" name="detail" required></textarea><br>
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
    if(isset($_POST['u_id']) && isset($_POST['t_id']) && isset($_POST['consult']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['location']) ){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'config/db.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $u_id = $_POST['u_id'];
    $t_id = $_POST['t_id'];
    $consult = $_POST['consule'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $status ='1';
    $detail ='null';
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_booking (`id`, `consult`, `date`, `time`, `location`, `status`, `detail`, `t_id`, `u_id)
    VALUES (:consult, :date,:time,:location,:status,:detail,:u_id,:t_id)");
    $stmt->bindParam(':consult', $consult, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date , PDO::PARAM_STR);
    $stmt->bindParam(':time', $time , PDO::PARAM_STR);
    $stmt->bindParam(':location', $location , PDO::PARAM_STR);
    $stmt->bindParam(':status', $status , PDO::PARAM_STR);
    $stmt->bindParam(':detail', $detail , PDO::PARAM_STR);
    $stmt->bindParam(':t_id', $t_id , PDO::PARAM_STR);
    $stmt->bindParam(':u_id', $u_id , PDO::PARAM_STR);
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
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
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