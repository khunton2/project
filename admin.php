<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if (empty($_SESSION['id']) && empty($_SESSION['name'])) {
    echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้กรุณาเข้าสู่ระบบ",
                
                type: "error"
                }, function() {
                window.location = "login_reg.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Stylesheet -->
    <link href="css/admin.css  " rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>


    <title>admin</title>
</head>

<body>

    </a>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                    <a href="index.php" class="navbar-brand">
                        <h1 classgrowth="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>vokse</h1>
                    </a>
                </nav>

                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <!-- Toggle -->
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>

                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bar-chart"></i> Analitycs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bookmarks"></i> Collections
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                    <!-- Navigation -->


                    <!-- User (md) -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                                <div class="log-out">
                                    <div class="menu-item flex">
                                        <div class="icon">
                                            <ion-icon name="log-out-outline"></ion-icon>
                                        </div>
                                        <p>Logout</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="top-container">
                            <div action="#" class="search">
                                <svg class="search__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5418 19.25C15.3513 19.25 19.2502 15.3512 19.2502 10.5417C19.2502 5.73223 15.3513 1.83337 10.5418 1.83337C5.73235 1.83337 1.8335 5.73223 1.8335 10.5417C1.8335 15.3512 5.73235 19.25 10.5418 19.25Z" stroke="#596780" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M20.1668 20.1667L18.3335 18.3334" stroke="#596780" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input type="text" class="search__input" placeholder="Search something here">
                            </div>
                            <div class="user-nav">
                                <button class="notification">
                                    <svg class="notification__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0201 2.91003C8.71009 2.91003 6.02009 5.60003 6.02009 8.91003V11.8C6.02009 12.41 5.76009 13.34 5.45009 13.86L4.30009 15.77C3.59009 16.95 4.08009 18.26 5.38009 18.7C9.69009 20.14 14.3401 20.14 18.6501 18.7C19.8601 18.3 20.3901 16.87 19.7301 15.77L18.5801 13.86C18.2801 13.34 18.0201 12.41 18.0201 11.8V8.91003C18.0201 5.61003 15.3201 2.91003 12.0201 2.91003Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" />
                                        <path d="M13.8699 3.19994C13.5599 3.10994 13.2399 3.03994 12.9099 2.99994C11.9499 2.87994 11.0299 2.94994 10.1699 3.19994C10.4599 2.45994 11.1799 1.93994 12.0199 1.93994C12.8599 1.93994 13.5799 2.45994 13.8699 3.19994Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.02 19.0601C15.02 20.7101 13.67 22.0601 12.02 22.0601C11.2 22.0601 10.44 21.7201 9.90002 21.1801C9.36002 20.6401 9.02002 19.8801 9.02002 19.0601" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" />
                                    </svg>
                                </button>
                               
                                
                              <h4>สวัสดีคุณ</h4>  <h1 class="text-body ps-2">  <?= $_SESSION['name'] ?></h1>
                            </div>
                        </div>

                        <h1>report</h1>

                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">จำนวนสมาชิก</span>
                                            <span class="h3 font-bold mb-0">215</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">จำนวนงานบทความ</span>
                                            <span class="h3 font-bold mb-0">$750.90</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white text-lg rounded-circle">
                                                <i class="bi bi-journals"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">จำนวนงาน</span>
                                            <span class="h3 font-bold mb-0">1.400</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                <i class="bi bi-briefcase-fill"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">จำนวนอาจารย์</span>
                                            <span class="h3 font-bold mb-0">95%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                <i class="bi bi-minecart-loaded"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        
                       
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">การนัดคิว</span>
                                            <span class="h3 font-bold mb-0">95%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white text-lg rounded-circle">
                                                <i class="bi bi-clock"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">กยศ</span>
                                            <span class="h3 font-bold mb-0">95%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                <i class="bi bi-minecart-loaded"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Card stats -->
                        <div>
                            <div class="bottom-container">
                                <div class="bottom-container__left">
                                    <div class="box spending-box">
                                        <div class="header-container">
                                            <h3 class="section-header">Spending Statistics</h3>
                                            <div class="year-selector">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.8" width="24" height="24" rx="6" fill="#F6F7F9" />
                                                    <path d="M13.4999 15.96L10.2399 12.7C9.85492 12.315 9.85492 11.685 10.2399 11.3L13.4999 8.04004" stroke="#1A202C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span>2023</span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.8" width="24" height="24" rx="6" fill="#F6F7F9" />
                                                    <path d="M10.4551 15.96L13.7151 12.7C14.1001 12.315 14.1001 11.685 13.7151 11.3L10.4551 8.04004" stroke="#1A202C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="bar-chart">
                                            <canvas id="myChart" height="220px" width="660px"></canvas>
                                        </div>
                                    </div>
                                    <div class="box total-box">
                                       
                                        <div class="total-box__right">
                                            <div class="header-container">
                                                <h3 class="section-header">Total Expense</h3>
                                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="42" height="42" rx="8" fill="#F6F7F9" />
                                                    <path d="M27.0702 23.43L21.0002 29.5L14.9302 23.43" stroke="#FF4423" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M21 12.5V29.33" stroke="#FF4423" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <h1 class="price">$50,530.00<span class="price-currency">(USD)</span></h1>
                                            <p><span class="percentage-decrease">10%</span> decrease compared to last week</p>
                                        </div>
                                    </div>
                                    <div class="box transaction-box">
                                        <div class="header-container">
                                            <h3 class="section-header">Transaction History</h3>
                                            <div class="date-selector">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 1.5V3.75" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 1.5V3.75" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.625 6.8175H15.375" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.75 6.375V12.75C15.75 15 14.625 16.5 12 16.5H6C3.375 16.5 2.25 15 2.25 12.75V6.375C2.25 4.125 3.375 2.625 6 2.625H12C14.625 2.625 15.75 4.125 15.75 6.375Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.7713 10.275H11.778" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.7713 12.525H11.778" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.99686 10.275H9.00359" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.99686 12.525H9.00359" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.22049 10.275H6.22723" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.22049 12.525H6.22723" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span>1 Jan - 1 Feb 2022</span>
                                            </div>
                                        </div>
                                        <table class="transaction-history">
                                            <tr>
                                                <th>Transactions</th>
                                                <th>Date
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498" stroke="#90A3BF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </th>
                                                <th>Amount
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498" stroke="#90A3BF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </th>
                                                <th>Status
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.96004 4.47498L6.70004 7.73498C6.31504 8.11998 5.68504 8.11998 5.30004 7.73498L2.04004 4.47498" stroke="#90A3BF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="18" cy="18" r="18" fill="#33B938" fill-opacity="0.1" />
                                                        <path d="M24.875 21.8125V23.875H11.125V21.8125C11.125 21.4344 11.4344 21.125 11.8125 21.125H24.1875C24.5656 21.125 24.875 21.4344 24.875 21.8125Z" fill="#33B938" stroke="#33B938" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M13.6875 20.625V16.8125H14.0625V20.625H13.6875Z" fill="#33B938" stroke="#33B938" />
                                                        <path d="M16.4375 20.625V16.8125H16.8125V20.625H16.4375Z" fill="#33B938" stroke="#33B938" />
                                                        <path d="M19.1875 20.625V16.8125H19.5625V20.625H19.1875Z" fill="#33B938" stroke="#33B938" />
                                                        <path d="M21.9375 20.625V16.8125H22.3125V20.625H21.9375Z" fill="#33B938" stroke="#33B938" />
                                                        <path d="M25.5625 23.8906H10.4375C10.4367 23.8906 10.436 23.8905 10.4346 23.89C10.4328 23.8892 10.4302 23.8876 10.4275 23.885C10.4249 23.8823 10.4233 23.8797 10.4225 23.8779C10.422 23.8765 10.4219 23.8758 10.4219 23.875C10.4219 23.8742 10.422 23.8735 10.4225 23.8721C10.4233 23.8703 10.4249 23.8677 10.4275 23.865C10.4302 23.8624 10.4328 23.8608 10.4346 23.86C10.436 23.8595 10.4367 23.8594 10.4375 23.8594H25.5625C25.5633 23.8594 25.564 23.8595 25.5654 23.86C25.5672 23.8608 25.5698 23.8624 25.5725 23.865C25.5751 23.8677 25.5767 23.8703 25.5775 23.8721C25.578 23.8735 25.5781 23.8742 25.5781 23.875C25.5781 23.8758 25.578 23.8765 25.5775 23.8779C25.5767 23.8797 25.5751 23.8823 25.5725 23.885C25.5698 23.8876 25.5672 23.8892 25.5654 23.89C25.564 23.8905 25.5633 23.8906 25.5625 23.8906Z" fill="#33B938" stroke="#33B938" />
                                                        <path d="M18.058 10.691C18.0659 10.6923 18.0707 10.6934 18.0725 10.6939L24.2562 13.1674C24.2675 13.1719 24.302 13.1932 24.335 13.2419C24.368 13.2904 24.375 13.33 24.375 13.3425V15.625C24.375 15.727 24.2895 15.8125 24.1875 15.8125H11.8125C11.7105 15.8125 11.625 15.727 11.625 15.625V13.3425C11.625 13.33 11.632 13.2904 11.665 13.2419C11.698 13.1932 11.7325 13.1719 11.7438 13.1674L17.9275 10.6939C17.9293 10.6934 17.9341 10.6923 17.942 10.691C17.9573 10.6886 17.9775 10.6869 18 10.6869C18.0225 10.6869 18.0427 10.6886 18.058 10.691ZM16.4688 13.5625C16.4688 14.4093 17.1532 15.0938 18 15.0938C18.8468 15.0938 19.5312 14.4093 19.5312 13.5625C19.5312 12.7157 18.8468 12.0313 18 12.0313C17.1532 12.0313 16.4688 12.7157 16.4688 13.5625Z" fill="#33B938" stroke="#33B938" />
                                                    </svg>
                                                    Bank Transfer
                                                </td>
                                                <td>Jan 01,2022</td>
                                                <td>$2,000.00</td>
                                                <td>
                                                    <svg class="status" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="16" height="16" rx="8" fill="#BCE455" fill-opacity="0.3" />
                                                        <circle cx="8" cy="8" r="4" fill="#7FB519" />
                                                    </svg>
                                                    Completed
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="18" cy="18" r="18" fill="#EBF4FF" />
                                                        <g clip-path="url(#clip0_129_9482)">
                                                            <path d="M23.9945 10.0539C23.0966 9.03042 21.4735 8.59164 19.3971 8.59164H13.3706C13.1652 8.59165 12.9665 8.66495 12.8102 8.79835C12.654 8.93176 12.5505 9.11653 12.5183 9.31943L10.009 25.234C9.95908 25.5479 10.2021 25.832 10.5202 25.832H14.2407L15.1751 19.9054L15.1461 20.091C15.2126 19.6721 15.5709 19.3631 15.9952 19.3631H17.7632C21.2364 19.3631 23.9559 17.9524 24.7504 13.8714C24.7739 13.7507 24.7944 13.6333 24.812 13.5185C24.7118 13.4654 24.7118 13.4654 24.812 13.5185C25.0486 12.0101 24.8104 10.9834 23.9945 10.0539Z" fill="#27346A" />
                                                            <path d="M16.5987 12.9751C16.7004 12.9267 16.8116 12.9016 16.9243 12.9017H21.6489C22.2084 12.9017 22.7302 12.9381 23.2071 13.0148C23.3405 13.0361 23.4733 13.0615 23.6051 13.091C23.792 13.1322 23.9768 13.1827 24.1587 13.2422C24.3931 13.3205 24.6114 13.4117 24.8121 13.5185C25.0486 12.0096 24.8104 10.9834 23.9945 10.0539C23.0961 9.03042 21.4735 8.59164 19.3971 8.59164H13.3701C12.9458 8.59164 12.5848 8.90057 12.5183 9.31943L10.009 25.2335C9.95908 25.5478 10.2021 25.8316 10.5196 25.8316H14.2407L16.1792 13.5383C16.1983 13.4175 16.2464 13.3031 16.3195 13.205C16.3926 13.1069 16.4884 13.028 16.5987 12.9751Z" fill="#27346A" />
                                                            <path d="M24.7503 13.8714C23.9559 17.9518 21.2364 19.3631 17.7632 19.3631H15.9947C15.5704 19.3631 15.212 19.6721 15.1461 20.091L13.9837 27.4601C13.9402 27.7347 14.1526 27.9836 14.4305 27.9836H17.5668C17.7465 27.9835 17.9202 27.9194 18.0568 27.8027C18.1934 27.686 18.2839 27.5244 18.3119 27.3469L18.3425 27.1871L18.9336 23.4408L18.9717 23.2338C18.9997 23.0563 19.0902 22.8947 19.2268 22.778C19.3634 22.6613 19.5371 22.5971 19.7167 22.5971H20.1861C23.2243 22.5971 25.6032 21.3628 26.2984 17.7931C26.5886 16.3013 26.4384 15.0558 25.6708 14.1809C25.438 13.916 25.1488 13.6971 24.812 13.5185C24.7938 13.6338 24.774 13.7507 24.7503 13.8714Z" fill="#2790C3" />
                                                            <path d="M23.98 13.187C23.8562 13.1508 23.7311 13.1188 23.6051 13.091C23.4732 13.062 23.3405 13.0368 23.2071 13.0154C22.7297 12.9381 22.2083 12.9016 21.6483 12.9016H16.9242C16.8115 12.9014 16.7002 12.9267 16.5986 12.9757C16.4882 13.0284 16.3923 13.1072 16.3192 13.2053C16.2461 13.3035 16.198 13.418 16.1791 13.5389L15.175 19.9054L15.146 20.091C15.212 19.6721 15.5703 19.3631 15.9947 19.3631H17.7632C21.2364 19.3631 23.9559 17.9524 24.7503 13.8714C24.7739 13.7507 24.7938 13.6338 24.812 13.5185C24.6108 13.4123 24.3931 13.3205 24.1586 13.2428C24.0994 13.2231 24.0399 13.2046 23.9801 13.187" fill="#1F264F" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_129_9482">
                                                                <rect width="16.4967" height="19.4609" fill="white" transform="translate(10 8.53906)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    Paypal Account
                                                </td>
                                                <td>Jan 04,2022</td>
                                                <td>$2,000.00</td>
                                                <td>
                                                    <svg class="status" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="16" height="16" rx="8" fill="#DBA32A" fill-opacity="0.14" />
                                                        <circle cx="8" cy="8" r="4" fill="#DBA32A" />
                                                    </svg>
                                                    Pending
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="18" cy="18" r="18" fill="#EAECF1" />
                                                        <g clip-path="url(#clip0_129_9497)">
                                                            <path d="M14.6667 30C16.6907 30 18.3333 28.3573 18.3333 26.3333V22.6667H14.6667C12.6427 22.6667 11 24.3093 11 26.3333C11 28.3573 12.6427 30 14.6667 30Z" fill="#0ACF83" />
                                                            <path d="M11 19C11 16.976 12.6427 15.3333 14.6667 15.3333H18.3333V22.6667H14.6667C12.6427 22.6667 11 21.024 11 19Z" fill="#A259FF" />
                                                            <path d="M11 11.6667C11 9.64267 12.6427 8 14.6667 8H18.3333V15.3333H14.6667C12.6427 15.3333 11 13.6907 11 11.6667Z" fill="#F24E1E" />
                                                            <path d="M18.3335 8H22.0002C24.0242 8 25.6668 9.64267 25.6668 11.6667C25.6668 13.6907 24.0242 15.3333 22.0002 15.3333H18.3335V8Z" fill="#FF7262" />
                                                            <path d="M25.6668 19C25.6668 21.024 24.0242 22.6667 22.0002 22.6667C19.9762 22.6667 18.3335 21.024 18.3335 19C18.3335 16.976 19.9762 15.3333 22.0002 15.3333C24.0242 15.3333 25.6668 16.976 25.6668 19Z" fill="#1ABCFE" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_129_9497">
                                                                <rect width="14.6667" height="22" fill="white" transform="translate(11 8)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    Bank Transfer
                                                </td>
                                                <td>Jan 06,2022</td>
                                                <td>$2,000.00</td>
                                                <td>
                                                    <svg class="status" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="16" height="16" rx="8" fill="#DB2719" fill-opacity="0.3" />
                                                        <circle cx="8" cy="8" r="4" fill="#DB2719" />
                                                    </svg>
                                                    On Hold
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="bottom-container__right">
                                    <div class="box">
                                        <div class="header-container">
                                            <h3 class="section-header">จำนวนการค้นหา</h3>
                                            
                                        </div>
                                        <div class="bar-chart">
                                            <canvas id="myChart1" ></canvas>
                                        </div>
                                        
                                       
                                    </div>
                                    <div class="box spending-box">
                                        
                                    <div class="box">
                                        <div class="top-creators">
                                            <div class="heading flex flex-sb">
                                                <h2>Top Creators</h2>
                                                <p>See all</p>
                                            </div>
                                            <div class="section flex flex-sb">
                                                <div class="creator flex flex-sb">
                                                    <div class="follow-creator flex">
                                                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="" />
                                                        <div class="creator-details">
                                                            <h3>Hassnain Haider</h3>
                                                            <p>@hassnain</p>
                                                        </div>
                                                    </div>

                                                    <a href="#" class="btn following">Following</a>
                                                </div>

                                            </div>
                                            <div class="box spending-box">


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="bottom-container__right">
                                    -->
                        </div>
                    </div>
                </div>
        </div>


        </main>
    </div>
    </div>
    <<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js">
        </script>

        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],

                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
         <script>
            var ctx = document.getElementById("myChart1");
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["การเงิน",  "การเรียน",  "ความรัก",],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 20],

                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>   
        <!-- Template Javascript -->
        <script src="js/admin.ja"></script>
</body>

</html>


