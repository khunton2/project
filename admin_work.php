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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />



    <title>admin</title>
</head>

<body>

    </a>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require_once 'navbar/navbaradmin.php'; ?>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php require_once 'navbar/Header.php' ?>

            <main class="py-6 bg-surface-secondary">
                <div class="card">
                    <div class="container-fluid">

                        <div class="row g-6 mb-6">
                            <table id="example" class="display" cellspacing="0">
                                <!--ส่วนหัว-->
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>ชื่องาน</th>
                                        <th>ผู้จ้าง</th>
                                        <th>สถานะ</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <!-- ส่วนท้าย -->
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>ชื่อ</th>
                                        <th>สกุล</th>
                                        <th>ประเภท</th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                                <!--ส่วนเนื้อหา -->
                                <tbody>
                                    <tr>
                                        <td align="center">1</td>
                                        <td>คุณท่านต้น1</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td><a class="btn btn-info " href="#"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-warning " href="#"><i class="bi bi-trash"></i></a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td align="center">2</td>
                                        <td>คุณท่านต้น2</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">3</td>
                                        <td>คุณท่านต้น3</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">4</td>
                                        <td>คุณท่านต้น4</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">5</td>
                                        <td>คุณท่านต้น5</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">6</td>
                                        <td>คุณท่านต้น6</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">7</td>
                                        <td>คุณท่านต้น7</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">8</td>
                                        <td>คุณท่านต้น8</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">9</td>
                                        <td>คุณท่านต้น9</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">10</td>
                                        <td>คุณท่านต้น10</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">11</td>
                                        <td>คุณท่านต้น11</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">12</td>
                                        <td>คุณท่านต้น12</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">13</td>
                                        <td>คุณท่านต้น13</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">14</td>
                                        <td>คุณท่านต้น14</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td align="center">15</td>
                                        <td>คุณท่านต้น15</td>
                                        <td>สุดหล่อ</td>
                                        <td>แฟนเธอ</td>
                                        <td>19</td>
                                    </tr>
                                </tbody>
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="ad_addwork.php" class="btn btn-info">เพิ่มงาน</a>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>