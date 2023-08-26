<?php
session_start();

//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_SESSION['u_id']) && isset($_POST['t_id']) && isset($_POST['consult']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['location'])) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'config/db.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $u_id = $_SESSION['u_id'];
    $t_id = $_POST['t_id'];
    $consult = $_POST['consule'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $status = '1';
    $detail = 'null';
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_booking (`id`, `consult`, `date`, `time`, `location`, `status`, `detail`, `t_id`, `u_id)
    VALUES (:consult, :date,:time,:location,:status,:detail,:u_id,:t_id)");
    $stmt->bindParam(':consult', $consult, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':time', $time, PDO::PARAM_STR);
    $stmt->bindParam(':location', $location, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);
    $stmt->bindParam(':t_id', $t_id, PDO::PARAM_STR);
    $stmt->bindParam(':u_id', $u_id, PDO::PARAM_STR);
    $result = $stmt->execute();
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($result) {
        $status = "success";
        $response = "Email is sent";
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}
