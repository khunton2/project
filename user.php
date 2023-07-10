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

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>




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
                            <div class="d-grid gap-2 d-md-block">
                                <br>
                                <a href="addmember_teacher.php" class="btn btn-info">เพิ่มสมาชิก </a>
                            </div>
                            <table id='empTable' class='display dataTable'>

                                <thead>
                                    <tr>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>อีเมล</th>
                                        <th>ประเภท</th>
                                        <th width="20%"></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    //คิวรี่ข้อมูลมาแสดงในตาราง
                                    require_once 'config/db.php';
                                    $stmt = $conn->prepare("SELECT* FROM tbl_member");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $k) {
                                    ?>

                                        <tr>

                                            <td><?= $k['name']; ?></td>
                                            <td><?= $k['surname']; ?></td>
                                            <td><?= $k['email']; ?></td>
                                            <td><?= $k['Position'] ?></td>
                                            <td><button type="button" class="btn btn-outline-info">view</button>
                                    <button type="button" class="btn btn-outline-warning">edit</button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                                
                            </table>

                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

</body>

</html>


<script>
    $(document).ready(function() {
        $('#empTable').DataTable();
        // console.log(".data");
    });
</script>
</body>