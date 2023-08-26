<?php
 require_once 'config/db.php';
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
                            window.location = "ad_booking.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "ad_booking.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
  }
} //isset 

?>