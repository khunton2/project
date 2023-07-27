<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if( isset($_POST['email'])) {
        $name = "testbooking ";
        $email = $_POST['email']; //อีเมลที่จะส่ง
        $header = "testbooking";
        $detail = $_POST['detail'];
        $consuit =$_POST['consuit'];
        $date =$_POST['date'];
        $time =$_POST['time'];
        $location =$_POST['location'];
        $u_id =$_POST['u_id'];
       // $quiz_score =$_POST['quiz_score'];
      

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "64010310028@msu.ac.th"; // enter your email address
        $mail->Password = "1449900630518"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->Subject = $header;
        $mail->Body = $detail;
        $content = "มีการจองคิวจาก : " . $detail . "<br/>";
        $content = "มีการจองคิวจาก : " . $u_id . "<br/>";
        $content .= "เรื่อง :" . $consuit ."<br/>";
        $content .="วันที่ :". $date ."<br/>";
        $content .="เวลา :". $time ."<br/>";
        $content .="สถานที่ :". $location ."<br/>";
      //  $content .="ระดับความเสี่ยง :".$quiz_score."<br>/" ;
        
        $mail->msgHTML($content);

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>