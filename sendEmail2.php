<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if(isset($_POST['email'])) {
        $name = "otp verify Register ShortCourseOnline";
        $email = $_POST['email'];
        $header = "otp verify For register";
        $detail = "otp verify For register";
        $otp = $_POST['otp'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "63011211141@msu.ac.th"; // enter your email address
        $mail->Password = "qwbvmcefoalkzkzh"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->Subject = $header;
        $mail->Body = $otp;
        $content = "รหัส OTP ของคุณคือ ".$otp."<br/>";
        // $content .= "โปรดยืนยันตัวตนของสมาชิก<br/>";
        // $content .= "ตั้งค่าข้อมูลส่วนตัว ที่ลิงค์ต่อไปนี้ <a href=\"$URL?token=$token\">คลิกที่นี่ </a><br/>";
        // $content .= "หรือคัดลอก / วางลิงค์นี้ลงในเบราว์เซอร์ของคุณ: <br/>";
        // $content .= "<a href=\"$URL?token=$token\">$URL?token=$token</a> <br/>";
        // $content .= "ถ้านี้เป็นความผิดพลาด ก็ไม่ต้องสนใจอีเมลนี้และจะไม่มีอะไรเกิดขึ้น<br/>";
        $content .= "อีเมลฉบับนี้ส่งจากระบบอัตโนมัติ กรุณาอย่าตอบกลับ";
        $mail->msgHTML($content);
        
        // $mail->addAttachment($file['tmp_name'], $file['name']);

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