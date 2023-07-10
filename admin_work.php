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

    <!--datatable-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



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

                                        <th>ชื่องาน</th>
                                        <th>ผู้จ้าง</th>
                                        <th>ติดต่อ</th>
                                        <th>แท็ค</th>
                                        <th width="20%"></th>

                                    </tr>
                                </thead>



                                <!--ส่วนเนื้อหา -->
                                <tbody>
                                    <?php
                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    require_once 'config/db.php';
                                    $stmt = $conn->prepare("SELECT* FROM tbl_work");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $k) {
                                    ?>

                                        <td><?= $k['w_name']; ?></td>
                                        <td><?= $k['t_id']; ?></td>
                                        <td><?= $k['contact']; ?></td>
                                        <td><?= $k['tag']; ?></td>
                                        <td><button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">view</button>
                                            <button type="button" class="btn btn-outline-warning">edit</button>
                                        </td>
                                        </tr>
                                    <?php } ?>
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
    <!-- JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>