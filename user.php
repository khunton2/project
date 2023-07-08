<!DOCTYPE html>
<html lang="en">
<?php
## Database configuration

require_once 'config/db.php';

$data[] = array();
$sql = 'SELECT * FROM `tbl_member`';
foreach ($conn->query($sql) as $row) {

    array_push($data, $row);
}
// print_r($data);
?>

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
    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



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
                            <table id='empTable' class='display dataTable'>

                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>อีเมล</th>
                                        <th>ประเภท</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) {
                                        $u_id = $row['u_id'];
                                        $name = $row['name'];
                                        $surname = $row['surname'];
                                        $email = $row['email'];
                                        $Position = $row['Position'];
                                    ?>
                                        <tr>
                                            <td><?php echo $u_id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $surname; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $Position; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                                <?php

                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- <div class="d-grid gap-2 d-md-block">
                                    <a href="addmember_teacher.php" class="btn btn-info">เพิ่มสมาชิก  </a>
                                </div> -->
    </div>

</body>

</html>


<script>
    $(document).ready(function() {
        $('#empTable').DataTable();
        console.log("dd");
    });
</script>
</body>