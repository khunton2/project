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

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"> </script>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require_once 'navbar/navbaradmin.php'; ?>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php require_once 'navbar/Header.php' ?>
            <main class="py-6 bg-surface-secondary">
                <section class="container vh-70 py-3 mt-2">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pb-0 justify-content-center">
                                    <h5 class="text-center">เพิ่มสมาชิก</h5>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="text-danger">ชื่อ*</label>
                                            <input type="text" id="inputFirstName" class="form-control"
                                                placeholder="ชื่อ" required />
                                            <span id="msg1"></span> <br />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="text-danger">นามสกุล*</label>
                                            <input type="text" id="inputLastName" class="form-control"
                                                placeholder="นามสกุล" required />
                                            <span id="msg2"></span> <br />
                                        </div>
                                    </div> 
                                </div>

                            </div>
                        </div>
                    </div>

                </section>
            </main>
        </div>
    </div>
</body>

</html>