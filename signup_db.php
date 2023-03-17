<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['signup'])) {
        $id = $_POST['u_id'];
        $name = $_POST['name'];
        // $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $branch = $_POST['branch'];
        $password = $_POST['password'];
       // $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($u_id)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสนิสิต';
            header("location: login_reg.php");
        } else if (empty($name)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: login_reg.php");
        } else if (empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: login_reg.php");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: login_reg.php");
         } else if (empty($name)) {
                $_SESSION['error'] = 'กรุณากรอกชื่อ';
                header("location: login_reg.php"); 
         } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: login_reg.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: login_reg.php");
        // } else if (empty($c_password)) {
        //     $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
        //     header("location: index.php");
        // } else if ($password != $c_password) {
        //     $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
        //     header("location: index.php");
        } else {
            try {

                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(id, name, email,branch, password, urole) 
                                            VALUES(:id, :name, :email,branch, :password, :urole)");
                    $stmt->bindParam(":id", $id);
                    $stmt->bindParam(":name", $name);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":branch", $branch);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: login_reg.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: login_reg.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>