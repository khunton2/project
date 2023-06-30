<?php 
     
     //เงื่อนตรวจสอบการส่ง method get parameter no 
     if(isset($_GET['id'])){
        require_once 'config/db.php';
      //sql query product detail *คิวรี่แบบ Single row ก็คือแสดงแค่ 1 รายการเท่านั้น
      $stmtPrdD = $conn->prepare("SELECT * FROM tbl_article WHERE id=:id");
      //bindParam str , int
      $stmtPrdD->bindParam(':id', $_GET['id'] , PDO::PARAM_INT);
      $stmtPrdD->execute();
      $rowPrdD = $stmtPrdD->fetch(PDO::FETCH_ASSOC);

      //แสดงจำนวนการคิวรี่ข้อมูลได้ คิวรี่ได้ต้องได้ 1 
      //echo $stmtPrdD->rowCount(); //เปิดคอมเม้นดูครับ

      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้าแสดงสินค้า
      if($stmtPrdD->rowCount() != 1){
          header('Location: index.php');
          exit();
      }
    }//isset
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>VOKSE</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">


        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">


    </head>

    <body>
        <!-- Topbar Start -->
        <div class="container-fluid py-2 border-bottom d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>1323</a>
                            <span class="text-body">|</span>
                            <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>see
                                you soon</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-lg-end">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-body px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-body px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-body px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-body px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-body ps-2" href="">
                                <i class="fab fa-youtube"></i>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->



        <!-- Navbar Start -->
        <div class="container-fluid sticky-top bg-white shadow-sm">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                    <a href="index.php" class="navbar-brand">
                        <h1 classgrowth="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>
                            vokse</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="couple_life.html" class="nav-item nav-link">จิตวิทยาชีวิตคู่</a>
                            <a href="learning.html" class="nav-item nav-link">ต้องเรียนยังไง</a>
                            <a href="financial.html" class="nav-item nav-link">การเงินมีปัญหา</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
                                <div class="dropdown-menu m-0">
                                    <a href="blog.html" class="dropdown-item"></a>
                                    <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                    <a href="#" class="dropdown-item">ปํญหาวัยรุ่น</a>
                                    <a href="#" class="dropdown-item">ฟังก่อนนอน</a>
                                    <a href="login_reg.php" class="dropdown-item">เข้าสู่ระบบ</a>
                                    <a href="#" class="dropdown-item">Search</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Blog Start -->
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="img/<?= $rowPrdD['article_img'];?>" alt="">
                        
                        <h1> <?= $rowPrdD['title'];?></h1><br>
                        <p><?= $rowPrdD['titledetail']; ?></p>

                        <p>Alljit ร่วมกับคุณวันเฉลิม คงคาหลวง (นักจิตวิทยาการปรึกษา) เจ้าของแฟนเพจ
                            Trust.นักจิตวิทยาการปรึกษา</p>
                        <iframe width="560" height="315" src="<?= $rowPrdD['link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <h1 class="mb-4"><?= $rowPrdD['title']; ?> </h1>
                        <p><?= $rowPrdD['content']; ?> </p>
                        <h3><?= $rowPrdD['title2']; ?></h3>
                        <p><?= $rowPrdD['content2']; ?></p>
                        <h3><?= $rowPrdD['title3']; ?></h3>
                        <p><?= $rowPrdD['content3']; ?></p>
                        <h3><?= $rowPrdD['title4']; ?></h3>
                        <p><?= $rowPrdD['content4']; ?></p>

                    </div>

         
                <!-- Blog Detail End -->
                <!-- 
                 Comment List Start 
                <div class="mb-5">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">3 Comments</h4>
                    <div class="d-flex mb-4">
                        <img src="img/user.jpg" class="img-fluid rounded-circle" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <img src="img/user.jpg" class="img-fluid rounded-circle" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                    <div class="d-flex ms-5 mb-4">
                        <img src="img/user.jpg" class="img-fluid rounded-circle" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                </div>
                Comment List End -->

                <!-- Comment Form Start 
                <div class="bg-light rounded p-5">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-white mb-4">Leave a comment</h4>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                 Comment Form End -->
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-3"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5">
                        <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">หมวดหมู่</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="h5 bg-light rounded py-2 px-3 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>เรื่องรักๆ</a>
                            <a class="h5 bg-light rounded py-2 px-3 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>เรื่องการเรียน</a>
                            <a class="h5 bg-light rounded py-2 px-3 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>เพื่อน?</a>
                            <a class="h5 bg-light rounded py-2 px-3 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>เงินเท่านั้น</a>
                            <a class="h5 bg-light rounded py-2 px-3 mb-2" href="#"><i class="fa fa-angle-right me-2"></i>ครอบครับ</a>
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5">
                        <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">โพสต์ล่าสุด</h4>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-1.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 d-flex align-items-center bg-light px-3 mb-0">Who is suffering, how to
                                sleep?
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-2.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 d-flex align-items-center bg-light px-3 mb-0">Who is suffering, how to
                                sleep?
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-3.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 d-flex align-items-center bg-light px-3 mb-0">Who is suffering, how to
                                sleep?
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-1.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 d-flex align-items-center bg-light px-3 mb-0">Who is suffering, how to
                                sleep?
                            </a>
                        </div>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/blog-2.jpg" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="" class="h5 d-flex align-items-center bg-light px-3 mb-0">Who is suffering, how to
                                sleep?
                            </a>
                        </div>
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    <div class="mb-5">
                        <img src="img/<?= $rowPrdD['tbl_article_img'];?>" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->

                    <!-- Tags Start -->
                    <div class="mb-5">
                        <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">Tag Cloud</h4>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-primary m-1">เพื่อนรัก</a>
                            <a href="" class="btn btn-primary m-1">พ่อแม่ไม่เข้าใจ</a>
                            <a href="" class="btn btn-primary m-1">เรียนหนัก</a>
                            <a href="" class="btn btn-primary m-1">เงินไม่พอใช้</a>
                            <a href="" class="btn btn-primary m-1">ติด F</a>
                            <a href="" class="btn btn-primary m-1">เรียนไม่ทันเพื่อน</a>
                            <a href="" class="btn btn-primary m-1">หมดไฟกับการเรียน</a>
                            <a href="" class="btn btn-primary m-1">แฟนนอกใจ</a>
                            <a href="" class="btn btn-primary m-1">หางาน</a>
                            <a href="" class="btn btn-primary m-1">รักแฟนมาก</a>
                            <a href="" class="btn btn-primary m-1">ร้านอาหารที่ไหนอร่อย</a>
                            <a href="" class="btn btn-primary m-1">เบื่ออาจารย์</a>
                        </div>
                    </div>
                    <!-- Tags End -->

                    <!-- Plain Text Start -->
                    <div>
                        <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 mb-4">Plain Text</h4>
                        <div class="bg-light rounded text-center" style="padding: 30px;">
                            <p>ยังคิดไม่ออกว่าจะใส่อะไร</p>
                            <a href="" class="btn btn-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                    <!-- Plain Text End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
        <!-- Blog End -->


        <!-- Footer Start -->

        <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-md-0">&copy; <a class="text-primary" href="#">_ khunton_</a>.designer and developer.
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0">VOKSE <a class="text-primary"></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

    </html>