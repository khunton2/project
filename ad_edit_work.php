<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
if(isset($_POST['w_name']) && isset($_POST['u_id']) && isset($_POST['contact']) && isset($_POST['tag']) && isset($_POST['w_desc']) && isset($_POST['id'])) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
     require_once 'config/db.php';
//ประกาศตัวแปรรับค่าจากฟอร์ม
$id = $_POST['id'];
$w_name = $_POST['w_name'];
$u_id = $_POST['u_id'];
$contact = $_POST['contact'];
$tag = $_POST['tag'];
$w_desc = $_POST['w_desc'];
//sql update
$stmt = $conn->prepare("UPDATE  tbl_work SET w_name=:w_name, u_id=:u_id ,contact=:contact, tag=:tag, w_desc=:w_desc WHERE id=:id");
$stmt->bindParam(':id', $id , PDO::PARAM_INT);
$stmt->bindParam(':w_name', $w_name , PDO::PARAM_STR);
$stmt->bindParam(':u_id', $u_id , PDO::PARAM_STR);
$stmt->bindParam(':contact', $contact , PDO::PARAM_STR);
$stmt->bindParam(':tag', $tag , PDO::PARAM_STR);
$stmt->bindParam(':w_desc', $w_desc , PDO::PARAM_STR);
$stmt->execute();

// sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($stmt->rowCount() >= 0){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "แก้ไขข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "ad_work.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "ad_work.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
$conn = null; //close connect db
} //isset
?>