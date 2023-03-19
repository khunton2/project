<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login_reg</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <!--  Stylesheet -->
    <link href="css/login.css" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>

    <!-- signup from -->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="signup_db.php" method="post">
                <h2>Create Account</h2>
                <span>or use your account</span>

                <input type="text" name="u_id" placeholder="รหัสนิสิต" />
                <input type="text" name="name" placeholder="ชื่อ" />
                <input type="email" name="email" placeholder="อีเมล" />
                <input type="text" name="branch" placeholder="สังกัด" />
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="รหัสผ่าน" />


                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
        <!-- end signup-->

        <!-- loginfrom -->
        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>

                <input type="username" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>

                <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>New members are welcome, if you are not yet a member, press the button below to apply.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    
    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>

    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/login.js"></script>


</body>

</html>

<?php

print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
  if(isset($_POST['username']) && isset($_POST['password']) ){
  // sweet alert 
  echo '
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  //ไฟล์เชื่อมต่อฐานข้อมูล
  require_once 'config/db.php';
  //ประกาศตัวแปรรับค่าจากฟอร์ม
  $username = $_POST['username'];
  $password = ($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1 

  //check username  & password
    $stmt = $conn->prepare("SELECT id, name, email FROM tbl_member WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->bindParam(':password', $password , PDO::PARAM_STR);
    $stmt->execute();

    //กรอก username & password ถูกต้อง
    if($stmt->rowCount() == 1){
      //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //สร้างตัวแปร session
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email'] = $row['email'];

      //เช็คว่ามีตัวแปร session อะไรบ้าง
      //print_r($_SESSION);

      //exit();
      
        header('Location: financial.php'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
    }else{ //ถ้า username or password ไม่ถูกต้อง

       echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เกิดข้อผิดพลาด",
                           text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                          type: "warning"
                      }, function() {
                          window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            $conn = null; //close connect db
          } //else
  } //isset 
  //devbanban.com
  ?>