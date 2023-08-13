<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if( isset($_POST['email'])) {
        $name = "Your work has been accepted.";
        $email = $_POST['email']; //อีเมลที่จะส่ง
        $header = "Your work has been accepted.";
        $detail = $_POST['detail'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "wevoke.mail@gmail.com"; // enter your email address
        $mail->Password = "iicoacqdursmfavn"; // enter your password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email); // Send to mail
        $mail->Subject = $header;
        $mail->Body = $detail;
        $content = "งานของคุณมีผู้สนใจกรุณาติดต่อ' " . $detail . "<br/>";
        $content .= "อีเมลฉบับนี้ส่งจากระบบอัตโนมัติ กรุณาอย่าตอบกลับ";
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