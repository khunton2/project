<?php

session_start();
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
						<a class="text-body ps-2"> สวัสดีคุณ <?= $_SESSION['name'] ?></a>

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
						<a href="GYS.php" class="nav-item nav-link">กยศ</a>
						<a href="booking.php" class="nav-item nav-link">บุคลกรไอที</a>
						<a href="work.php" class="nav-item nav-link">หางาน</a>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">อื่นๆ</a>
							<div class="dropdown-menu m-0">
								<a href="blog.html" class="dropdown-item"></a>
								<a href="detail.html" class="dropdown-item">Blog Detail</a>
								<a href="#" class="dropdown-item">ปํญหาวัยรุ่น</a>
								<a href="#" class="dropdown-item">ฟังก่อนนอน</a>
								<a href="#" class="dropdown-item">ว่าจะใส่อะไรสักอย่าง</a>
								<a href="#" class="dropdown-item">Search</a>
							</div>
						</div>

					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->
	<form name="form" action="" method="post">
                <div class="container">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                    <p class="text-info">ในช่วง 2 สัปดาห์ ที่ผ่านมา ท่านมีอาการดังต่อไปนี้บ่อยแค่ไหน?
                                    </p>
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>เบื่อ ทำอะไร ๆ ก็ไม่เพลิดเพลิน</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_1" name="q_1"
                                        oninput="q1.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q1">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>ไม่สบายใจ ซึมเศร้า หรือท้อแท้</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_2" name="q_2"
                                        oninput="q2.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q2">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>หลับยาก หรือหลับ ๆ ตื่น ๆ หรือหลับมากไป</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_3" name="q_3"
                                        oninput="q3.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q3">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>เหนื่อยง่าย หรือไม่ค่อยมีแรง</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_4" name="q_4"
                                        oninput="q4.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q4">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>เบื่ออาหาร หรือกินมากเกินไป</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_5" name="q_5"
                                        oninput="q5.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q5">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td> รู้สึกไม่ดีกับตัวเอง คิดว่าตัวเองล้มเหลว หรือเป็นคนทำให้ตัวเอง หรือครอบครัวผิดหวัง
                                </td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_6" name="q_6"
                                        oninput="q6.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q6">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>สมาธิไม่ดีเวลาทำอะไร เช่น ดูโทรทัศน์ ฟังวิทยุ หรือทำงานที่ต้องใช้ความตั้งใจ</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_7" name="q_7"
                                        oninput="q7.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q7">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td> พูดหรือทำอะไรช้าจนคนอื่นมองเห็น หรือกระสับกระส่ายจนท่านอยู่ไม่นิ่งเหมือนเคย</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_8" name="q_8"
                                        oninput="q8.value = this.value"></td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q8">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>คิดทำร้ายตนเอง หรือคิดว่าถ้าตาย ๆ ไปเสียคงจะดี</td>
                                <td> <input type="range" class="form-range" value="0" max="3" id="q_9" name="q_9"
                                        oninput="q9.value = this.value">
                                </td>
                                <td>
                                    <div class="badge bg-primary text-wrap" style="width: 2rem;"><output
                                            id="q9">0</output></div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="button" id="submit"
                                            onclick="onSubmit()">ส่งคำตอบ</button>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <div class="text-center">รวมผลคะแนน
                                        <div class="badge bg-primary text-wrap" id="sum_score" name="sum_score"
                                            style="width: 5rem;">0
                                        </div>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>

			<br>
			<div id="c1">
                <div class="container">
                    <div class="p-3 mb-2 bg-primary   text-white"><br>
                        <div class="text-center">
                            <h5>ระดับคะแนนของคุณอยู่ในช่วง 0 - 4</h5>
                        </div><br>
                    </div>
                    <div class="p-3 mb-2 bg-light text-dark">
                        <div class="text-center">
                            <i class="bi bi-emoji-neutral-fill" style='font-size:150px;color:rgba(51, 102, 153)'></i>
                        </div>
                        <div class="text-center">
                            <h5><u>ผลการทดสอบ</h5></u>
                        </div><br>
                        <div class="text-center">
                            <h5>
                                <p class="text-secondary">ท่านไม่มีอาการซึมเศร้าหรือมีก็เพียงเล็กน้อย</p>
                            </h5>
                        </div><br><br>
                        <div class="text-center">
                            <h5><u>ข้อแนะนำในการรักษา</u></h5>
                        </div><br>
                        <div class="text-center">ไม่จำเป็นต้องรักษา</div>
                    </div>
                </div>
            </div>
            <br>
            <div id="c2">
                <div class="container">
                    <div class="p-3 mb-2 bg-primary   text-white"><br>
                        <div class="text-center">
                            <h5>ระดับคะแนนของคุณอยู่ในช่วง 5 - 8</h5>
                        </div><br>
                    </div>
                    <div class="p-3 mb-2 bg-light text-dark">
                        <div class="text-center">
                            <i class="bi bi-emoji-neutral-fill" style='font-size:150px;color:rgb(2, 105, 20, 0.87)'></i>
                        </div>
                        <div class="text-center">
                            <h5><u>ผลการทดสอบ</h5></u>
                        </div><br>
                        <div class="text-center">
                            <h5>
                                <p class="text-success">ท่านมีอาการซึมเศร้าระดับเล็กน้อย</p>
                            </h5>
                        </div><br><br>
                        <div class="text-center">
                            <h5><u>ข้อแนะนำในการรักษา</u></h5>
                        </div><br>
                        <div class="text-center">ควรพักผ่อนให้เพียงพอ นอนหลับให้ได้ 6-8 ชั่วโมง ออกกำลังกายสม่ำเสมอ
                            ทำกิจกรรมที่ทำให้ผ่อนคลาย พบปะเพื่อนฝูง ควรทำแบบประเมินอีกครั้งใน 1 สัปดาห์</div>
                    </div>
                </div>
            </div>
            <br>
            <div id="c3">
                <div class="container">
                    <div class="p-3 mb-2 bg-primary   text-white"><br>
                        <div class="text-center">
                            <h5>ระดับคะแนนของคุณอยู่ในช่วง 9 - 14</h5>
                        </div><br>
                    </div>
                    <div class="p-3 mb-2 bg-light text-dark">
                        <div class="text-center">
                            <i class="bi bi-emoji-neutral-fill" style='font-size:150px;color:rgba(0, 204, 255)'></i>
                        </div>
                        <div class="text-center">
                            <h5><u>ผลการทดสอบ</h5></u>
                        </div><br>
                        <div class="text-center">
                            <h5>
                                <p class="text-info">ท่านมีอาการซึมเศร้าระดับปานกลาง</p>
                            </h5>
                        </div><br><br>
                        <div class="text-center">
                            <h5><u>ข้อแนะนำในการรักษา</u></h5>
                        </div><br>
                        <div class="text-center">ควรพักผ่อนให้เพียงพอ นอนหลับให้ได้ 6-8 ชั่วโมง ออกกำลังกายสม่ำเสมอ
                            ทำกิจกรรมที่ทำให้ผ่อนคลายพบปะเพื่อนฝูง ควรขอคำปรึกษาช่วยเหลือจากผู้ที่ไว้วางใจ
                            ไม่จมอยู่กับปัญหา
                            มองหาหนทางคลี่คลายหากอาการที่ท่านเป็นมีผลกระทบต่อ
                            การทำงานหรือการเข้าสังคม (อาการซึมเศร้าทำให้ท่านมีปัญหาในการทำงาน การดูแลสิ่งต่าง ๆ ในบ้าน
                            หรือการเข้ากับผู้คน ในระดับมากถึงมากที่สุด)
                            หรือหากท่านมีอาการระดับนี้มานาน 1-2 สัปดาห์แล้วยังไม่ดีขึ้น
                            ควรพบแพทย์เพื่อรับการช่วยเหลือรักษา</div>
                    </div>
                </div>
            </div>
            <br>
            <div id="c4">
                <div class="container">
                    <div class="p-3 mb-2 bg-primary   text-white"><br>
                        <div class="text-center">
                            <h5>ระดับคะแนนของคุณอยู่ในช่วง 15 - 19</h5>
                        </div><br>
                    </div>
                    <div class="p-3 mb-2 bg-light text-dark">
                        <div class="text-center">
                            <i class="bi bi-emoji-neutral-fill" style='font-size:150px;color:rgba(255, 153, 0)'></i>
                        </div>
                        <div class="text-center">
                            <h5><u>ผลการทดสอบ</h5></u>
                        </div><br>
                        <div class="text-center">
                            <h5>
                                <p class="text-warning">ท่านมีอาการซึมเศร้าระดับรุนแรงค่อนข้างมาก</p>
                            </h5>
                        </div><br><br>
                        <div class="text-center">
                            <h5><u>ข้อแนะนำในการรักษา</u></h5>
                        </div><br>
                        <div class="text-center">ควรพบแพทย์เพื่อประเมินอาการและให้การรักษา
                            ระหว่างนี้ควรพักผ่อนให้เพียงพอนอนหลับให้ได้ 6-8 ชั่วโมง
                            ออกกำลังกายเบาๆ ทำกิจกรรมที่ทำให้ผ่อนคลาย ไม่เก็บตัว และควรขอคำปรึกษาช่วยเหลือจากผู้ใกล้ชิด
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div id="c5">
                <div class="container">
                    <div class="p-3 mb-2 bg-primary   text-white"><br>
                        <div class="text-center">
                            <h5>ระดับคะแนนของคุณอยู่ในช่วง 20 - 27</h5>
                        </div><br>
                    </div>
                    <div class="p-3 mb-2 bg-light text-dark">
                        <div class="text-center">
                            <i class="bi bi-emoji-neutral-fill" style='font-size:150px;color:rgba(255, 0, 0)'></i>
                        </div>
                        <div class="text-center">
                            <h5><u>ผลการทดสอบ</h5></u>
                        </div><br>
                        <div class="text-center">
                            <h5>
                                <p class="text-danger">ท่านมีอาการซึมเศร้าระดับรุนแรงมาก</p>
                            </h5>
                        </div><br><br>
                        <div class="text-center">
                            <h5><u>ข้อแนะนำในการรักษา</u></h5>
                        </div><br>
                        <div class="text-center">ต้องพบแพทย์เพื่อประเมินอาการและให้การรักษาโดยเร็ว ไม่ควรปล่อยทิ้งไว้
                        </div>
                    </div>
                </div>
            </div>
			<div class="container">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">หมายเหตุ</h4>
                    <p>แบบประเมินนี้พัฒนาจาก แบบสอบถามสุขภาพผู้ป่วย (Patient Health Questionnaire: PHQ-9)
                        ศ. นพ.มาโนช หล่อตระกูล และคณะ คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี
                        การประเมินนี้เป็นการประเมินระดับภาวะซึมเศร้าในขั้นต้น
                        ส่วนการวินิจฉัยนั้นจำเป็นต้องพบแพทย์เพื่อซักประวัติ ตรวจร่างกาย รวมถึงส่งตรวจเพิ่มเติมที่จำเป็น
                        เพื่อยืนยันการวินิจฉัยที่แน่นอน
                        รวมถึงเพื่อแยกโรคหรือภาวะอื่น ๆ เนื่องจากภาวะซึมเศร้าเป็นจากสาเหตุต่าง ๆ ได้มากมาย เช่น
                        โรคทางจิตเวชอื่นที่มีอาการซึมเศร้าร่วมด้วย
                        โรคทางร่างกายเช่นโรคไทรอยด์ โรคแพ้ภูมิตัวเอง หรือเป็นจากยาหรือสารต่าง ๆ</p>
                    <hr>
                    <p class="mb-0">ผลการประเมินและคำแนะนำที่ได้รับจากโปรแกรมนี้จึงไม่สามารถใช้แทนการตัดสินใจของแพทย์ได้
                        การตรวจรักษาเพิ่มเติมหรือการให้ยารักษาขึ้นอยู่กับดุลยพินิจของแพทย์และการปรึกษากันระหว่างแพทย์และตัวท่าน
                    </p>
                </div>
            </div>

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
	<script type="text/JavaScript">

          $('#c1').hide();
          $('#c2').hide();
          $('#c3').hide();
          $('#c4').hide();
          $('#c5').hide();
          
         function onSubmit(){
    
            var q1 =  parseInt($('#q_1').val());
            var q2 =  parseInt($('#q_2').val());
            var q3 =  parseInt($('#q_3').val());
            var q4 =  parseInt($('#q_4').val());
            var q5 =  parseInt($('#q_5').val());
            var q6 =  parseInt($('#q_6').val());
            var q7 =  parseInt($('#q_7').val());
            var q8 =  parseInt($('#q_8').val());
            var q9 =  parseInt($('#q_9').val());
            var sum = q1+q2+q3+q4+q5+q6+q7+q8+q9
            
             $('#sum_score').text(sum);

            $('#q_1').val('0'); 
            $('#q_2').val('0'); 
            $('#q_3').val('0'); 
            $('#q_4').val('0'); 
            $('#q_5').val('0'); 
            $('#q_6').val('0'); 
            $('#q_7').val('0'); 
            $('#q_8').val('0'); 
            $('#q_9').val('0');

          var valSum =  parseInt($('#sum_score').text());
           if (valSum >= 0 && valSum <= 4) {
            $('#c1').show();
            $('#c2').hide();
            $('#c3').hide();
            $('#c4').hide();
            $('#c5').hide();
           }else if (valSum >= 5 && valSum <= 8) {
            $('#c2').show();
            $('#c1').hide();
            $('#c3').hide();
            $('#c4').hide();
            $('#c5').hide();
           }else if (valSum >= 9 && valSum <= 14) {
            $('#c3').show();
            $('#c2').hide();
            $('#c1').hide();
            $('#c4').hide();
            $('#c5').hide();
           }else if (valSum >= 15 && valSum <= 19) {
            $('#c4').show();
            $('#c2').hide();
            $('#c3').hide();
            $('#c1').hide();
            $('#c5').hide();
           }else if (valSum >= 20 && valSum <= 27) {
            $('#c5').show();
            $('#c2').hide();
            $('#c3').hide();
            $('#c4').hide();
            $('#c1').hide();
           }
              resetText();
  
           var u_id = <?php echo json_encode($_SESSION['u_id']) ?>;

           $.ajax({
              type    : 'POST',
              url     : 'updatescore.php',
              data    : {quiz_score : sum , u_id : u_id},
              succcess :function(response){
                console.log('success');

             }
           }
           )           
         } 

         function resetText() {
        $('#q1').text('0'); 
        $('#q2').text('0'); 
        $('#q3').text('0'); 
        $('#q4').text('0'); 
        $('#q5').text('0'); 
        $('#q6').text('0'); 
        $('#q7').text('0'); 
        $('#q8').text('0'); 
        $('#q9').text('0'); 
       }
      </script>
</body>

</html>