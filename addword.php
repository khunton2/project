<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['name']) && isset($_POST['w_desc'])&& isset($_POST['contact'])&& isset($_POST['tag'])&& isset($_POST['w_img'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'config/db.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $name = $_POST['name'];
    $w_desc = $_POST['w_desc'];
    $contact = $_POST['contact'];
    $tag = $_POST['tag'];
    $w_img = $_POST['w_img'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_work (id,name, w_desc,contact,tag,w_img)
    VALUES (:id,:name, :w_desc,:contact,:tag,:w_img)");
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':w_desc', $w_desc , PDO::PARAM_STR);
    $stmt->bindParam(':contact', $contact , PDO::PARAM_STR);
    $stmt->bindParam(':tag', $tag , PDO::PARAM_STR);
    $stmt->bindParam(':w_img', $w_img , PDO::PARAM_STR);
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