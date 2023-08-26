<?php
 require_once 'config/db.php';
//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//exit();
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['lo_name']) ) {
  // sweet alert 
  echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  //ไฟล์เชื่อมต่อฐานข้อมูล
  //require_once 'connect.php';
  //ประกาศตัวแปรรับค่าจากฟอร์ม
  $lo_id = $_POST['lo_id'];
  $lo_name = $_POST['lo_name'];
  


  //sql update 
  $stmt = $conn->prepare("
                UPDATE  tbl_booking_location SET 
                lo_name=:lo_name
                WHERE lo_id=:lo_id");

  //brndParam ข้อความทั่วไป = PARAM_STR, ตัวเลข = PARAM_INT
  $stmt->bindParam(':lo_id', $lo_id, PDO::PARAM_INT);
  $stmt->bindParam(':lo_name', $lo_name, PDO::PARAM_STR);


  $result = $stmt->execute();
  $conn = null; //close connect db
  if ($result) {
    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ปรับปรุงข้อมูลสำเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "ad_add_cat.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "ad_add_cat.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
  }
} //isset 

?>